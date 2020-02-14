<?php

namespace Tools;

use Tools\ICard;

abstract class AbstractCard implements ICard
{
    public static $number;
    public static $securityNumber;
    public static $expirationDate;
    public abstract static function configCard(bool $statusAuthorization = false);
    public static function getNumber()
    {
        return self::$number;
    }
    public static function getSecutiryNumber()
    {
        return self::$securityNumber;
    }
    public static function getExpirationDate()
    {
        return self::$expirationDate;
    }
}
