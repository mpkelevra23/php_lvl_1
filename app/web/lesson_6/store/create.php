<!doctype html>
<html lang="en">
<head>
<!--    <link rel="stylesheet" type="text/css" href="css/style.css">-->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <meta charset="UTF-8">
    <title>store</title>
</head>
<body>
<div class="content">
    <h2>Галерея</h2>
    <div class="load">
        <form enctype="multipart/form-data" method="post" action="models/save.php">
            <p>Заголовок</p>
            <input type="text" size="40" name="headline">
            <p>Цена</p>
            <input type="text" size="40" name="price">
            <p>Описание</p>
            <textarea rows="10" cols="45" name="description"></textarea>
            <h3>Загрузка изображения:</h3>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
            <input type="file" name="photo">
            <input type="submit" value="Отправить" name="send">
        </form>
    </div>
    <a href="index.php">Главная</a>
</div>
</body>
</html>