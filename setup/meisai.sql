create table if not exists zw_meisai(
    meisai_id int(11) not null auto_increment unique,-- ユニークキー自動採番
    item_id int(11) not null,
    item_name varchar(255),
    price int not null,
    finish int(1) not null,-- 0:完成, 1:交易中, 2:キャンセル
    owner_id int(11) not null,
    buyer_id int(11) not null,
    insert_time datetime not null default current_timestamp(),
    update_time datetime not null default current_timestamp()
);