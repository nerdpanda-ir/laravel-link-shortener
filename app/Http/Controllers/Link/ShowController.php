<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ShowController extends Controller
{
    public function __invoke(string $summary):View|RedirectResponse
    {
        dd("here");
    }
}
