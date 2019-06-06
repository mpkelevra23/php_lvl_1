<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/29/18
 * Time: 10:48 AM
 */

if (isset($_COOKIE['lesson_7'])) {
    session_set_cookie_params(0, '/lesson_7/homework/', 'www.php_lvl_1.local');
    session_name('lesson_7');
    session_start();
} else header('Location: index.php');
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
include 'models/config.php';
try {
    $id = $_SESSION['id'];
    $dbh = new PDO($dsn, $dbUser, $dbPassword);
    $query = $dbh->query("SELECT `username`, `mail`, `last_action` FROM `users` WHERE `id` = $id")->fetch(PDO::FETCH_ASSOC);
    ?>
    <p>Имя пользователя: <?= $query['username'] ?></p>
    <p>Почта: <?= $query['mail'] ?></p>
    <p>Дата регистрации: <?= $query['last_action'] ?></p>
    <p><a href="update.php">Редактировать</a></p>
    <?php
} catch (PDOException $exception) {
    echo 'Ошибка подключения ' . $exception->getMessage();
}

?>
</body>
</html>
