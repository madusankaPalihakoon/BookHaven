<?php

namespace Classes;

require_once __DIR__ . '/../vendor/autoload.php';

use Config\Database;
use Classes\Execute;

require_once __DIR__ . '/../Config/db.php';

class User
{
  private $db;
  private $execute;

  public function __construct()
  {
    $this->db = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    $this->execute = new Execute();
  }

  public function getUser($email, $token)
  {
    $sql = "SELECT `id`, `name` FROM `users` WHERE email = :email AND token = :token";

    $bindings = [
      ':email' => $email,
      ':token' => $token
    ];

    $stmt = $this->execute->run($sql, $bindings);

    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }
}
