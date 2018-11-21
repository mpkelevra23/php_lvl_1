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

switch ($a = rand(0, 15)) {
    case 0;
        echo $a++ . ', ';
    case 1;
        echo $a++ . ', ';
    case 2;
        echo $a++ . ', ';
    case 3;
        echo $a++ . ', ';
    case 4;
        echo $a++ . ', ';
    case 5;
        echo $a++ . ', ';
    case 6;
        echo $a++ . ', ';
    case 7;
        echo $a++ . ', ';
    case 8;
        echo $a++ . ', ';
    case 9;
        echo $a++ . ', ';
    case 10;
        echo $a++ . ', ';
    case 11;
        echo $a++ . ', ';
    case 12;
        echo $a++ . ', ';
    case 13;
        echo $a++ . ', ';
    case 14;
        echo $a++ . ', ';
    case 15;
        echo $a;
        break;
}

echo '<hr>';

//3)

$x = rand(1, 99);
$y = rand(1, 99);

function addition($x, $y)
{
    $z = $x + $y;

    return $z;
}

echo "при сложение $x и $y получается " . addition($x, $y) . '<br>';

function subtraction($x, $y)
{
    $z = $x - $y;

    return $z;
}

echo "при вычитание $y из $x получается " . subtraction($x, $y) . '<br>';

function multiplication($x, $y)
{
    $z = $x * $y;

    return $z;
}

echo "при умножение $x на $y получается " . multiplication($x, $y) . '<br>';

function degree($x, $y)
{
    $z = $x / $y;

    return $z;
}

echo "при деление $x на $y получается " . degree($x, $y) . '<br>';

//4)

echo '<hr>';

$operation = rand(1, 4); //решил побаловаться с rand

switch ($operation) {
    case 1;
        $operation = 'addition';
        break;
    case 2;
        $operation = 'subtraction';
        break;
    case 3;
        $operation = 'multiplication';
        break;
    case 4;
        $operation = 'degree';
        break;
}

function mathOperation($x, $y, $operation, $z = 0)
{
    switch ($operation) {
        case 'addition';
            $z = addition($x, $y);
            break;
        case'subtraction';
            $z = subtraction($x, $y);
            break;
        case'multiplication';
            $z = multiplication($x, $y);
            break;
        case'degree';
            $z = degree($x, $y);
            break;
    }
    return $z;
}

echo "Результат слуйной операции " . mathOperation($x, $y, $operation);

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
