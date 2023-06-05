<?php

namespace App\Http\Controllers\Dashboard\AdminLink;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ViewAllController extends Controller
{
    public function __invoke():View
    {
        dd("here");
    }
}
