<?php

namespace App;

use Interfaces\ISale;
use App\ProductCollection;

class Sale  implements ISale
{
    private  $items;

    public function __construct(ProductCollection $productCollection)
    {
        $this->items = $productCollection;
    }

    public function calculateTotal(): float
    {
        $total = 0.00;

        for ($this->items->rewind(); $this->items->valid(); $this->items->next()) {
            $product =  $this->items->current();
            $total = $total + $product->price;
        }

        return $total;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
