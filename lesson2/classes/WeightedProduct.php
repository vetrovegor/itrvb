<?php

require_once 'Product.php';

class WeightedProduct extends Product {
    private $weight;

    public function __construct($name, $price, $weight) {
        parent::__construct($name, $price);
        $this->weight = $weight;
    }

    public function calculateFinalPrice() {
        return $this->price * $this->weight;
    }
}