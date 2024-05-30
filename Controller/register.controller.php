<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Classes\Register;
use Config\Session;
use Validator\Validator;

$session = new Session;

// Check server request method is POST or not
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the action is signup
    if (isset($_POST["action"]) && $_POST['action'] === 'signup') {
        // check form is empty
        if( empty($_POST['fname']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['address']) || empty($_POST['pNumber']) || empty($_POST['password']) ) {
            $message = 'Please fill all required filed!';
            sendResponse(false, $message);
        }
        // Agree to terms and conditions
        if (!isset($_POST['term'])) {
            $message = 'You need to agree to our terms first!';
            sendResponse(false, $message);
        }

        // Validate input fields
        if (Validator::InputValidator($_POST)) {
            if (!Validator::EmailValidator($_POST['email'])) {
                $message = 'Invalid email format';
                sendResponse(false, $message);
            }

            if (!Validator::PasswordValidator($_POST['password'])) {
                $message = 'Password must have at least 8 characters';
                sendResponse(false, $message);
            }

            if (!Validator::ValidateConfirmPassword($_POST['password'], $_POST['confirmPassword'])) {
                $message = 'Passwords do not match';
                sendResponse(false, $message);
            }
        } else {
            $message = 'Invalid form submission';
            sendResponse(false, $message);
        }

        // Process the form (e.g., save to database)
        $name = $_POST['fname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['pNumber'];
        $password = $_POST['password'];

        $hashPassword = password_hash($password,PASSWORD_DEFAULT);

        $register = new Register();

        $registerData = compact('name','username','email','address','phone','hashPassword');

        if($register->isUsernameTaken($username))
        {
            $message = "username alrady exists,Please try again with different username!";
            sendResponse(false, $message);
        }

        if($register->isEmailTaken($email))
        {
            $message = "Email alrady exists,Please try again with different email or login with password!";
            sendResponse(false, $message);
        }
        
        if(!$register->save($registerData))
        {
            $message = 'Somthing went wrong, Please try again later!';
            sendResponse(false, $message);
        }
        sendResponse(true);
    } else {
        $message = 'Invalid action!';
        sendResponse(false, $message);
    }
} else {
    $message = 'Invalid request method!';
    sendResponse(false, $message);
}
function sendResponse(bool $success,string $message = null) : void {
    if(!$success){
        $response = ['success' => false, 'errors' => $message];
        echo json_encode($response);
        exit();
    }
    $response = ['success' => true, 'message' => "succesfully"];
    echo json_encode($response);
    exit();
}

