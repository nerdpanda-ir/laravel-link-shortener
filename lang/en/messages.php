<?php
return [
    'log' => [
        'request' => 'Request Start' ,
        'response' => 'Delivered Response To User' ,
        'auth' => [
            'start' => 'user start authentication' ,
            'fail' => 'user authentication is fail' ,
            'success' => 'user successfully authenticated' ,
            'exceptionHappen' => 'when user logged in we have exception in application'
        ]
    ],
    'auth'=> [
        'success' => 'welcome :name your successfully logged in ' ,
        'fail' => 'email or password wrong' ,
        'exceptionHappen' => 'something happened please try after or contact to help and support '
    ]
];
