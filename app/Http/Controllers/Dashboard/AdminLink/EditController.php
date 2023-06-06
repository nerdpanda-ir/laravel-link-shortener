<?php

namespace App\Http\Controllers\Dashboard\AdminLink;

use App\Http\Controllers\Controller;
use http\Encoding\Stream\Inflate;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EditController extends Controller
{
    public function __invoke(
        string $id , string $link ,
    ):View|RedirectResponse
    {
        try {
            dd("here");
        }catch (\Throwable $exception){
            dd($exception);
        }
    }
}
