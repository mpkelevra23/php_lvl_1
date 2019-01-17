<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 1/14/19
 * Time: 12:41 PM
 */

include 'config.php';

if (!isset($_COOKIE['PHPSESSID'])) {
    header('Location: index.php');
} else session_start();

var_dump($_POST);

echo '<hr>';

var_dump($_SESSION);

echo '<hr>';

var_dump($_COOKIE);

echo '<hr>';

$username = $_POST['username'];
$mail = $_POST['mail'];

if (isset($_SESSION['id']) and isset($_POST['send'])) {
    try {
        $dbn = new PDO($dsn, $dbUser, $dbPassword);
        $check = $dbn->query("SELECT 1 FROM `users` WHERE `username` = '$username'")->fetch(PDO::FETCH_ASSOC);
        if ($check == false) {
            $id = $_SESSION['id'];
            $query = $dbn->query("SELECT `username`, `mail` FROM `users` WHERE `id` = $id")->fetch(PDO::FETCH_ASSOC);
            if ($query['username'] != $username) {
                $dbn->query("UPDATE `users` SET `username` = '$username' WHERE `id` = $id");
                $_SESSION['username'] = $username;
            }
            if ($query['mail'] != $mail) {
                $dbn->query("UPDATE `users` SET `mail` = $mail WHERE `id` = $id");
                $_SESSION['mail'] = $mail;
            }
            $dbn = null;
            header('Location: ../profile.php');
        } else echo '<p>Имя ' . $username . ' уже занято</p><br>' . '<a href="../update.php">Назад</a>';
        $dbn = null;
    } catch (PDOException $exception) {
        echo 'Ошибка подключения ' . $exception->getMessage();
    }
    $dbn = null;
} else header('Location: ../profile.php');
