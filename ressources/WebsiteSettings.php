<?php
/*
 * Bundle: Crisp / WebsiteSettings
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2016, Crisp IM
 */

class CrispWebsiteSettings
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function get($websiteId) {
    $result = $this->crisp->_rest->get("website/$websiteId/settings");
    return $result->decode_response()["data"];
  }

  public function update($websiteId, $params) {
    $result = $this->crisp->_rest->execute(
      "website/$websiteId/settings",
      "PATCH",
      $params
    );
    return $result->decode_response()["data"];
  }
}

?>
