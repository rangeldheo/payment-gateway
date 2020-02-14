<?php

namespace App;

use Interfaces\IAdress;
use Interfaces\IClient;
use stdClass;

class Client implements IClient
{
    private $id;
    private $name;
    private $age;
    private $cpf;
    private $adress;

    public function __construct(array $attributes, IAdress $adress = null)
    {
        $this->id   = (int) $attributes['id'];
        $this->name = (string) $attributes['name'];
        $this->age  = (int) $attributes['age'];
        $this->cpf  = (string) $attributes['cpf'];
        $this->adress = $adress;
    }
    public function getPayerData()
    {
        $payerData = new stdClass();
        $payerData->name = $this->name;
        $payerData->cpf = $this->cpf;
    }
    public function getPayerAdress()
    {
        return $this->adress;
    }
    public function __get($name)
    {
        return $this->$name;
    }
}
