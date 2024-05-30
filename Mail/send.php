<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Config\Mail;
use PHPMailer\PHPMailer\PHPMailer;

// Instantiate PHPMailer
$phpMailer = new PHPMailer(true);

// Instantiate Mail class and pass PHPMailer instance
$mail = new Mail($phpMailer);

// Define email parameters
$email = 'bookhavenuwu@gmail.com';
$subject = 'Your Subject';
$message = 'Your Message';

// Send the email
echo $mail->sendEmail($email, $subject, $message);
