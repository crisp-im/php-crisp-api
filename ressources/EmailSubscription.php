<?php
/*
 * Bundle: Crisp / EmailSubscription
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2016, Crisp IM
 */

class CrispEmailSubscription
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function get($emailHash, $key) {
    $result = $this->crisp->_rest->get("/email/$email_hash/subscription/$key");
    return $result->decode_response()["data"];
  }

  public function update($emailHash, $key, $subscription) {
    $result = $this->crisp->_rest->execute(
      "PATCH",
      "/email/$email_hash/subscription/$key",
      json_encode($subscription)
    );
  }
}

?>
