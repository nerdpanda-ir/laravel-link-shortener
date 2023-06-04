<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Model\Link as Contract;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use NerdPanda\Traits\Model\DisableTimestamp;

class Link extends Model implements Contract
{
    use HasFactory , DisableTimestamp;
    public function generateUniqueSummary(): string {
        $summaryLength = config('link.summary_length');
        $maxTry = config('link.max_try');
        $counter = 1 ;
        do {
            $summary = Str::random($summaryLength);
            $isExists = $this->where('summary','=',$summary)->exists();
            if ($counter>1)
                Log::debug("$counter nth time for create unique summary");
            if ($counter==$maxTry)
                throw new \Exception(trans('exceptions.link_summary_maximum_try'));
            $counter++;
        }while($isExists);
        return $summary;
    }

    public function getSummaryUrlAttribute(): ?string
    {
        $summary = $this->getAttribute('summary');
        if (is_null($summary))
            return null;
        return route('link.show',$summary);
    }

}
