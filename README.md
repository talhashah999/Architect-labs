# Acme Widget Co Sales System

## Overview

This is a proof of concept for the new sales system of Acme Widget Co. The system includes a product catalogue, delivery charge rules, and special offers. The basket class allows adding products and calculating the total cost considering delivery charges and special offers.

## Product Catalogue

- Red Widget (R01): $32.95
- Green Widget (G01): $24.95
- Blue Widget (B01): $7.95

## Delivery Charges

- Orders under $50: $4.95
- Orders under $90: $2.95
- Orders $90 or more: Free

## Special Offers

- Buy one red widget (R01), get the second half price.

## Implementation

The `Basket` class is initialized with the product catalogue, delivery charge rules, and offers. It provides the following methods:

- `add($productCode)`: Adds a product to the basket.
- `total()`: Returns the total cost of the basket, including delivery charges and special offers.

## Usage

To use the basket, initialize it with the product catalogue, delivery charges, and offers, then add products using the `add` method and get the total using the `total` method.

```php
$basket = new Basket($products, $deliveryCharges, $offers);
$basket->add('B01');
$basket->add('G01');
echo "Total: $" . $basket->total(); // Outputs: Total: $37.85
