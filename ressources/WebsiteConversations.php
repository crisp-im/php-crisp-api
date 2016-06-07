<?php
/*
 * Bundle: Crisp / WebsiteConversations
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2016, Crisp IM
 */

class CrispWebsiteConversations
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function getList($websiteId, $page = 0) {
    $result = $this->crisp->_rest->get("website/$websiteId/conversations"/$page);
    return $result->decode_response()["data"];
  }

  public function getOne($websiteId, $sessionId) {
    $result = $this->crisp->_rest->get("website/$websiteId/conversation/$sessionId");
    return $result->decode_response()["data"];
  }

  public function _getFingerprint() {
    return mt_rand(0,999999999);
  }

  public function sendTextMessage($websiteId, $sessionId, $text) {
    $this->crisp->_assertSocket();
    $fingerprint = $this->_getFingerprint();
    $this->crisp->_socket->emit("message:send", array(
      "website_id" => $websiteId,
      "session_id" => $sessionId,
      "message" => array(
        "type" => "text",
        "origin" => "chat",
        "content" => $text,
        "timestamp" => microtime(),
        "fingerprint" => $fingerprint
      )
    ));
  }

  public function setState($websiteId, $sessionId, $state) {
    $this->crisp->_assertSocket();
    $this->crisp->_socket->emit("session:set_state", array(
      "website_id" => $websiteId,
      "session_id" => $sessionId,
      "state"      => $state
    ));
  }

  public function setEmail($websiteId, $sessionId, $email) {
    $this->crisp->_socket->emit("session:set_email", array(
      "website_id" => $websiteId,
      "session_id" => $sessionId,
      "email"      => $email
    ));
  }

  public function setNickname($websiteId, $sessionId, $nickname) {
    $this->crisp->_socket->emit("session:set_nickname", array(
      "website_id"  => $websiteId,
      "session_id"  => $sessionId,
      "nickname"    => $nickname
    ));
  }

  public function setBlock($websiteId, $sessionId, $block) {
    $this->crisp->_socket->emit("session:set_block", array(
      "website_id" => $websiteId,
      "session_id" => $sessionId,
      "block"      => $block
    ));
  }

  public function deleteOne($websiteId, $sessionId) {
    $this->crisp->_socket->emit("session:remove", array(
      "website_id" => $websiteId,
      "session_id" => $sessionId
    ));
  }

  public function acknowledgeMessages($websiteId, $sessionId, $fingerprints) {
    $this->crisp->_socket->emit("message:acknowledge:read:send", array(
      "website_id"   => $websiteId,
      "session_id"   => $sessionId,
      "fingerprints" => $fingerprints
    ));
  }
}

?>
