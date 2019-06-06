<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 3:34 PM
 */
// page1.php

session_set_cookie_params(0, '/lesson_7/practice/', 'www.php_lvl_1.local');
session_name('lesson_7_practice');
session_start();

echo 'Добро пожаловать на страницу 1';

$_SESSION['favcolor'] = 'green';
$_SESSION['animal'] = 'cat';
$_SESSION['time'] = time();

echo '<p>Создана сессия, со следующими значениями записанными в суперглобальной переменной $_SESSION</p>';

echo '<p>' . $_SESSION['favcolor'] . '</p>';
echo '<p>' . $_SESSION['animal'] . '</p>';
echo '<p>' . date('Y m d H:i:s', $_SESSION['time']) . '</p>';

var_dump($_SESSION);

// Работает, если сессионная cookie принята
echo '<a href="session2.php"><p>Проверить данные сессии на другой странице</p></a>';

// Или можно передать идентификатор сессии, если нужно
echo '<a href="session2.php?' . SID . '"><p>Проверить данные сессии, передав идентификатор сессии по URL с помощью SID</p></a>';

echo '<a href="session3.php"><p>Удалить данные сессии</p></a>';

// Устанавливаем срок действия cookie одному дню.
//session_start([
//    'cookie_lifetime' => 86400,
//]);

// Если мы знаем, что в сессии не надо ничего изменять,
// мы можем просто прочитать ее переменные и сразу закрыть,
// чтобы не блокировать файл сессии, который может понадобиться другим сессиям
//session_start([
//    'cookie_lifetime' => 86400,
//    'read_and_close' => true,
//]);

echo '<p>' . 'id сессии = ' . session_id() . '</p>';
?>


<a href="index.php"><p>Главная</p></a>
