<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 8:34 PM
 */

include 'models/config.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>
<body>
<?php
if (isset($_COOKIE['lesson_7'])) {
    session_set_cookie_params(0, '/lesson_7/homework/', 'www.php_lvl_1.local');
    session_name('lesson_7');
    session_start(); ?>
    <h1>Добрый день <?= $_SESSION['username'] ?></h1>
    <p><a href="profile.php">Профиль</a></p>
    <p><a href="basket.php">Корзина</a></p>
    <p><a href="logout.php">Выход</a></p>
    <?php
    try {
        $dbh = new PDO($dsn, $dbUser, $dbPassword);
        foreach ($dbh->query("SELECT `id`, `name`, `price` FROM `products`") as $item) { ?>
            <a href="product.php?id=<?= $item['id'] ?>"><p><?= $item['name'] ?></p></a><p><?= $item['price'] ?></p>
        <?php }
        $dbh = null;
    } catch (PDOException $exception) {
        echo 'Ошибка подключения' . $exception->getMessage();
        die();
    }
} else try { ?>
    <h1>Войдите или зарегистрируйтесь!</h1>
    <p><a href="login.php">Вход</a></p>
    <p><a href="registration.php">Регистрация</a></p>
    <?php
    $dbh = new PDO($dsn, $dbUser, $dbPassword);
    foreach ($dbh->query("SELECT `id`, `name`, `price` FROM `products`") as $item) { ?>
        <p><?= $item['name'] ?></p><p><?= $item['price'] ?></p>
    <?php }
    $dbh = null;
} catch (PDOException $exception) {
    echo 'Ошибка подключения' . $exception->getMessage();
    die();
}
?>
</body>
</html>
