<?php

namespace App\Traits;

use Illuminate\Database\ConnectionResolverInterface;

trait DatabaseManagerGetterable
{
    public function getDatabaseManager():ConnectionResolverInterface {
        return $this->databaseManager;
    }
}
