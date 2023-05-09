<?php

namespace App\Models;

use App\Contracts\Model\Role as Contract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model implements Contract
{
    use HasFactory;
    public function permissions():BelongsToMany {
        return $this->belongsToMany(Permission::class);
    }
}
