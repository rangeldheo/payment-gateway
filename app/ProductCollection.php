<?php

namespace App;

use Interfaces\Iproduct;
use SplDoublyLinkedList;

class ProductCollection extends SplDoublyLinkedList
{
    public function addProductIntoList(Iproduct $product): void
    {
        $this->push($product);
    }

    public function getTotal(): float
    {
        $total = 0.00;
        for ($this->rewind(); $this->valid(); $this->next()) {
            $product = $this->current();
            $total = $total + $product->price;
        }
        return $total;
    }
}
