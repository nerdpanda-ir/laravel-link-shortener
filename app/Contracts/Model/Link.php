<?php

namespace App\Contracts\Model;

interface Link
{
    public function generateUniqueSummary():string ;
    public function getSummaryUrlAttribute():?string;
}
