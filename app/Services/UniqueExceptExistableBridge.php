<?php

namespace App\Services;
use App\Contracts\Services\UniqueExceptExistableBridge as Contract;
use App\Traits\DatabaseManagerGetterable;
use Illuminate\Database\ConnectionResolverInterface as DatabaseManager;
abstract class UniqueExceptExistableBridge implements Contract
{
    use DatabaseManagerGetterable;
    protected DatabaseManager $databaseManager;
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

}
