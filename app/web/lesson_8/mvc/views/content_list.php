<p><a href="index.php">Таблица</a> | Список</p>

<?php
foreach ($photos as $img) { ?>
    <a href="photo.php?id=<?= $img['id'] ?>&type=<?= $img['type'] ?>">
        <img src="data/<?= $img['id'] . "." . $img['type'] ?>" height="200">
    </a><br>
    <?php
}
?>