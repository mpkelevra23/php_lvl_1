<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/29/18
 * Time: 8:33 PM
 */

if (isset($_COOKIE['lesson_7'])) {
    session_set_cookie_params(0, '/lesson_7/homework/', 'www.php_lvl_1.local');
    session_name('lesson_7');
    session_start();
} else header('Location: index.php');

include 'models/config.php';

try {
    $id = $_SESSION['id'];
    $dbh = new PDO($dsn, $dbUser, $dbPassword);
    $query = $dbh->query("SELECT `username`, `mail`, `last_action` FROM `users` WHERE `id` = $id")->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
} catch (PDOException $exception) {
    echo 'Ошибка подключения ' . $exception->getMessage();
}


if (isset($_SESSION['id']) && isset($_POST['send'])) {
    $username = $_POST['username'];
    $mail = $_POST['mail'];
    try {
        $dbh = new PDO($dsn, $dbUser, $dbPassword);
        $name_check = $dbh->query("SELECT 1 FROM `users` WHERE `username` = '$username'")->fetch(PDO::FETCH_ASSOC);
        $mail_check = $dbh->query("SELECT 1 FROM `users` WHERE `mail` = '$mail'")->fetch(PDO::FETCH_ASSOC);
        if (empty($name_check) && empty($mail_check)) {
            $dbh->query("UPDATE `users` SET `username` = '$username', `mail` = '$mail'  WHERE `id` = $id");
            $query['username'] = $username;
            $_SESSION['username'] = $username;
            $query['mail'] = $mail; ?>
            <p>Вы успешно изменили имя и адрес электронной почты</p>
            <?php
        } elseif (!empty($name_check) && empty($mail_check)) { ?>
            <p>Вы успешно изменили адрес электронной почты</p>
            <p>Имя <?= $username ?> уже занято</p>
            <?php
            $dbh->query("UPDATE `users` SET `mail` = '$mail'  WHERE `id` = $id");
            $query['mail'] = $mail;
        } elseif (empty($name_check) && !empty($mail_check)) { ?>
            <p>Вы успешно изменили имя</p>
            <p>Почта <?= $mail ?> уже зарегистрирована</p>
            <?php
            $dbh->query("UPDATE `users` SET `username` = '$username'  WHERE `id` = $id");
            $_SESSION['username'] = $username;
            $query['username'] = $username;
        } else { ?>
            <p>Имя <?= $username ?> уже занято</p>
            <p>Почта <?= $mail ?> уже зарегистрирована</p>
            <?php
        }
    } catch
    (PDOException $exception) {
        echo 'Ошибка подключения ' . $exception->getMessage();
    }
    $dbh = null;
}
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
<form enctype="multipart/form-data" method="post" action="">
    <p>Имя</p>
    <input type="text" size="40" name="username" value="<?= $query['username'] ?>">
    <p>Почта</p>
    <input type="text" size="40" name="mail" value="<?= $query['mail'] ?>">
    <p><input type="submit" value="Отправить" name="send"></p>
</form>
<a href="profile.php">Профиль</a>
</body>
</html>
