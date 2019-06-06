<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Каталог</title>
</head>
<body>
<div class="content">
    <h2>Галерея</h2>
    <div class="pictures">
        <?php
        include 'models/config.php';

        session_set_cookie_params( 0, '/lesson_6/homework/', 'www.php_lvl_1.local');
        session_name('lesson_6');
        session_start();

        try {
            $dbh = new PDO($dsn, $user, $password);
            foreach ($dbh->query("SELECT `id`, `thumb_address` FROM `pictures` ORDER BY `view_count` DESC ") as $row) {
                echo "<a href='image.php?photo=" . $row['id'] . "'> <img src= " . $row['thumb_address'] . "></a>";
            }
            $dbh = null;
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
        ?>
    </div>
    <div class="load">
        <form enctype="multipart/form-data" method="post" action="models/save.php">
            <h3>Загрузка изображения:</h3>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
            <input type="file" name="photo">
            <input type="submit" value="Отправить" name="send">
            <p><?= $_SESSION['message'] ?? 'Формат файла должен быть JPEG, PNG или GIF'; //Оператор объединения с null
                session_unset();?></p>
        </form>
    </div>
</div>
</body>
</html>