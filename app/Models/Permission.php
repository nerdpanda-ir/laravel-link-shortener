<?php

namespace App\Models;

use App\Contracts\PermissionModelContract as Contract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model implements Contract
{
    use HasFactory;
}
