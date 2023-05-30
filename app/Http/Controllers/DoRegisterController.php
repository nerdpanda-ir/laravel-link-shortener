<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DoRegisterController extends Controller
{
    public function __invoke(Request $request):RedirectResponse
    {
        dd($request->all());
    }
}
