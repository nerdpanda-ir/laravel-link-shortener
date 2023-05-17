<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface RequestGetterable
{
    public function getRequest():Request;
}
