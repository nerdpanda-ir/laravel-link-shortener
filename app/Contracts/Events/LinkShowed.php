<?php

namespace App\Contracts\Events;

use App\Contracts\Model\Link;

interface LinkShowed
{
    public function getLink():Link;
    public function setLink(Link $link):void;
}
