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
        $result = $this->crisp->get("website/$websiteId/verify/settings");
        return $this->formatResponse($result);
    }

    public function getKey($websiteId)
    {
        $result = $this->crisp->get("website/$websiteId/verify/key");
        return $this->formatResponse($result);
    }

    public function updateSettings($websiteId, $params)
    {
        $result = $this->crisp->patch(
            "website/$websiteId/verify/settings",
            $params
        );
        return $this->formatResponse($result);
    }

    public function rollKey($websiteId)
    {
        $result = $this->crisp->post(
            "website/$websiteId/verify/settings",
            json_encode([])
        );
        return $this->formatResponse($result);
    }
}
