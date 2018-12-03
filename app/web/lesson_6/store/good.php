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
<a href="index.php"> Вернуться в галерею </a>
<div>
    <?php
    include "models/config.php";
    $id = $_GET['photo'];

    try {
        $dbh = new PDO($dsn, $user, $password);
        foreach ($dbh->query("SELECT `headline`, `address`, `description`, `price` FROM `goods` INNER JOIN  `pictures` ON `goods`.`id` = `pictures`.`goods_id` WHERE `goods`.`id` = $id") as $row) {
            echo "<p>" . $row['headline'] . "</p>" . "<img src= " . $row['address'] . ">" . "<p>" . $row['description'] . "</p>" . "<p>" . $row['price'] . "</p>";
        }
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }
    ?>
    <a href="update.php?good=<?= $id ?>">Обновить</a>
    <a href="models/delete.php?good=<?= $id ?>">Удалить</a>
</div>
</body>
</html>