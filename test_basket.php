<?php
require 'config.php';
require 'Basket.php';

// Test cases
$basket = new Basket($products, $deliveryCharges, $offers);

$basket->add('B01');
$basket->add('G01');
echo "Total: $" . $basket->total() . "\n";

$basket = new Basket($products, $deliveryCharges, $offers);
$basket->add('R01');
$basket->add('R01');
echo "Total: $" . $basket->total() . "\n";

$basket = new Basket($products, $deliveryCharges, $offers);
$basket->add('R01');
$basket->add('G01');
echo "Total: $" . $basket->total() . "\n";

$basket = new Basket($products, $deliveryCharges, $offers);
$basket->add('B01');
$basket->add('B01');
$basket->add('R01');
$basket->add('R01');
$basket->add('R01');
echo "Total: $" . $basket->total() . "\n";
