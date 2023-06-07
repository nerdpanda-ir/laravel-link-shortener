<?php

namespace App\Models;

use App\Contracts\Model\Permission as Contract;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use NerdPanda\Traits\Model\DisableTimestamp;


/**
 * @method Builder withUserCount()
 */
class Permission extends Model implements Contract
{
    use HasFactory , DisableTimestamp;
    public function creator():BelongsTo{
        return $this->belongsTo(User::class,'created_by');
    }
    public function roles():BelongsToMany {
        return $this->belongsToMany(Role::class);
    }
    public function scopeWithUserCount(Builder $query){
        $query->selectSub(function (\Illuminate\Database\Query\Builder $query){
            $query->from('permission_role')
                  ->join('role_user','permission_role.role_id','=','role_user.role_id')
                  ->selectRaw('count(distinct role_user.user_id)');
        },'users_count');
    }
}
