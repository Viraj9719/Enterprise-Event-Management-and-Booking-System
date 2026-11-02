<?php

include "connection.php";

$vcode = $_POST["v"];
$newPW = $_POST["p"];
$rNewPW = $_POST["r"];
$email = $_POST["e"];

if (empty($vcode)) {
    echo ("Please insert your Verification Code");
} else if (strlen($vcode) != 8) {
    echo ("Incorrect Verification Code");
} else if (empty($newPW)) {
    echo ("Please insert your New Password");
} else if (strlen($newPW) < 5 || strlen($newPW) > 20) {
    echo ("New Password must contain BETWEEN 5 to 20 characters.");
} else if (empty($rNewPW)) {
    echo ("Please retype your New Password");
} else if (strlen($rNewPW) < 5 || strlen($rNewPW) > 20) {
    echo ("New Password must contain BETWEEN 5 to 20 characters.");
} else if ($newPW != $rNewPW) {
    echo ("New Password not equals to Retyped Password.");
} else if (empty($email)) {
    echo ("Please enter your Email Address.");
} else if (strlen($email) > 100) {
    echo ("Email Address must contain LOWER THAN 100 characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `vcode`='" . $vcode . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        Database::iud("UPDATE `user` SET `password`='" . $rNewPW . "' WHERE `email`='" . $email . "' AND `vcode`='" . $vcode . "'");

        setcookie("email", "", time() - 3600);
        setcookie("password", "", time() - 3600);

        echo ("Password Updated.");
    } else {
        echo ("Email or Verification code is not correct.");
    }
}
