<?php

namespace App\Services;
use App\Contracts\Services\Redirector as Contract;
use App\Traits\Services\RedirectorGetterable;
use Illuminate\Routing\Redirector as RedirectorService;
class Redirector implements Contract
{
    use RedirectorGetterable;
    protected RedirectorService $redirector ;

    public function __construct(RedirectorService $redirector)
    {
        $this->redirector = $redirector;
    }
}
