<?php

namespace App\Contracts\Responses\Dashboard\Permission\Store;
use App\Contracts\Responses\Dashboard\Permission\Buildable;
use App\Contracts\TranslatorGetterable;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

interface StoreBuilder extends TranslatorGetterable , Buildable
{

}
