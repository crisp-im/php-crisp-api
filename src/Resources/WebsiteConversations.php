<?php
/*
 * Bundle: Crisp / WebsiteConversations
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

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

    public function findWithSearch($websiteId, $page = 1, $searchQuery = "", $searchType = "", $searchOperator = "", $includeEmpty = "", $filterUnread = "", $filterResolved = "", $filterNotResolved = "", $filterMention = "", $filterAssigned = "", $filterUnassigned = "", $filterDateStart = "", $filterDateEnd = "", $orderDateCreated = "", $orderDateUpdated = "")
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
            $resourceUrl = "website/$websiteId/conversations/$page{$this->prepareQuery($query)}";
        } else {
            $resourceUrl = "website/$websiteId/conversations/$page";
        }

        $result = $this->crisp->_rest->get($resourceUrl);
        return $this->formatResponse($result);
    }

    public function getList($websiteId, $page = 1)
    {
        return $this->findWithSearch($websiteId, $page);
    }

    public function create($websiteId)
    {
        $result = $this->crisp->_rest->post(
            "website/$websiteId/conversation"
        );
        return $this->formatResponse($result);
    }

    public function getOne($websiteId, $sessionId)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/conversation/$sessionId"
        );
        return $this->formatResponse($result);
    }

    public function deleteOne($websiteId, $sessionId)
    {
        $result = $this->crisp->_rest->delete(
            "website/$websiteId/conversation/$sessionId"
        );
        return $this->formatResponse($result);
    }

    public function initiateOne($websiteId, $sessionId)
    {
        $result = $this->crisp->_rest->post(
            "website/$websiteId/conversation/$sessionId/initiate"
        );
        return $this->formatResponse($result);
    }

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

        $result = $this->crisp->_rest->get($resourceUrl);
        return $this->formatResponse($result);
    }

    public function sendMessage($websiteId, $sessionId, $message)
    {
        $result = $this->crisp->_rest->post(
            "website/$websiteId/conversation/$sessionId/message",
            json_encode($message)
        );
        return $this->formatResponse($result);
    }

    public function acknowledgeMessages($websiteId, $sessionId, $read)
    {
        $result = $this->crisp->_rest->patch(
            "website/$websiteId/conversation/$sessionId/read",
            json_encode($read)
        );
        return $this->formatResponse($result);
    }

    public function getRouting($websiteId, $sessionId)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/conversation/$sessionId/routing"
        );
        return $this->formatResponse($result);
    }

    public function assignRouting($websiteId, $sessionId, $routing)
    {
        $result = $this->crisp->_rest->patch(
            "website/$websiteId/conversation/$sessionId/routing",
            json_encode($routing)
        );
        return $this->formatResponse($result);
    }

    public function getMeta($websiteId, $sessionId)
    {
        $result = $this->crisp->_rest->get(
            "website/$websiteId/conversation/$sessionId/meta"
        );
        return $this->formatResponse($result);
    }

    public function updateMeta($websiteId, $sessionId, $metas)
    {
        $result = $this->crisp->_rest->patch(
            "website/$websiteId/conversation/$sessionId/meta",
            json_encode($metas)
        );
        return $this->formatResponse($result);
    }

    public function setState($websiteId, $sessionId, $state)
    {
        $result = $this->crisp->_rest->patch(
            "website/$websiteId/conversation/$sessionId/state",
            json_encode(array("state" => $state))
        );
        return $this->formatResponse($result);
    }

    public function setBlock($websiteId, $sessionId, $blocked = true)
    {
        $result = $this->crisp->_rest->patch(
            "website/$websiteId/conversation/$sessionId/block",
            json_encode($blocked)
        );
        return $this->formatResponse($result);
    }

    public function scheduleReminder($websiteId, $sessionId, $params)
    {
        $result = $this->crisp->_rest->post(
            "website/$websiteId/conversation/$sessionId/reminder",
            json_encode($params)
        );
        return $this->formatResponse($result);
    }
}
