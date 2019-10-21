<?php
namespace Tracktik\ElectronicItem;

include_once("ElectronicItem.php");
include_once(__DIR__ . "/../InterfaceElectronic/ItemInterface.php");
include_once(__DIR__ . "/../InterfaceElectronic/Constants.php");

use Tracktik\ElectronicItem\ElectronicItem;
use Tracktik\InterfaceElectronic\{Constants,ItemInterface};

class ConsoleItem extends ElectronicItem implements ItemInterface {
    protected $dataItem;

    public function __construct($data) {
        $this->dataItem = $this->getDataItem($data['sku']);
        $this->limitExtras($this->dataItem['maximum_extras'], $data['countExtras']);
        $this->setPrice($this->dataItem['price']);
        $this->setType($this->dataItem['type']);
        $this->setLabel($this->dataItem['label']);
        $this->setQuantity($data['count']);
    }

    public function getMaxExtras() : string {
        return Constants::MAX_EXTRAS_CONSOLE;
    }
}