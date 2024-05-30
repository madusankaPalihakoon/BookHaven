<?php

namespace Classes;

require_once __DIR__ . '/../vendor/autoload.php';

use Config\Database;
use Classes\Execute;

require_once __DIR__ . '/../Config/db.php';

class Register {
    private $db;
    private $execute;

    public function __construct() {
        $this->db = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
        $this->execute = new Execute();
    }

    public function isUsernameTaken($username){
        $sql = "SELECT COUNT(*) FROM users WHERE username = :username";

        $bindings = [
            ':username' => $username
        ];

        $stmt = $this->execute->run($sql, $bindings);

        return ($stmt !== false) ? $stmt->fetchColumn() == 1 : false; // Returns 'true' if the username already exists in the database, otherwise returns 'false'
    }

    public function isEmailTaken($email){
        $sql = "SELECT COUNT(*) FROM users WHERE username = :username";

        $bindings = [
            ':username' => $email
        ];

        $stmt = $this->execute->run($sql, $bindings);

        return ($stmt !== false) ? $stmt->fetchColumn() == 1 : false; // Returns 'true' if the email already exists in the database, otherwise returns 'false'
    }

    public function save(array $signupData) {
        $sql = "INSERT INTO `users`(`name`, `username`, `email`, `address`, `phone`, `password`) 
                VALUES (:name,:username,:email,:address,:phone,:password)";

        $bindings = [
            ':name' => $signupData['name'],
            ':username' => $signupData['username'],
            ':email' => $signupData['email'],
            ':address' => $signupData['address'],
            ':phone' => $signupData['phone'],
            ':password' => $signupData['hashPassword'],
        ];

        return $this->execute->run($sql, $bindings);
    }
}
