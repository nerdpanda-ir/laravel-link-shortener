<?php

namespace App\Contracts\Services;

interface UniqueExceptImplBridge
{
    public function getExcepts():array;
    public function setExcepts(array $excepts);
    public function getOnly():string;
    public function setOnly(string $only):void;
    public function getTableName():string;
    public function setTableName(string $tableName):void;
    public function getExceptColumn():string;
}
