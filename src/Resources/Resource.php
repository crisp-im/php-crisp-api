<?php

namespace Crisp\Resources;

use Crisp\CrispException;

abstract class Resource
{
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

    protected function formatResponse($response)
    {
        $responseData = $response->decode_response();

        if (!isset($response->info->http_code) || $response->info->http_code >= 400) {
            throw new CrispException($response->info, $responseData);
        }
        return $responseData["data"];
    }
}
