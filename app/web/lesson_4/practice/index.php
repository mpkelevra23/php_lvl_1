<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 11/20/18
 * Time: 11:13 AM
 */
$file = fopen("file.txt", "r");
if (!$file) {
    echo "Ошибка открытия файла";
} else {
    $buffer = '';
    while (!feof($file)) {
        $buffer .= fread($file, 1);
    }
    echo $buffer;
    fclose($file);
}

echo '<hr>';

$file = fopen("file.txt", "r");

if (!$file) {
    echo "Ошибка открытия файла";
} else {
    $buffer = fread($stream, filesize($file));
    echo $buffer;
    fclose($stream);
}

echo '<hr>';

echo file_get_contents('file.txt');

echo '<hr>';

$string .= "Goodbye world\n";

file_put_contents('file.txt', $string, FILE_APPEND);
