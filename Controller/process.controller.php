<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Classes\Donation;
use Config\Session;

$session = new Session;

// Check server request method is POST or not
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Check if the action is signup
  if (isset($_POST["action"]) && $_POST['action'] === 'process') {
    $sessionToken = $session->get('token');
    if (!$sessionToken === $_POST['token']) {
      $message = "Invalid Action";
      sendResponse(false, $message);
    }
    if (!isset($_POST['token']) || !isset($_POST['userId']) || !isset($_POST['bookId']) || !isset($_POST['name']) || !isset($_POST['book-name']) || !isset($_POST['email']) || !isset($_POST['quantity']) || !isset($_POST['price']) || !isset($_POST['donet-method']) || !isset($_POST['isbn'])) {
      $message = 'invalid action';
      sendResponse(false, $message);
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $bookId = $_POST['bookId'];
    $userId = $_POST['userId'];
    $method = $_POST['donet-method'];

    $donetData = compact('name', 'email', 'bookId', 'userId', 'method');

    $donation = new Donation();
    if ($donation->save($donetData)) {
      $bookName = $_POST['book-name'];
      $bookIsbn = $_POST['isbn'];
      $bookPrice = 00;

      $bookData = compact('bookName', 'bookIsbn', 'bookPrice');
      $donation->sendConformMail($email, $name, $bookData);
      header('location: successful-donation.php');
    }

    $message = "somthing went wrong please try again later!";
    sendResponse(false, $message);
  } else {
    // invalid action
  }
} else {
  // invalid request method
}

function sendResponse(bool $success, string $message): void
{
  if (!$success) {
    $response = ['success' => false, 'errors' => $message];
    echo json_encode($response);
    exit();
  }
  $response = ['success' => true, 'token' => $message];
  echo json_encode($response);
  exit();
}
