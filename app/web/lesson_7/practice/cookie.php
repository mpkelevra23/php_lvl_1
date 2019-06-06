<?php
/**
 * Created by PhpStorm.
 * User: kelevra23
 * Date: 12/6/18
 * Time: 3:04 PM
 */
$value = 'что-то откуда-то';

setcookie("TestCookie", $value, time() + 3600);  /* срок действия 1 час */

// Вывести одно конкретное значение cookie
echo $_COOKIE["TestCookie"];

// В целях тестирования и отладки может пригодиться вывод всех cookie
print_r($_COOKIE);

// установка даты истечения срока действия на час назад
setcookie("TestCookie", "", time() - 3600);
// отправка cookie
setcookie("cookie[three]", "cookiethree", time() + 3600);
setcookie("cookie[two]", "cookietwo", time() + 3600);
setcookie("cookie[one]", "cookieone", time() + 3600);

// после перезагрузки страницы, выведем cookie
if (isset($_COOKIE['cookie'])) {
    foreach ($_COOKIE['cookie'] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        echo "$name : $value <br />\n";
    }
}

setcookie("cookie[three]", "", time() - 3600);
setcookie("cookie[two]", "", time() - 3600);
setcookie("cookie[one]", "", time() - 3600);

setcookie('login', 'kelevra23', time() + 3600);
setcookie('pass', 'qwerty', time() + 3600);

if (isset ($_COOKIE['login'])) {
    echo $_COOKIE['login'];
}

setcookie('login', 'kelevra23', time() - 3600);
setcookie('pass', 'qwerty', time() - 3600);
?>
<a href="logout.php"><p>Очистить данные cookie</p></a>
<a href="index.php"><p>Главная</p></a>
