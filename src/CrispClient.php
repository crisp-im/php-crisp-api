<?php
/*
 * Bundle: Crisp
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp;

use Crisp\Resources\Buckets;
use Crisp\Resources\PluginSubscriptions;
use Crisp\Resources\UserProfile;
use Crisp\Resources\Website;
use Crisp\Resources\WebsiteConversations;
use Crisp\Resources\WebsiteOperators;
use Crisp\Resources\WebsitePeople;
use Crisp\Resources\WebsiteSettings;
use Crisp\Resources\WebsiteVerify;
use Crisp\Resources\WebsiteVisitors;

class CrispClient
{
  //Rest default configuration
    public $DEFAULT_REST_HOST = "https://api.crisp.chat";
    public $DEFAULT_REST_BASE_PATH = "/v1/";

    public function __construct()
    {
        $this->auth = array();
        $this->_rest = new \RestClient(array(
        "base_url"   => $this->DEFAULT_REST_HOST . $this->DEFAULT_REST_BASE_PATH,
        "headers"      => ["Content-Type" => "application/json"],
        "content_type" => "application/json"
        ));
        $this->_rest->register_decoder("json", function ($data) {
            return json_decode($data, true);
        });

        $this->buckets              = new Buckets($this);
        $this->userProfile          = new UserProfile($this);
        $this->website              = new Website($this);
        $this->websiteSettings      = new WebsiteSettings($this);
        $this->websiteVerify        = new WebsiteVerify($this);
        $this->websiteConversations = new WebsiteConversations($this);
        $this->websitePeople        = new WebsitePeople($this);
        $this->websiteOperators     = new WebsiteOperators($this);
        $this->websiteVisitors      = new WebsiteVisitors($this);
        $this->pluginSubscriptions  = new PluginSubscriptions($this);
    }

    public function setRestHost($host)
    {
        $this->_rest->set_option('base_url', $host);
    }

    public function authenticate($identifier, $key)
    {
        $this->_rest->set_option('username', $identifier);
        $this->_rest->set_option('password', $key);
    }

    public function setTier($tier)
    {
        $headers = $this->_rest->options["headers"];
        $headers["X-Crisp-Tier"] = $tier;
        $this->_rest->set_option('headers', $headers);
    }
}
