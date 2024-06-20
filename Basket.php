<?php
class Basket
{
    private $products;
    private $deliveryCharges;
    private $offers;
    private $basket;

    public function __construct($products, $deliveryCharges, $offers)
    {
        $this->products = $products;
        $this->deliveryCharges = $deliveryCharges;
        $this->offers = $offers;
        $this->basket = [];
    }

    public function add($productCode)
    {
        if (isset($this->products[$productCode])) {
            $this->basket[] = $productCode;
        } else {
            throw new Exception("Product code $productCode does not exist.");
        }
    }

    public function total()
    {
        $subtotal = 0;
        $productCounts = array_count_values($this->basket);

        foreach ($productCounts as $productCode => $count) {
            $price = $this->products[$productCode];
            if (isset($this->offers[$productCode])) {
                $offer = $this->offers[$productCode];
                $discountedItems = intdiv($count, $offer['buy'] + 1);
                $regularItems = $count - $discountedItems;
                $subtotal += $regularItems * $price + $discountedItems * $price * $offer['get'];
            } else {
                $subtotal += $count * $price;
            }
        }

        $delivery = $this->calculateDelivery($subtotal);
        return number_format($subtotal + $delivery, 2, '.', '');
    }

    private function calculateDelivery($subtotal)
    {
        if ($subtotal >= 90) {
            return $this->deliveryCharges['free'];
        } elseif ($subtotal >= 50) {
            return $this->deliveryCharges[90];
        } else {
            return $this->deliveryCharges[50];
        }
    }
}
