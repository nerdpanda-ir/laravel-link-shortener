<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Contracts\Requests\Link\Save as Request;
class SaveController extends Controller
{
    public function __invoke(Request $request):View|RedirectResponse
    {
        dd("here");
    }
}
