<?php

require_once('config.php');
$pdo = new PDO(DSN, DB_USER, DB_PASS);

session_start();
#データを取得
$owner_id = $_SESSION['id'];
$status = $_POST['status'];     #status 0:売り 1:買い
$item_name = $_POST['item_name']; #item name
$category = $_POST['category']; 
$price = $_POST['price'];
$detail = $_POST['detail'];
$picture = $_POST['picture'];

                   

# test_user_02にデータを入れる
$sql = "";
$sql .= " INSERT INTO zw_items( ";
$sql .= " status_ku, ";
$sql .= " item_name, ";
$sql .= " category, ";
$sql .= " picture, ";
$sql .= " price, ";
$sql .= " detail, ";
$sql .= " owner_id, ";
$sql .= " delete_ku, ";
$sql .= " insert_time";
$sql .= " ) values (";
$sql .= " $status, ";
$sql .= " '$item_name', ";
$sql .= " $category, ";
$sql .= " '$picture', ";
$sql .= " $price, ";
$sql .= " '$detail', ";
$sql .= " $owner_id, ";
$sql .= " '0', ";
$sql .= " now() ";
$sql .= " ) ";
$sql .= ";";

echo $sql;

$pdo->query($sql);

//元のページにリダイレクトすること
//header('Location: index.php');