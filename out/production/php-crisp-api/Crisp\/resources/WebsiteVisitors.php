<?php
/*
 * Bundle: Crisp / WebsiteVisitors
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

class WebsiteVisitors extends Resource
{
    public function listVisitors($websiteId, $page = 1)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/visitors/list/$page"
        );
        return $this->formatResponse($result);
    }
}
