create table if not exists zw_collection(
    collection_id int(11) not null auto_increment,
    collection_kj int(255) not null,
    category int not null,
    deleted_ku varchar(1) not null comment '0: 正常; 1:削除済み',
    insert_time datetime not null default current_timestamp comment '登録日時',
    update_time datetime not null default current_timestamp comment '更新日時',
    primary key(collection_id)
);