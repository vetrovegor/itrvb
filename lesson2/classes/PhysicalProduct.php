<?php

require_once 'Product.php';

class PhysicalProduct extends Product {
    private $quantity;

    public function __construct($name, $price, $quantity) {
        parent::__construct($name, $price);
        $this->quantity = $quantity;
    }

    public function calculateFinalPrice() {
        return $this->price * $this->quantity;
    }
}