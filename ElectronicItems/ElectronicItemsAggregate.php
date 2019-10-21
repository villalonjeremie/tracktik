<?php
namespace Tracktik\ElectronicItems;

include_once(__DIR__."/../InterfaceElectronic/ElectronicItemsInterface.php");
include_once(__DIR__."/../InterfaceElectronic/ItemInterface.php");

use Tracktik\InterfaceElectronic\ElectronicItemsInterface;
use Tracktik\InterfaceElectronic\ItemInterface;

class ElectronicItemsAggregate implements ElectronicItemsInterface {
    /**
     * @var array
     */
    protected $items = [];

    protected $totalPrice;

    public function addElectronicItem(ItemInterface $item) {
        $this->items[] = $item;
    }

    public function getItems() {
        return $this->items;
    }

    private function getTotalPrice() {
        return $this->totalPrice;
    }

    private function addPriceTotalPrice($price) {
        $this->totalPrice += (float)$price;
    }

    private function getSortedItems() {
        usort($this->items ,function($first,$second){
            return $first->getPrice() > $second->getPrice();
        });

        return true;
    }

    public function aggregateItems($items) {
        $result = [];
        if (empty($items)) {
            return false;
        }
        foreach ($items as $item) {
            $result[] = [
                'label' => $item->getLabel(),
                'price' => $item->getPrice() * (int)$item->getQuantity(),
                'quantity' => $item->getQuantity()
            ];
            $this->addPriceTotalPrice($item->getPrice() * (int)$item->getQuantity());
        }

        return $result;
    }

    public function displayResults() {
        $this->getSortedItems();
        $sortedItems = $this->aggregateItems($this->getItems());
        if (empty($sortedItems)){
            echo "No Item in the cart";
            echo "\n";
            exit;
        }

        foreach ($sortedItems as $item) {
            echo $item['quantity'].'x'.$item['label'].' : '.$item['price'];
            echo "\n";
        }
        echo '----------------';
        echo "\n";
        echo $this->getTotalPrice().'$ CAN';
        echo "\n";
    }

}