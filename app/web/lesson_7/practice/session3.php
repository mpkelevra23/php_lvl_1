<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 4:21 PM
 */

session_start();

unset($_SESSION['favcolor']);
unset($_SESSION['animal']);
unset($_SESSION['time']);

session_destroy();

echo "Данные сессии и сессия удалены" . var_dump($_SESSION);
?>

<br>
<a href="index.php">INDEX</a>
