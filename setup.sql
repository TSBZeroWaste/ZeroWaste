create table if not exists zw_zerowaste(
    id int not null auto_increment primary key,
    name varchar(255),
    email varchar(255),
    password varchar(255),
    gender int(1),
    job int(1),
    age int,
    created timestamp not null default current_timestamp
);

create table if not exists zw_jobs(
    id int(11) not null auto_increment primary key,
    name varchar(255)
);

insert into zw_jobs(
    id,
    name
) values (
    1,
    '学生'
);
insert into zw_jobs(
    id,
    name
) values (
    2,
    '会社員'
);