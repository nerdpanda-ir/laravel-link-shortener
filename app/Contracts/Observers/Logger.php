<?php

namespace App\Contracts\Observers;

use App\Contracts\LoggerGetterable;
use App\Contracts\Observers\Logger\Createdable;
use App\Contracts\Observers\Logger\Deletedable;
use App\Contracts\Observers\Logger\Updatedable;
use App\Contracts\TranslatorGetterable;

interface Logger extends
    TranslatorGetterable , LoggerGetterable , Deletedable , Updatedable ,
    Createdable
{

}
