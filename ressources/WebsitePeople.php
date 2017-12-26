<?php
/*
 * Bundle: Crisp / WebsitePeople
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

class CrispWebsitePeople
{

  public function __construct($parent) {
    $this->crisp = $parent;
  }

  public function findByEmail($websiteId, $email) {
    $searchFilter = [["model" => "people","criterion" => "email","operator" => "eq","query" => [$email]]];

    $result = $this->crisp->_rest->get(
      "website/$websiteId/people/profiles?search_filter=".json_encode($searchFilter)
    );
    return $result->decode_response()["data"];
  }

  public function findBySegments($websiteId, $segments) {
    $searchFilter = [];

    foreach ($segments as $segment){
      $searchFilter[] = ["model" => "people","criterion" => "segments","operator" => "eq","query" => [$segment]];
    }

    $result = $this->crisp->_rest->get(
      "website/$websiteId/people/profiles?search_filter=".json_encode($searchFilter)
    );
    return $result->decode_response()["data"];
  }

  public function createNewPeopleProfile($websiteId, $params) {
    $result = $this->crisp->_rest->post(
      "website/$websiteId/people/profile",
      json_encode($params)
    );
    return $result->decode_response()["data"];
  }

  public function checkPeopleProfileExists($websiteId, $peopleId) {
    $result = $this->crisp->_rest->execute(
      "HEAD",
      "website/$websiteId/people/$peopleId"
    );
    return $result->decode_response()["data"];
  }

  public function getPeopleProfile($websiteId, $peopleId) {
    $result = $this->crisp->_rest->get(
      "website/$websiteId/people/profile/$peopleId"
    );
    return $result->decode_response()["data"];
  }

  public function listPeopleProfiles($websiteId, $page) {
    $result = $this->crisp->_rest->get(
      "website/$websiteId/people/profiles/$page"
    );
    return $result->decode_response()["data"];
  }

  public function removePeopleProfile($websiteId, $peopleId) {
    $result = $this->crisp->_rest->delete(
      "website/$websiteId/people/profile/$peopleId"
    );
    return $result->decode_response()["data"];
  }

   public function savePeopleProfile($websiteId, $peopleId, $data) {
    $result = $this->crisp->_rest->put(
      "website/$websiteId/people/profile/$peopleId",
      json_encode($data)
    );
    return $result->decode_response()["data"];
  }

  public function updatePeopleProfile($websiteId, $peopleId, $data) {
    $result = $this->crisp->_rest->patch(
      "website/$websiteId/people/profile/$peopleId",
      json_encode($data)
    );
    return $result->decode_response()["data"];
  }

  public function listPeopleSegments($websiteId, $page) {
    $result = $this->crisp->_rest->get(
      "website/$websiteId/people/segments/$page"
    );
    return $result->decode_response()["data"];
  }

  public function listPeopleConversations($websiteId, $peopleId, $page) {
    $result = $this->crisp->_rest->get(
      "website/$websiteId/people/conversations/$peopleId/list/$page"
    );
    return $result->decode_response()["data"];
  }

  public function addPeopleEvent($websiteId, $peopleId, $data) {
    $result = $this->crisp->_rest->post(
      "website/$websiteId/people/events/$peopleId",
      json_encode($data)
    );
    return $result->decode_response()["data"];
  }

  public function listPeopleEvent($websiteId, $peopleId, $page) {
    $result = $this->crisp->_rest->execute(
      "GET",
      "website/$websiteId/people/events/$peopleId/list/$page",
      json_encode($data)
    );
    return $result->decode_response()["data"];
  }

  public function getPeopleData($websiteId, $peopleId) {
    $result = $this->crisp->_rest->get(
      "website/$websiteId/people/data/$peopleId"
    );
    return $result->decode_response()["data"];
  }

  public function updatePeopleData($websiteId, $peopleId, $data) {
    $result = $this->crisp->_rest->put(
      "website/$websiteId/people/data/$peopleId",
      json_encode($data)
    );

    return $result->decode_response();
  }
}

?>
