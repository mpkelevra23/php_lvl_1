<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 1/18/19
 * Time: 8:45 PM
 */

include 'models/gallery.php';

if (isset($_FILES['photo'])) {
    add_photo($_FILES['photo']);
}

$photos = gallery();

$title = 'Галерея фотографий';

if (isset($_GET['view'])) {
    $content = 'views/content_list.php';
} else $content = 'views/content_table.php';

include 'views/main.php';