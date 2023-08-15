<?php

namespace Crisp;

class CrispException extends \Exception
{
    protected $response;
    protected $error;

    /**
     * @param int $statusCode
     * @param array $responseData
     */
    public function __construct($statusCode, $responseData)
    {
        // Request error?
        if (!isset($statusCode)) {
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
        else if ($statusCode >= 400) {
            $reasonMessage = isset($responseData["reason"]) ? $responseData["reason"] : "http_error";
            $dataMessage = (isset($responseData["data"]) && isset($responseData["data"]["message"])) ? $responseData["data"]["message"] : NULL;

            $this->error = [
                "reason" => "error",
                "message" => $reasonMessage,
                "code" => $statusCode,
                "data" => [
                    "namespace" => "response",
                    "message" => "Got response error: " . ($dataMessage !== NULL ? $dataMessage : $reasonMessage)
                ]
            ];
        }

        parent::__construct(
            json_encode($this->error, JSON_UNESCAPED_SLASHES),
            $statusCode
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
}
