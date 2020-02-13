<?php

namespace Interfaces;

interface IMoneyFormat
{
    public static function format(float $value): string;
}
