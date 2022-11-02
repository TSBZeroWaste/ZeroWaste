<!DOCTYPE html>
<html lang="jp">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="CSS/login.css">
   <title>ログイン</title>
</head>

<body>
   <div class="header" id="header"><?php include("header.php") ?></div>
   <!-- ログイン -->
   <div class="login">
      <h1>ログイン</h1>
      <form action="login.php" method="post">
         <!-- メールアドレス -->
         <div class="login_email mb20">
            <label class="block">メールアドレス</label>
            <input type="email" name="email" placeholder="" max=30>
         </div>
         <!-- パスポート -->
         <div class="login_password mb20">
            <label class="block">パスワード</label>
            <input type="password" name="password" placeholder="">
         </div>
         <div class="btn">
            <!-- アカウントを作る -->
            <a href="signup.php">Create</a>
            <!-- 完成ボタン -->
            <button type="submit">ログイン</button>
         </div>
      </form>
   </div>
</body>

</html>