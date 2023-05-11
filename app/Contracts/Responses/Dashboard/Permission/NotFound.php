<?php

namespace App\Contracts\Responses\Dashboard\Permission;

use App\Contracts\TranslatorGetterable;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface NotFound extends TranslatorGetterable , Buildable
{
}
