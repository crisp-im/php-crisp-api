<?php
/*
 * Bundle: Crisp / UserSession
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

class CrispUserSession
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function loginWithEmail($email, $password) {
    $result = $this->crisp->_rest->post("user/session/login",
      json_encode(array(
        'email' => $email,
        'password' => $password
      ))
    );
    if (isset($result->decode_response()["data"])) {
      $this->crisp->auth = $result->decode_response()["data"];
      $this->crisp->authenticate(
        $this->crisp->auth["identifier"],
        $this->crisp->auth["key"]
      );
      return $result->decode_response()["data"];
    }
    else {
      throw new Exception($result->decode_response()["reason"]);
    }
  }

  public function resetPassword($email) {
    $result = $this->crisp->_rest->post("user/session/reset",
      json_encode(array(
        'email' => $email
    )));
  }

  public function logout() {
    $result = $this->crisp->_rest->post("user/session/logout");
    $this->crisp->auth = array();
    $this->crisp->_rest->set_option('username', NULL);
    $this->crisp->_rest->set_option('passsword', NULL);
  }
}

?>
