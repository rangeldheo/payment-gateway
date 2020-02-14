<?php

namespace App;

use Interfaces\IClient;
use Interfaces\IGateway;
use Interfaces\IPaymentMethod;
use Interfaces\ISale;

class Transaction
{
    private $sale;
    private $client;
    private $gateway;
    private $paymentMethod;
    public function commit(ISale $sale, IClient $client, IGateway $gateway, IPaymentMethod $paymentMethod)
    {
        $this->sale = $sale;
        $this->client = $client;
        $this->gateway = $gateway;
        $this->paymentMethod = $paymentMethod;
        return $this->gateway->paymentProcessing();
    }
    public function __get($name)
    {
        return $this->$name;
    }
}
