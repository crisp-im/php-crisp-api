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
    public function get($websiteId)
    {
        $result = $this->crisp->_rest->get("website/$websiteId/availability/status");
        return $this->formatResponse($result);
    }
}
