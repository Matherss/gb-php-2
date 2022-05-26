<?php
include 'config/config.php';

class db
{
    private static $_instance = null;

    private $db; // Ресурс работы с БД

    /*
     * Получаем объект для работы с БД
     */
    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new db();
        }
        return self::$_instance;
    }

    /*
     * Запрещаем копировать объект
     */
    private function __construct() {}
    private function __sleep() {}
    private function __wakeup() {}
    private function __clone() {}

    /*
     * Выполняем соединение с базой данных
     */
    public function Connect()
    {

        $this->db = new PDO("mysql:host=".SERVER.";port=3306;dbname=".DB,LOGIN,PASS,
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // возвращать ассоциативные массивы
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // возвращать Exception в случае ошибки
            ]
        );
    }

    /*
     * Выполнить запрос к БД
     */
    public function Query($query, $params = array())
    {
       try {
        $res = $this->db->prepare($query);
        $res->execute($params);
        return $res;
       } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
       } 
    }

    /*
     * Выполнить запрос с выборкой данных
     */
    public function Select($query, $params = array())
    {
        try {
            $result = $this->Query($query, $params);
        if ($result) {
            return $result->fetchAll();
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
       } 
    }
}
?>
