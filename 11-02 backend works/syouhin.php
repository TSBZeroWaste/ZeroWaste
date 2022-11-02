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
<h1 style="text-align:center">投稿</h1>
<div style="text-align:center;margin-bottom: 100px;">
<form action="sign.php" method="post" >
    <input type="radio" value="1" name = "status">&nbsp;買う&nbsp;&nbsp;
    <input type="radio" value="2"name = "status">&nbsp;売る&nbsp;
        <p>商品名：<input type="text" name="item_name" placeholder="商品名"></p><br>
    商品分類：
    <select name = "category">
    <?php while($row = $resultCategory->fetch(PDO::FETCH_ASSOC)):?>
        <option name = "category" value="<?= $row['category_id'];?>"><?= $row['category_name'];?></option>
    <?php endwhile; ?>
    </select>
    <br>

        <button type="submit">新規登録する</button>
        <p style="text-align:center;">※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>
</form>
<a href="login.html";style="text-align:center">すでにアカウントを持ち方はこちら</a>
</div>
</html>