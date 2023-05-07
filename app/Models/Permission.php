<?php

namespace App\Models;

use App\Contracts\PermissionModelContract as Contract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\DisableTimestamp;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model implements Contract
{
    use HasFactory , DisableTimestamp;
    public function creator():BelongsTo{
        return $this->belongsTo(User::class,'created_by');
    }
}
