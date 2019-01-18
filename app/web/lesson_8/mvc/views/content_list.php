<p><a href="index.php">Таблица</a> | Список</p>

<?php
foreach ($photos as $img) { ?>
    <a href="photo.php?id=<?= $img['id']?>">
        <img src="<?= $img['id'] . "." . $img['type'] ?>" height="200">
    </a><br>
<?php
}
?>