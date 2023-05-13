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
    'crud' => [
        'create'=> [
            'ok'=> 'successfully created :item !!!' ,
            'fail' => 'in the :date when create :item something happened in system ، please try after for create this and report this message to admin or developer or help and support !!!' ,
        ],
        'update' => [
            'ok' => 'successfully updated :item !!!' ,
            'fail' => 'in the :date when update :item something happened in system ، please try after for update this and report this message to admin or developer or help and support !!!' ,
        ],
        'delete'=> [
            'ok' => 'successfully deleted :item !!!' ,
            'fail' => 'in the :date when delete :item something happened in system ، please try after for delete this and report this message to admin or developer or help and support !!!',
        ]
    ],
    'not-found'=> [
        'permission' => 'not found :permission permission in system !!!'
    ],
];
