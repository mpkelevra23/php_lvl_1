<?php

namespace book;

class Book implements iBook
{

    private $id;
    private $name;
    private $author;
    private $type;
    private $countPage;
    private $condition;
    private $year;

    /**
     * Book constructor.
     * @param $id
     * @param $name
     * @param $author
     * @param $type
     * @param $countPage
     * @param $condition
     * @param $year
     */
    public function __construct($id, $name, $author, $type, $countPage, $condition, $year)
    {
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
        $this->type = $type;
        $this->countPage = $countPage;
        $this->condition = $condition;
        $this->year = $year;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getPage()
    {
        return $this->countPage;
    }

    public function getCondition()
    {
        return $this->condition;
    }

    public function reduceCondition($i)
    {
        if ($this->condition <= 0 || $i >= $this->condition || $i <= 0) {
            return $this->condition;
        } else {
            return $this->condition = $this->condition - $i;
        }
    }
}