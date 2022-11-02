<?php
require_once('config.php');
//データベースへ接続、テーブルがない場合は作成
try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec("create table if not exists zw_zerowaste(
      id int not null auto_increment primary key,
      name varchar(255),
      email varchar(255),
      password varchar(255),
      gender int(1),
      job int(1),
      age int,
      created timestamp not null default current_timestamp
    )");
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
//メールアドレスのバリデーション
if (!$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo '入力された値が不正です。';
  return false;
}
//正規表現でパスワードをバリデーション
if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
} else {
  echo 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください。';
  return false;
}
$name=$_POST['name'];
$gender=$_POST['gender'];
$job=$_POST['job'];
//データベース内のメールアドレスを取得
$stmt = $pdo->prepare("select email from zw_zerowaste where email = ?");
$stmt->execute([$email]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//データベース内のメールアドレスと重複していない場合、登録する。
if (!isset($row['email'])) {
  $stmt = $pdo->prepare("insert into zw_zerowaste(name,email, password,gender,job) value(?,?,?,?,?)");
  $stmt->execute([$name,$email, $password,$gender,$job]);
?>
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="shinjin.css">
<body >
  <main >
    <p>登録完了</p>
  <h1 style="text-align:center" >ログインしてください</h1>
  <form action="login.php" method="post">
    <!--<label for="email" class="label">メールアドレス</label><br>-->
    <input type="email" name="email" placeholder="メールアドレス"><br>
    <!--<label for="password" class="label">パスワード</label><br>-->
    <input type="password" name="password" placeholder="パスワード"><br>
    <button type="submit">ログインする</button>
  </form>


</body>
<?php
}else {
?>
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<body >
  <main>
  <p>既に登録されたメールアドレスです</p>
  <h1 >初めての方はこちら</h1>
  <form action="sign.php" method="post" class="form_log">
    <!--<label for="email" class="label">メールアドレス</label><br>-->
    <input type="email" name="email" placeholder="メールアドレス"><br>
    <!--<label for="password" class="label">パスワード</label><br>-->
    <input type="password" name="password" placeholder="パスワード"><br>
    <button type="submit" class="log_button">新規登録する</button>
    <p>※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>
  </form>
</main>
</body>
<?php
return false;
}
?>