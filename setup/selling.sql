create table if not exists zw_selling(
    selling_id int(11) not null auto_increment,
    selling_kj int(255) not null,
    category varchar(2) not null,
    delete_ku varchar(1) not null default '0' comment '0: 正常; 1:削除済み',
    insert_time datetime not null default current_timestamp,
    updapte_time datetime not null default current_timestamp,
    primary key (selling_id)
);