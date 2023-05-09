<?php

namespace App\Contracts\Services;

interface UniqueExceptPermissionUpdateBridge
{
    public function getExcepts():array;
    public function setExcepts(array $excepts);
    public function getOnly():string;
    public function setOnly(string $only):void;
}
