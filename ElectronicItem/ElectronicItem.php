<?php
namespace Tracktik\ElectronicItem;

include_once("ElectronicItem.php");
include_once(__DIR__ . "/../InterfaceElectronic/ItemInterface.php");
include_once(__DIR__ . "/../InterfaceElectronic/Constants.php");
include_once(__DIR__ . "/../Error/LimitError.php");

use Tracktik\InterfaceElectronic\Constants;
use Tracktik\Error\LimitError;

abstract class ElectronicItem {
    /**
     * @var float
     */
    public $price;
    /**
     * @var string
     */
    private $type;
    /**
     * @var boolean
     */
    public $wired;
    /**
     * @var int
     */
    public $quantity;

    public $label;

    public function getPrice() {
        return $this->price;
    }

    public function getType() {
        return $this->type;
    }

    public function getWired() {
        return $this->wired;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setWired($wired) {
        $this->wired = $wired;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function getDataItem($sku) : array {
        try {
            if (!empty(Constants::ELECTRONIC_ITEMS_MODEL[$sku])) {
                return Constants::ELECTRONIC_ITEMS_MODEL[$sku];
            } else {
                throw new \Exception('Wrong SKU');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function limitExtras($extrasMax, $quantity) {
            if ($extrasMax != -1 && $extrasMax < $quantity) {
                throw new LimitError('Extras are limited : '.$extrasMax);
            }

            if ($extrasMax == 0 && $quantity != 0) {
                throw new LimitError('No extras for this product');
            }
    }

    public function additionQuantity($number) {
        $this->quantity = $this->quantity + (int)$number;
    }

    abstract function getMaxExtras();
}