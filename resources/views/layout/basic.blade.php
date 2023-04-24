@php
    $htmlAttributes = \ComponentAttributeBagFactoryProxyFacade::create($htmlAttributes??null);
    $bodyAttributes = \ComponentAttributeBagFactoryProxyFacade::create($bodyAttributes??null);
@endphp
<x-partial.layout.basic.header />
<x-partial.layout.basic.body />
<x-partial.layout.basic.footer />
