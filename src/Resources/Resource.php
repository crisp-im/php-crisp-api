<?php

namespace Crisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Message\ResponseInterface;

abstract class Resource
{
    /** @var CrispClient */
    protected $crisp;

    /**
     * @param CrispClient $parent
     */
    public function __construct($parent)
    {
        $this->crisp = $parent;
    }

    protected function prepareQuery($query)
    {
        return (
            is_array($query) && count($query) > 0
        )
            ? "?".http_build_query($query, null, "&", PHP_QUERY_RFC3986)
            : "";
    }

    /**
     * @throws CrispException
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
