<?php
/*
 * Bundle: Crisp / WebsiteBatch
 * Project: Crisp - PHP API
 * Author: Crisp IM
 * Copyright: 2026, Crisp IM
 */

namespace Crisp\Resources;

use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

class WebsiteBatch extends Resource
{
    /**
     * @param string $websiteId
     * @param array $data
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function batchResolveItems($websiteId, $data)
    {
        $result = $this->crisp->patch("website/$websiteId/batch/resolve", json_encode($data));
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param array $data
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function batchUnresolveItems($websiteId, $data)
    {
        $result = $this->crisp->patch("website/$websiteId/batch/unresolve", json_encode($data));
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param array $data
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function batchReadItems($websiteId, $data)
    {
        $result = $this->crisp->patch("website/$websiteId/batch/read", json_encode($data));
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param array $data
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function batchUnreadItems($websiteId, $data)
    {
        $result = $this->crisp->patch("website/$websiteId/batch/unread", json_encode($data));
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param array $data
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function batchRemoveItems($websiteId, $data)
    {
        $result = $this->crisp->patch("website/$websiteId/batch/remove", json_encode($data));
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param array $data
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function batchReportItems($websiteId, $data)
    {
        $result = $this->crisp->post("website/$websiteId/batch/report", json_encode($data));
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param array $data
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function batchBlockItems($websiteId, $data)
    {
        $result = $this->crisp->patch("website/$websiteId/batch/block", json_encode($data));
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param array $data
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function batchRoutingItems($websiteId, $data)
    {
        $result = $this->crisp->patch("website/$websiteId/batch/routing", json_encode($data));
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param array $data
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function batchInboxItems($websiteId, $data)
    {
        $result = $this->crisp->patch("website/$websiteId/batch/inbox", json_encode($data));
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param array $data
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function batchDataItems($websiteId, $data)
    {
        $result = $this->crisp->patch("website/$websiteId/batch/data", json_encode($data));
        return $this->formatResponse($result);
    }

    /**
     * @param string $websiteId
     * @param array $data
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function batchSegmentsItems($websiteId, $data)
    {
        $result = $this->crisp->patch("website/$websiteId/batch/segments", json_encode($data));
        return $this->formatResponse($result);
    }
}
