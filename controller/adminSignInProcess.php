<?php

session_start();
include "connection.php";

$username = $_POST["e"];
$password = $_POST["p"];
$rememberMe = $_POST["r"];

if (empty($username)) {
    echo ("Please enter your Email Address.");
} else if (strlen($username) > 20) {
    echo ("Email Address must contain LOWER THAN 100 characters.");
} else if (empty($password)) {
    echo ("Please enter your Password.");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password must contain BETWEEN 5 to 20 characters.");
} else {

    $rs = Database::search("SELECT * FROM `admin` WHERE `username`='" . $username . "' AND 
    `password`='" . $password . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        echo ("success");
        $data = $rs->fetch_assoc();
        $_SESSION["ad"] = $data;

        if($rememberMe == "true"){
            setcookie("username",$username,time()+(60*60*24*365),"/");
            setcookie("password",$password,time()+(60*60*24*365),"/");
        }

    } else {
        echo ("Invalid Email Address or Password");
    }
}
