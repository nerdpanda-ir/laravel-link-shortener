<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait RequestGetterable
{
    public function getRequest():Request {
        return $this->request;
    }
}
