<?php

namespace App\Observers\Permission;

use App\Models\Permission;
use App\Contracts\Observers\Permission\Logger as Contract;
use Psr\Log\LoggerInterface as LoggerService;
use Illuminate\Contracts\Translation\Translator ;
use App\Traits\Observers\Permission\Logger as LoggerTrait;
class Logger implements Contract
{
    use LoggerTrait;
    protected Translator $translator;
    protected LoggerService $logger;
    public function __construct(LoggerService $logger , Translator $translator)
    {
        $this->logger = $logger ;
        $this->translator = $translator;
    }

    /**
     * Handle the Permission "created" event.
     */
    public function created(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "updated" event.
     */
    public function updated(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "deleted" event.
     */
    public function deleted(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "restored" event.
     */
    public function restored(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "force deleted" event.
     */
    public function forceDeleted(Permission $permission): void
    {
        //
    }
}
