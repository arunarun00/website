<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if(isset($_POST['send'])){
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']); // Fetch phone number
    $service = htmlentities($_POST['service']); // Fetch selected service
    $message = htmlentities($_POST['message']);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'arun2002cse@gmail.com';
    $mail->Password = 'xawmcwjskwgxbsku';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress('arun2002cse@gmail.com');
    $mail->Subject = "HI ACCUBEE"; // Modify subject to include service
    $mail->Body = "Name: $name <br>Email: $email <br>Phone: $phone <br>Service: $service <br>Message: $message"; // Include phone and service in the email body
    $mail->send();

    header("Location: ./index.php?=email_sent!");
}

?>
