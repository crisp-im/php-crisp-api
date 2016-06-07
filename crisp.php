<?php
/*
 * Bundle: Crisp
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2016, Crisp IM
 */

use ElephantIO\Client as ElephantIO;
use ElephantIO\Engine\SocketIO\Version1X as Engine1X;


require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/ressources/UserSession.php';
require __DIR__ . '/ressources/UserAccount.php';
require __DIR__ . '/ressources/UserNotification.php';
require __DIR__ . '/ressources/UserSchedule.php';
require __DIR__ . '/ressources/UserProfile.php';
require __DIR__ . '/ressources/UserWebsites.php';
require __DIR__ . '/ressources/Website.php';
require __DIR__ . '/ressources/WebsiteStats.php';
require __DIR__ . '/ressources/WebsiteSettings.php';
require __DIR__ . '/ressources/WebsiteOperators.php';
require __DIR__ . '/ressources/WebsiteConversations.php';

class Crisp
{
  //Rest default configuration
  public $DEFAULT_REST_HOST = "https://api.crisp.im";
  public $DEFAULT_REST_BASE_PATH = "/v1/";

  //Realtime default configuration
  public $DEFAULT_REALTIME_HOST = "https://relay-app.crisp.im";

  public function __construct() {
    $this->auth = array();
    $this->_rest = new RestClient(array(
      "base_url" => $this->DEFAULT_REST_HOST . $this->DEFAULT_REST_BASE_PATH,
      "headers" => ["Content-Type" => "application/json"],
      "content_type" => "application/json"
    ));
    $this->_rest->register_decoder("json", function($data) {
      return json_decode($data, TRUE);
    });
    $this->_realtime = array(
      "" => $this->DEFAULT_REALTIME_HOST
    );
    $this->_socket = NULL;
    $this->_bindedEvents = array();

    $this->userSession          = new CrispUserSession($this);
    $this->userAccount          = new CrispUserAccount($this);
    $this->userNotification     = new CrispUserNotification($this);
    $this->userSchedule         = new CrispUserSchedule($this);
    $this->userProfile          = new CrispUserProfile($this);
    $this->userWebsites         = new CrispUserWebsites($this);
    $this->website              = new CrispWebsite($this);
    $this->websiteSettings      = new CrispWebsiteSettings($this);
    $this->websiteStats         = new CrispWebsiteStats($this);
    $this->websiteConversations = new CrispWebsiteConversations($this);
    $this->websiteOperators     = new CrispWebsiteOperators($this);
  }

  public function setRestHost($host) {
   $this->_rest->set_option('base_url', $host);
  }

  public function _prepareSocket() {
    $REALTIME_URL = $this->DEFAULT_REALTIME_HOST;
    $this->_socket = new ElephantIO(new Engine1X($REALTIME_URL));
    $this->_socket->initialize();
    $this->_authenticate();
  }

  public function _authenticate() {
    $auth = $this->auth;
    $this->_socket->emit("authentication", array(
      "username" => $auth["identifier"],
      "password" => $auth["key"],
    ));
  }

  public function _assertSocket() {
    if ($this->_socket == null)
      throw new Exception("User not logged");
  }
}

?>
