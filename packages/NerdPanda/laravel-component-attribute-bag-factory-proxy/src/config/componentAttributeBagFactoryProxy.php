<?php
use NerdPanda\Contracts\ComponentAttributeBagFactoryProxyContract;
use NerdPanda\Services\ComponentAttributeBagFactoryProxy;

?>
<?php
return [
    'contract' =>  ComponentAttributeBagFactoryProxyContract::class,
    'implementer' => [
        'class' => ComponentAttributeBagFactoryProxy::class ,
        'singleton' => true
    ] ,
    'alias' => 'componentAttributeBagFactoryProxy' ,
    'singleton'=> true
];
