<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DeleteController extends Controller
{
    public function __invoke(
        string $id , string $name
    ):RedirectResponse
    {
        dd(__METHOD__,func_get_args());
    }
}
