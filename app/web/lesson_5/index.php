<!doctype html>
<html lang="en">
<head>
    <?php
    include 'models/config.php';
    include 'models/save.php';
    ?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Каталог</title>
</head>
<body>
<div class="content">
    <h2>Галерея</h2>
    <div class="pictures">
        <?php $mysqli = new mysqli($host, $dbUser, $dbPass, $dbName);

        /* проверка соединения */
        if (mysqli_connect_errno()) {
            printf("Соединение не удалось: %s\n", mysqli_connect_error());
            exit();
        }

        if ($result = $mysqli->query("SELECT `id`, `thumb_adress` FROM `pictures` ORDER BY `view_count` DESC ")) {
            while ($row = $result->fetch_assoc()) {
                echo "<a target=\"_blank\" href='image.php?photo=" . $row['id'] . "'> <img src= " . $row['thumb_adress'] . "></a>";
            }
            $mysqli->close();
        } ?>
    </div>
    <div class="load">
        <form enctype="multipart/form-data" method="post" action="">
            <h3>Загрузка изображения:</h3>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
            <input type="file" name="photo">
            <input type="submit" value="Отправить" name="send">
            <p><?php echo $message ?></p>
        </form>
    </div>
</div>
</body>
</html>