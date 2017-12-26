<?php
/*
 * Bundle: Crisp / UserWebsites
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

class CrispUserWebsites
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function get() {
    $result = $this->crisp->_rest->get("user/account/websites");
    return $result->decode_response()["data"];
  }
}

?>
