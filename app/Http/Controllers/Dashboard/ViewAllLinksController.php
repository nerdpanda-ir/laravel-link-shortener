<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ViewAllLinksController extends Controller
{
    public function __invoke():View|RedirectResponse
    {
        dd("here");
    }
}
