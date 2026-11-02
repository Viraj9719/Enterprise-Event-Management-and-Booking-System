<?php

session_start();
include "connection.php";
include "../paths.php";

$name = $_POST["name"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$location = $_POST["location"];
$city = $_POST["city"];
$type = $_POST["type"];
$start_time = $_POST["start_time"];
$end_time = $_POST["end_time"];
$crowd = $_POST["crowd"];
$environment = $_POST["environment"];
$ticket_category1 = 1;
$ticket_price1 = $_POST["ticket_price1"];
$ticket_qty1 = $_POST["ticket_qty1"];
$ticket_category2 = 2;
$ticket_price2 = $_POST["ticket_price2"];
$ticket_qty2 = $_POST["ticket_qty2"];
$ticket_category3 = 3;
$ticket_price3 = $_POST["ticket_price3"];
$ticket_qty3 = $_POST["ticket_qty3"];
$ticket_category4 = 4;
$ticket_price4 = $_POST["ticket_price4"];
$ticket_qty4 = $_POST["ticket_qty4"];
$event_desc = $_POST["event_desc"];

$ad_status = 7; //qutation requested status
$user_id = $_SESSION["u"]["user_id"];

if (empty($name)) {
    echo ("Please add the Event Name");
} else if (empty($start_date)) {
    echo ("Please add the Event Starting Date");
} else if (empty($start_time)) {
    echo ("Please add the Event Starting Time");
} else if (empty($end_time)) {
    echo ("Please add the Event Ending Time");
} else if (empty($location)) {
    echo ("Please add the Event Location");
} else if (empty($crowd)) {
    echo ("Please add the Expecting Count");
} else if ($type == "0") {
    echo ("Please select the Event Type");
} else if ($environment == "0") {
    echo ("Please select the Event Environment");
} 
else if (empty($event_desc)) {
    echo ("Please add the Event Description");
} else if ($city == "0") {
    echo ("Please select the Nearest City for the Event Location");
} else {



    Database::iud("INSERT INTO `ads`(`ad_name`,`ad_start_date`,`ad_end_date`,`ad_time_from`,`ad_time_to`,
    `location`,`crowd`,`ad_type_ad_type_id`,`environment_env_id`,`ad_status_ad_status_id`,`user_user_id`,`desc`) 
    VALUES ('" . $name . "','" . $start_date . "','" . $end_date . "','" . $start_time . "','" . $end_time . "',
    '" . $location . "','" . $crowd . "','" . $type . "','" . $environment . "','" . $ad_status . "',
    '" . $user_id . "','" . $event_desc . "')");

    $ad_id = Database::$connection->insert_id;

    if ($ticket_price1 == 0 && $ticket_price2 == 0 && $ticket_price3 == 0 && $ticket_price4 == 0) {
        if ($ticket_qty1 == 0 && $ticket_qty2 == 0 && $ticket_qty3 == 0 && $ticket_qty4 == 0) {
            //do nothing
        }
    }else{
        Database::iud("INSERT INTO `price`(`price`, `price_category_p_cat_id`, `ads_ad_id`, `ticket_count`) 
        VALUES ('$ticket_price1', '$ticket_category1', '$ad_id', '$ticket_qty1'),
        ('$ticket_price2', '$ticket_category2', '$ad_id', '$ticket_qty2'),
        ('$ticket_price3', '$ticket_category3', '$ad_id', '$ticket_qty3'),
        ('$ticket_price4', '$ticket_category4', '$ad_id', '$ticket_qty4')");
    }

    Database::iud("INSERT INTO `ads_has_city`(`ads_ad_id`,`city_city_id`) VALUE 
            ('" . $ad_id . "','" . $city . "')");

    $length = sizeof($_FILES);

    if ($length <= 3 && $length > 0) {
        $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $length; $x++) {

            if (isset($_FILES["image" . $x])) {

                $image_file = $_FILES["image" . $x];
                $file_extension = $image_file["type"];

                if (in_array($file_extension, $allowed_image_extensions)) {
                    $new_img_extension;

                    if ($file_extension == "image/jpeg") {
                        $new_img_extension = ".jpeg";
                    } else if ($file_extension == "image/png") {
                        $new_img_extension = ".png";
                    } else if ($file_extension == "image/svg+xml") {
                        $new_img_extension = ".svg";
                    }

                    $file_name = $AD_IMG_PATH . $ad_id . "_" . $x . $new_img_extension;
                    move_uploaded_file($image_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `ad_img`(`aimg_path`,`ads_ad_id`) VALUE 
                            ('" . $file_name . "','" . $ad_id . "')");
                } else {
                    echo ("Inavid image type.");
                }
            }
        }
        echo ("success");
    } else {
        echo ("Invalid Image Count.");
    }
}
