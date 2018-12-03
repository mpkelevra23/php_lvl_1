<?php

include 'config.php';

function transfer($string)
{
    $alphabet = [
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
        'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
        'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

        'А' => 'A', 'Б' => 'B', 'В' => 'V',
        'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
        'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
        'И' => 'I', 'Й' => 'Y', 'К' => 'K',
        'Л' => 'L', 'М' => 'M', 'Н' => 'N',
        'О' => 'O', 'П' => 'P', 'Р' => 'R',
        'С' => 'S', 'Т' => 'T', 'У' => 'U',
        'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
        'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
        'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
    ];

    return str_replace(' ', '_', strtr(mb_strtolower(trim($string)), $alphabet));
}

function createThumb($height, $width, $src, $newsrc, $type)
{
    $newimg = imagecreatetruecolor($height, $width);
    switch ($type) {
        case 'image/jpeg':
            $img = imagecreatefromjpeg($src);
            imagecopyresampled($newimg, $img, 0, 0, 0, 0, $height, $width, imagesx($img), imagesy($img));
            imagejpeg($newimg, $newsrc);
            break;
        case 'image/png':
            $img = imagecreatefrompng($src);
            imagecopyresampled($newimg, $img, 0, 0, 0, 0, $height, $width, imagesx($img), imagesy($img));
            imagepng($newimg, $newsrc);
            break;
        case 'image/gif':
            $img = imagecreatefromgif($src);
            imagecopyresampled($newimg, $img, 0, 0, 0, 0, $height, $width, imagesx($img), imagesy($img));
            imagegif($newimg, $newsrc);
            break;
    }
}

$headline = $_POST['headline'];
$description = $_POST['description'];
$price = $_POST['price'];

if (isset($_POST['send']) and is_uploaded_file($_FILES['photo']['tmp_name'])) {
    $type = $_FILES['photo']['type'];
    $size = $_FILES['photo']['size'];
    $name = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $file = transfer(basename($name));
    $address = './img/' . $file;
    $thumbAddress = './thumb/' . $file;
    if ($error) {
        $message = 'Ошибка загрузки файла!';
        header('Location: ../index.php');
    } elseif ($size >= '10000000') {
        $message = 'Файл слишком большой.';
        header('Location: ../index.php');
    } elseif ($type == 'image/jpeg' ||
        $type == 'image/png' ||
        $type == 'image/gif') {
        if (move_uploaded_file($_FILES['photo']['tmp_name'], "../img/" . $file)) {

            createThumb(150, 150, '../img/' . $file, '../thumb/' . $file, $type);

            try {
                $dbh = new PDO($dsn, $user, $password);
                $dbh->query("INSERT INTO `goods` (`headline`, `description`, `price`) VALUES ('$headline', '$description', '$price')");
                $id = $dbh->lastInsertId();
                $dbh->query("INSERT INTO `pictures` (`goods_id`, `name`, `address`, `thumb_address`, `size`) VALUES ('$id', '$file', '$address', '$thumbAddress', '$size')");
                $message = 'Файл успешно загружен';
                header('Location: ../index.php');
            } catch (PDOException $e) {
                $message = 'Файл не попал в базу' . $e->getMessage();
                header('Location: ../index.php');
            }
        }
    } else {
        $message = 'Возможная атака с помощью файловой загрузки!';
        header('Location: ../index.php');
    }
} else {
    $message = 'Формат файла должен быть JPEG, PNG или GIF';
    header('Location: ../index.php');
}