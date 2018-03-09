<?php
/*
 * Bundle: Crisp / WebsiteOperators
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

class CrispWebsiteOperators
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function getList($websiteId) {
    $result = $this->crisp->_rest->get("website/$websiteId/operators/list");
    return $result->decode_response()["data"];
  }

  public function getOne($websiteId, $operatorId) {
    $result = $this->crisp->_rest->get("website/$websiteId/operator/$operatorId");
    return $result->decode_response()["data"];
  }

  public function deleteOne($websiteId, $operatorId) {
    $result = $this->crisp->_rest->delete("website/$websiteId/operator/$operatorId");
    return $result->decode_response()["data"];
  }

  public function updateOne($websiteId, $operatorId, $params) {
    $result = $this->crisp->_rest->patch(
      "website/$websiteId/operator/$operatorId",
      $params
    );
    return $result->decode_response()["data"];
  }

  public function createOne($websiteId, $operatorId, $params) {
    $result = $this->crisp->_rest->post(
      "website/$websiteId/operator/$operatorId",
      $params
    );
    return $result->decode_response()["data"];
  }
}

?>
