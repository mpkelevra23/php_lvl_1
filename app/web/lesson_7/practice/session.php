<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 3:34 PM
 */
// page1.php

session_start();

echo 'Добро пожаловать на страницу 1';

$_SESSION['favcolor'] = 'green';
$_SESSION['animal'] = 'cat';
$_SESSION['time'] = time();

// Работает, если сессионная cookie принята
echo '<br /><a href="session2.php">Проверить данные сессии</a>';

// Или можно передать идентификатор сессии, если нужно
echo '<br /><a href="session2.php?' . SID . '">Проверить данные сессии</a>';

// Устанавливаем срок действия cookie одному дню.
session_start([
    'cookie_lifetime' => 86400,
]);

// Если мы знаем, что в сессии не надо ничего изменять,
// мы можем просто прочитать ее переменные и сразу закрыть,
// чтобы не блокировать файл сессии, который может понадобиться другим сессиям
session_start([
    'cookie_lifetime' => 86400,
    'read_and_close' => true,
]);

echo '<br>' . 'id сессии = ' . session_id();
?>

<br>
<a href="index.php">INDEX</a>
