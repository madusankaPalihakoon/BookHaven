<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Classes\Login;
use Config\Session;

$session = new Session;
$login = new Login();

// Check server request method is POST or not
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    // Check if the action is login
    if (isset($_POST["action"]) && $_POST['action'] === 'login')
    {
        // check form is empty
        if( empty($_POST['username']) || empty($_POST['password']) ) {
            $message = 'Please fill all required filed!';
            sendResponse(false, $message);
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!$login->validUsernameOrEmail($username))
        {
            $message = "Invalid username or email, Please check your username or email!";
            sendResponse(false, $message);
        }

        if(!$login->checkAuth($username,$password))
        {
            $message = "Invalid password";
            sendResponse(false, $message);
        }
        $token = $login->createSesstionToken($username);
        sendResponse(true,$token);
    } else {
        $message = 'Invalid action!';
        sendResponse(false, $message);
    }
} else {
    $message = 'Invalid request method!';
    sendResponse(false, $message);
}
function sendResponse(bool $success,string $message) : void {
    if(!$success){
        $response = ['success' => false, 'errors' => $message];
        echo json_encode($response);
        exit();
    }
    $response = ['success' => true, 'token' => $message];
    echo json_encode($response);
    exit();
}