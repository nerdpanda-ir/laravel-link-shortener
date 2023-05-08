<?php

namespace App\Contracts;

use Illuminate\Database\ConnectionResolverInterface;

interface DatabaseManagerGetterable
{
    public function getDatabaseManager():ConnectionResolverInterface;
}
