<?php
return [
    'log' => [
        'request' => 'Request Start' ,
        'response' => 'Delivered Response To User' ,
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
        'store' => [
            'permission'=> [
                'ok' => 'successfully created permission with id -> :id and name -> :name ' ,
            ]
        ] ,
        'update' => [
            'permission' => [
                'fail' => 'fail to update Permission with id -> :id and name -> :name !!! ' ,
                'ok' => 'successfully updated permission with id -> :id and name -> :name  to :newName !!! '
            ]
        ] ,
        'delete'=> [
            'permission' => [
                'ok'=>'permission with id => :id successfully deleted !!!' ,
            ]
        ]
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
    'store'=> [
        'permission' => [
            'success' => 'successfully created :permission permission in system !!! ' ,
            'fail' => 'create :permission permission is fail please try after !!!'
        ]
    ] ,
    'edit'=> [
    ],
    'update'=>[
        'permission' => [
            'success' => 'successfully updated :permission Permission !!!' ,
            'fail' => 'fail to update :permission Permission !!! '
        ]
    ] ,
    'delete' => [
        'permission' => [
            'ok' => 'successfully deleted :name permission !!!' ,
            'fail'=> 'permission :name no deleted !!!'
        ]
    ],
    'not-found'=> [
        'permission' => 'not found :permission permission in system !!!'
    ],
];
