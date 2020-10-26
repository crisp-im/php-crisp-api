<?php
/*
 * Bundle: Crisp / Website
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

class Website extends Resource
{
    public function create($params)
    {
        $result = $this->crisp->_rest->post("website", json_encode($params));
        return $this->formatResponse($result);
    }

    public function delete($websiteId)
    {
        $result = $this->crisp->_rest->delete("website/$websiteId");
        return $this->formatResponse($result);
    }
}
