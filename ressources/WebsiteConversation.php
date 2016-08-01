<?php
/*
 * Bundle: Crisp / WebsiteConversation
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2016, Crisp IM
 */

class CrispWebsiteConversation
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function createNewConversation($websiteId) {
    $result = $this->crisp->_rest->post(
      "website/$websiteId/conversation"
    );
    return $result->decode_response()["data"];
  }

  public function checkConversationExists($websiteId, $sessionId) {
    $result = $this->crisp->_rest->execute(
      "HEAD",
      "website/$websiteId/conversation/$sessionId"
    );
    return $result->decode_response()["data"];
  }

  public function getConversation($websiteId, $sessionId) {
    $result = $this->crisp->_rest->get(
      "website/$websiteId/conversation/$sessionId"
    );
    return $result->decode_response()["data"];
  }

  public function removeConversation($websiteId, $sessionId) {
    $result = $this->crisp->_rest->delete(
      "website/$websiteId/conversation/$sessionId"
    );
    return $result->decode_response()["data"];
  }

  public function initiateConversationWithExistingSession(
    $websiteId, $sessionId) {

    $result = $this->crisp->_rest->post(
      "website/$websiteId/conversation/$sessionId/initiate"
    );
    return $result->decode_response()["data"];
  }

  public function getMessagesInConversation(
    $websiteId, $sessionId) {

    $result = $this->crisp->_rest->get(
      "website/$websiteId/conversation/$sessionId/messages"
    );
    return $result->decode_response()["data"];
  }

  public function sendMessageInConversation(
    $websiteId, $sessionId, $message) {

    $result = $this->crisp->_rest->post(
      "website/$websiteId/conversation/$sessionId/message",
      $message
    );
    return $result->decode_response()["data"];
  }

  public function composeMessageInConversation(
    $websiteId, $sessionId, $compose) {

    $result = $this->crisp->_rest->execute(
      "PATCH",
      "website/$websiteId/conversation/$sessionId/compose",
      json_encode($compose)
    );
    return $result->decode_response()["data"];
  }

  public function markMessagesReadInConversation(
    $websiteId, $sessionId, $read) {

    $result = $this->crisp->_rest->execute(
      "PATCH",
      "website/$websiteId/conversation/$sessionId/read",
      json_encode($read)
    );
    return $result->decode_response()["data"];
  }

  public function getConversationMetas(
    $websiteId, $sessionId) {

    $result = $this->crisp->_rest->get(
      "website/$websiteId/conversation/$sessionId/meta"
    );
    return $result->decode_response()["data"];
  }

  public function updateConversationMetas(
    $websiteId, $sessionId, $metas) {

    $result = $this->crisp->_rest->execute(
      "PATCH",
      "website/$websiteId/conversation/$sessionId/meta",
      json_encode($metas)
    );
    return $result->decode_response()["data"];
  }

  public function getConversationState(
    $websiteId, $sessionId) {

    $result = $this->crisp->_rest->get(
      "website/$websiteId/conversation/$sessionId/state"
    );
    return $result->decode_response()["data"];
  }

  public function changeConversationState(
    $websiteId, $sessionId, $state) {

    $result = $this->crisp->_rest->execute(
      "PATCH",
      "website/$websiteId/conversation/$sessionId/state",
      json_encode(array("state" => $state))
    );
    return $result->decode_response()["data"];
  }

  public function getBlockStatusForConversation(
    $websiteId, $sessionId, $metas) {

    $result = $this->crisp->_rest->get(
      "website/$websiteId/conversation/$sessionId/block"
    );
    return $result->decode_response()["data"];
  }

  public function blockIncomingMessagesForConversation(
    $websiteId, $sessionId, $blocked = true) {

    $result = $this->crisp->_rest->execute(
      "PATCH",
      "website/$websiteId/conversation/$sessionId/block",
      json_encode($blocked)
    );
    return $result->decode_response()["data"];
  }
}

?>
