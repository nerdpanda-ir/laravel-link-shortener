@php
    $htmlAttributes = \ComponentAttributeBagFactoryProxyFacade::create($htmlAttributes??null);
    $bodyAttributes = \ComponentAttributeBagFactoryProxyFacade::create($bodyAttributes??null);
    $charset = $charset ?? 'UTF-8';
@endphp
<x-partial.layout.basic.header :html-attributes="$htmlAttributes" :charset="$charset"/>
<x-partial.layout.basic.body :body-attributes="$bodyAttributes"/>
<x-partial.layout.basic.footer />
