<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ViewAllController extends Controller
{
    public function __invoke(

    ):RedirectResponse|View
    {
        dd("view all users ");
    }
}
