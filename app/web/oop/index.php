<?php

require_once '/var/www/php_lvl_1.local/vendor/autoload.php';
require_once 'Autoloader.php';

use book\Book;
use people\Reader;
use hall\Hall;

$library = Library::getInstance(
    [
        new Hall('Художественна литература', 40, 5, 60,
            [
                new Book(1, '1984', 'Джордж Оруэлл', 'Антиутопия', 256, 100, 2010),
                new Book(2, 'Скотный двор', 'Джордж Оруэлл', 'Сатира', 345, 97, 2013),
                // Проверка DI
//                new Reader('Alex', 14, true, 'alex@email.com', 3),
            ]),
        new Hall('Русская литература', 70, 5, 140,
            [
                new Book(3, 'Война и мир', 'Лев Толстой', 'Роман-эпопея', 1783, 34, 1988),
                new Book(4, 'Идиот', 'Фёдор Достоевский', 'Роман', 763, 75, 2003)
            ])
    ],
    [
        new Reader('Alex', 14, true, 'alex@email.com', 3),
        new Reader('Eva', 21, false, 'eva@email.com', 39)
    ],
    'Санкт-Петербург'
);

// Меняем имя читателя
echo $library->getPeople()[1] . '<br>';
$library->getPeople()[1]->setName('Анджелика');
echo $library->getPeople()[1] . '<br>';

// Добавляем новую книгу
$library->getHall()[0]->addBook(new Book(5, 'Повелитель мух', 'Увильям Голдинг', 'Антиутопия', 265, 88, 2012));

// Меняем состояние книги
$library->getHall()[0]->getBook()[1]->reduceCondition(14);

// Перемещаем книгу в новый холл
$library->moveBook(0, 1, 'Скотный двор');

// Удобочитаемая информация об объекте
d($library);
