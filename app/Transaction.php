<?php

namespace App;

use Interfaces\IClient;
use Interfaces\IGateway;
use Interfaces\IPaymentMethod;
use Interfaces\ISale;

class Transaction
{
    public function commit(ISale $sale, IClient $client, IGateway $gateway, IPaymentMethod $paymentMethod)
    {

    }
}
