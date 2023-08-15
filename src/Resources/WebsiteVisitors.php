<?php
/*
 * Bundle: Crisp / WebsiteVisitors
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

class WebsiteVisitors extends Resource
{
    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listVisitors($websiteId, $pageNumber = 1)
    {
        $result = $this->crisp->get(
            "website/$websiteId/visitors/list/$pageNumber"
        );
        return $this->formatResponse($result);
    }
}
