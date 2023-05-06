<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke():View
    {
        return \view('page.dashboard');
    }
}
