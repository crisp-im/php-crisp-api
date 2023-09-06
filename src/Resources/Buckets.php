<?php
/*
 * Bundle: Crisp / Buckets
 * Project: Crisp - PHP API
 * Author: Eliott Vincent https://eliottvincent.com/
 * Copyright: 2021, Crisp IM
 */

namespace Crisp\Resources;

use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

class Buckets extends Resource
{
    /**
     * @param array $data
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function generate($data)
    {
        $result = $this->crisp->post(
            "bucket/url/generate",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }
}
