<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 1:23 PM
 */

session_start();

echo 'Данные COOKIE';
print_r($_COOKIE);

echo '<hr>';

echo 'Данные SESSION';
print_r($_SESSION);
?>

<br>
<a href="session.php">SESSION</a>
<br>
<a href="cookie.php">COOKIE</a>
