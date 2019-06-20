<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 11/26/18
 * Time: 12:03 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Работа с файлами</title>
</head>
<body>
<a href="index.php"> Вернуться на главную</a>
<div>
    <?php
    include "models/config.php";
    $id = $_GET['photo'];

    session_set_cookie_params(0, '/lesson_6/store/', 'www.php_lvl_1.local');
    session_name('lesson_6_store');
    session_start();

    if (isset($_SESSION['message'])) {
        echo '<h1>' . $_SESSION['message'] . '</h1>';fdfg
        session_unset();
    }

    try {
        $dbh = new PDO($dsn, $user, $password);
        foreach ($dbh->query("SELECT `headline`, `address`, `description`, `price` FROM `goods` INNER JOIN  `pictures` ON `goods`.`id` = `pictures`.`goods_id` WHERE `goods`.`id` = $id") as $row) {
            echo "<p>" . $row['headline'] . "</p>" . "<img src= " . $row['address'] . ">" . "<p>" . $row['description'] . "</p>" . "<p>" . $row['price'] . "</p>";
        }
        $dbh = null;
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }
    ?>
    <a href="update.php?good=<?= $id ?>">Обновить</a>
    <a href="models/delete.php?good=<?= $id ?>">Удалить</a>
</div>
</body>
</html>