<?php

use App\Contracts\ComponentAttributeBagFactoryProxyContract;

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
