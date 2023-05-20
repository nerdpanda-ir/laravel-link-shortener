<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EditController extends Controller
{
    public function __invoke(
        string $id , string $name ,
    ):RedirectResponse|View {
        dd(__METHOD__);
    }
}
