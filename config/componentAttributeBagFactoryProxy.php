<?php
    use App\Contracts\ComponentAttributeBagFactoryProxyContract;
    use App\Services\ComponentAttributeBagFactoryProxy;
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
