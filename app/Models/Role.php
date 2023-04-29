<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Contracts\RoleModelContract as Contract;
class Role extends Model implements Contract
{
    use HasFactory;
    public function permissions():BelongsToMany {
        return $this->belongsToMany(Permission::class);
    }
}
