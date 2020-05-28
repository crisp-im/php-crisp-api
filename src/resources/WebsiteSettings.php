<?php
/*
 * Bundle: Crisp / WebsiteSettings
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

class WebsiteSettings extends Resource
{
    public function get($websiteId)
    {
        $result = $this->crisp->_rest->get("website/$websiteId/settings");
        return $this->formatResponse($result);
    }

    public function update($websiteId, $params)
    {
        $result = $this->crisp->_rest->patch(
            "website/$websiteId/settings",
            $params
        );
        return $this->formatResponse($result);
    }
}
