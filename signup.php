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

<head>
  <link rel="stylesheet" href="header/reset.css">
  <link rel="stylesheet" href="header/signup.css">
</head>

<body>
  <div class="header" id="header"><?php include("header.php") ?></div>
  <div class="create">
    <form action="sign.php" method="post">
      <h1>アカウント作成</h1>
      <div class="username ">
        <label for="name">ユーザーネーム：</label>
        <input type="text" id="name" name="name" placeholder="ニックネーム">
      </div>

      <div class="e-mail">
        <label for="email">メールアドレス：</label>
        <input type="email" id="email" name="email" placeholder="メールアドレス">
      </div>

      <div class="password">
        <label for="password">パスポート：</label>
        <input type="password" id="password" name="password" placeholder="パスワード">
        <!-- ※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。 -->
      </div>

      <div class="phone">
        <label for="phone">電話番号：</label>
        <input type="tel" id="password" name="phone" placeholder="電話番号">
      </div>

      <div class="age">
        <label for="age">年齢：</label>
        <input type="number" id="age" name="age" placeholder="年齢" min="0" max="99">
      </div>

      <div class="address">
        <label for="address">住所：</label>
        <input type="text" id="address" name="address" placeholder="住所">
      </div>

      <div class="sex">
        <label for="sex">性別：</label>
        <select class="long" name="sex" id="sex">
          <option>--選択--</option>
          <option value="男性">男性</option>
          <option value="女性">女性</option>
        </select>
      </div>

      <div class="job">
        <label for="job">職業：</label>
        <select class="long" name="job" id="job">
          <option>--選択--</option>
          <?php while ($row = $resultJobs->fetch(PDO::FETCH_ASSOC)) : ?>
            <option name="job" value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="create-btn">
        <a class="outlink" href="login.html">アカウントを持ち方</a>
        <button class='btn' type="submit">新規登録</button>
      </div>
    </form>
  </div>
</body>

</html>