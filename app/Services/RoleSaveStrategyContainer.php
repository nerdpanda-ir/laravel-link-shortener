<?php

namespace App\Services;
use App\Contracts\Services\RoleSaveStrategyContainer as Contract;
use App\Contracts\Services\SaveRoleStrategy;

class RoleSaveStrategyContainer implements Contract
{
    protected SaveRoleStrategy $strategy;
    public function getStrategy(): SaveRoleStrategy
    {
        return $this->strategy;
    }

    public function setStrategy(SaveRoleStrategy $strategy): void
    {
        $this->strategy = $strategy ;
    }

}
