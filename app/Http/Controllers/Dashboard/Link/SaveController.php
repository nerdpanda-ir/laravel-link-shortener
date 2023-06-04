<?php

namespace App\Http\Controllers\Dashboard\Link;

use App\Contracts\Requests\Link\Save;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SaveController extends Controller
{

    /**
     * @param \App\Http\Requests\Link\Save $request
     * @return RedirectResponse
     */
    public function __invoke(Save $request):RedirectResponse
    {
        dd("here");
    }
}
