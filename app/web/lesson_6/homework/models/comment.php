<?php
include "config.php";
$text = (string)htmlspecialchars(strip_tags($_POST['message']));
$photo = (int)$_POST['photo'];
$created_at = date("Y-m-d H:i:s");

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query("INSERT INTO `comments` (`pictures_id`, `text`, `created_at`) VALUES ($photo, '$text', '$created_at')");
    foreach ($dbh->query("SELECT `text`, `created_at` FROM `comments` WHERE `pictures_id` = $photo ORDER BY `created_at` DESC") as $row) {
        echo "<p>" . $row['text'] . "</p>" . "<p>Дата добавления " . $row['created_at'] . "</p>" . "<br>";
    }
    $dbh = null;
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}
