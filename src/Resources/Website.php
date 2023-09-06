<?php
/*
 * Bundle: Crisp / Website
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

class Website extends Resource
{
    /**
     * @param array $params
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function create($params)
    {
        $result = $this->crisp->post("website", json_encode($params));
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function delete($websiteId)
    {
        $result = $this->crisp->delete("website/$websiteId");
        return $this->formatResponse($result);
    }
}
