<?php
namespace Config;

require_once __DIR__ . '/../vendor/autoload.php';

use PDOException;

class Database {
    private $host;
    private $dbname;
    private $user;
    private $password;
    private $pdo;

    public function __construct($host, $dbname, $user, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $this->pdo = new \PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            throw new PDOException("Error Processing Request");
        }
    }

    public function disconnect()
    {
        $this->pdo = null;
    }
}
