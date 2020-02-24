<?php

class Library
{
    private $hall = [];
    private $people = [];
    private $address;

    /**
     * Singleton
     * @var null
     */
    protected static $_instance = null;

    /**
     * Library constructor.
     * @param array $hall
     * @param array $people
     * @param $address
     */
    private function __construct(array $hall, array $people, $address)
    {
        $this->hall = $hall;
        $this->people = $people;
        $this->address = $address;
    }


    /**
     * Запрет на сериализацию объекта (для паттерна Singleton)
     */
    private function __wakeup()
    {
    }

    /**
     * Запрет на клонирование объекта (для паттерна Singleton)
     */
    private function __clone()
    {
    }

    /**
     * @param array $hall
     * @param array $people
     * @param null $address
     * @return Library|null
     */
    public static function getInstance(array $hall = null, array $people = null, $address = null)
    {
        return self::$_instance ?? (self::$_instance = new self($hall, $people, $address));
    }

    /**
     * @param $fromHallById
     * @param $toHallById
     * @param $book
     * @return bool
     */
    public function moveBook($fromHallById, $toHallById, $book)
    {
        if (!isset($this->hall[$fromHallById])) {
            echo 'Такого холла не сущесвует ' . $fromHallById;
            return false;
        }
        if (!isset($this->hall[$toHallById])) {
            echo 'Такого холла не сущесвует ' . $toHallById;
            return false;
        }
        if ($fromHallById === $toHallById) {
            echo 'Это один и тот же холл ' . $toHallById;
            return false;
        }
        if (!$this->hall[$fromHallById]->checkBookExist($book)) {
            echo "Книги с названием $book нету в холле $fromHallById";
            return false;
        }

        $bookObj = $this->hall[$fromHallById]->getBookByName($book);
        // Перемещаем книгу в новый холл
        if ($this->hall[$fromHallById]->deleteBookByName($book)) {
            $this->hall[$toHallById]->addBook($bookObj);
            echo "Книгу с названием $book переместили из холла $fromHallById в холл $toHallById";
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    public function getHall(): array
    {
        return $this->hall;
    }

    /**
     * @param array $hall
     */
    public function setHall(array $hall): void
    {
        $this->hall = $hall;
    }

    /**
     * @return array
     */
    public function getPeople(): array
    {
        return $this->people;
    }

    /**
     * @param array $people
     */
    public function setPeople(array $people): void
    {
        $this->people = $people;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }
}