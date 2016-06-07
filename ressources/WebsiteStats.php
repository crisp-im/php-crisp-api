<?php
/*
 * Bundle: Crisp / WebsiteStats
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2016, Crisp IM
 */

class CrispWebsiteStats
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function get($websiteId) {
    $result = $this->crisp->_rest->get("website/$websiteId/stats");
    return $result->decode_response()["data"];
  }
}

?>
