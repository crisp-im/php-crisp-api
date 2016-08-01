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

   public function listConversations($websiteId, $page = 0) {
    $result = $this->crisp->_rest->get(
      "website/$websiteId/conversations/$page"
    );
    return $result->decode_response()["data"];
  }

  public function searchConversations($websiteId, $page = 0, $searchQuery, $searchType) {
    $result = $this->crisp->_rest->get(
      "website/$websiteId/conversations/$page?search_query=$searchQuery&search_type=$searchType"
    );
    return $result->decode_response()["data"];
  }
}

?>
