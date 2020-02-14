<?php

namespace App;

use Interfaces\IEnviroment;
use Interfaces\IGateway;

class Cielo implements IGateway
{
    private $enviroment;
    private $header;
    private $method;

    public function __construct(IEnviroment $enviroment)
    {
        $this->enviroment = $enviroment;
        $this->enviroment->toSetup();
        $this->header = [
            'Content-Type: application/json',
            "MerchantId: {$this->enviroment->merchantId}",
            "MerchantKey: {$this->enviroment->merchantKey}" 
        ];
    }
    public function paymentProcessing()
    {
        $objRequest = new Request($this->header,$this->method,$this->data,$this->endpoint);
        return $objRequest->getResult();
    }

}
