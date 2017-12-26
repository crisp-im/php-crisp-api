<?php
/*
 * Bundle: Crisp / UserNotification
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

class CrispUserNotification
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function get() {
    $result = $this->crisp->_rest->get("user/account/notification");
    return $result->decode_response()["data"];
  }

  public function update($params) {
    $result = $this->crisp->_rest->patch(
      "user/account/account",
      json_encode($params)
    );
  }
}

?>
