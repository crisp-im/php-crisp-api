<?php
/*
 * Bundle: Crisp / PluginSubscription
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

class CrispPluginSubscriptions
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function listAllActiveSubscriptions() {
    $result = $this->crisp->_rest->get("/plugins/subscription");
    return $result->decode_response()["data"];
  }

  public function listSubscriptionsForWebsite($websiteId) {
    $result = $this->crisp->_rest->get("/plugins/subscription/$websiteId");
    return $result->decode_response()["data"];
  }

  public function getSubscriptionDetails($websiteId, $pluginId) {
    $result = $this->crisp->_rest->get("/plugins/subscription/$websiteId/$pluginId");
    return $result->decode_response()["data"];
  }

  public function subscribeWebsiteToPlugin($websiteId, $pluginId) {
    $result = $this->crisp->_rest->post(
      "/plugins/subscription/$websiteId",
      json_encode(array("pluginId" => $pluginId))
    );
    return $result->decode_response()["data"];
  }

  public function unsubscribePluginFromWebsite($websiteId, $pluginId) {
    $result = $this->crisp->_rest->delete(
      "/plugins/subscription/$websiteId/$pluginId"
    );
    return $result->decode_response()["data"];
  }

  public function getSubscriptionSettings($websiteId, $pluginId) {
    $result = $this->crisp->_rest->get(
      "/plugins/subscription/$websiteId/$pluginId/settings"
    );
    return $result->decode_response()["data"];
  }

  public function saveSubscriptionSettings($websiteId, $pluginId, $settings) {
    $result = $this->crisp->_rest->patch(
      "/plugins/subscription/$websiteId/$pluginId/settings",
      json_encode($settings)
    );
    return $result->decode_response()["data"];
  }
}

?>
