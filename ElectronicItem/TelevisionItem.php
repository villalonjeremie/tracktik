<?php
namespace Tracktik\ElectronicItem;

include_once("ElectronicItem.php");
include_once(__DIR__ . "/../InterfaceElectronic/ItemInterface.php");
include_once(__DIR__ . "/../InterfaceElectronic/Constants.php");

use Tracktik\ElectronicItem\ElectronicItem;
use Tracktik\InterfaceElectronic\{Constants,ItemInterface};


class TelevisionItem extends ElectronicItem implements ItemInterface {
    protected $dataItem;

    public function __construct($data) {
        $this->dataItem = $this->getDataItem($data['sku']);
        $this->limitExtras($this->dataItem['maximum_extras'], $data['countExtras']);
        $this->setPrice($this->dataItem['price']);
        $this->setType($this->dataItem['type']);
        $this->setQuantity($data['count']);
        $this->setLabel($this->dataItem['label']);
    }

    public function getMaxExtras() : string {
        return Constants::MAX_EXTRAS_TELEVISION;
    }
}