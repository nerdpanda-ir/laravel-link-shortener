<?php

namespace App\Traits;

use App\Contracts\Services\ResponseVisitor;

trait ResponseVisitorGetterable
{
    public function getResponseVisitor():ResponseVisitor {
        return $this->responseVisitor;
    }
}
