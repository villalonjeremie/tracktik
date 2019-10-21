<?php
namespace Tracktik\ElectronicItem;

include_once("ConsoleItem.php");
include_once("MicrowaveItem.php");
include_once("TelevisionItem.php");
include_once("ControllerItem.php");
include_once(__DIR__."/../ElectronicItems/ElectronicItemsAggregate.php");

use Tracktik\InterfaceElectronic\Constants;
use Tracktik\ElectronicItem\{ConsoleItem,TelevisionItem,MicrowaveItem,ControllerItem};
use Tracktik\ElectronicItems\ElectronicItemsAggregate;


class FactoryElectronicItem {

    public static function getInstances($data) : array {
        $result = [];
        if ($data['type'] == Constants::ELECTRONIC_ITEM_TELEVISION) {
            $result[] = new TelevisionItem($data);
            empty($data['countRemote']) ? : $result[] = new ControllerItem($data, false);
            return $result;

        } elseif ($data['type'] == Constants::ELECTRONIC_ITEM_CONSOLE) {
            $result[] = new ConsoleItem($data);
            empty($data['countRemote']) ? : $result[] = new ControllerItem($data, false);
            empty($data['countWired']) ? : $result[] = new ControllerItem($data, true);
            return $result;

        } elseif($data['type'] == Constants::ELECTRONIC_ITEM_MICROWAVE) {
            return [new MicrowaveItem($data)];
        }
    }

    public static function getItemsInstance() {
        return new ElectronicItemsAggregate;
    }
}