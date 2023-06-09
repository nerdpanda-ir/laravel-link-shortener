<?php
return [
    'request_start' => 'Request Start' ,
    'response_delivered' => 'Delivered Response To User' ,
    'validations' => 'has exception in :rule ' ,
    'crud' => [
        'save' => [
            'ok'=> 'successfully created' ,
            'throw_exception' => 'has exception when create :item ' ,
            'fail' => 'fail to create :item ' ,
        ] ,
        'edit' => [
            'throw_exception' => 'has exception when edit :item' ,
        ],
        'updated' => [
            'ok'=>'successfully updated' ,
            'throw_exception' => 'has exception when update :item ' ,
            'fail' => 'fail to update :item ' ,
        ],
        'delete' => [
            'ok'=> 'successfully deleted' ,
            'throw_exception' => 'has exception when delete :item ' ,
            'fail' => 'fail to delete :item ' ,
        ],
        'view_all' => [
            'throw_exception' => 'has exception when select :item' ,
        ],
        'create'=> [
            'throw_exception' => 'has exception when create :item' ,
        ] ,
        'show'=> [
            'throw_exception' => 'has exception when show :item' ,
        ]
    ],
    'register'=> [
        'fail' => 'user registration is fail !!! ' ,
        'throw_exception' => 'has exception when register user ' ,
    ]
];
