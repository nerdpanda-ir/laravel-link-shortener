<?php

namespace App\Contracts\Observers\Permission;

use App\Contracts\Observers\Permission\Logger\Createdable;
use App\Contracts\Observers\Permission\Logger\Deletedable;
use App\Contracts\Observers\Permission\Logger\Updatedable;
use App\Contracts\TranslatorGetterable;
use App\LoggerGetterable;

interface Logger extends
    TranslatorGetterable , LoggerGetterable , Deletedable , Updatedable ,
    Createdable
{

}
