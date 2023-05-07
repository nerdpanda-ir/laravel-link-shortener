<?php

namespace App\Contracts\Responses\Dashboard\Permission\Store;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface FailStoreBuilder
{
    public function build(array $inputs , string $errorMessage):RedirectResponse;
}
