<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/29/18
 * Time: 10:28 AM
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

if (isset($_POST['send']) and isset($_COOKIE['PHPSESSID'])) {
    $user_id = $_POST['user'];
    $product_id = $_POST['product'];
    try {
        $dbn = new PDO($dsn, $dbUser, $dbPassword);
        $dbn->query("DELETE FROM `order` WHERE `user_id` = $user_id AND `product_id` = $product_id");
        $dbn = null;
        header('Location: basket.php');
    } catch (PDOException $exception) {
        echo 'Ошибка подключения ' . $exception->getMessage();
    }
}
