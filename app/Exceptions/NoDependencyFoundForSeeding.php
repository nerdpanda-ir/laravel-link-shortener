<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use App\Contracts\NoDependencyFoundForSeedingContract as Contract;
class NoDependencyFoundForSeeding extends Exception implements Contract
{

}
