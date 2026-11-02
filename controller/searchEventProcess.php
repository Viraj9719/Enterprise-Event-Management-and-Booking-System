<?php
// header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self' data:;");
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; font-src 'self' data: https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; img-src 'self' data: https:; connect-src 'self';");

include "connection.php";
include "../paths.php";

$date = $_POST["d"];
$type = $_POST["t"];
$environment = $_POST["e"];
$city = $_POST["c"];

$query = "SELECT * FROM `ads` INNER JOIN `ad_type` ON ads.ad_type_ad_type_id=ad_type.ad_type_id INNER JOIN 
`environment` ON ads.environment_env_id=environment.env_id INNER JOIN `ad_status` ON 
ads.ad_status_ad_status_id=ad_status.ad_status_id INNER JOIN `ads_has_city` ON 
ads.ad_id=ads_has_city.ads_ad_id INNER JOIN `city` ON ads_has_city.city_city_id=city.city_id";

$status = 0;

if (!empty($date) && $status == 0) {
    $query .= " WHERE `ad_start_date`='" . $date . "'";
    $status = 1;
}

if ($type != 0 && $status == 0) {
    $query .= " WHERE `ad_type_ad_type_id`='" . $type . "'";
    $status = 1;
} else if ($type != 0 && $status == 1) {
    $query .= " AND `ad_type_ad_type_id`='" . $type . "'";
}

if ($environment != 0 && $status == 0) {
    $query .= " WHERE `env_id`='" . $environment . "'";
    $status = 1;
} else if ($environment != 0 && $status == 1) {
    $query .= " AND `env_id`='" . $environment . "'";
}

if ($city != 0 && $status == 0) {
    $query .= " WHERE `city_city_id`='" . $city . "'";
    $status = 1;
} else if ($city != 0 && $status == 1) {
    $query .= " AND `city_city_id` = '" . $city . "'";
}

?>

<div class="row">

    <?php

    if ("0" != ($_POST["page"])) {
        $pageno = $_POST["page"];
    } else {
        $pageno = 1;
    }

    $ad_rs = Database::search($query);
    $product_num = $ad_rs->num_rows;

    $results_per_page = 3;
    $number_of_pages = ceil($product_num / $results_per_page);

    $page_results = ($pageno - 1) * $results_per_page;
    $selected_rs = Database::search($query . " ORDER BY `ad_time_from` DESC LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

    $selected_num = $selected_rs->num_rows;

    for ($x = 0; $x < $selected_num; $x++) {
        $selected_data = $selected_rs->fetch_assoc();
        if ($selected_data["ad_status_ad_status_id"] == 1 || $selected_data["ad_status_ad_status_id"] == 4 || $selected_data["ad_status_ad_status_id"] == 5 || $selected_data["ad_status_ad_status_id"] == 10 || $selected_data["ad_status_ad_status_id"] == 11) {

    ?>

            <div class="col-lg-6 event-item" data-type="wedding" data-year="2024">
                <div class="event-card">

                    <div class="event-image wedding">
                        <?php
                        $ad_img_rs = Database::search("SELECT * FROM `ad_img` WHERE `ads_ad_id`='" . $selected_data["ad_id"] . "'");
                        $ad_img_data = $ad_img_rs->fetch_assoc();
                        ?>
                        <div class="event-badge"><?php echo $selected_data["ad_type_name"]; ?></div>
                        <img class="img-fluid" src="<?php echo $AD_IMG_PATH_DESIGN . $ad_img_data["aimg_path"]; ?>" />
                    </div>

                    <div class="event-content">
                        <div class="event-date">
                            <i class="far fa-calendar"></i>
                            <span><?php echo $selected_data["ad_start_date"]; ?></span>
                        </div>
                        <h3 class="event-title"><?php echo $selected_data["ad_name"]; ?></h3>
                        <div class="event-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <a class="text-decoration-none" href="<?php echo $selected_data["location"]; ?>">
                                <?php echo $selected_data["city_name"]; ?>
                            </a> <span class="text-black-50">click to view on map</span>
                        </div>
                        <p class="event-description">
                            <?php echo $selected_data["desc"]; ?>
                        </p>
                        <div class="event-details">
                            <div class="event-stats">

                                <span class="stat">
                                    <i class="fas fa-users"></i>
                                    <?php echo $selected_data["crowd"]; ?> Guests
                                </span>
                                <span class="stat">
                                    <?php

                                    $start_date = new DateTime($selected_data["ad_start_date"]);
                                    $end_date   = new DateTime($selected_data["ad_end_date"]);

                                    $start_time = new DateTime($selected_data["ad_time_from"]);
                                    $end_time   = new DateTime($selected_data["ad_time_to"]);

                                    // Calculate date difference
                                    $date_difference = $start_date->diff($end_date);
                                    $final_date = $date_difference->days; // total number of days

                                    // Calculate time difference
                                    $time_difference = $start_time->diff($end_time);

                                    // Get total time difference in hours (including minutes if needed)
                                    $final_time = ($time_difference->h);

                                    ?>
                                    <i class="fas fa-clock"></i>
                                    <?php echo $final_date . " Days " . $final_time . " Hours"; ?>
                                </span>
                            </div>
                            <a href="#" class="text-decoration-none text-white view-details-btn">View Details</a>
                        </div>
                    </div>

                </div>
            </div>

    <?php

        }
    }

    ?>

    <!-- Pagination -->
    <div class="pagination-container">
        <nav aria-label="Page navigation">
            <ul class="pagination" id="pagination">
                <li class="page-item">
                    <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " tabindex="-1" aria-disabled="true">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
                <?php
                for ($y = 1; $y <= $number_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" href="<?php echo "?page=" . ($y); ?>">
                                <?php echo $y; ?>
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo "?page=" . ($y); ?>">
                                <?php echo $y; ?>
                            </a>
                        </li>
                <?php
                    }
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="
                            <?php if ($pageno >= $number_of_pages) {
                                echo ("#");
                            } else {
                                echo "?page=" . ($pageno + 1);
                            } ?>
                                                ">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>