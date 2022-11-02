<?php
# データベースの値を取得する
require_once('config.php');
$pdo = new PDO(DSN, DB_USER, DB_PASS);
    
# jobsのデータを取得
$sql = '';
$sql .= ' SELECT ';
$sql .= ' * ';
$sql .= ' FROM ';
$sql .= ' zw_category ';
$resultCategory = $pdo->query($sql);



?>
<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
<header>
    <style>
        body{
            text-align: left;
        }
    </style>
</header>
<h1 style="text-align:center">投稿</h1>
<body>
<div style="width:500px; padding:10px; border:1px solid black;">
    <form action="item_upload.php" method="post">
        <input type="radio" value="0" name = "status">&nbsp;売り&nbsp;&nbsp;
        <input type="radio" value="1"name = "status">&nbsp;買い&nbsp;
        <p>商品名：<input type="text" name="item_name" placeholder="商品名"></p><br>
        商品分類：
        <select name = "category">
        <?php while($row = $resultCategory->fetch(PDO::FETCH_ASSOC)):?>
            <option name = "category" value="<?= $row['category_id'];?>"><?= $row['category_name'];?></option>
        <?php endwhile; ?>
        </select>
        <br>
        <p>価格: <input type="text" size="8" name="price">円</p><br>
        <p>商品詳細 <br><textarea name="detail" id="" cols="30" rows="10"></textarea></p>
        <input type="file" name="picture" id="fileToUpload"><br>
        <label for="picture">写真をアップしてください。</label><br><br>
        <button type="submit">投稿</button>
            
    </form>
</div>
</body>
</html>