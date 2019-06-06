<?php
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
    <title>Product</title>
</head>
<body>
<a href="index.php">Главная</a>
<?php
include 'models/config.php';
$id = (int)htmlspecialchars($_GET['id']);
try {
    $dbh = new PDO($dsn, $dbUser, $dbPassword);
    foreach ($dbh->query("SELECT `id`, `name`, `price` FROM `products` WHERE `id` = $id") as $item) { ?>
        <p><?= $item['name'] ?></p>
        <p><?= $item['price'] ?></p>
        <form method="post" action="order.php">
            <input type="hidden" value="<?= $item['id'] ?>" name="product">
            <p>Количество</p>
            <p><input type="number" size="3" name="count" min="1" max="20" value="1"></p>
            <input type="submit" value="Добавить" name="send">
        </form>
        <?php
    }
    $dbh = null;
} catch (PDOException $exception) {
    echo 'Ошибка подключения' . $exception->getMessage();
    die();
}
?>
</body>
</html>