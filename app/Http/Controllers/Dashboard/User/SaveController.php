<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;

class SaveController extends Controller
{
    public function __invoke()
    {
        dd(request()->all());
    }
}
