<!doctype html>
<html lang="en">
<head>
    <?php
    include 'models/config.php';
    ?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Store</title>
</head>
<body>
<div class="content">
    <h2>Товары</h2>
    <div class="pictures">
        <?php
        try {
            $dbh = new PDO($dsn, $user, $password);
            foreach ($dbh->query("SELECT `goods`.`id`, `thumb_address`, `headline`, `price` FROM `goods` INNER JOIN  `pictures` ON `goods`.`id` = `pictures`.`goods_id`")->fetchAll(PDO::FETCH_ASSOC) as $row) {
                echo "<p>" . $row['headline'] . "</p>" . "<a href='good.php?photo=" . $row['id'] . "'> <img src= " . $row['thumb_address'] . "></a>" . "<p>" . $row['price'] . "</p>";
            }
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
        ?>
    </div>
    <a href="create.php">Создать</a>
</div>
</body>
</html>