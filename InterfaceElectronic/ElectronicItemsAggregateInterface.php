<?php
namespace Tracktik\InterfaceElectronic;

interface ElectronicItemsAggregateInterface {

    public function getSortedItems();

    public function addElectronicItem($item);

    public function aggregateItems($items);

    public function displayResults();
}