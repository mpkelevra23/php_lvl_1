<?php

//ДЗ

//1)

$a = rand(-99, 99);
$b = rand(-99, 99);

echo "a = $a" . "<br>" . "b = $b" . "<br>";

if ($a < 0 && $b < 0) {
    $c = $a * $b;
    echo "произведение $a и $b равно $c";
} else if ($a > 0 && $b > 0) {
    $c = $a - $b;
    echo "разность $a и $b равно $c";
} else {
    $c = $a + $b;
    echo "сумма $a и $b равно $c";
}

echo '<hr>';

//2)

$a = rand(0, 15);

switch ($a) {
    case 0;
    case 1;
    case 2;
    case 3;
    case 4;
    case 5;
    case 6;
    case 7;
    case 8;
    case 9;
    case 10;
    case 11;
    case 12;
    case 13;
    case 14;
    case 15;
        while ($a <= 15) {
            echo $a++ . ", ";
        }
        break;
}

echo '<hr>';

//3), 4)

$x = rand(1, 99);
$y = rand(1, 99);

function addition($x = 0, $y = 0)
{
    $z = $x + $y;

    return "при сложение $x и $y получается " . $z;
}

function subtraction($x = 0, $y = 0)
{
    $z = $x - $y;

    return "при вычитание $y из $x получается " . $z;
}

function multiplication($x = 0, $y = 0)
{
    $z = $x * $y;

    return "при умножение $x на $y получается " . $z;
}

function degree($x = 0, $y = 0)
{
    $z = $x / $y;

    return "при деление $x на $y получается " . $z;
}

$operation = rand(1, 4); //решил побаловаться с rand

switch ($operation) {
    case 1;
        $operation = 'addition';
        addition();
        break;
    case 2;
        $operation = 'subtraction';
        subtraction();
        break;
    case 3;
        $operation = 'multiplication';
        multiplication();
        break;
    case 4;
        $operation = 'degree';
        degree();
        break;
}

//$operation = 'degree';
//
//switch ($operation) {
//    case 'addition';
//        addition();
//        break;
//    case 'subtraction';
//        subtraction();
//        break;
//    case 'multiplication';
//        multiplication();
//        break;
//    case 'degree';
//        degree();
//        break;
//}

function mathOperation($x, $y, $operation)
{
    echo "Есть числа $x и $y" . '<br>' . $operation ($x, $y) . '<br>';
}

mathOperation($x, $y, $operation);

echo '<hr>';

//5)

echo date('Y') . '<hr>';

//6)

$val = rand(1, 10);
$pow = rand(1, 10);

function power($val, $pow)
{
    if ($pow == 0) {
        return 1;
    }

    return $val * power($val, $pow - 1);
}

$result = power($val, $pow);
echo $val . ' в степении ' . $pow . ' равняеться ' . $result;

echo '<hr>';

//7)

$hour = date('H');
$minute = date('i');

function clock($hour, $minute)
{
    if ($hour == 1 || $hour == 21) {
        echo $hour . ' Час ';
    } elseif ($hour >= 2 && $hour <= 4 || $hour >= 22 && $hour <= 24) {
        echo $hour . ' Часа ';
    } else
        echo $hour . ' Часов ';

    if ($minute == 01 || $minute == 21 || $minute == 31 || $minute == 41 || $minute == 51) {
        echo $minute . ' Минута';
    } elseif ($minute >= 2 && $minute <= 4 || $minute >= 22 && $minute <= 24 || $minute >= 32 && $minute <= 34
        || $minute >= 42 && $minute <= 44 || $minute >= 52 && $minute <= 54) {
        echo $minute . ' Минуты';
    } else
        echo $minute . ' Минут';
}

clock($hour, $minute);
