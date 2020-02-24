<?php

namespace hall;

use book\Book;
use book\iBook;

class Hall
{
    private $name;
    private $width;
    private $height;
    private $place;
    private $book = [];

    /**
     * Hall constructor.
     * @param $name
     * @param $width
     * @param $height
     * @param $place
     * @param array $book
     */
    public function __construct($name, $width, $height, $place, array $book)
    {
        $this->name = $name;
        $this->width = $width;
        $this->height = $height;
        $this->place = $place;
        $this->book = $book;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width): void
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height): void
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place): void
    {
        $this->place = $place;
    }

    /**
     * @return array
     */
    public function getBook(): array
    {
        return $this->book;
    }

    /**
     * @param iBook $book
     */
    public function addBook(iBook $book): void
    {
        $this->book[] = $book;
    }

    public function printAllBook()
    {
        return count($this->book);
    }

    public function getBookByName($name)
    {
        /**
         * @var Book $book
         */
        foreach ($this->book as $key => $book) {
            if ($book->getName() == $name) {
                return $this->book[$key];
            }
        }
        return null;
    }

    /**
     * Возвращаем объект класса Book
     * @param $name
     * @return bool
     */
    public function deleteBookByName($name)
    {
        /**
         * @var Book $book
         */
        foreach ($this->book as $key => $book) {
            if ($book->getName() == $name) {
                unset($this->book[$key]);
                return true;
            }
        }
        return false;
    }

    /**
     * @param $name
     * @return bool
     */
    public function checkBookExist($name)
    {
        if (!empty($this->book)) {
            /**
             * @var Book $book
             */
            foreach ($this->book as $book) {
                if ($book->getName() == $name) {
                    return true;
                }
            }
            return false;
        }
        return false;
    }
}