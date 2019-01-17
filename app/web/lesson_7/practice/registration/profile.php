<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/29/18
 * Time: 10:48 AM
 */

include 'models/config.php';

if (!isset($_COOKIE['PHPSESSID'])) {
    header('Location: index.php');
} else session_start();

var_dump($_SESSION);

echo '<hr>';

var_dump($_COOKIE);

echo '<hr>';

var_dump($_POST);

echo '<hr>';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
<a href="index.php">Главная</a>
<?php
if (isset($_COOKIE['PHPSESSID'])) {
    try {
        $id = $_SESSION['id'];
        $dbn = new PDO($dsn, $dbUser, $dbPassword);
        $query = $dbn->query("SELECT `username`, `mail`, `last_action` FROM `users` WHERE `id` = $id")->fetch(PDO::FETCH_ASSOC);
        echo '<p>Имя пользователя: ' . $query['username'] . '</p>' .
            '<p>Почта: ' . $query['mail'] . '</p>' .
            '<p>Дата регистрации: ' . $query['last_action'] . '</p>' .
            '<p><a href="update.php">Редактировать</a></p>';
    } catch (PDOException $exception) {
        echo 'Ошибка подключения ' . $exception->getMessage();
    }
}
?>
</body>
</html>
