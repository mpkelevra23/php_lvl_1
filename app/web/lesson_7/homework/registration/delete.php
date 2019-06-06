<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/29/18
 * Time: 10:28 AM
 */

if (isset($_COOKIE['lesson_7'])) {
    session_set_cookie_params(0, '/lesson_7/homework/', 'www.php_lvl_1.local');
    session_name('lesson_7');
    session_start();
} else header('Location: index.php');

include 'models/config.php';

if (isset($_POST['send']) && isset($_POST['product_id'])) {
    $user_id = $_SESSION['id'];
    $product_id = $_POST['product_id'];
    try {
        $dbh = new PDO($dsn, $dbUser, $dbPassword);
        $dbh->query("DELETE FROM `order` WHERE `user_id` = $user_id AND `product_id` = $product_id");
        $dbh = null;
        header('Location: basket.php');
    } catch (PDOException $exception) {
        echo 'Ошибка подключения ' . $exception->getMessage();
    }
}
