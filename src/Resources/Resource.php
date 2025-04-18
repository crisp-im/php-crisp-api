<?php

namespace Crisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Message\ResponseInterface;

abstract class Resource
{
    /** @var CrispClient */
    protected $crisp;

    public function __construct($parent)
    {
        $this->crisp = $parent;
    }

    /**
     * @param array $query
     * @return string
     */
    protected function prepareQuery($query)
    {
        return (
            is_array($query) && count($query) > 0
        )
            ? "?" . http_build_query($query, "", "&", PHP_QUERY_RFC3986)
            : "";
    }

    /**
     * @throws CrispException
     * @return array
     */
    protected function formatResponse(ResponseInterface $response)
    {
        $responseData = json_decode($response->getBody(), true);

        if ($response->getStatusCode() >= 400) {
            throw new CrispException($response->getStatusCode(), $responseData);
        }
        return $responseData["data"];
    }
}
