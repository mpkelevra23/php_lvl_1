<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 5:04 PM
 */
include 'models/config.php';

//$pass = password_hash("VFRCBV", PASSWORD_DEFAULT);

//$hash = password_hash("VFRCBV", PASSWORD_BCRYPT);
//
//echo $hash;
//
//if (password_verify('VFRCBV', $hash)) {
//    echo 'Пароль правильный!';
//} else {
//    echo 'Пароль неправильный.';
//}

//$timeTarget = 0.05; // 50 миллисекунд.
//
//$cost = 8;
//do {
//    $cost++;
//    $start = microtime(true);
//    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
//    $end = microtime(true);
//} while (($end - $start) < $timeTarget);
//
//echo "Оптимальная стоимость: " . $cost;

//try {
//    $dbh = new PDO($dsn, $dbUser, $dbPassword);
//    foreach ($dbh->query('SELECT `mail` FROM `users`')->fetchAll(PDO::FETCH_ASSOC) as $item) {
//        if ($item['mail'] !== $mail) {
//
//        }
//    }
//    $dbh = null;
//} catch (PDOException $e) {
//    print "Error!: " . $e->getMessage() . "<br/>";
//    die();
//}

//var_dump(strip_tags($_POST['mail']));

//try {
//    $dbh = new PDO($dsn, $dbUser, $dbPassword);
//    $query = $dbh->query("SELECT `mail` FROM `users` WHERE `mail` = '$mail'")->fetch(PDO::FETCH_ASSOC);
//} catch (PDOException $e) {
//    print "Error!: " . $e->getMessage() . "<br/>";
//    die();
//}

var_dump($_COOKIE);

echo "<hr>";

var_dump($_SESSION);

echo "<hr>";

if (isset($_COOKIE['PHPSESSID'])) {
    header('Location: index.php');
}

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
        if ($query['mail'] !== $mail) {
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
    <p><input type="submit" value="Войти" name="send"></p>
</form>
</body>
</html>