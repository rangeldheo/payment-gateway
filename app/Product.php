<?php

namespace App;

use Interfaces\Iproduct;

class Product implements Iproduct
{

    private $id;
    private $name;
    private $desc;
    private $price;

    public function __construct(array  $attr)
    {
        $this->id     = (int)     $attr['id'];
        $this->name   = (string)  $attr['name'];
        $this->desc   = (string)  $attr['desc'];
        $this->price  = (float)   $attr['price'];
    }

    public function show(int $id): Iproduct
    {       
        return $this;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
