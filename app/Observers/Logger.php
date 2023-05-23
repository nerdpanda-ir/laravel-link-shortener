<?php

namespace App\Observers;

use App\Contracts\Model\Permission;
use App\Contracts\Observers\Logger as Contract;
use App\Contracts\Services\TranslateKeyGetter;
use App\Traits\Observers\Permission\Logger as LoggerTrait;
use Illuminate\Contracts\Translation\Translator;
use Psr\Log\LoggerInterface as LoggerService;

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
        $this->logger->info($this->translator->get('log.crud.save.ok'),['item'=>$permission]);
    }

    /**
     * Handle the Permission "updated" event.
     * @param \App\Models\Permission $permission
     */
    public function updated(Permission $permission): void
    {
        $this->getLogger()->debug(
            $this->getTranslator()->get('log.crud.updated.ok') ,
            ['item'=> $permission]
        );

    }

    /**
     * Handle the Permission "deleted" event.
     */
    public function deleted(Permission $permission): void
    {
        $this->getLogger()->info(
            $this->getTranslator()->get('log.crud.delete.ok') ,
            ['item'=> $permission]
        );
    }
}
