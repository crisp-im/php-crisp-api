<?php
/*
 * Bundle: Crisp / PluginSubscriptions
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

class PluginSubscriptions extends Resource
{
    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listAllActiveSubscriptions()
    {
        $result = $this->crisp->get("/plugins/subscription");
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listSubscriptionsForWebsite($websiteId)
    {
        $result = $this->crisp->get("/plugins/subscription/$websiteId");
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getSubscriptionDetails($websiteId, $pluginId)
    {
        $result = $this->crisp->get("/plugins/subscription/$websiteId/$pluginId");
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function subscribeWebsiteToPlugin($websiteId, $pluginId)
    {
        $result = $this->crisp->post(
            "/plugins/subscription/$websiteId",
            json_encode(array("pluginId" => $pluginId))
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function unsubscribePluginFromWebsite($websiteId, $pluginId)
    {
        $result = $this->crisp->delete(
            "/plugins/subscription/$websiteId/$pluginId"
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getSubscriptionSettings($websiteId, $pluginId)
    {
        $result = $this->crisp->get(
            "/plugins/subscription/$websiteId/$pluginId/settings"
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function saveSubscriptionSettings($websiteId, $pluginId, $settings)
    {
        $result = $this->crisp->patch(
            "/plugins/subscription/$websiteId/$pluginId/settings",
            json_encode($settings)
        );
        return $this->formatResponse($result);
    }
}
