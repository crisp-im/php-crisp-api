<?php
/*
 * Bundle: Crisp / WebsiteVerify
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

class WebsiteVerify extends Resource
{
    /**
     * @param string $websiteId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getSettings($websiteId)
    {
        $result = $this->crisp->get("website/$websiteId/verify/settings");
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getKey($websiteId)
    {
        $result = $this->crisp->get("website/$websiteId/verify/key");
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $params
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function updateSettings($websiteId, $params)
    {
        $result = $this->crisp->patch(
            "website/$websiteId/verify/settings",
            $params
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function rollKey($websiteId)
    {
        $result = $this->crisp->post(
            "website/$websiteId/verify/settings",
            json_encode([])
        );
        return $this->formatResponse($result);
    }
}
