<?php

namespace App\Contracts\Services\ResponseVisitors;

use App\Contracts\TranslatorGetterable;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

interface Cruds extends TranslatorGetterable , Okable , Failable , ExceptionThrowable
{

}
