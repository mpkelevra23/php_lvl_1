<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/3/18
 * Time: 10:32 AM
 */

include 'config.php';

$good = $_GET['good'];

try {
    $dbn = new PDO($dsn, $user, $password);
    $select = $dbn->query("SELECT `address`, `thumb_address` FROM `pictures` WHERE `goods_id` = $good ")->fetch(PDO::FETCH_ASSOC);
    $dbn->query("DELETE FROM `goods` WHERE `id` = $good");
    unlink('../img/' . basename($select['address']));
    unlink('../thumb/' . basename($select['thumb_address']));
    header("Location: ../index.php");
} catch (PDOException $e) {
    echo 'Не удалось удалить файл' . $e->getMessage();
}