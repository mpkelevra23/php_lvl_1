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

$file = fopen("file.txt", "r");

if (!$file) {
    echo "Ошибка открытия файла";
} else {
    $buffer = fread($file, filesize('file.txt'));
    echo $buffer;
    fclose($file);
}

echo file_get_contents('file.txt');

$string = "Goodbye world\n";

file_put_contents('file.txt', $string, FILE_APPEND);
