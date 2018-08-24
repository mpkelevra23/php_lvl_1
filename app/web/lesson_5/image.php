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
    $mysqli = new mysqli($host, $dbUser, $dbPass, $dbName);
    if (mysqli_connect_errno()) {
        printf("Соединение не удалось: %s\n", mysqli_connect_error());
        exit();
    }
    if (($result = $mysqli->query("SELECT `adress`, `view_count` FROM `pictures` WHERE `id` = $id"))
        && ($mysqli->query("UPDATE `pictures` SET `view_count` = `view_count` + 1 WHERE `id` = $id"))) {
        $row = $result->fetch_assoc();
        echo "<img src =" . $row['adress'] . ">";
        echo "<p> Количество просмотров " . $row['view_count'] . "</p>";
        $mysqli->close();
    }
    ?>
</div>
</body>
</html>