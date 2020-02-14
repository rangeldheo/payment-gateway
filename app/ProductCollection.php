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
}
