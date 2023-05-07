<?php

namespace App\Contracts\Responses\Dashboard\Permission\Store;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

interface StoreBuilder
{
    public function build(string $permission): RedirectResponse;
}
