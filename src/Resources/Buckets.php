<?php
/*
 * Bundle: Crisp / Buckets
 * Project: Crisp - PHP API
 * Author: Eliott Vincent https://eliottvincent.com/
 * Copyright: 2021, Crisp IM
 */

namespace Crisp\Resources;

class Buckets extends Resource
{
    public function generate($data)
    {
        $result = $this->crisp->post(
            "bucket/url/generate",
            json_encode($data)
        );
        return $this->formatResponse($result);
    }
}
