<?php

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

if (isset($_POST['send'])) {
    if ($_FILES['photo']['error']) {
        $message = 'Ошибка загрузки файла!';
    } elseif (($_FILES['photo']['size']) >= '10000000') {
        $message = 'Файл слишком большой.';
    } elseif (($_FILES['photo']['type']) == 'image/jpeg' ||
        ($_FILES['photo']['type']) == 'image/png' ||
        ($_FILES['photo']['type']) == 'image/gif') {
        $file = transfer(basename($_FILES['photo']['name']));
        if (move_uploaded_file($_FILES['photo']['tmp_name'], "./img/" . $file)) {
            $type = $_FILES['photo']['type'];
            createThumb(150, 150, 'img/' . $file, './thumb/' . $file, $type);
            $message = 'Файл корректен и был успешно загружен.';
        }
    } else {
        $message = 'Возможная атака с помощью файловой загрузки!';
    }
} else {
    $message = 'Формат файла должен быть JPEG, PNG или GIF';
}

$images = array_slice(scandir("./thumb"), 2);