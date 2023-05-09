<?php

namespace App\Contracts\Rule;

use App\Contracts\DatabaseManagerGetterable;
use App\Contracts\TranslatorGetterable;
use App\Contracts\Services\UniqueExceptExistableBridge as ExistableBridge;

interface UniqueExcept extends TranslatorGetterable
{
    public function getExistableBridge():ExistableBridge;
    public function setExistableBridge(ExistableBridge $bridge);
}
