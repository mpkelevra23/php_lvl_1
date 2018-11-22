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
    <?php include 'models/save.php'; ?>
    <h2>Галерея</h2>
    <div class="pictures">
        <?php for ($i = 0; $i < count($images); $i++) : ?>
            <a href="image.php?photo=<?= $images[$i] ?>">
                <img src="<?= "./thumb/" . $images[$i] ?>">
            </a>
        <?php endfor; ?>
    </div>
    <div class="load">
        <form enctype="multipart/form-data" method="post" action="">
            <h3>Загрузка изображения:</h3>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
            <input type="file" name="photo">
            <input type="submit" value="Отправить" name="send">
            <p><?= $message ?></p>
        </form>
    </div>
</div>
</body>
</html>