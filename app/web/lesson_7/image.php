<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Работа с файлами</title>
    <script src="script/jquery-3.3.1.min.js"></script>
    <script>
        function send() {
            var photo = $("#photo").val();
            var message = $("#message").val();
            var str = "photo=" + photo + "&message=" + message;
            $.ajax({
                type: "POST",
                url: "models/comment.php",
                data: str,
                success: function (msg) {
                    $("#comments").html(msg);
                }
            })
        }
    </script>
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
    <div id="comments">
        <?php
        include "models/config.php";
        $id = $_GET['photo'];
        $mysqli = new mysqli($host, $dbUser, $dbPass, $dbName);
        if (mysqli_connect_errno()) {
            printf("Соединение не удалось: %s\n", mysqli_connect_error());
            exit();
        }
        if ($result = $mysqli->query("SELECT `text`, `created_at` FROM `comments` WHERE `pictures_id` = $id")) {

            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row['text'] . "</p>" . "<p>Дата добавления " . $row['created_at'] . "</p>" . "<br>";
            }
            $mysqli->close();
        }
        ?>
    </div>
    <div>
        <p>Добавить комментарий</p>
        <textarea name="message" id="message" cols="30" rows="10"></textarea><br>
        <button type="button" onclick="send()">Отправить</button>
        <input type="hidden" id="photo" name="photo" value="<?php echo $_GET['photo'] ?>">
    </div>
</div>
</body>
</html>