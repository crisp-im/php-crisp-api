<?php
/*
 * Bundle: Crisp / WebsiteVisitors
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2016, Crisp IM
 */

class CrispWebsiteVisitors
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

   public function listVisitors($websiteId, $page = 0) {
    $result = $this->crisp->_rest->get(
      "website/$websiteId/visitors/$page"
    );
    return $result->decode_response()["data"];
  }
}

?>
