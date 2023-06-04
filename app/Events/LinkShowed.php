<?php

namespace App\Events;

use App\Contracts\Model\Link;
use Illuminate\Foundation\Events\Dispatchable;
use App\Contracts\Events\LinkShowed as Contract;
class LinkShowed implements Contract
{
    use Dispatchable;
    protected Link $link;

    public function getLink(): Link
    {
        return $this->link;
    }

    public function setLink(Link $link): void
    {
        $this->link = $link ;
    }

}
