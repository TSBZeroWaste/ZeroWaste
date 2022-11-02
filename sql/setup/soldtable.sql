drop table if exists sold;
create table sold(
    'sold_id' int(11) not null auto_increment,
    'sold_kj' varchar(255) not null,
    'sold_kn' varchar(255) not null,
    'sold_cd' varchar(255) null,
    'deleted_ku' varchar(1) not null default '0' comment '0: 正常; 1:削除済み',
    'insert_time' datetime() not null default current_datestamp(),
    'updapte_time' datetime() not null default current_datestamp(),
    primary key ('sold_id')
);