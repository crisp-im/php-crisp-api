<?php
/*
 * Bundle: Crisp / WebsiteOperators
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

class WebsiteOperators extends Resource
{
    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getList($websiteId)
    {
        $result = $this->crisp->get("website/$websiteId/operators/list");
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getOne($websiteId, $operatorId)
    {
        $result = $this->crisp->get("website/$websiteId/operator/$operatorId");
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function deleteOne($websiteId, $operatorId)
    {
        $result = $this->crisp->delete("website/$websiteId/operator/$operatorId");
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function updateOne($websiteId, $operatorId, $params)
    {
        $result = $this->crisp->patch(
            "website/$websiteId/operator/$operatorId",
            $params
        );
        return $this->formatResponse($result);
    }
}
