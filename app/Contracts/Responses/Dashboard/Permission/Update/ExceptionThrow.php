<?php

namespace App\Contracts\Responses\Dashboard\Permission\Update;

use App\Contracts\TranslatorGetterable;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface ExceptionThrow extends TranslatorGetterable
{
    public function build(string $id , string $name , array $inputs):RedirectResponse;
}
