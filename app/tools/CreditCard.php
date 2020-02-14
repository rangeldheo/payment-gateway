<?php

namespace Tools;

use Interfaces\IClient;
use Interfaces\IPaymentMethod;
use Tools\AbstractCard;

class CreditCard extends AbstractCard implements IPaymentMethod
{
    private $holder;

    public function __construct(IClient $client)
    {
        $this->holder = $client;
        self::configCard(CARD_AUTORIZED);
    }

    public static function configCard(bool $autorizationStatus = false)
    {
        if ($autorizationStatus) {
            self::$number = '0000.0000.0000.0001';
        } else {
            self::$number = '0000.0000.0000.0002';
        }

        self::$securityNumber = '123';
        self::$expirationDate = '10/2020';
    }

    public function pay()
    {
        return CARD_CREDIT;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
