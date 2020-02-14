<?php

namespace App;

class Request
{
    private $endPoint;
    private $method;
    private $data;
    private $header;
    private $result;

    public function __construct($header, $method, $data, $endPoint)
    {
        $this->endPoint = (string) $endPoint;
        $this->method =  (string) $method;
        $this->data =  $data;
        $this->header = $header;
        $this->execCURL();
    }

    private function execCURL()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_URL => $this->endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->method,
            CURLOPT_POSTFIELDS => $this->data,
            CURLOPT_HTTPHEADER => $this->header,
        ]);

        $this->result = json_decode(curl_exec($curl));
        curl_close($curl);
    }
    public function getResult()
    {
        return $this->result;
    }
}
