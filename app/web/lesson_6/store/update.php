<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <meta charset="UTF-8">
    <title>store</title>
</head>
<body>
<div class="content">

    <?php
    include "models/config.php";
    $id = $_GET['good'];

    try {
        $dbh = new PDO($dsn, $user, $password);
        $query = $dbh->query("SELECT `headline`, `thumb_address`, `description`, `price` FROM `goods` INNER JOIN  `pictures` ON `goods`.`id` = `pictures`.`goods_id` WHERE `goods`.`id` = $id")->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }
    ?>
    <h2>Галерея</h2>
    <div class="load">
        <form enctype="multipart/form-data" method="post" action="models/update.php">
            <p>Заголовок</p>
            <input type="text" size="40" name="headline" value="<?= $query['headline'] ?>">
            <p>Цена</p>
            <input type="text" size="40" name="price" value="<?= $query['price'] ?>">
            <p>Описание</p>
            <textarea rows="10" cols="45" name="description"><?= $query['description'] ?></textarea>
            <p><img src="<?= $query['thumb_address'] ?>" alt=""></p>
            <h3>Загрузка изображения:</h3>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
            <input type="file" name="photo">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="Отправить" name="send">
        </form>
    </div>
    <a href="index.php">Главная</a>
</div>
</body>
</html>