<?php

namespace Classes;

require_once __DIR__ . '/../vendor/autoload.php';

use Config\Database;
use Classes\Execute;

require_once __DIR__ . '/../Config/db.php';

class Book{
    private $db;
    private $execute;
    public function __construct(){
        $this->db = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
        $this->execute = new Execute();
    }

    public function getBooks()
    {
        $sql = "SELECT * FROM donation_book";

        try {
            $stmt = $this->execute->run($sql,[]);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
            if ($result) {
                return $result;
            } else {
                return null; // or handle the case where no row is found as needed
            }
        } catch (\Exception $e) {
            // Handle the exception (e.g., log it and/or rethrow it)
            // throw new \Exception("Error fetching verification code: " . $e->getMessage());
            return null;
        }
    }

    public function getBook($id, $name)
    {
        $sql = "SELECT * FROM donation_book WHERE id = :id AND name = :name";

        $bindings = [
            ':id' => $id,
            ':name' => $name,
        ];

        try {
            $stmt = $this->execute->run($sql, $bindings);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result) {
                return $result;
            } else {
                return null; // Handle the case where no row is found
            }
        } catch (\Exception $e) {
            // Handle the exception (e.g., log it and/or rethrow it)
            // throw new \Exception("Error fetching book: " . $e->getMessage());
            return null;
        }
    }
}