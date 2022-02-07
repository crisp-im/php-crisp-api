<?php
/*
 * Bundle: Crisp / WebsiteVerify
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

class WebsiteVerify extends Resource
{
    public function getSettings($websiteId)
    {
        $result = $this->crisp->_rest->get("website/$websiteId/verify/settings");
        return $this->formatResponse($result);
    }

    public function getKey($websiteId)
    {
        $result = $this->crisp->_rest->get("website/$websiteId/verify/key");
        return $this->formatResponse($result);
    }

    public function updateSettings($websiteId, $params)
    {
        $result = $this->crisp->_rest->patch(
            "website/$websiteId/verify/settings",
            $params
        );
        return $this->formatResponse($result);
    }

    public function rollKey($websiteId)
    {
        $result = $this->crisp->_rest->post(
            "website/$websiteId/verify/settings",
            array()
        );
        return $this->formatResponse($result);
    }
}
