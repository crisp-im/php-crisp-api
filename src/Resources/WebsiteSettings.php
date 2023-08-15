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
     * @param string $websiteId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function get($websiteId)
    {
        $result = $this->crisp->get("website/$websiteId/settings");
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $params
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
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
