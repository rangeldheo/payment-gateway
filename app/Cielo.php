<?php

namespace App;

use Interfaces\IEnviroment;
use Interfaces\IGateway;

class Cielo implements IGateway
{
    private $enviroment;

    public function __construct(IEnviroment $enviroment)
    {
        $this->enviroment = $enviroment;
        $this->enviroment->toSetup();
    }
    public function paymentProcessing()
    {
    }
}
