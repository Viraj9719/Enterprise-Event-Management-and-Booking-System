<?php

session_start();
include "connection.php";
include "../paths.php";

include "../libraries/SMTP.php";
include "../libraries/PHPMailer.php";
include "../libraries/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$name = $_POST["name"];
$email = $_POST["mail"];
$mobile = $_POST["mobile"];
$type = $_POST["type"];
$otherType = $_POST["otherType"];
$date = $_POST["date"];
$count = $_POST["count"];
$message = $_POST["message"];

if (empty($name)) {
    echo ("Please Enter your Full Name");
} else if (empty($email)) {
    echo ("Please Enter your Email Address");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address");
} else if (strlen($email) > 100) {
    echo ("Email Address must contain LOWER THAN 100 characters");
} else if (empty($mobile)) {
    echo ("Please Enter your Mobile Number");
} else if (strlen($mobile) != 10) {
    echo ("Mobile Number must contain 10 characters.");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invalid Mobile Number");
} else if (empty($date)) {
    echo ("Please Enter the Event Date");
} else if (empty($count)) {
    echo ("Please Enter the Guest Count");
} else if ($type == "*") {
    echo ("Please Enter the Event Type");
} else if ($type == "00" && empty($otherType)) {
    echo ("Please Enter the Other Type");
} else {

    if (empty($message)) {
        $message = "No Message";
    }

    $type_rs = Database::search("SELECT * FROM `ad_type` WHERE `ad_type_id`='" . $type . "'");
    $type_num = $type_rs->num_rows;

    if ($type_num == 1 && $type != "00") {
        $type_data = $type_rs->fetch_assoc();
        $type = $type_data["ad_type_name"];
    } else {

        $type = "Other";

        $q = "INSERT INTO `ad_type`(`ad_type_name`) VALUES ('" . $otherType . "')";
        Database::iud($q);
    }

    // Send Email

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'callixsoftwaresolution@gmail.com'; //sender's email
    $mail->Password = 'amdpkqkzpcngterb'; //app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('callixsoftwaresolution@gmail.com', 'Dirrect Contact Request'); //sender's email,Sender's name
    $mail->addReplyTo('callixsoftwaresolution@gmail.com', 'Dirrect Contact Request'); //sender's email,Sender's name
    $mail->addAddress('virajlahiru9719@gmail.com'); //receiver's email
    $mail->isHTML(true);
    $mail->Subject = 'Dirrect Contact Request | ' . $name; //Subject of the email
    $bodyContent = '
        <span style="font-weight: bold;">Name : </span><span>' . $name . '</span><br/>
        <span style="font-weight: bold;">Email : </span><span>' . $email . '</span><br/>
        <span style="font-weight: bold;">Mobile : </span><span>' . $mobile . '</span><br/>
        <span style="font-weight: bold;">Type : </span><span>' . $type . '</span><br/>
        <span style="font-weight: bold;">Other Type : </span><span>' . $otherType . '</span><br/>
        <span style="font-weight: bold;">Date : </span><span>' . $date . '</span><br/>
        <span style="font-weight: bold;">Guest Count : </span><span>' . $count . '</span><br/>
        <span style="font-weight: bold;">Message : </span><span>' . $message . '</span><br/><br/>
        '; //Content of the email
    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo ("Verification Sending Failed.");
    } else {
        echo ("Success");
    }
    // Send Email
}
