<?php

namespace App\Contracts;

use App\Contracts\Services\ResponseVisitor;

interface ResponseVisitorGetterable
{
    public function getResponseVisitor():ResponseVisitor;
}
