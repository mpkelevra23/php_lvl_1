<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 3:46 PM
 */
session_start();

echo 'Добро пожаловать на страницу 2<br />';

echo $_SESSION['favcolor'] . '<br>'; // green
echo $_SESSION['animal'] . '<br>';   // cat
echo date('Y m d H:i:s', $_SESSION['time']) . '<br>';

// Можете тут использовать идентификатор сессии, как в page1.php
echo '<br /><a href="session.php">Установить данные сессии</a>';
echo '<br /><a href="session3.php">Удалить данные сессии</a>';
?>

<br>
<a href="index.php">INDEX</a>
