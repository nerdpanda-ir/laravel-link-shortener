<?php

namespace App\Http\Responses\Dashboard\Permission\Store;

use App\Services\ResponseBuilder;
use App\Traits\TranslatorGetterable;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Contracts\Responses\Dashboard\Permission\Store\StoreBuilder as Contract;
class StoreBuilder extends ResponseBuilder implements Contract
{
    use TranslatorGetterable;
    public function build(string $permission): RedirectResponse
    {
        return $this->response->redirectToRoute('dashboard.home')
                    ->with('system.messages.ok', [$okMessage]);
    }
}
