<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/26/18
 * Time: 8:52 PM
 */

include 'models/config.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basket</title>
</head>
<body>

<a href="index.php">Главная</a>

<?php

session_start();

var_dump($_SESSION);

echo '<hr>';

var_dump($_COOKIE);

if (isset($_COOKIE['PHPSESSID'])) {
    try {
        $id = $_SESSION['id'];
        $dbn = new PDO($dsn, $dbUser, $dbPassword);
        foreach ($dbn->query("SELECT `products`.`name`, `products`.`price`, `count` FROM `order` INNER JOIN `users` ON `order`.`user_id` = `users`.`id` INNER JOIN `products` ON `order`.`product_id` = `products`.`id` WHERE `users`.`id` = $id")->fetchAll(PDO::FETCH_ASSOC) as $item) {
            echo '<p>Наименование товара ' . $item['name'] . '</p>' . '<p>Количество ' . $item['count'] . '</p>' . '<p>Сумма ' . $item['price'] * $item['count'] . '</p>';
        }
        $sum = $dbn->query("SELECT sum(`products`.`price` * `count`) AS `sum` FROM `order` INNER JOIN `users` ON `order`.`user_id` = `users`.`id` INNER JOIN `products` ON `order`.`product_id` = `products`.`id` WHERE `users`.`id` = $id")->fetch(PDO::FETCH_ASSOC);
        echo '<p>Общая сумма: ' . $sum['sum'] . '</p>';
        $dbn = null;
    } catch (PDOException $exception) {
        echo 'Ошибка подключения ' . $exception;
    }
} else header('Location: index.php');

?>
</body>
</html>
