create table if not exists zw_job(
    id int(1) not null auto_increment unique,-- ユニークキー
    name varchar(255) not null
);

-- 職業挿入
insert into zw_job(name)
values
('学生'), 
('会社員'), 
('自営業'), 
('公務員'), 
('アルバイト'), 
('その他');