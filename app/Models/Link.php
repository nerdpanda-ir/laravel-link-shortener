<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Model\Link as Contract;
use NerdPanda\Traits\Model\DisableTimestamp;

class Link extends Model implements Contract
{
    use HasFactory , DisableTimestamp;
}
