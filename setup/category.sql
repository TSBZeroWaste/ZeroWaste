create table if not exists zw_category(
    'category_id' int not null,
    'category_name' varchar(100) not null
    primary key('category_id')
);


insert into category(
    'category_id',
    'category_name'
)values(
    1,
    '服、靴、鞄'
);
insert into category(
    'category_id',
    'category_name'
)values(
    2,
    '電子製品'
);
insert into category(
    'category_id',
    'category_name'
)values(
    3,
    '本'
);
insert into category(
    'category_id',
    'category_name'
)values(
    4,
    '家具'
);
insert into category(
    'category_id',
    'category_name'
)values(
    5,
    'アクセサリー'
);
insert into category(
    'category_id',
    'category_name'
)values(
    6,
    'その他'
);
