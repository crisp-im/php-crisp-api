<?php
/*
 * Bundle: Crisp / WebsitePeople
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

class WebsitePeople extends Resource
{
    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function findByEmail($websiteId, $email)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/profile/$email"
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function findWithSearchText($websiteId, $searchText)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/profiles?search_text=".urlencode($searchText)
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function createNewPeopleProfile($websiteId, $params)
    {
        $result = $this->crisp->post(
            "website/$websiteId/people/profile",
            json_encode($params)
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function checkPeopleProfileExists($websiteId, $peopleId)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/profile/$peopleId"
        );
        return !empty($this->formatResponse($result));
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getPeopleProfile($websiteId, $peopleId)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/profile/$peopleId"
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listPeopleProfiles($websiteId, $pageNumber)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/profiles/$pageNumber"
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function removePeopleProfile($websiteId, $peopleId)
    {
        $result = $this->crisp->delete(
            "website/$websiteId/people/profile/$peopleId"
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function savePeopleProfile($websiteId, $peopleId, $data)
    {
        $result = $this->crisp->put(
            "website/$websiteId/people/profile/$peopleId",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function updatePeopleProfile($websiteId, $peopleId, $data)
    {
        $result = $this->crisp->patch(
            "website/$websiteId/people/profile/$peopleId",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listPeopleSegments($websiteId, $pageNumber)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/segments/$pageNumber"
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listPeopleConversations($websiteId, $peopleId, $pageNumber)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/conversations/$peopleId/list/$pageNumber"
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function addPeopleEvent($websiteId, $peopleId, $data)
    {
        $result = $this->crisp->post(
            "website/$websiteId/people/events/$peopleId",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listPeopleEvent($websiteId, $peopleId, $pageNumber)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/events/$peopleId/list/$pageNumber"
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getPeopleData($websiteId, $peopleId)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/data/$peopleId"
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function savePeopleData($websiteId, $peopleId, $data)
    {
        $result = $this->crisp->put(
            "website/$websiteId/people/data/$peopleId",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function updatePeopleData($websiteId, $peopleId, $data)
    {
        $result = $this->crisp->patch(
            "website/$websiteId/people/data/$peopleId",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getPeopleSubscriptionStatus($websiteId, $peopleId)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/subscription/$peopleId"
        );
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function updatePeopleSubscriptionStatus($websiteId, $peopleId, $data)
    {
        $result = $this->crisp->patch(
            "website/$websiteId/people/subscription/$peopleId",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }
}
