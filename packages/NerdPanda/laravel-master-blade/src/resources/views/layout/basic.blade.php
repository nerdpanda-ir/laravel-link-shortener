@php
    $htmlAttributes = \ComponentAttributeBagFactoryProxyFacade::create($htmlAttributes??null);
    $bodyAttributes = \ComponentAttributeBagFactoryProxyFacade::create($bodyAttributes??null);
    $charset = $charset ?? 'UTF-8';
@endphp
<x-MasterBlade::partial.layout.basic.header :html-attributes="$htmlAttributes" :charset="$charset"/>
<x-MasterBlade::partial.layout.basic.body :body-attributes="$bodyAttributes"/>
<x-MasterBlade::partial.layout.basic.footer />
