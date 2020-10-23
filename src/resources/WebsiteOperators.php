<?php
/*
 * Bundle: Crisp / WebsiteOperators
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

class WebsiteOperators extends Resource
{
    public function getList($websiteId)
    {
        $result = $this->crisp->_rest->get("website/$websiteId/operators/list");
        return $this->formatResponse($result);
    }

    public function getOne($websiteId, $operatorId)
    {
        $result = $this->crisp->_rest->get("website/$websiteId/operator/$operatorId");
        return $this->formatResponse($result);
    }

    public function deleteOne($websiteId, $operatorId)
    {
        $result = $this->crisp->_rest->delete("website/$websiteId/operator/$operatorId");
        return $this->formatResponse($result);
    }

    public function updateOne($websiteId, $operatorId, $params)
    {
        $result = $this->crisp->_rest->patch(
            "website/$websiteId/operator/$operatorId",
            $params
        );
        return $this->formatResponse($result);
    }
}
