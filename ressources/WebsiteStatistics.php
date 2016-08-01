<?php
/*
 * Bundle: Crisp / WebsiteStatistics
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2016, Crisp IM
 */

class CrispWebsiteStats
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function getAllStatistics($websiteId) {
    $result = $this->crisp->_rest->get("website/$websiteId/stats");
    return $result->decode_response()["data"];
  }

  public function countTotalNumberOfConversations($websiteId) {
    $result = $this->crisp->_rest->get("website/$websiteId/stats/total");
    return $result->decode_response()["data"];
  }

  public function countNumberOfPendingConversations($websiteId) {
    $result = $this->crisp->_rest->get("website/$websiteId/stats/pending");
    return $result->decode_response()["data"];
  }

  public function countNumberOfUnresolvedConversations($websiteId) {
    $result = $this->crisp->_rest->get("website/$websiteId/stats/unresolved");
    return $result->decode_response()["data"];
  }

  public function countNumberOfResolvedConversations($websiteId) {
    $result = $this->crisp->_rest->get("website/$websiteId/stats/resolved");
    return $result->decode_response()["data"];
  }

  public function countNumberOfUnreadMessages($websiteId) {
    $result = $this->crisp->_rest->get("website/$websiteId/stats/unread");
    return $result->decode_response()["data"];
  }
}

?>
