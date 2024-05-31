<?php

namespace Classes;

require_once __DIR__ . '/../vendor/autoload.php';

use Config\Database;
use Classes\Execute;
use Config\Mail;
use Config\Session;
use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . '/../Config/db.php';

class Donation
{
  private $db;
  private $execute;
  private $session;
  private $phpMailer;
  private $mail;
  public function __construct()
  {
    $this->db = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    $this->execute = new Execute();
    $this->session = new Session();
    $this->phpMailer = new PHPMailer(true);
    $this->mail = new Mail($this->phpMailer);
  }

  private function saveSesstionData($email, $name, $token)
  {
    $this->session->set('email', $email);
    $this->session->set('name', $name);
    $this->session->set('donetToken', $token);
  }
  private function generateToken($length = 32)
  {
    return bin2hex(random_bytes($length));
  }

  public function sendConformMail($email, $name, $bookData)
  {
    $subject = "Thank You for Your Generous Book Donation!";
    $message = 'Dear ' . $name . ',<br><br>';
    $message .= 'We will send your donation details to your email address: ' . $email . '.<br><br>';
    $message .= 'Book Name: ' . $bookData['bookName'] . '<br>';
    $message .= 'ISBN: ' . $bookData['bookIsbn'] . '<br>';
    $message .= 'Price: ' . $bookData['bookPrice'] . '<br><br>';
    $message .= 'We want to extend our heartfelt gratitude for your generous book donation to the Uva Wellassa University Library. Your contribution will greatly enrich our collection and benefit our community members for years to come.<br><br>';
    $message .= 'Your support is invaluable to us, and we are truly grateful for your kindness and generosity. Please accept this message as a token of our appreciation.<br><br>';
    $message .= 'Thank you once again for your thoughtful donation.<br><br>';

    return $this->mail->sendEmail($email, $subject, $message);
  }

  public function save($donetData)
  {
    $sql = "INSERT INTO `donation_list` (`bookId`, `userId`, `method`, `token`) VALUES (:bookId, :userId, :method, :token);";

    $token = $this->generateToken();

    $bindings = [
      ':bookId' => $donetData['bookId'],
      ':userId' => $donetData['userId'],
      ':method' => $donetData['method'],
      ':token' => $token,
    ];

    $this->saveSesstionData($donetData['email'], $donetData['name'], $token);

    return (bool) $this->execute->run($sql, $bindings);
  }
}
