<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 1/18/19
 * Time: 8:46 PM
 */

function add_photo($file)
{
    $name = str_replace(' ', '_', (mb_strtolower(trim($file['name']))));
    if (move_uploaded_file($file['tmp_name'], "data/" . $name)) {
        echo 'Фаил успешно загружен';
    } else echo 'Ошибка';
}

function gallery()
{
    $data = scandir('data');
    foreach ($data as $key => $value) {
        if ($value == '.' || $value == '..') {
            continue;
        } else {
            $arr = explode('.', $value);
            $list[] = array_combine(['id', 'type'], array_values($arr));
        }
    }
    return $list;
}

function photo($id, $type)
{
    return ['id' => $id, 'type' => $type];
}