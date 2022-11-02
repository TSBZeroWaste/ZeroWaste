<?php
# データベースの値を取得する
require_once('config.php');
$pdo = new PDO(DSN, DB_USER, DB_PASS);
    
# jobsのデータを取得
$sql = '';
$sql .= ' SELECT ';
$sql .= ' * ';
$sql .= ' FROM ';
$sql .= ' zw_jobs ';
$resultJobs = $pdo->query($sql);



?>


<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
<h1 style="text-align:center">初めての方は登録</h1>
<div style="text-align:center;margin-bottom: 100px;">
<form action="sign.php" method="post" >
    <p>ニックネーム：<input type="text" name="name" placeholder="ニックネーム"></p><br>
    <p>メールアドレス：<input type="email" name="email" placeholder="メールアドレス"></p><br>
    <p>パスワード：<input  type="password" name="password" placeholder="パスワード"></p><br><br>
性別：
<input type="radio" value="1" name = "gender">&nbsp;男性&nbsp;&nbsp;
<input type="radio" value="2"name = "gender">&nbsp;女性&nbsp;
<input type="radio" value="3" name = "gender">&nbsp;その他<br>
職業：
<select name = "job">
<?php while($row = $resultJobs->fetch(PDO::FETCH_ASSOC)):?>
    <option name = "job" value="<?= $row['id'];?>"><?= $row['name'];?></option>
<?php endwhile; ?>
</select>
<br>

     <button type="submit">新規登録する</button>
     <p style="text-align:center;">※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>
</form>
<a href="login.html";style="text-align:center">すでにアカウントを持ち方はこちら</a>
</div>
</html>