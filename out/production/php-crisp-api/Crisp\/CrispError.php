<?php

namespace Crisp;

class CrispException extends \Exception
{
    protected $response;
    protected $info;

    public function __construct($responseInfo, $responseData)
    {
        $this->response = $responseData;
        $this->info = $responseInfo;

        $data = json_encode([
            'url' => $responseInfo->url,
            'http_code' => $responseInfo->http_code,
            'reason' => $responseData['reason'],
        ], JSON_UNESCAPED_SLASHES);
        $msg = "CRISP API error : $data";

        parent::__construct($msg, $responseInfo->http_code);
    }

    public function __toString()
    {
        return $this->message;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getInfo()
    {
        return $this->info;
    }
}
