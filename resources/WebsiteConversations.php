<?php
/*
 * Bundle: Crisp / WebsiteConversations
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

class CrispWebsiteConversations
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

   public function getList($websiteId, $page = 1) {
    $result = $this->crisp->_rest->get(
      "website/$websiteId/conversations/$page"
    );
    return $result->decode_response()["data"];
  }

  public function create($websiteId) {
    $result = $this->crisp->_rest->post(
      "website/$websiteId/conversation"
    );
    return $result->decode_response()["data"];
  }

  public function getOne($websiteId, $sessionId) {
    $result = $this->crisp->_rest->get(
      "website/$websiteId/conversation/$sessionId"
    );
    return $result->decode_response()["data"];
  }

  public function deleteOne($websiteId, $sessionId) {
    $result = $this->crisp->_rest->delete(
      "website/$websiteId/conversation/$sessionId"
    );
    return $result->decode_response()["data"];
  }

  public function initiateOne(
    $websiteId, $sessionId) {

    $result = $this->crisp->_rest->post(
      "website/$websiteId/conversation/$sessionId/initiate"
    );
    return $result->decode_response()["data"];
  }

  public function getMessages(
    $websiteId, $sessionId) {

    $result = $this->crisp->_rest->get(
      "website/$websiteId/conversation/$sessionId/messages"
    );
    return $result->decode_response()["data"];
  }

  public function sendMessage(
    $websiteId, $sessionId, $message) {

    $result = $this->crisp->_rest->post(
      "website/$websiteId/conversation/$sessionId/message",
      json_encode($message)
    );
    return $result->decode_response()["data"];
  }

  public function acknowledgeMessages(
    $websiteId, $sessionId, $read) {

    $result = $this->crisp->_rest->patch(
      "website/$websiteId/conversation/$sessionId/read",
      json_encode($read)
    );
    return $result->decode_response()["data"];
  }

  public function getMeta(
    $websiteId, $sessionId) {

    $result = $this->crisp->_rest->get(
      "website/$websiteId/conversation/$sessionId/meta"
    );
    return $result->decode_response()["data"];
  }

  public function updateMeta(
    $websiteId, $sessionId, $metas) {

    $result = $this->crisp->_rest->patch(
      "website/$websiteId/conversation/$sessionId/meta",
      json_encode($metas)
    );
    return $result->decode_response()["data"];
  }

  public function setState(
    $websiteId, $sessionId, $state) {

    $result = $this->crisp->_rest->patch(
      "website/$websiteId/conversation/$sessionId/state",
      json_encode(array("state" => $state))
    );
    return $result->decode_response()["data"];
  }

  public function setBlock(
    $websiteId, $sessionId, $blocked = true) {

    $result = $this->crisp->_rest->patch(
      "website/$websiteId/conversation/$sessionId/block",
      json_encode($blocked)
    );
    return $result->decode_response()["data"];
  }
}

?>
