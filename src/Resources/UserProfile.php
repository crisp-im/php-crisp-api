<?php
/*
 * Bundle: Crisp / UserProfile
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp\Resources;

use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

class UserProfile extends Resource
{
    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function get()
    {
        $result = $this->crisp->get("user/account/profile");
        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function update($params)
    {
        $result = $this->crisp->patch(
            "user/account/profile",
            json_encode($params)
        );
        return $this->formatResponse($result);
    }
}
