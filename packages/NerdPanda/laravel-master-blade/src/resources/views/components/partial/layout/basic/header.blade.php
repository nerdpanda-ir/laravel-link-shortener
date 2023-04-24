@section('doctype')
<!doctype html>
@show
<html {!! $htmlAttributes?->toHtml() !!}>
<head>
    <x-MasterBlade::partial.layout.basic.header.meta-tags />
    <x-MasterBlade::partial.layout.basic.header.css />
    <x-MasterBlade::partial.layout.basic.header.javascript />

    <title>@section('title') @show</title>
</head>
