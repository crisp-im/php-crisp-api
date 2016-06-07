<?php
/*
 * Bundle: Crisp / UserSchedule
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2016, Crisp IM
 */

class CrispUserSchedule
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function get() {
    $result = $this->crisp->_rest->get("user/account/schedule");
    return $result->decode_response()["data"];
  }

  public function update($params) {
    $result = $this->crisp->_rest->execute("user/account/schedule", "PATCH",
      json_encode($params)
    );
  }
}

?>
