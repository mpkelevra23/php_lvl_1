<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 3:46 PM
 */
session_set_cookie_params(0, '/lesson_7/practice/', 'www.php_lvl_1.local');
session_name('lesson_7_practice');
session_start();

echo '<p>Добро пожаловать на страницу 2</p>';

echo '<p>' . $_SESSION['favcolor'] . '</p>';
echo '<p>' . $_SESSION['animal'] . '</p>';
echo '<p>' . date('Y m d H:i:s', $_SESSION['time']) . '</p>';

var_dump($_SESSION);

// Можете тут использовать идентификатор сессии, как в session.php
echo '<a href="session.php"><p>Вернуться назад</p></a>';
echo '<a href="session3.php"><p>Удалить данные сессии</p></a>';
?>
<a href="index.php"><p>Главная</p></a>
