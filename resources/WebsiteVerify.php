<?php
/*
 * Bundle: Crisp / WebsiteVerify
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

class CrispWebsiteVerify
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function getSettings($websiteId) {
    $result = $this->crisp->_rest->get("website/$websiteId/verify/settings");
    return $result->decode_response()["data"];
  }

  public function getKey($websiteId) {
    $result = $this->crisp->_rest->get("website/$websiteId/verify/key");
    return $result->decode_response()["data"];
  }

  public function updateSettings($websiteId, $params) {
    $result = $this->crisp->_rest->patch(
      "website/$websiteId/verify/settings",
      $params
    );
    return $result->decode_response()["data"];
  }

  public function rollKey($websiteId, $params) {
    $result = $this->crisp->_rest->post(
      "website/$websiteId/verify/settings",
      array()
    );
    return $result->decode_response()["data"];
  }
}

?>
