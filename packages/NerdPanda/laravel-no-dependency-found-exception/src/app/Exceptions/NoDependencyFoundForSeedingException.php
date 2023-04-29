<?php

namespace NerdPanda\Exceptions;

use Exception;
use NerdPanda\Contracts\NoDependencyFoundForSeedingContract as Contract;

class NoDependencyFoundForSeedingException extends Exception implements Contract
{

}
