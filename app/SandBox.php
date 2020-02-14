<?php

namespace App;

use Interfaces\IEnviroment;

class SandBox implements IEnviroment
{
    /**
     * Criar transacoes
     *
     * @var [type]
     */
    private $apiRequest;
    /**
     * Consutlar transacoes
     *
     * @var [type]
     */
    private $apiQuery;

    private $merchantId;

    private $merchantKey;

    public function toSetup()
    {
        $this->apiRequest  = 'https://apisandbox.cieloecommerce.cielo.com.br/';
        $this->apiQuery    = 'https://apiquerysandbox.cieloecommerce.cielo.com.br';
        $this->merchantId  = '9d761a6b-dca2-40c3-9350-57669091a70d';
        $this->merchantKey = 'FCJPDFGBPYKCWXVDGHGQHGSVDVFVZNISQNPGEXDI';
    }
    public function __get($name)
    {
        return $this->$name;
    }
}
