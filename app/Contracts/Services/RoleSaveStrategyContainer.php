<?php

namespace App\Contracts\Services;

interface RoleSaveStrategyContainer
{
    public function getStrategy():SaveRoleStrategy;
    public function setStrategy(SaveRoleStrategy $strategy):void;
}
