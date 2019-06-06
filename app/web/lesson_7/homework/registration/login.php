<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 8:35 PM
 */

if (isset($_COOKIE['lesson_7'])) {
    header('Location: index.php');
}

include 'models/config.php';

if (isset($_POST['send']) and !empty($_POST['mail']) and !empty($_POST['password'])) {
    if (filter_var(strip_tags($_POST['mail']), FILTER_VALIDATE_EMAIL)) {
        $mail = strip_tags($_POST['mail']);
        $password = strip_tags($_POST['password']);
        try {
            $dbh = new PDO($dsn, $dbUser, $dbPassword);
            $query = $dbh->query("SELECT `id`, `username`, `mail`, `password` FROM `users` WHERE `mail` = '$mail'")->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            die();
        }
        if (($query['mail'] == $mail) && (password_verify($password, $query['password']))) {
            if (isset($_POST['rememberme'])) {
                session_set_cookie_params(86400, '/lesson_7/homework/', 'www.php_lvl_1.local');
                session_name('lesson_7');
                session_start();
                $_SESSION['username'] = $query['username'];
                $_SESSION['id'] = $query['id'];
                $dbh = null;
                header('Location: index.php');
            } else {
                session_set_cookie_params(0, '/lesson_7/homework/', 'www.php_lvl_1.local');
                session_name('lesson_7');
                session_start();
                $_SESSION['username'] = $query['username'];
                $_SESSION['id'] = $query['id'];
                $dbh = null;
                header('Location: index.php');
            }
        } else echo "Пароль указан не верно";
        $dbh = null;
    } else echo "Введите пароль правильно";
} else echo 'Все поля должны быть заполнены';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<p><a href="index.php">Главная</a></p>
<form action="login.php" method="post">
    <p>Mail</p>
    <p><input type="email" name="mail"></p>
    <p>Password</p>
    <p><input type="password" name="password"></p>
    <p><input type="checkbox" name="rememberme">Запомнить меня</p>
    <p><input type="submit" value="Войти" name="send"></p>
</form>
</body>
</html>