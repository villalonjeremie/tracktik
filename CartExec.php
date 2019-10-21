<?php
namespace Tracktik\CartExec;

include_once(__DIR__."/InterfaceElectronic/Constants.php");
include_once(__DIR__."/Stdin.php");
include_once(__DIR__."/Error/LimitError.php");
include_once(__DIR__."/ElectronicItem/FactoryElectronicItem.php");

use Tracktik\InterfaceElectronic\Constants;
use Tracktik\ElectronicItem\FactoryElectronicItem;
use Tracktik\Error\LimitError;
use Tracktik\Stdin;

function stdin_stream()
{
    echo Stdin::buildMainQuestion();
    while ($line = fgets(STDIN)) {
        yield $line;
    }
}

$factoryItem = new FactoryElectronicItem;
$items = $factoryItem::getItemsInstance('aggregate');

foreach (stdin_stream() as $line) {
    if($line != "R" && !array_key_exists((int)$line, Constants::ELECTRONIC_ITEMS_MODEL))
        exit('Wrong Number');
    if(trim($line) == "R") {
        $items->displayResults();
        exit;
    }

    $type = Constants::ELECTRONIC_ITEMS_MODEL[(int)$line]['type'];
    $dataInput = Stdin::stdinType($type);
    $dataInput['type'] = $type;
    $dataInput['countExtras'] = (int)$dataInput['countRemote'] + (int)$dataInput['countWired'];
    $dataInput['sku'] = (int)$line;

    try {
        if ($dataInput['count'] > 0){
            foreach ($factoryItem->getInstances($dataInput) as $item) {
                $items->addElectronicItem($item);
            }
        }
    } catch (LimitError $e) {
        echo $e->getMessage();
        echo "\n";
    }
    echo Stdin::buildMainQuestion();
}
