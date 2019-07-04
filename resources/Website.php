<?php
/*
 * Bundle: Crisp / Website
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

class CrispWebsite
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function create($params) {
    $result = $this->crisp->_rest->post("website", json_encode($params));
    return $result->decode_response()["data"];
  }

  public function delete($websiteId) {
    $result = $this->crisp->_rest->delete("website/$websiteId");
    return $result->decode_response()["data"];
  }
}

?>
