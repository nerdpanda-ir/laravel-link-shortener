<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Contracts\Model\Userable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use NerdPanda\Traits\Model\VerifiedEmailScopeTrait;

class User extends Authenticatable implements Userable
{
    use HasApiTokens, HasFactory, Notifiable , VerifiedEmailScopeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles():BelongsToMany{
        return $this->belongsToMany(Role::class);
    }
    public function permissions():Relation {
        return $this->belongsToMany(Permission::class);
    }
    public function getPermissionsArrayAttribute($permissionsArray):array{
        $isLoadedPermissions = $this->relationLoaded('permissions');
        if (!$isLoadedPermissions) {
            if (is_null($permissionsArray))
                return $this->attributes['permissionsArray'] = [];
            else return $this->attributes['permissionsArray'];
        }
        /** @var Collection $permissions*/
        $permissions = $this->getRelation('permissions');
        if ($permissions->isEmpty()){
            if (is_null($permissionsArray))
                return $this->attributes['permissionsArray'] = [];
            else if (is_array($permissionsArray) and empty($permissionsArray))
                return $this->attributes['permissionsArray'];
        }
        if (is_array($permissionsArray) and !empty($permissionsArray))
            return $this->attributes['permissionsArray'];
        return $this->attributes['permissionsArray'] = $permissions->map->name->toArray();
    }
}
