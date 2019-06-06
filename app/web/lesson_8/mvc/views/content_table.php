<p>Таблица | <a href="index.php?view=list">Список</a></p>

<table>
    <tr>
        <?php
        $i = 1;
        foreach ($photos as $img) {
            ?>
            <td>
                <a href="photo.php?id=<?= $img['id'] ?>&type=<?= $img['type'] ?>">
                    <img src="data/<?= $img['id'] . "." . $img['type'] ?>" height="200">
                </a>
            </td>
            <?php
            if (!($i % 3)) {
                echo '</tr><tr>';
            }
            $i++;
        }
        ?>
    </tr>
</table>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="photo">
    <input type="submit" value="Отправить">
</form>