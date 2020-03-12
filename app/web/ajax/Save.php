<?php

/**
 * Class Db
 * Компонент для работы с базой данных
 */
final class Db
{
    // Константы для БД
    private const DRIVER = 'mysql';
    private const DBNAME = 'dbname=geekbrains';
    private const HOST = 'host=localhost';
    private const CHARSET = 'charset=utf8';
    private const USER = 'admin';
    private const PASS = '123456';

    // Переменная для хранения экземпляра класса
    private static $instance = null;

    // Переменная для хранения экземпляра PDO
    private $pdo;

    /**
     * Db constructor.
     * При создании объекта класса Db создаём объект класса PDO
     */
    private function __construct()
    {
        // Создаём объект класса PDO
        $dsn = self::DRIVER . ':' . self::DBNAME . ';' . self::HOST . ';' . self::CHARSET;

        try {
            $this->pdo = new PDO(
                $dsn, self::USER, self::PASS, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
            );
        } catch (PDOException $e) {
            print "<b>Ошибка соединения!:</b><br> " . $e->getMessage() . "<br>";
            die();
        }
    }

    /**
     * Метод проверки существования объекта класса Db, и для доступа к свойствам и методам класса Db
     * @return Db
     */
    public static function getInstance(): Db
    {
        return self::$instance ?? (self::$instance = new self());
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    /**
     * Закрываем соединение с БД
     */
    public static function closeDbh()
    {
        self::$instance = null;
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
}

class Customer
{

    private $firstName;
    private $secondName;
    private $telephone;

    public function __construct($firstName, $secondName, $telephone)
    {
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
}

class CustomerDb
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function save()
    {
        $statement = Db::getInstance()->getPdo()->prepare(
            "INSERT INTO Customers(firstName, secondName, telephone) VALUES (:firstName, :secondName, :telephone)"
        );
        return $statement->execute(
            [
                'firstName' => $this->customer->getFirstName(),
                'secondName' => $this->customer->getSecondName(),
                'telephone' => $this->customer->getTelephone(),
            ]
        );
    }

}

$customer = new Customer($_POST['firstName'], $_POST['secondName'], $_POST['telephone']);

$customerDb = new CustomerDb($customer);

$message = $customerDb->save() ? 'Пользователь сохранён' : 'Ошибка!';

echo $message;

Db::closeDbh();
