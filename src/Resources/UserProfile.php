<?php
/*
 * Bundle: Crisp / UserProfile
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

class UserProfile extends Resource
{
    public function get()
    {
        $result = $this->crisp->get("user/account/profile");
        return $this->formatResponse($result);
    }
    public function update($params)
    {
        $result = $this->crisp->patch(
            "user/account/profile",
            json_encode($params)
        );
        return $this->formatResponse($result);
    }
}
