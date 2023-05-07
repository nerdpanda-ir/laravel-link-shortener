<?php

namespace App\Contracts\Responses\Dashboard\Permission\Store;
use App\Contracts\TranslatorGetterable;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface ExceptionHappenBuilder extends TranslatorGetterable
{
    public function build(array $inputs):RedirectResponse;
}
