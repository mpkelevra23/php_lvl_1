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
        $dbh->query("UPDATE `pictures` SET `view_count` = `view_count` + 1 WHERE `id` = $id");
        foreach ($dbh->query("SELECT `adress`, `view_count` FROM `pictures` WHERE `id` = $id") as $row) {
            echo "<img src =" . $row['adress'] . ">" . "<p> Количество просмотров " . $row['view_count'] . "</p>";
        }
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }
    ?>
</div>
</body>
</html>