<?php

require_once 'Product.php';

class Sales {
    private $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function calculateTotalRevenue() {
        $totalRevenue = 0;
        foreach ($this->products as $product) {
            $totalRevenue += $product->calculateFinalPrice();
        }
        return $totalRevenue;
    }
}