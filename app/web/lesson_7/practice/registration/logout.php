<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/12/18
 * Time: 2:26 PM
 */

var_dump($_COOKIE);

echo "<hr>";

var_dump($_SESSION);

echo "<hr>";

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    var_dump($params);
    echo "<hr>";

    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    header('Location: index.php');
} else header('Location: index.php');

var_dump($params);

echo "<hr>";

var_dump($_COOKIE);

echo "<hr>";

var_dump($_SESSION);

echo "<hr>";