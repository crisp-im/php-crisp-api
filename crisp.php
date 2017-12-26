<?php
/*
 * Bundle: Crisp
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

require __DIR__ . '/ressources/UserSession.php';
require __DIR__ . '/ressources/UserAccount.php';
require __DIR__ . '/ressources/UserAvailability.php';
require __DIR__ . '/ressources/UserNotification.php';
require __DIR__ . '/ressources/UserProfile.php';
require __DIR__ . '/ressources/UserWebsites.php';
require __DIR__ . '/ressources/Website.php';
require __DIR__ . '/ressources/WebsiteSettings.php';
require __DIR__ . '/ressources/WebsiteVerify.php';
require __DIR__ . '/ressources/WebsiteOperators.php';
require __DIR__ . '/ressources/WebsiteConversations.php';
require __DIR__ . '/ressources/WebsitePeople.php';
require __DIR__ . '/ressources/PluginSubscriptions.php';

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

    $this->userSession          = new CrispUserSession($this);
    $this->userAvailability     = new CrispUserAvailability($this);
    $this->userAccount          = new CrispUserAccount($this);
    $this->userNotification     = new CrispUserNotification($this);
    $this->userProfile          = new CrispUserProfile($this);
    $this->userWebsites         = new CrispUserWebsites($this);
    $this->website              = new CrispWebsite($this);
    $this->websiteSettings      = new CrispWebsiteSettings($this);
    $this->websiteVerify        = new CrispWebsiteVerify($this);
    $this->websiteConversations = new CrispWebsiteConversations($this);
    $this->websitePeople        = new CrispWebsitePeople($this);
    $this->websiteOperators     = new CrispWebsiteOperators($this);
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
