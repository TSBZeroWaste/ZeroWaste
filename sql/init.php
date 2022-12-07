<?php
require_once(__DIR__.'/Setup.php');

$pass = $_POST['pass'];
$db_num = $_POST['db_num'];

$setup = Setup();

switch ($db_num) {
    case 0:
        $setup->connectToRemote();
        $setup->initDB();
        break;
    case 1:
        $setup->connectToLocal();
        $setup->initDB();
        break;
    default:
        echo "<h2>無効な値が入力されました＾＾</h2>";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>DB初期化画面</title>
</head>
<body>
    <form action="init.php" method="post">
    <p><input type="text" name="pass"></p>
    <p><input type="text" name="db_num"></p>
    <input type="submit" value="削除実行">
    </form>
</body>
</html>
