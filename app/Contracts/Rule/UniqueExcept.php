<?php

namespace App\Contracts\Rule;

use App\Contracts\DatabaseManagerGetterable;

interface UniqueExcept extends DatabaseManagerGetterable
{
    public function getExcepts():array;
    public function setExcepts(array $excepts):void;
    public function getColumnName():string|null;
    public function setColumnName(string $columnName):void;
    public function getTableName():string;
    public function setTableName(string $tableName):void;
}
