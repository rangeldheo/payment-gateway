<?php

namespace Interfaces;

interface IGateway
{
    public function __construct(IEnviroment $enviroment);
    public function paymentProcessing();
}
