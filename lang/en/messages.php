<?php
return [
    'log' => [
        'auth' => [
            'login' => [
                'start' => 'user start login action' ,
                'fail' => 'user authentication is fail' ,
                'ok' => 'user successfully authenticated' ,
                'exceptionThrow' => 'when user logged in we have exception in application' ,
            ],
            'logout'=> [
                'start' => 'user start logout action' ,
                'success' => 'user :id successfully logout ' ,
                'exceptionThrow' => 'when user logout some exception is throw'
            ],
        ] ,
        'mails' => [
            'login'=> [
                'start' => 'start sending login mail to user' ,
                'done' => 'sent login mail to user' ,
                'exceptionThrow' => 'has exception when sending login mail to user'
            ]
        ] ,
        'jobs' => [
            'processing' => 'start processing job :name ' ,
            'processed' => 'done processing job :name' ,
            'failed' => 'failed processing job :name',
        ] ,
    ],
    'fail_crud' => 'fail to :action !!!' ,
    'crud' => [
        'save'=> [
            'ok'=> 'successfully created :item !!!' ,
            'fail' => 'fail to create :item !!!' ,
            'throw_exception' => 'in the :date when create :item something happened in system ، please try after for create this and report this message to admin or developer or help and support !!!' ,
        ],
        'edit' => [
            'throw_exception' => 'in the :date when edit :item something happened in system ، please try after for update this and report this message to admin or developer or help and support !!!'
        ],
        'update' => [
            'ok' => 'successfully updated :item !!!' ,
            'fail' => 'fail to update :item !!!' ,
            'throw_exception' => 'in the :date when update :item something happened in system ، please try after for update this and report this message to admin or developer or help and support !!!' ,
        ],
        'delete'=> [
            'ok' => 'successfully deleted :item !!!' ,
            'fail' => 'fail to delete :item !!!' ,
            'throw_exception' => 'in the :date when delete :item something happened in system ، please try after for delete this and report this message to admin or developer or help and support !!!',
        ] ,
        'view_all' => [
            'throw_exception' => 'in the :date when view all :item something happened in system ، please try after for view all this and report this message to admin or developer or help and support !!!'
        ],
        'create'=> [
            'throw_exception' => 'in the :date when create :item something happened in system ، please try after for make this and report this message to admin or developer or help and support !!!'
        ]
    ],
    'not_found' => 'not found any result in system for :item !!!' ,
    'auth'=> [
        'login' => [
            'ok' => 'welcome :name your successfully logged in ' ,
            'fail' => 'email or password wrong' ,
            'exceptionThrow' => 'something happened please try after or contact to help and support '
        ],
        'logout'=> [
            'ok'=> 'dear :name your successfully logout !!!' ,
            'exceptionThrow' => 'your logout process is fail please try after or contact to help and support !!!'
        ]
    ] ,
    'validations'=> [
        'role'=> [
            'array_is_exists_in_table' => ':value permission not found in system !!!'
        ],
        'user' => [
            'array_is_exists_in_table' => ':value role not found in system !!!'
        ]
    ]
];
