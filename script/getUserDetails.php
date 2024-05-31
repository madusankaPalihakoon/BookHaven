<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Classes\User;
use Config\Session;

function getUserDetails($token)
{
  try {
    $session = new Session();
    $email = $session->get('email');

    $user = new User();
    $data = $user->getUser($email, $token);

    // Check if books array is not empty
    if (!empty($data)) {
      $data['email'] = $email;
      $response = ['status' => true, 'data' => $data];
    } else {
      $response = ['status' => false, 'error' => 'No user found'];
    }

    // Return JSON-encoded response
    return json_encode($response);
  } catch (\Throwable $th) {
    // Handle any exceptions and return an error response
    $response = ['status' => false, 'error' => 'An error occurred: ' . $th->getMessage()];
    return json_encode($response);
  }
}
