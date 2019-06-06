<?php

include 'config.php';

$type = (string)htmlspecialchars(strip_tags($_FILES['photo']['type']));
$tmpName = (string)htmlspecialchars(strip_tags($_FILES['photo']['tmp_name']));
$size = (int)htmlspecialchars(strip_tags($_FILES['photo']['size']));
$error = htmlspecialchars(strip_tags($_FILES['photo']['error']));
$name = (string)htmlspecialchars(strip_tags($_FILES['photo']['name']));

session_set_cookie_params( 0, '/lesson_6/homework/', 'www.php_lvl_1.local');
session_name('lesson_6');
session_start();

if (is_uploaded_file($tmpName)) {
    if ($error != 0) {
        $_SESSION['message'] = 'Ошибка загрузки файла! ' . $error;
        header('Location: ../index.php');
    } elseif ($size >= '10000000') {
        $_SESSION['message'] = 'Файл слишком большой.';
        header('Location: ../index.php');
    } elseif ($type == 'image/jpeg' ||
        $type == 'image/png' ||
        $type == 'image/gif') {
        $file = transfer(basename($name));
        $address = './img/' . $file;
        $thumbAddress = './thumb/' . $file;
        if (move_uploaded_file($tmpName, "../img/" . $file)) {
            createThumb(150, 150, '../img/' . $file, '../thumb/' . $file, $type);
            try {
                $dbh = new PDO($dsn, $user, $password);
                $dbh->query("INSERT INTO `pictures` (`name`, address, thumb_address, `size`) VALUES ('$file', '$address', '$thumbAddress', '$size')");
                $dbh = null;
                $_SESSION['message'] = 'Файл успешно загружен';
            } catch (PDOException $e) {
                $_SESSION['message'] = 'Файл не попал в базу ' . $e->getMessage();
            }
            header('Location: ../index.php');
        } else {
            $_SESSION['message'] = 'Возможная атака с помощью файловой загрузки!';
            header('Location: ../index.php');
        }
    } else {
        $_SESSION['message'] = 'Формат файла должен быть JPEG, PNG или GIF';
        header('Location: ../index.php');
    }
} else {
    $_SESSION['message'] = 'Ошибка загрузки файла!';
    header('Location: ../index.php');
}
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

    return str_replace(' ', '_', strtr(mb_strtolower(trim($string)), $alphabet)); //должен быть установлен пакет mbstring, sudo apt-get install php7.2-mbstring
}

function createThumb($height, $width, $src, $newsrc, $type)
{
    $newimg = imagecreatetruecolor($height, $width); //должен быть установлен пакет функций для работы с изображениями gd, sudo apt-get install php7.2-gd
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
