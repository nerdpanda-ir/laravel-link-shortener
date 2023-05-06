delete from `permissions`;
delete from `permission_user`;
insert into permissions values
(null , 'permission-view-all'  , 1 , now() , null ) ,
(null , 'permission-create'  , 1 , now() , null ) ;
insert into `permission_user` values
(
 null , 1 , (select `id` from `permissions` where `permissions`.`name`='permission-view-all' ) , 1 , now() , null
),
(
 null , 1 , (select `id` from `permissions` where `permissions`.`name`='permission-create' ) , 1 , now() , null
);
