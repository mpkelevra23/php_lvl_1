<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 8:35 PM
 */

include 'models/config.php';

var_dump($_COOKIE);

echo "<hr>";

var_dump($_SESSION);

echo "<hr>";

var_dump(isset($_POST['rememberme']));

echo "<hr>";

var_dump(session_get_cookie_params());

echo "<hr>";

if (isset($_COOKIE['PHPSESSID'])) {
    header('Location: index.php');
}

if (isset($_POST['send']) and !empty($_POST['mail']) and !empty($_POST['password'])) {
    if (filter_var(strip_tags($_POST['mail']), FILTER_VALIDATE_EMAIL)) {
        $mail = strip_tags($_POST['mail']);
        $password = strip_tags($_POST['password']);
        try {
            $dbn = new PDO($dsn, $dbUser, $dbPassword);
            $query = $dbn->query("SELECT `id`, `username`, `mail`, `password` FROM `users` WHERE `mail` = '$mail'")->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            die();
        }
        if ($query['mail'] == $mail and password_verify($password, $query['password'])) {
            if (isset($_POST['rememberme'])) {
                session_start();
                $_SESSION['username'] = $query['username'];
                $_SESSION['id'] = $query['id'];
                $dbh = null;
                header('Location: index.php');
            }
            session_start([
                'cookie_lifetime' => 86400,
            ]);
            $_SESSION['username'] = $query['username'];
            $_SESSION['id'] = $query['id'];
            $dbh = null;
            header('Location: index.php');

        } else echo "пароль указан не верно";
        $dbh = null;
    } else echo "Введите пароль правильно";
} else echo 'Все поля должны быть заполнены';

var_dump($_COOKIE);

echo "<hr>";

var_dump($_SESSION);

echo "<hr>";

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