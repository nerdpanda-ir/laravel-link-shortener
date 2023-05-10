<?php

namespace App\Models;

use App\Contracts\Model\Role as Contract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model implements Contract
{
    use HasFactory;
    public function permissions():BelongsToMany {
        return $this->belongsToMany(Permission::class);
    }
    public function creator():BelongsTo {
        return $this->belongsTo(User::class , 'created_by');
    }
    public function users():BelongsToMany {
        return $this->belongsToMany(User::class);
    }
}
