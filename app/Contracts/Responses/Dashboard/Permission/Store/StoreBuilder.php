<?php

namespace App\Contracts\Responses\Dashboard\Permission\Store;
use App\Contracts\TranslatorGetterable;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

interface StoreBuilder extends TranslatorGetterable
{
    public function build(string $permission): RedirectResponse;
}
