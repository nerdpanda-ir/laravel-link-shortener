<?php

namespace App\Contracts\Services\ResponseVisitors;

use App\Contracts\Responses\Dashboard\Permission\Update\Fail;
use App\Contracts\Responses\Dashboard\Permission\Update\Ok;

interface UpdateAction extends Ok , Fail , ExceptionThrowable
{

}
