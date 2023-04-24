@php
    $htmlAttributes = \ComponentAttributeBagFactoryProxyFacade::create($htmlAttributes??null);
    $bodyAttributes = \ComponentAttributeBagFactoryProxyFacade::create($bodyAttributes??null);
@endphp
<x-partial.layout.basic.header :html-attributes="$htmlAttributes"/>
<x-partial.layout.basic.body :body-attributes="$bodyAttributes"/>
<x-partial.layout.basic.footer />
