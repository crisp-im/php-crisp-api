<?php
/*
 * Bundle: Crisp / WebsiteAvailability
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

class WebsiteAvailability extends Resource
{
    /**
     * @param string $websiteId
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getAvailabilityStatus($websiteId)
    {
        $result = $this->crisp->get("website/$websiteId/availability/status");
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listOperatorAvailabilities($websiteId)
    {
        $result = $this->crisp->get("website/$websiteId/availability/operators");
        return $this->formatResponse($result);
    }
}
