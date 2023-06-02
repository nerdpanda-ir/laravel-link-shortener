delete from `permissions`;
delete from `permission_user`;
insert into permissions values
                            (null , 'permission-view-all'  , 1 , now() , null ) ,
                            (null , 'permission-create'  , 1 , now() , null ) ,
                            (null , 'permission-edit'  , 1 , now() , null ) ,
                            (null , 'permission-delete'  , 1 , now() , null ),
                            (null , 'role-view-all'  , 1 , now() , null ) ,
                            (null , 'role-edit'  , 1 , now() , null ) ,
                            (null , 'role-delete'  , 1 , now() , null ),
                            (null , 'role-create'  , 1 , now() , null ),
                            (null , 'user-view-all'  , 1 , now() , null ) ,
                            (null , 'user-create'  , 1 , now() , null ),
                            (null , 'user-edit'  , 1 , now() , null ),
                            (null , 'user-delete'  , 1 , now() , null ),
                            (null , 'set-password-for-user'  , 1 , now() , null ),
                            (null , 'attach-role-to-user'  , 1 , now() , null ),
                            (null , 'verify-user-email'  , 1 , now() , null );
insert into `permission_role` values
                                  (
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='permission-view-all' ) , 1 , now() , null
                                  ),
                                  (
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='permission-create' ) , 1 , now() , null
                                  ),
                                  (
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='permission-edit' ) , 1 , now() , null
                                  ),
                                  (
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='permission-delete' ) , 1 , now() , null
                                  ),
                                  (
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='role-view-all' ) , 1 , now() , null
                                  ),(
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='role-edit' ) , 1 , now() , null
                                  ),(
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='role-delete' ) , 1 , now() , null
                                  ),(
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='role-create' ) , 1 , now() , null
                                  ),(
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='user-view-all' ) , 1 , now() , null
                                  ),(
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='user-create' ) , 1 , now() , null
                                  ),(
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='user-edit' ) , 1 , now() , null
                                  ),(
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='user-delete' ) , 1 , now() , null
                                  ),(
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='set-password-for-user' ) , 1 , now() , null
                                  ),(
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='attach-role-to-user' ) , 1 , now() , null
                                  ),(
                                      null , 1 , (select `id` from `permissions` where `permissions`.`name`='verify-user-email' ) , 1 , now() , null
                                  );
