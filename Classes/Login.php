<?php

namespace Classes;

require_once __DIR__ . '/../vendor/autoload.php';

use Config\Database;
use Classes\Execute;
use Config\Session;

require_once __DIR__ . '/../Config/db.php';

class Login
{
    private $db;
    private $execute;

    private $session;

    public function __construct()
    {
        $this->db = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
        $this->execute = new Execute();
        $this->session = new Session();
    }

    public function validUsernameOrEmail($input) : bool {
        $sql = "SELECT COUNT(*) FROM users WHERE username = :username OR email = :email";

        $bindings = [
            ':username' => $input,
            ':email' => $input
        ];

        $stmt = $this->execute->run($sql, $bindings);

        return ($stmt !== false) ? $stmt->fetchColumn() == 1 : false; // Returns 'true' if the username or email found in the database, otherwise returns 'false'
    }

    public function checkAuth($username,$password) : bool {
        $sql = "SELECT `password` FROM `users` WHERE username = :username OR email = :email";

        $bindings = [
            ':username' => $username,
            ':email' => $username
        ];

        $stmt = $this->execute->run($sql, $bindings);

        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        $hashedPassword = $data['password'];

        return password_verify($password, $hashedPassword);
    }

    private function generateToken($length = 32) {
        return bin2hex(random_bytes($length));
    }

    private function saveToken($token,$email) {
        $sql = "UPDATE `users` SET `token`= :token WHERE email = :email";

        $bindings = [
            ':token' => $token,
            ':email' => $email
        ];

        return (bool) $this->execute->run($sql, $bindings);
    }

    private function saveSesstionData($email,$token) {
        $this->session->set('email', $email);
        $this->session->set('token', $token);
    }

    public function createSesstionToken($username) {
        $sql = "SELECT `email` FROM `users` WHERE username = :username OR email = :email";

        $bindings = [
            ':username' => $username,
            ':email' => $username
        ];

        $stmt = $this->execute->run($sql, $bindings);

        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        $email = $data['email'];

        $token = $this->generateToken();

        $this->saveSesstionData($email, $token);

        $this->saveToken($token,$email);

        return $token;
    }
}