<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 1/18/19
 * Time: 8:45 PM
 */

include 'models/gallery.php';

$img = photo($_GET['id']);
$title = 'Show full version';

$content = 'views/content_photo.php';

include 'views/main.php';