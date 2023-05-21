<?php

namespace App\Contracts\Services;

interface UniqueExceptImplBridge
{
    public function getExcepts():array;
    public function setExcepts(array $excepts):self;
    public function getOnly():string;
    public function setOnly(string $only):self;
    public function getTableName():string;
    public function setTableName(string $tableName):self;
    public function getExceptColumn():string;
    public function setExceptColumn(string $column):self;
    public function getOnlyColumn():string;
    public function setOnlyColumn(string $column):self;
}
