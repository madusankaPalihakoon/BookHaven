<?php

namespace Classes;

require_once __DIR__ . '/../vendor/autoload.php';

use Config\Database;

class Execute{
    private $db;
    private $pdo;
    public function __construct()
    {
        $this->db = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
        $this->pdo = $this->db->connect();
    }
    public function run($sql, $bindings = []) {
        try {
            $this->pdo->beginTransaction();

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($bindings);

            $this->pdo->commit();
            return $stmt;
        } catch (\PDOException $e) {
            $this->pdo->rollBack();
            return $e;
        }
    }
}