<?php

session_start();
include "controller/connection.php";
require_once 'config.php';
$provider = AuthProvider::GOOGLE;

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;

    $client->setAccessToken($token['access_token']);
    $oauth = new Google_Service_Oauth2($client);
    $userData = $oauth->userinfo->get();

    // Save user to DB
    $email = $conn->real_escape_string($userData->email);
    $name = $conn->real_escape_string($userData->name);
    $google_id = $conn->real_escape_string($userData->id);
    $mobile = $conn->real_escape_string($userData->mobile);
    $gender = $conn->real_escape_string($userData->gender);
    $picture = $conn->real_escape_string($userData->picture);

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    $pw = uniqid();

    $provider_str = $provider->value;

    $check = Database::search("SELECT * FROM `user` WHERE `oauth_uid`='$google_id'");

    if ($check->num_rows == 0) {
        Database::iud("INSERT INTO `users`(`fname`,`lname`,`email`,`mobile`,`joined_at`,`status_status_id`,`gender_gender_id`,`password`,`oauth_provider`,`oauth_uid`) VALUES 
        ('".$name."','".$name."','".$email."','".$mobile."','".$date."','".$status."','".$gender."','".$pw."','".$provider_str."','".$google_id."')");
    }else if($check->num_rows == 1){
        $check2 = Database::search("SELECT * FROM `user` WHERE `oauth_uid`='".$google_id."' AND `email`='".$email."'");

        if($check2->num_rows == 1){

            $data = $check2->fetch_assoc();
            $_SESSION["u"] = $data;

            header("Location: index.php");

        }else{
            echo ("Something went wrong.");
        }
    }else{
        echo ("Invalid user.");
    }
    
    header('Location: index.php');
}

?>