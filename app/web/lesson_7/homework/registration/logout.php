<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/12/18
 * Time: 2:26 PM
 */

session_set_cookie_params(0, '/lesson_7/homework/', 'www.php_lvl_1.local');
session_name('lesson_7');
session_start();

// Unset all of the session variables.
$_SESSION = [];

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    // Finally, destroy the session.
    session_destroy();
    header('Location: index.php');
}
