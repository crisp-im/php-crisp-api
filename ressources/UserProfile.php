<?php
/*
 * Bundle: Crisp / UserProfile
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

class CrispUserProfile
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function get() {
    $result = $this->crisp->_rest->get("user/account/profile");
    return $result->decode_response()["data"];
  }

  public function update($params) {
    $result = $this->crisp->_rest->patch(
      "user/account/profile",
      json_encode($params)
    );
  }
}

?>
