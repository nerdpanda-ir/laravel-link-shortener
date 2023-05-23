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
                            (null , 'user-view-all'  , 1 , now() , null );
insert into `permission_user` values
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
                                  );
