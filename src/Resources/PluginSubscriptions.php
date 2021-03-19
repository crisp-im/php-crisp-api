<?php
/*
 * Bundle: Crisp / PluginSubscriptions
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

class PluginSubscriptions extends Resource
{
    public function listAllActiveSubscriptions()
    {
        $result = $this->crisp->_rest->get("/plugins/subscription");
        return $this->formatResponse($result);
    }

    public function listSubscriptionsForWebsite($websiteId)
    {
        $result = $this->crisp->_rest->get("/plugins/subscription/$websiteId");
        return $this->formatResponse($result);
    }

    public function getSubscriptionDetails($websiteId, $pluginId)
    {
        $result = $this->crisp->_rest->get("/plugins/subscription/$websiteId/$pluginId");
        return $this->formatResponse($result);
    }

    public function subscribeWebsiteToPlugin($websiteId, $pluginId)
    {
        $result = $this->crisp->_rest->post(
            "/plugins/subscription/$websiteId",
            json_encode(array("pluginId" => $pluginId))
        );
        return $this->formatResponse($result);
    }

    public function unsubscribePluginFromWebsite($websiteId, $pluginId)
    {
        $result = $this->crisp->_rest->delete(
            "/plugins/subscription/$websiteId/$pluginId"
        );
        return $this->formatResponse($result);
    }

    public function getSubscriptionSettings($websiteId, $pluginId)
    {
        $result = $this->crisp->_rest->get(
            "/plugins/subscription/$websiteId/$pluginId/settings"
        );
        return $this->formatResponse($result);
    }

    public function saveSubscriptionSettings($websiteId, $pluginId, $settings)
    {
        $result = $this->crisp->_rest->patch(
            "/plugins/subscription/$websiteId/$pluginId/settings",
            json_encode($settings)
        );
        return $this->formatResponse($result);
    }
}
