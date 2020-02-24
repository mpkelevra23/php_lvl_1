<?php

namespace book;

/**
 * Interface iBook
 * @package book
 */
interface iBook
{
    public function getName(); // Получаем название книга

    public function setName($name); // Задаём название книга

    public function getId(); // Получаем идентификатор

    public function getType(); // Получаем тип книги

    public function getAuthor(); // Получаем автора книги

    public function getYear(); // Получаем год книги

    public function getPage(); // Получаем кол-во страниц книги

    public function getCondition(); // Получаем состояние книги

    public function reduceCondition($i); // Снизить состояние книги
}