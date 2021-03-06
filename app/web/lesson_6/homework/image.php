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
    $id = $_GET['photo'] ?? header('Location: index.php');

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
    <div id="comments">
        <?php
        try {
            $dbh = new PDO($dsn, $user, $password);
            foreach ($dbh->query("SELECT `text`, `created_at` FROM `comments` WHERE `pictures_id` = $id ORDER BY `created_at` DESC") as $row) {
                echo "<p>" . $row['text'] . "</p>" . "<p>Дата добавления " . $row['created_at'] . "</p>" . "<br>";
            }
            $dbh = null;
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
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