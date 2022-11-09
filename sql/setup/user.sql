create table if not exists zw_user(
    id int(11) not null auto_increment unique,-- ユニークキー自動採番
    name varchar(255) not null,
    gender char(1) not null,-- 0:女性, 1:男性, 2:その他
    age int,
    job char(1) not null,-- 0:学生, 1:会社員, 2:自営業, 3:公務員, 4:アルバイト, 5:その他
    number int(11),
    address varchar(255),-- 住所(買うとき必要)
    balance int,-- 残高
    created datetime not null default current_timestamp,-- サインアップ日時
    deleted datetime-- 削除日時
);