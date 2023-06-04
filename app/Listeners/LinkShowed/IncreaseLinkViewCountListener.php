<?php

namespace App\Listeners\LinkShowed;

use App\Contracts\Events\LinkShowed;
use App\Contracts\Services\DateService;
use App\Traits\DateServiceGetterable;

class IncreaseLinkViewCountListener
{
    use DateServiceGetterable;
    protected DateService $dateService;
    public function __construct(DateService $dateService)
    {
        $this->dateService = $dateService ;
    }

    public function handle(LinkShowed $event): void
    {
        $linkModel = $event->getLink();
        $currentLinkViewCount = $linkModel->getAttribute('view_count');
        $linkModel->setAttribute('view_count',++$currentLinkViewCount);
        $linkModel->setAttribute('updated_at',$this->getDateService()->date());
        $linkModel->update();
    }
}
