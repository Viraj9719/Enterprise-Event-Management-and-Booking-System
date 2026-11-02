<?php

include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$gender = $_POST["g"];
$typePW = $_POST["tpw"];
$confirmPW = $_POST["cpw"];

if(empty($fname)){
    echo ("Please insert Your First Name.");
}else if(strlen($fname) > 50){
    echo ("First Name must contain LOWER THAN 50 characters.");
}else if(empty($lname)){
    echo ("Please insert Your Last Name.");
}else if(strlen($lname) > 50){
    echo ("Last Name must contain LOWER THAN 50 characters.");
}else if(empty($email)){
    echo ("Please enter your Email Address.");
}else if(strlen($email) > 100){
    echo ("Email Address must contain LOWER THAN 100 characters.");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email Address.");
}else if(empty($mobile)){
    echo ("Please Enter your Mobile Number.");
}else if(strlen($mobile) != 10){
    echo ("Mobile Number must contain 10 characters.");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$mobile)){
    echo ("Invalid Mobile Number.");
}else if(empty($typePW)){
    echo ("Please Enter your Password.");
}else if(empty($confirmPW)){
    echo ("Please retype your Password.");
}else if(strlen($typePW) < 5 || strlen($typePW) > 20){
    echo ("Password must contain between 5 to 20 characters.");
}else if($typePW != $confirmPW){
    echo ("Password not equals with Retyped Password.");
}else if($gender == 0){
    echo ("Please select your gender.");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR 
    `mobile`='".$mobile."'");
    $num = $rs->num_rows;

    if($num > 0){
        echo ("User with the same Email Address or Mobile Number already exists.");
    }else{

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        $status = 1;

        Database::iud("INSERT INTO `user`
        (`fname`,`lname`,`email`,`mobile`,`joined_at`,`status_status_id`,`gender_gender_id`,
        `password`,`oauth_provider`,`oauth_uid`,`subs`) VALUES ('".$fname."','".$lname."','".$email."','".$mobile."','".$date."',
        '".$status."','".$gender."','".$confirmPW."','google','0','0')");

    }

}

?>