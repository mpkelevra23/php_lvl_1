<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/18/18
 * Time: 10:46 AM
 */

include 'models/config.php';

if (!isset($_COOKIE['PHPSESSID'])) {
    header('Location: index.php');
} else session_start();

var_dump($_SESSION);

echo "<hr>";

var_dump($_COOKIE);

echo "<hr>";

var_dump($_POST);


echo "<hr>";

var_dump(isset($_POST['send']));

echo "<hr>";

var_dump(isset($_POST['product']));

echo "<hr>";

var_dump(isset($_COOKIE['PHPSESSID']));


if (isset($_POST['send']) and isset($_POST['product']) and isset($_COOKIE['PHPSESSID'])) {
    $productId = $_POST['product'];
    $userId = $_SESSION['id'];
    $addedAt = date("Y-m-d H:i:s");
    try {
        $dbn = new PDO ($dsn, $dbUser, $dbPassword);
        $dbn->query("INSERT INTO `order` (`product_id`, `user_id`, `added_at`) VALUES ('$productId', '$userId', '$addedAt')");
        $dbn = null;
        header('Location: index.php');
    } catch (PDOException $exception) {
        echo 'Ошибка подключения ' . $exception->getMessage();
        die();
    }
}