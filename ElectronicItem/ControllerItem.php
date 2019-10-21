<?php
namespace Tracktik\ElectronicItem;

include_once("ElectronicItem.php");
include_once(__DIR__ . "/../InterfaceElectronic/ItemInterface.php");
include_once(__DIR__ . "/../InterfaceElectronic/Constants.php");

use Tracktik\ElectronicItem\ElectronicItem;
use Tracktik\InterfaceElectronic\{Constants,ItemInterface};

class ControllerItem extends ElectronicItem implements ItemInterface {

    private $dataItem ;

    public function __construct($data, $wired = false) {
        $this->dataItem = $this->getDataItem($data['sku']);
        $this->setPrice($wired ? $this->dataItem['wired_price'] : $this->dataItem['remote_price']);
        $this->setType(Constants::ELECTRONIC_ITEM_CONTROLLER);
        $this->setQuantity($wired ? $data['countWired'] : $data['countRemote']);
        $this->setLabel($wired ? 'Wired '.'Controller '.$this->dataItem['label'] : 'Remote '.'Controller '.$this->dataItem['label']);
        $this->setWired($wired);
    }

    public function getMaxExtras() : string {
        return Constants::MAX_EXTRAS_CONTROLLER;
    }
}