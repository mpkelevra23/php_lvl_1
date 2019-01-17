<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/29/18
 * Time: 8:33 PM
 */

include 'models/config.php';

if (!isset($_COOKIE['PHPSESSID'])) {
    header('Location: index.php');
} else session_start();

var_dump($_SESSION);

echo '<hr>';

var_dump($_COOKIE);

echo '<hr>';

var_dump($_POST);

echo '<hr>';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_COOKIE['PHPSESSID'])) {
    try {
        $id = $_SESSION['id'];
        $dbn = new PDO($dsn, $dbUser, $dbPassword);
        $query = $dbn->query("SELECT `username`, `mail`, `last_action` FROM `users` WHERE `id` = $id")->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $exception) {
        echo 'Ошибка подключения ' . $exception->getMessage();
    }
}
?>

<form enctype="multipart/form-data" method="post" action="models/update.php">
    <p>Имя</p>
    <input type="text" size="40" name="username" value="<?= $query['username'] ?>">
    <p>Почта</p>
    <input type="text" size="40" name="mail" value="<?= $query['mail'] ?>">
    <p><input type="submit" value="Отправить" name="send"></p>
</form>
<a href="profile.php">Назад</a>
</body>
</html>
