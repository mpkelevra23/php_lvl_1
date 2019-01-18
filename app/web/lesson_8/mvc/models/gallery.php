<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 1/18/19
 * Time: 8:46 PM
 */

function add_photo($file)
{
    if (move_uploaded_file($file['tmp_name'], $file['name'])) {
        echo 'Фаил успешно загружен';
    } else echo 'Ошибка';
}

function gallery()
{
    $arr = [
        ['id' => 1, 'type' => 'jpg'],
        ['id' => 2, 'type' => 'jpg'],
        ['id' => 3, 'type' => 'jpg'],
        ['id' => 4, 'type' => 'jpg'],
        ['id' => 5, 'type' => 'jpg'],
    ];
    return $arr;
}

function photo($id)
{
    return ['id' => $id, 'type' => 'jpg'];
}