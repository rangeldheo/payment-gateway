<?php

namespace App;

use Interfaces\IAdress;

class Adress implements IAdress
{
    private $country;
    private $region;
    private $city;
    private $district;
    private $street;
    private $number;
    private $complement;
    private $zipCode;
    public function __construct(array $attr)
    {
        $this->country = (string) $attr['country'];
        $this->region = (string) $attr['region'];
        $this->city = (string) $attr['city'];
        $this->district = (string) $attr['district'];
        $this->street = (string) $attr['street'];
        $this->number = (string) $attr['number'];
        $this->complement = (string) $attr['complement'];
        $this->zipCode = (string) $attr['zipCode'];
    }
    public function getAdress()
    {
        return $this;
    }
    public function __get($name)
    {
        return $this->$name;
    }
}
