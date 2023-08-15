<?php
/*
 * Bundle: Crisp / WebsiteSettings
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

class WebsiteSettings extends Resource
{
    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function get($websiteId)
    {
        $result = $this->crisp->get("website/$websiteId/settings");
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function update($websiteId, $params)
    {
        $result = $this->crisp->patch(
            "website/$websiteId/settings",
            $params
        );
        return $this->formatResponse($result);
    }
}
