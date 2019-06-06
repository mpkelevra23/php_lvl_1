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
        session_set_cookie_params( 0, '/lesson_4/homework/', 'www.php_lvl_1.local');
        session_name('lesson_4');
        session_start();

        $images = array_slice(scandir("./thumb"), 2);
        foreach ($images as $image) : ?>
            <a href="image.php?photo=<?= $image ?>">
                <img alt="photo" src="<?= "./thumb/" . $image ?>">
            </a>
        <?php endforeach; ?>
    </div>
    <div class="load">
        <form enctype="multipart/form-data" method="post" action="models/save.php">
            <h3>Загрузка изображения:</h3>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
            <input type="file" name="photo">
            <input type="submit" value="Отправить" name="send">
            <p><?= $_SESSION['message'] ?? 'Формат файла должен быть JPEG, PNG или GIF'; //Оператор объединения с null
                session_unset();
                session_destroy();?></p>
        </form>
    </div>
</div>
</body>
</html>