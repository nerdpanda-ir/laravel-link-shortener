<?php

namespace App\Http\Controllers\Dashboard\Permission;

use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(string $name)
    {
        dump(__METHOD__,$name);
    }
}
