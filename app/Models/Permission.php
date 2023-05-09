<?php

namespace App\Models;

use App\Contracts\Model\Permission as Contract;
use App\Traits\Model\DisableTimestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model implements Contract
{
    use HasFactory , DisableTimestamp;
    public function creator():BelongsTo{
        return $this->belongsTo(User::class,'created_by');
    }
}
