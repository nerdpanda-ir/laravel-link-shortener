<?php

namespace App\Http\Controllers\Dashboard\Link;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class CreateController extends Controller
{
    public function __invoke():View
    {
        return \view('page.dashboard.Link.create');
    }
}
