create table if not exists zw_want(
    id int(11) not null auto_increment unique,
    kj varchar(255) not null,
    kn varchar(255) not null,
    cd varchar(255),
    delete_ku varchar(1) not null default '0',-- 削除区分(0:正常データ, 1:削除済み)
    insert_time datetime not null default current_timestamp(),-- 登録日時
    update_time datetime not null default current_timestamp()-- 更新日時
);