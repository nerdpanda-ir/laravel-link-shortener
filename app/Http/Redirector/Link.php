<?php

namespace App\Http\Redirector;
use App\Contracts\Redirectors\Link as Contract;
use App\Services\Redirector;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Link extends Redirector implements Contract
{
    public function create(array $inputs = []): RedirectResponse
    {
        return $this->getRedirector()
                    ->route('link.create')
                    ->withInput($inputs);
    }
    public function show(string $summary): RedirectResponse
    {
        return $this->getRedirector()->route('link.show',$summary);
    }
}
