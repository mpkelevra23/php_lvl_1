<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 8:34 PM
 */

include 'models/config.php';

var_dump($_COOKIE);

echo "<hr>";

var_dump($_SESSION);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>
<body>

<?php


if (isset($_COOKIE['PHPSESSID'])) {
    session_start();
    echo "<h1>Добрый день " . $_SESSION['username'] . "! Вы на главное странице!</h1>
    <p><a href='basket.php'>Корзина</a></p>
    <p><a href=\"logout.php\">Выход</a></p>";
    try {
        $dbn = new PDO($dsn, $dbUser, $dbPassword);
        foreach ($dbn->query("SELECT `id`, `name`, `price` FROM `products`") as $item) {
            echo "<p>" . $item['name'] . "</p> " . "<p>" . $item['price'] . "</p>" .
                "<form action=\"order.php\" method=\"post\">
                    <input type=\"hidden\" name=\"product\" value=" . $item['id'] . ">
                    <input type=\"submit\" value=\"Добавить\" name=\"send\">
                </form>";
        }
        $dbn = null;
    } catch (PDOException $exception) {
        echo 'Ошибка подключения' . $exception->getMessage();
        die();
    }
} else try {
    $dbn = new PDO($dsn, $dbUser, $dbPassword);
    foreach ($dbn->query("SELECT `id`, `name`, `price` FROM `products`") as $item) {
        echo "<p>" . $item['name'] . "</p> " . "<p>" . $item['price'] . "</p> ";
    }
    echo "<h1>Войдите или зарегистрируйтесь!</h1>
<p><a href=\"login.php\">Вход</a></p>
<p><a href=\"registration.php\">Регистрация</a></p>";
    $dbn = null;
} catch (PDOException $exception) {
    echo 'Ошибка подключения' . $exception->getMessage();
    die();
}

var_dump($_COOKIE);

echo "<hr>";

var_dump($_SESSION);

echo "<hr>";
?>
</body>
</html>
