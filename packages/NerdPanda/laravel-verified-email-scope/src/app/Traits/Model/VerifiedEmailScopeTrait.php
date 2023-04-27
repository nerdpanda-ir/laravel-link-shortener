<?php
namespace NerdPanda\Traits\Model;
use Illuminate\Contracts\Database\Query\Builder;

trait VerifiedEmailScopeTrait
{
    public function scopeVerifiedEmail(Builder $query , string $column='email_verified_at') {
        $query->whereNotNull($column);
    }
}
