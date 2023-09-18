<?php

require_once 'Product.php';

class DigitalProduct extends Product {
    public function calculateFinalPrice() {
        return $this->price / 2;
    }
}