<?php
/*
 * Bundle: Crisp / UserAccount
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

class CrispUserAccount
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function get() {
    $result = $this->crisp->_rest->get("user/account");
    return $result->decode_response()["data"];
  }

  public function create($email, $password) {
    $result = $this->crisp->_rest->post("user/account",
      json_encode(array(
        "email" => $email,
        "password" => $password
    )));
  }
}

?>
