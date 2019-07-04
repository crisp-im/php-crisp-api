<?php
/*
 * Bundle: Crisp
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

require __DIR__ . '/resources/UserProfile.php';
require __DIR__ . '/resources/Website.php';
require __DIR__ . '/resources/WebsiteSettings.php';
require __DIR__ . '/resources/WebsiteVerify.php';
require __DIR__ . '/resources/WebsiteOperators.php';
require __DIR__ . '/resources/WebsiteVisitors.php';
require __DIR__ . '/resources/WebsiteConversations.php';
require __DIR__ . '/resources/WebsitePeople.php';
require __DIR__ . '/resources/PluginSubscriptions.php';

class Crisp
{
  //Rest default configuration
  public $DEFAULT_REST_HOST = "https://api.crisp.chat";
  public $DEFAULT_REST_BASE_PATH = "/v1/";

  public function __construct() {
    $this->auth = array();
    $this->_rest = new RestClient(array(
      "base_url"   => $this->DEFAULT_REST_HOST . $this->DEFAULT_REST_BASE_PATH,
      "headers"      => ["Content-Type" => "application/json"],
      "content_type" => "application/json"
    ));
    $this->_rest->register_decoder("json", function($data) {
      return json_decode($data, TRUE);
    });

    $this->userProfile          = new CrispUserProfile($this);
    $this->website              = new CrispWebsite($this);
    $this->websiteSettings      = new CrispWebsiteSettings($this);
    $this->websiteVerify        = new CrispWebsiteVerify($this);
    $this->websiteConversations = new CrispWebsiteConversations($this);
    $this->websitePeople        = new CrispWebsitePeople($this);
    $this->websiteOperators     = new CrispWebsiteOperators($this);
    $this->websiteVisitors      = new CrispWebsiteVisitors($this);
    $this->pluginSubscriptions  = new CrispPluginSubscriptions($this);
  }

  public function setRestHost($host) {
   $this->_rest->set_option('base_url', $host);
  }

  public function authenticate($identifier, $key) {
    $this->_rest->set_option('username', $identifier);
    $this->_rest->set_option('password', $key);
  }

  public function setTier($tier) {
    $headers = $this->_rest->options["headers"];
    $headers["X-Crisp-Tier"] = $tier;
    $this->_rest->set_option('headers', $headers);
  }
}

?>
