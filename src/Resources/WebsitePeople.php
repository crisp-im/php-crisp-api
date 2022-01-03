<?php
/*
 * Bundle: Crisp / WebsitePeople
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

class WebsitePeople extends Resource
{
    public function findByEmail($websiteId, $email)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/people/profile/$email"
        );
        return $this->formatResponse($result);
    }

    public function findWithSearchText($websiteId, $searchText)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/people/profiles?search_text=".urlencode($searchText)
        );
        return $this->formatResponse($result);
    }

    public function createNewPeopleProfile($websiteId, $params)
    {
        $result = $this->crisp->_rest->post(
            "website/$websiteId/people/profile",
            json_encode($params)
        );
        return $this->formatResponse($result);
    }

    public function checkPeopleProfileExists($websiteId, $peopleId)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/people/profile/$peopleId"
        );
        return !empty($this->formatResponse($result));
    }

    public function getPeopleProfile($websiteId, $peopleId)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/people/profile/$peopleId"
        );
        return $this->formatResponse($result);
    }

    public function listPeopleProfiles($websiteId, $pageNumber)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/people/profiles/$pageNumber"
        );
        return $this->formatResponse($result);
    }

    public function removePeopleProfile($websiteId, $peopleId)
    {
        $result = $this->crisp->_rest->delete(
            "website/$websiteId/people/profile/$peopleId"
        );
        return $this->formatResponse($result);
    }

    public function savePeopleProfile($websiteId, $peopleId, $data)
    {
        $result = $this->crisp->_rest->put(
            "website/$websiteId/people/profile/$peopleId",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }

    public function updatePeopleProfile($websiteId, $peopleId, $data)
    {
        $result = $this->crisp->_rest->patch(
            "website/$websiteId/people/profile/$peopleId",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }

    public function listPeopleSegments($websiteId, $pageNumber)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/people/segments/$pageNumber"
        );
        return $this->formatResponse($result);
    }

    public function listPeopleConversations($websiteId, $peopleId, $pageNumber)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/people/conversations/$peopleId/list/$pageNumber"
        );
        return $this->formatResponse($result);
    }

    public function addPeopleEvent($websiteId, $peopleId, $data)
    {
        $result = $this->crisp->_rest->post(
            "website/$websiteId/people/events/$peopleId",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }

    public function listPeopleEvent($websiteId, $peopleId, $pageNumber)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/people/events/$peopleId/list/$pageNumber"
        );
        return $this->formatResponse($result);
    }

    public function getPeopleData($websiteId, $peopleId)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/people/data/$peopleId"
        );
        return $this->formatResponse($result);
    }

    public function savePeopleData($websiteId, $peopleId, $data)
    {
        $result = $this->crisp->_rest->put(
            "website/$websiteId/people/data/$peopleId",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }

    public function updatePeopleData($websiteId, $peopleId, $data)
    {
        $result = $this->crisp->_rest->patch(
            "website/$websiteId/people/data/$peopleId",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }

    public function getPeopleSubscriptionStatus($websiteId, $peopleId)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/people/subscription/$peopleId"
        );
        return $this->formatResponse($result);
    }

    public function updatePeopleSubscriptionStatus($websiteId, $peopleId, $data)
    {
        $result = $this->crisp->_rest->patch(
            "website/$websiteId/people/subscription/$peopleId",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }
}
