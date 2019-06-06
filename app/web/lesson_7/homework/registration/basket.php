<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/26/18
 * Time: 8:52 PM
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
    <title>Basket</title>
</head>
<body>
<a href="index.php">Главная</a>
<?php
include 'models/config.php';
try {
    $id = $_SESSION['id'];
    $dbh = new PDO($dsn, $dbUser, $dbPassword);
    $query = $dbh->query("SELECT `user_id`, `product_id`, `products`.`name`, `products`.`price`, `count` FROM `order` INNER JOIN `users` ON `order`.`user_id` = `users`.`id` INNER JOIN `products` ON `order`.`product_id` = `products`.`id` WHERE `users`.`id` = $id")->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($query)) {
        foreach ($query as $item) { ?>
            <p>Наименование товара <?= $item['name'] ?> </p>
            <p>Количество <?= $item['count'] ?></p>
            <p>Сумма <?= $item['price'] * $item['count'] ?></p>
            <form method="post" action="delete.php">
                <input type="hidden" value="<?= $item['product_id'] ?>" name="product_id">
                <input type="submit" value="Удалить" name="send">
            </form>
            <?php
        }
        $sum = $dbh->query("SELECT sum(`products`.`price` * `count`) AS `sum` FROM `order` INNER JOIN `users` ON `order`.`user_id` = `users`.`id` INNER JOIN `products` ON `order`.`product_id` = `products`.`id` WHERE `users`.`id` = $id")->fetch(PDO::FETCH_ASSOC);
        echo '<p>Общая сумма: ' . $sum['sum'] . '</p>';
        $dbh = null;
    } else echo '<p>Корзина пуста</p>';
    $dbh = null;
} catch (PDOException $exception) {
    echo 'Ошибка подключения ' . $exception->getMessage();
}
?>
</body>
</html>
