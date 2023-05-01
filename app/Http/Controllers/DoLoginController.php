<?php

namespace App\Http\Controllers;
use App\Contracts\DoLoginRequestContract as RequestContract;
class DoLoginController extends Controller
{
    public function __invoke(RequestContract $request)
    {
        dd(request()->all());
    }
}
