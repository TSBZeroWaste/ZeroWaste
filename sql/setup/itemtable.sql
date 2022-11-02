drop table if exists items;
create table items(
    'item_id' int(11) not null auto_increment comment '商品ID',
    'item_name' varchar(255) not null comment '商品名',
    'category' varchar(2) not null comment '01: 服、靴、鞄; 02: 電子製品; 03: 本; 04: 家具; 05: 飾り; 06: その他',
    'picture' varchar(100) not null comment '商品写真',
    'price' int not null comment '価格',
    'detail' varchar(400) not null comment '商品詳細',
    'owner_id' int(11) not null comment '会員ID',
    'delete_ku' varchar(1) not null comment '0: 正常; 1:削除済み',
    'insert_time' datetime() not null default current_datestamp() comment '登録日時' 
    primary key('item_id')
);