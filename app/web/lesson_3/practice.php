<?php
$hr = '<hr>';

$n = 10;
$i = 1;

while ($i <= $n) {
    echo "$i</br>";
    $i++;
}

do {
    echo "$i</br>";
    $i++;
} while ($i <= $n);

for ($i = 1; $i <= $n; $i++) {
    echo "$i</br>";
}

for (; $i <= $n;) {
    echo "$i</br>";
    $i++;
}

while (true) {
    echo "$i<br/>";
    $i++;
    if ($i > $n) {
        break;
    }
}

for ($i = 1; $i <= $n; $i++) {
    if ($i % 2 == 0) {
        continue;
    }
    echo "$i <br/>";
}

$array = [];
$someVar = true;
$array[] = 1;
$array[] = 'Hello world';
$array[] = $someVar;
var_dump($array);
echo '<br/>' . $array[1];
if (isset($array[2])) {
    echo "<br/>Эта переменная определена, поэтому меня и напечатали.";
} else echo "<br/>Такой переменной не существует";

$users​ = [];
$users [0] = [
    'name'  => 'Alex',
    'email' => 'alex@example.com',
];
$users [1] = [
    'name'           => 'George',
    'email'          => 'george@domain.ru',
    'additionalData' => 'Всем привет!',
];
$users [3] = [
    'name'  => 'Michael',
    'email' => 'mich@test.com',
];

for ($i = 0; $i < count($users); $i++) {
    echo var_dump($i) . '<br/>';
}

foreach ($users as $value) {
    echo var_dump($value) . '<br/>';
    foreach ($value as $key => $item) {
        echo "$key это $item <br/>";
    }
}

foreach ($users as $mas) {
    if (in_array('Michael', $mas, true)) {
        echo "find Michael <br/>";
    }
}

echo '<hr/>';

$strochka = 'one two three four';

print_r(explode(' ', $strochka));

echo "<hr/>";

foreach (explode(' ', $strochka) as $item => $value) {
    echo "$item = $value <br/>";
}

echo "<hr/>";

foreach ($users as $user) {
    echo implode(' ', $user) . '<br/>';
}

echo "<hr/>";

foreach ($_SERVER as $item => $value) {
    echo "$item = $value <br/>";
}