<?php
include "config.php";
$text = (string)htmlspecialchars(strip_tags($_POST['message']));
$photo = (int)$_POST['photo'];
$created_at = date("Y-m-d H:i:s");

$mysqli = new mysqli($host, $dbUser, $dbPass, $dbName);

if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}

if (($mysqli->query("INSERT INTO `comments` (`pictures_id`, `text`, `created_at`) VALUES ($photo, '$text', '$created_at')"))
    && $result = $mysqli->query("SELECT `text`, `created_at` FROM `comments` WHERE `pictures_id` = $photo")) {

    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row['text'] . "</p>" . "<p>Дата добавления " . $row['created_at'] . "</p>" . "<br>";
    }

    $mysqli->close();
} else {
    echo 'Ошибка';
}