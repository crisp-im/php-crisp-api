<?php

namespace Crisp;

class CrispException extends \Exception
{
    protected $response;
    protected $info;

    public function __construct($responseInfo, $responseData)
    {
        $this->info = $responseInfo;

        // Request error?
        if (!isset($responseInfo->http_code)) {
            $this->error = [
                "reason" => "error",
                "message" => "internal_error",
                "code" => 500,
                "data" => [
                    "namespace" => "request",
                    "message" => "Got request error"
                ]
            ];
        }

        // Response error?
        else if ($responseInfo->http_code >= 400) {
            $reasonMessage = isset($responseData["reason"]) ? $responseData["reason"] : "http_error";
            $dataMessage = (isset($responseData["data"]) && isset($responseData["data"]["message"])) ? $responseData["data"]["message"] : NULL;

            $this->error = [
                "reason" => "error",
                "message" => $reasonMessage,
                "code" => $responseInfo->http_code,
                "data" => [
                    "namespace" => "response",
                    "message" => "Got response error: " . ($dataMessage !== NULL ? $dataMessage : $reasonMessage)
                ]
            ];
        }

        parent::__construct(
            json_encode($this->error, JSON_UNESCAPED_SLASHES),
            $responseInfo->http_code
        );
    }

    public function __toString()
    {
        return $this->message;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getInfo()
    {
        return $this->info;
    }
}
