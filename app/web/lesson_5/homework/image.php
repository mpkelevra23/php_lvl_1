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
        $query = $dbh->query("SELECT address, `view_count` FROM `pictures` WHERE `id` = $id");
        if (($query->rowCount()) > 0) {
            $dbh->query("UPDATE `pictures` SET `view_count` = `view_count` + 1 WHERE `id` = $id");
            foreach ($query as $row) {
                echo "<img src =" . $row['address'] . ">" . "<p> Количество просмотров " . $row['view_count'] . "</p>";
            }
            $dbh = null;
        } else {
            $dbh = null;
            header('Location: index.php');
        }
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }
    ?>
</div>
</body>
</html>