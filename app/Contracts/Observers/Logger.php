<?php

namespace App\Contracts\Observers;

use App\Contracts\LoggerGetterable;
use App\Contracts\Observers\Permission\Logger\Createdable;
use App\Contracts\Observers\Permission\Logger\Deletedable;
use App\Contracts\Observers\Permission\Logger\Updatedable;
use App\Contracts\TranslatorGetterable;

interface Logger extends
    TranslatorGetterable , LoggerGetterable , Deletedable , Updatedable ,
    Createdable
{

}
