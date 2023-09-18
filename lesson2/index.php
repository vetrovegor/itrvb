<?php

require_once 'classes/DigitalProduct.php';
require_once 'classes/PhysicalProduct.php';
require_once 'classes/WeightedProduct.php';
require_once 'classes/Sales.php';

$digitalProduct = new DigitalProduct('Электронная книга', 100);
$physicalProduct = new PhysicalProduct('Физическая книга', 50, 3);
$weightedProduct = new WeightedProduct('Фрукты', 2, 5);

$sales = new Sales();
$sales->addProduct($digitalProduct);
$sales->addProduct($physicalProduct);
$sales->addProduct($weightedProduct);

$totalRevenue = $sales->calculateTotalRevenue();
echo "Общий доход с продаж: $totalRevenue рублей";