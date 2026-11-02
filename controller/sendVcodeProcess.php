<?php

include "connection.php";

include "../libraries/SMTP.php";
include "../libraries/PHPMailer.php";
include "../libraries/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$email = $_POST["e"];

if (empty($email)) {
    echo ("Please enter your Email Address.");
} else if (strlen($email) > 100) {
    echo ("Email Address must contain LOWER THAN 100 characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        $verificationCode = random_int(10000000, 99999999);
        Database::iud("UPDATE `user` SET `vcode`='".$verificationCode."' WHERE `email`='".$email."'");

        // Send Email

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'callixsoftwaresolution@gmail.com';//sender's email
        $mail->Password = 'amdpkqkzpcngterb';//app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('callixsoftwaresolution@gmail.com', 'Reset Password');//sender's email,Sender's name
        $mail->addReplyTo('callixsoftwaresolution@gmail.com', 'Reset Password');//sender's email,Sender's name
        $mail->addAddress($email);//receiver's email
        $mail->isHTML(true);
        $mail->Subject = 'RAWDS forgot password verification code : ';//Subject of the email
        $bodyContent = '<h1 style="color:red;">Your verification code is '.$verificationCode.'</h1>';//Content of the email
        $mail->Body    = $bodyContent;

        if(!$mail->send()){
            echo ("Verification Sending Failed.");
        }else{
            echo ("Success");
        }

        // Send Email

    } else {
        echo ("Invalid Email address.");
    }
}
