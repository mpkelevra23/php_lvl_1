<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 11/21/18
 * Time: 9:07 PM
 */

$dsn = 'mysql:dbname=geekbrains;host=localhost;charset=utf8';
$user = 'admin';
$password = '123456';

try {
    $dbh = new PDO($dsn, $user, $password);
    foreach ($dbh->query('SELECT `*` FROM `employee`') as $row) {
        print_r($row['first_name'] . "\n");
    }
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}