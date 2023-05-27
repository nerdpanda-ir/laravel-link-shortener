<?php

namespace App\Contracts\Services\Gates;

interface User
{
    public function setPasswordForUser():bool;
    public function attachRoleToUser(): bool ;
    public function verifiedUserEmail():bool;
}
