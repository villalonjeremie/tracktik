<?php
namespace Tracktik\InterfaceElectronic;

interface ElectronicItemsActionInterface {

    public function getSortedItems();

    public function getItemsByType($type);
}