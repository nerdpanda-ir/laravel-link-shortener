<?php
return [
    'dashboard' => [
        'no_result_found' => 'no found any result for display here !!!' ,
        'delete_btn' => 'Delete' , 'edit_btn'=> 'Edit' ,
        'actions'=> [
            'view_all'=> [
                'body_title' => 'view all :Name (total :total )'
            ]
        ],
        'pages'=> [
            'permissions' => [
                'view_all'=> [
                    'body_title'=> "view all permissions (total : :total )" ,
                    'permissions_table' => [
                        'headers' => [
                            'name'=> 'name' , 'users_count' => 'users_count' ,
                            'roles_count' => 'roles_count' , 'creator' => 'creator' ,
                            'created' => 'created' , 'updated'=> 'updated' ,
                            'actions'=> 'actions'
                        ],
                    ]
                ],
            ],
        ],
    ]
];
