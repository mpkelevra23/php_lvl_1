<?php
//HW
//1)

$x = 0;

while ($x <= 100) {
    if ($x % 3 == 0)
        echo "$x <br>";
    $x++;
}

//2)

$x = 0;

do {
    if ($x == 0)
        echo "$x - это ноль<br>";
    elseif ($x > 0 && $x % 2 == 0)
        echo "$x - четное число<br>";
    else
        echo "$x - нечетное число<br>";
    $x++;
} while ($x <= 10);

//3)

$map = [
    'Московская область'    => ['Москва', 'Клин', 'Зеленоград'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область'     => ['Рязань', 'Сасова', 'Ряжск'],
];

foreach ($map as $region => $cities) {
    echo "$region:</br>" . implode(', ', $cities) . "<p>";
}

//4)

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

    return strtr($string, $alphabet);
}

echo transfer('Привет') . "</br>";

//5)

function replace($string)
{
    return str_replace(' ', '_', $string);
}

echo replace('Меняем пробелы на нижнее подчёркивание') . "</br>";

//6)

$menu = [
    'Товары' => ['Телефоны', 'Телевизоры', 'Ноутбуки'],
    'Адреса' => ['Санкт-Петербург', 'Москва', 'Томск'],
    'Услуги' => ['Ремонт', 'Вывоз', 'Продажа'],
    'О нас'  => [],
];
echo "<ul>";
foreach ($menu as $key => $value) {
    echo "<li>$key</li>";
    echo "<ul>";
    foreach ($value as $item) {
        echo "<li>$item</li>";
    }
    echo "</ul>";
}
echo "</ul>";

//7)

for ($i = 1; $i <= 10; print_r($i . "<br>"), $i++) {

}

//8)

$map = [
    'Московская область'    => ['Москва', 'Клин', 'Зеленоград'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область'     => ['Рязань', 'Сасова', 'Ряжск'],
];

foreach ($map as $region => $cities) {
    foreach ($cities as $city)
        if (mb_substr($city, 0, 1, 'UTF-8') == 'К' || mb_substr($city, 0, 1, 'UTF-8') == 'к') {
            echo "$region:<br>$city<br>";
        }
}

//9)

function translate($string)
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

    return strtr(str_replace(' ', '_', $string), $alphabet);
}

echo translate('Привет как твои дела?');

echo "<hr/>";