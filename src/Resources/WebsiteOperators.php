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
     * @param string $websiteId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getList($websiteId)
    {
        $result = $this->crisp->get("website/$websiteId/operators/list");
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $operatorId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getOne($websiteId, $operatorId)
    {
        $result = $this->crisp->get("website/$websiteId/operator/$operatorId");
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $operatorId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function deleteOne($websiteId, $operatorId)
    {
        $result = $this->crisp->delete("website/$websiteId/operator/$operatorId");
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $operatorId
     * @param array $params
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
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
