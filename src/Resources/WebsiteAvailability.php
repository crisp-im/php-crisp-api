<?php
/*
 * Bundle: Crisp / WebsiteAvailability
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

class WebsiteAvailability extends Resource
{
    public function getAvailabilityStatus($websiteId)
    {
        $result = $this->crisp->get("website/$websiteId/availability/status");
        return $this->formatResponse($result);
    }

    public function listOperatorAvailabilities($websiteId)
    {
        $result = $this->crisp->get("website/$websiteId/availability/operators");
        return $this->formatResponse($result);
    }
}
