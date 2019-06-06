<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 4:21 PM
 */

session_set_cookie_params(0, '/lesson_7/practice/', 'www.php_lvl_1.local');
session_name('lesson_7_practice');
session_start();

echo '<p>Добро пожаловать на страницу 3</p>';

unset($_SESSION['favcolor']);
unset($_SESSION['animal']);
unset($_SESSION['time']);

session_destroy();

echo '<p>Данные сессии и сессия удалены</p>';

var_dump($_SESSION);
?>
<a href="session.php"><p>Вернуться назад и сново установить значения сессии</p></a>
<a href="index.php"><p>Главная</p></a>
