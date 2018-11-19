<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 11/9/18
 * Time: 9:31 PM
 */

function fibonacci($n, $x = 1, $y = 0)
{
    $sum = $x + $y;
    echo nl2br("$sum \n");
    if ($n > 1)
        fibonacci($n - 1, $sum, $x);
}

fibonacci(15);


$a = 'Ivan';

var_dump($a);

$name = 'Alex';
$string = 'Hello, ' . $name;
$otherString = str_replace('Hello', 'Goodbye', $string);
echo nl2br("\n$string\n") . $otherString;
