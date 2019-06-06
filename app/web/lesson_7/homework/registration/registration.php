<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 5:04 PM
 */

if (isset($_COOKIE['lesson_7'])) {
    header('Location: index.php');
}

include 'models/config.php';

if (isset($_POST['send']) and !empty($_POST['mail'])) {
    if (filter_var(strip_tags($_POST['mail']), FILTER_VALIDATE_EMAIL)) {
        $mail = strip_tags($_POST['mail']);
        try {
            $dbh = new PDO($dsn, $dbUser, $dbPassword);
            $query = $dbh->query("SELECT `mail` FROM `users` WHERE `mail` = '$mail'")->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        if ($query['mail'] != $mail) {
            $password = password_hash(strip_tags($_POST['password']), PASSWORD_BCRYPT);
            $username = strip_tags($_POST['username']);
            $dbh->query("INSERT INTO `users`(`username`, `mail`, `password`) VALUES ('$username', '$mail', '$password')");
            echo 'Вы успешо зарегестрировались';
            $dbh = null;
        } else
            echo $mail . ' Пользователь с таким почтовым адресом уже зарегестрирован';
        $dbh = null;
    } else
        echo 'Не верно указана почта';
    $dbh = null;
} else
    echo 'Все поля должны быть заполнены';
$dbh = null;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
<p><a href="index.php">Главная</a></p>
<form action="registration.php" method="post">
    <p>Username</p>
    <p><input type="text" name="username"></p>
    <p>Mail</p>
    <p><input type="email" name="mail"></p>
    <p>Password</p>
    <p><input type="password" name="password"></p>
    <p><input type="submit" value="Зарегистрироваться" name="send"></p>
</form>
</body>
</html>