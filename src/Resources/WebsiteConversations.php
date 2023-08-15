<?php
/*
 * Bundle: Crisp / WebsiteConversations
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

class WebsiteConversations extends Resource
{
    const FIND_WITH_SEARCH_QUERY_PARAMETERS = [
        ["searchQuery", "search_query"],
        ["searchType", "search_type"],
        ["searchOperator", "search_operator"],
        ["includeEmpty", "include_empty"],
        ["filterUnread", "filter_unread"],
        ["filterResolved", "filter_resolved"],
        ["filterNotResolved", "filter_not_resolved"],
        ["filterMention", "filter_mention"],
        ["filterAssigned", "filter_assigned"],
        ["filterUnassigned", "filter_unassigned"],
        ["filterDateStart", "filter_date_start"],
        ["filterDateEnd", "filter_date_end"],
        ["orderDateCreated", "order_date_created"],
        ["orderDateUpdated", "order_date_updated"]
    ];

    /**
     * @param string $websiteId
     * @param int $pageNumber
     * @param string $searchQuery
     * @param string $searchType
     * @param string $searchOperator
     * @param string $includeEmpty
     * @param string $filterUnread
     * @param string $filterResolved
     * @param string $filterNotResolved
     * @param string $filterMention
     * @param string $filterAssigned
     * @param string $filterUnassigned
     * @param string $filterDateStart
     * @param string $filterDateEnd
     * @param string $orderDateCreated
     * @param string $orderDateUpdated
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function findWithSearch($websiteId, $pageNumber = 1, $searchQuery = "", $searchType = "", $searchOperator = "", $includeEmpty = "", $filterUnread = "", $filterResolved = "", $filterNotResolved = "", $filterMention = "", $filterAssigned = "", $filterUnassigned = "", $filterDateStart = "", $filterDateEnd = "", $orderDateCreated = "", $orderDateUpdated = "")
    {
        $resourceUrl = "";
        $query = [];

        foreach ($this::FIND_WITH_SEARCH_QUERY_PARAMETERS as &$parameter) {
            $parameterValue = get_defined_vars()[$parameter[0]];

            if ($parameterValue != "") {
                $query[$parameter[1]] = $parameterValue;
            }
        }

        if ($query != []) {
            $resourceUrl = "website/$websiteId/conversations/$pageNumber{$this->prepareQuery($query)}";
        } else {
            $resourceUrl = "website/$websiteId/conversations/$pageNumber";
        }

        $result = $this->crisp->get($resourceUrl);
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param int $pageNumber
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getList($websiteId, $pageNumber = 1)
    {
        return $this->findWithSearch($websiteId, $pageNumber);
    }

    /**
     * @param string $websiteId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function create($websiteId)
    {
        $result = $this->crisp->post(
            "website/$websiteId/conversation"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getOne($websiteId, $sessionId)
    {
        $result = $this->crisp->get(
            "website/$websiteId/conversation/$sessionId"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function deleteOne($websiteId, $sessionId)
    {
        $result = $this->crisp->delete(
            "website/$websiteId/conversation/$sessionId"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function initiateOne($websiteId, $sessionId)
    {
        $result = $this->crisp->post(
            "website/$websiteId/conversation/$sessionId/initiate"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @param string $timestampBefore
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getMessages($websiteId, $sessionId, $timestampBefore = "")
    {
        $resourceUrl = "";
        $query = [];

        if ($timestampBefore != "") {
            $query["timestamp_before"] = $timestampBefore;
        }

        if ($query != []) {
            $resourceUrl = "website/$websiteId/conversation/$sessionId/messages{$this->prepareQuery($query)}";
        } else {
            $resourceUrl = "website/$websiteId/conversation/$sessionId/messages";
        }

        $result = $this->crisp->get($resourceUrl);
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @param array $message
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function sendMessage($websiteId, $sessionId, $message)
    {
        $result = $this->crisp->post(
            "website/$websiteId/conversation/$sessionId/message",
            json_encode($message)
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @param array $read
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function acknowledgeMessages($websiteId, $sessionId, $read)
    {
        $result = $this->crisp->patch(
            "website/$websiteId/conversation/$sessionId/read",
            json_encode($read)
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getRouting($websiteId, $sessionId)
    {
        $result = $this->crisp->get(
            "website/$websiteId/conversation/$sessionId/routing"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @param array $routing
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function assignRouting($websiteId, $sessionId, $routing)
    {
        $result = $this->crisp->patch(
            "website/$websiteId/conversation/$sessionId/routing",
            json_encode($routing)
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getMeta($websiteId, $sessionId)
    {
        $result = $this->crisp->get(
            "website/$websiteId/conversation/$sessionId/meta"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @param array $metas
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function updateMeta($websiteId, $sessionId, $metas)
    {
        $result = $this->crisp->patch(
            "website/$websiteId/conversation/$sessionId/meta",
            json_encode($metas)
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @param string $originalId
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function getOriginalMessage($websiteId, $sessionId, $originalId)
    {
        $result = $this->crisp->get(
            "website/$websiteId/conversation/$sessionId/original/$originalId"
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @param 'pending'|'unresolved'|'resolved' $state
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function setState($websiteId, $sessionId, $state)
    {
        $result = $this->crisp->patch(
            "website/$websiteId/conversation/$sessionId/state",
            json_encode(array("state" => $state))
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @param bool $blocked
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function setBlock($websiteId, $sessionId, $blocked = true)
    {
        $result = $this->crisp->patch(
            "website/$websiteId/conversation/$sessionId/block",
            json_encode($blocked)
        );
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param string $sessionId
     * @param array $params
     * @return array
     * @throws ClientExceptionInterface
     * @throws CrispException
     */
    public function scheduleReminder($websiteId, $sessionId, $params)
    {
        $result = $this->crisp->post(
            "website/$websiteId/conversation/$sessionId/reminder",
            json_encode($params)
        );
        return $this->formatResponse($result);
    }
}
