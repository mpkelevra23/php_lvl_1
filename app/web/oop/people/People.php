<?php

namespace people;

use book\iBook;

abstract class People
{
    private $name;
    private $age;
    private $isMale;
    private $email;
    private $countBookRead;

    /**
     * People constructor.
     * @param $name
     * @param $age
     * @param $isMale
     * @param $email
     * @param $countBookRead
     */
    public function __construct($name, $age, $isMale, $email, $countBookRead)
    {
        $this->name = $name;
        $this->age = $age;
        $this->isMale = $isMale;
        $this->email = $email;
        $this->countBookRead = $countBookRead;
    }


    /**
     * @return string
     */
    public function __toString()
    {
        return 'Имя: ' . $this->name
            . '<br> Возраст: ' . $this->age
            . '<br> Пол: ' . ($this->isMale ? 'Мужской' : 'Женский')
            . '<br> Почта: ' . $this->email
            . '<br> Прочитано книг: ' . $this->countBookRead;
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
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getIsMale()
    {
        return $this->isMale;
    }

    /**
     * @param mixed $isMale
     */
    public function setIsMale($isMale): void
    {
        $this->isMale = $isMale;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCountBookRead()
    {
        return $this->countBookRead;
    }

    /**
     * @param mixed $countBookRead
     */
    public function setCountBookRead($countBookRead): void
    {
        $this->countBookRead = $countBookRead;
    }

    public function readBook(iBook $book)
    {

    }

    public function takeBook(iBook $book)
    {

    }

    public function returnBook(iBook $book)
    {

    }
}