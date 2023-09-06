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
     * @param string $websiteId
     * @param string $email
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function findByEmail($websiteId, $email)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/profile/$email"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $searchText
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function findWithSearchText($websiteId, $searchText)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/profiles?search_text=".urlencode($searchText)
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param array $params
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
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
     * @param string $websiteId
     * @param string $peopleId
     * @return bool
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function checkPeopleProfileExists($websiteId, $peopleId)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/profile/$peopleId"
        );
        return !empty($this->formatResponse($result));
    }

    /**
     * @param string $websiteId
     * @param string $peopleId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getPeopleProfile($websiteId, $peopleId)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/profile/$peopleId"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param int $pageNumber
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function listPeopleProfiles($websiteId, $pageNumber)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/profiles/$pageNumber"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $peopleId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function removePeopleProfile($websiteId, $peopleId)
    {
        $result = $this->crisp->delete(
            "website/$websiteId/people/profile/$peopleId"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $peopleId
     * @param array $data
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
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
     * @param string $websiteId
     * @param string $peopleId
     * @param array $data
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
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
     * @param string $websiteId
     * @param int $pageNumber
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function listPeopleSegments($websiteId, $pageNumber)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/segments/$pageNumber"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $peopleId
     * @param int $pageNumber
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function listPeopleConversations($websiteId, $peopleId, $pageNumber)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/conversations/$peopleId/list/$pageNumber"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $peopleId
     * @param array $data
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
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
     * @param string $websiteId
     * @param string $peopleId
     * @param int $pageNumber
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function listPeopleEvent($websiteId, $peopleId, $pageNumber)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/events/$peopleId/list/$pageNumber"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $peopleId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getPeopleData($websiteId, $peopleId)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/data/$peopleId"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $peopleId
     * @param array $data
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
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
     * @param string $websiteId
     * @param string $peopleId
     * @param array $data
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
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
     * @param string $websiteId
     * @param string $peopleId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getPeopleSubscriptionStatus($websiteId, $peopleId)
    {
        $result = $this->crisp->get(
            "website/$websiteId/people/subscription/$peopleId"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $peopleId
     * @param array $data
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
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
