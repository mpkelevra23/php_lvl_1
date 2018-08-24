<?php
$num_1 = (int)htmlspecialchars(strip_tags($_POST['num_1']));
$num_2 = (int)htmlspecialchars(strip_tags($_POST['num_2']));
$math = (string)htmlspecialchars(strip_tags($_POST['math']));

switch ($math) {
    case "multiplication":
        $result = $num_1 * $num_2;
        echo $result;
        break;
    case "division":
        if ($num_2 == 0) {
            $result = 'На ноль делить нельзя';
            echo $result;
            break;
        }
        $result = $num_1 / $num_2;
        echo $result;
        break;
    case "addition":
        $result = $num_1 + $num_2;
        echo $result;
        break;
    case "subtraction":
        $result = $num_1 - $num_2;
        echo $result;
        break;
}