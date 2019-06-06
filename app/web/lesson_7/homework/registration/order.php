<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/18/18
 * Time: 10:46 AM
 */

if (isset($_COOKIE['lesson_7'])) {
    session_set_cookie_params(0, '/lesson_7/homework/', 'www.php_lvl_1.local');
    session_name('lesson_7');
    session_start();
} else header('Location: index.php');

include 'models/config.php';

if ((isset($_POST['send'])) && (isset($_POST['product']))) {
    $productId = (int)$_POST['product'];
    $userId = $_SESSION['id'];
    $count = (int)$_POST['count'];
    $addedAt = date("Y-m-d H:i:s");
    try {
        $dbh = new PDO ($dsn, $dbUser, $dbPassword);
        $dbh->query("INSERT INTO `order` (`product_id`, `user_id`, `count`, `added_at`) VALUES ('$productId', '$userId', '$count', '$addedAt')");
        $dbh = null;
        header('Location: index.php');
    } catch (PDOException $exception) {
        echo 'Ошибка подключения ' . $exception->getMessage();
        die();
    }
}
