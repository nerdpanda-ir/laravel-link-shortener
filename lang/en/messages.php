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
                'success' => 'user successfully logout ' ,
                'exceptionThrow' => 'when user logout some exception is throw'
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
    ]
];
