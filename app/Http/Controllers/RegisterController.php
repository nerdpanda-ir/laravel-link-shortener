<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class RegisterController extends Controller
{
    public function __invoke():View
    {
        return \view('page.register');
    }
}
