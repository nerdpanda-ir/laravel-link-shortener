<?php

namespace App\Models;

use App\Contracts\Model\Permission as Contract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use NerdPanda\Traits\Model\DisableTimestamp;

class Permission extends Model implements Contract
{
    use HasFactory , DisableTimestamp;
    public function creator():BelongsTo{
        return $this->belongsTo(User::class,'created_by');
    }
    public function users():BelongsToMany {
        return $this->belongsToMany(User::class);
    }
    public function roles():BelongsToMany {
        return $this->belongsToMany(Role::class);
    }
}
