<?php
/*
 * Bundle: Crisp / UserAvailability
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

class CrispUserAvailability
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function get() {
    $result = $this->crisp->_rest->get("user/availability");
    return $result->decode_response()["data"];
  }

  public function update($availability) {
    $result = $this->crisp->_rest->patch(
      "user/availability",
      json_encode($availability)
    );
  }

  public function getStatus() {
    $result = $this->crisp->_rest->get("user/availability/status");
    return $result->decode_response()["data"];
  }
}

?>
