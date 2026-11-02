<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rawds Entertainment || Events</title>

    <!-- <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline';"> -->

    <meta http-equiv="Content-Security-Policy" content="
        default-src 'self'; 
        script-src 'self' 'unsafe-eval' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; 
        style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; 
        font-src 'self' data: https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; 
        img-src 'self' data: https:;
        connect-src 'self';
    ">

    <link rel="icon" href="images/titleLogo.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/callixstyle.css">
</head>

<body class="events-list-page">

    <?php

    include "header.php";
    include "paths.php";

    $pageno;

    ?>

    <div class="mt-5 history-body">
        <div class="container history-container">

            <h1 class="main-title">Upcomming Events</h1>
            <p class="subtitle">Browse through our upcomming public events</p>

            <div class="filter-section">
                <div class="row">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="filter-label">Event Date</label>
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input class="search-input" type="date" placeholder="Date" id="date" />
                        </div>
                    </div>

                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="filter-label">Event Type</label>
                        <select class="form-select filter-select" id="type">
                            <option value="0">Select Event type</option>
                            <?php
                            $type_rs = Database::search("SELECT * FROM `ad_type`");
                            for ($x = 0; $x < $type_rs->num_rows; $x++) {
                                $type_data = $type_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $type_data["ad_type_id"]; ?>">
                                    <?php echo $type_data["ad_type_name"]; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="filter-label">Event Environment</label>
                        <select class="form-select filter-select" id="environment">
                            <option value="0">Select Environment Type</option>
                            <?php
                            $environment_rs = Database::search("SELECT * FROM `environment`");
                            for ($x = 0; $x < $environment_rs->num_rows; $x++) {
                                $environment_data = $environment_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $environment_data["env_id"]; ?>">
                                    <?php echo $environment_data["env_type"]; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="filter-label">Event City</label>
                        <select class="form-select filter-select" id="city">
                            <option value="0">Select Event City</option>
                            <?php
                            $city_rs = Database::search("SELECT * FROM `city`");
                            for ($x = 0; $x < $city_rs->num_rows; $x++) {
                                $city_data = $city_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $city_data["city_id"]; ?>">
                                    <?php echo $city_data["city_name"]; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mt-5 offset-lg-3 col-12 col-lg-6 d-grid">
                        <button class="btn gradient-bg" onclick="searchEvent(0);">Search Events</button>
                    </div>

                </div>
            </div>

            <div id="eventsContainer">
                <div class="row" id="dd">

                    <?php

                    if (isset($_GET["page"])) {
                        $pageno = $_GET["page"];
                    } else {
                        $pageno = 1;
                    }

                    $ad_rs = Database::search("SELECT * FROM `ads` INNER JOIN `ad_type` ON ads.ad_type_ad_type_id=ad_type.ad_type_id 
                    INNER JOIN `environment` ON ads.environment_env_id=environment.env_id INNER JOIN `ad_status` ON 
                    ads.ad_status_ad_status_id=ad_status.ad_status_id INNER JOIN `ads_has_city` ON 
                    ads.ad_id=ads_has_city.ads_ad_id INNER JOIN `city` ON ads_has_city.city_city_id=city.city_id 
                    ORDER BY `ad_time_from` DESC");

                    $product_num = $ad_rs->num_rows;

                    $results_per_page = 3;
                    $number_of_pages = ceil($product_num / $results_per_page);

                    $page_results = ($pageno - 1) * $results_per_page;
                    $selected_rs = Database::search("SELECT * FROM `ads` INNER JOIN `ad_type` ON ads.ad_type_ad_type_id=ad_type.ad_type_id 
                    INNER JOIN `environment` ON ads.environment_env_id=environment.env_id INNER JOIN `ad_status` ON 
                    ads.ad_status_ad_status_id=ad_status.ad_status_id INNER JOIN `ads_has_city` ON 
                    ads.ad_id=ads_has_city.ads_ad_id INNER JOIN `city` ON ads_has_city.city_city_id=city.city_id ORDER BY 
                    `ad_time_from` DESC LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

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
            </div>

        </div>
    </div>

    <div class="upcoming-events-outer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="upcoming-events">
                        <div class="upcoming-events-header">
                            <h4>Upcoming Events</h4>
                        </div>

                        <div class="upcoming-events-list">
                            <div class="upcoming-event-wrap flex flex-wrap justify-content-between align-items-center">
                                <figure class="events-thumbnail">
                                    <a href="#"><img src="images/upcoming-1.jpg" alt=""></a>
                                </figure>

                                <div class="entry-meta">
                                    <div class="event-date">
                                        25<span>February</span>
                                    </div>
                                </div>

                                <header class="entry-header">
                                    <h3 class="entry-title"><a href="#">Blockchain Conference</a></h3>
                                    <span class="badge text-bg-success h5">SOON</span>

                                    <div class="event-date-time">May 29, 2018 @ 8:00 Pm - May 30, 2018 @ 4:00 Am</div>

                                    <div class="event-speaker">Speackers: Maria Williams, Luis Smith, James Doe</div>
                                </header>

                                <footer class="entry-footer">
                                    <a href="#">Buy Tikets</a>
                                </footer>
                            </div>

                            <div class="upcoming-event-wrap flex flex-wrap justify-content-between align-items-center">
                                <figure class="events-thumbnail">
                                    <a href="#"><img src="images/upcoming-2.jpg" alt=""></a>
                                </figure>

                                <div class="entry-meta">
                                    <div class="event-date">
                                        27<span>February</span>
                                    </div>
                                </div>

                                <header class="entry-header">
                                    <h3 class="entry-title"><a href="#">Financial Conference</a></h3>

                                    <div class="event-date-time">May 29, 2018 @ 8:00 Pm - May 30, 2018 @ 4:00 Am</div>

                                    <div class="event-speaker">Speackers: Maria Williams, Luis Smith, James Doe</div>
                                </header>

                                <footer class="entry-footer">
                                    <a href="#">Buy Tikets</a>
                                </footer>
                            </div>

                            <div class="upcoming-event-wrap flex flex-wrap justify-content-between align-items-center">
                                <figure class="events-thumbnail">
                                    <a href="#"><img src="images/upcoming-3.jpg" alt=""></a>
                                </figure>

                                <div class="entry-meta">
                                    <div class="event-date">
                                        27<span>February</span>
                                    </div>
                                </div>

                                <header class="entry-header">
                                    <h3 class="entry-title"><a href="#">Winter Festival</a></h3>

                                    <div class="event-date-time">May 29, 2018 @ 8:00 Pm - May 30, 2018 @ 4:00 Am</div>

                                    <div class="event-speaker">Speackers: Maria Williams, Luis Smith, James Doe</div>
                                </header>

                                <footer class="entry-footer">
                                    <a href="#">Buy Tikets</a>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Action Buttons -->
        <div class="floating-buttons">
            <a href="#" class="floating-btn whatsapp-btn text-decoration-none" target="_blank" aria-label="WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="tel:+15551234567" class="floating-btn call-btn text-decoration-none" aria-label="Call Us">
                <i class="fas fa-phone"></i>
            </a>
        </div>
    </div>

    <?php

    include "footer.php";

    ?>

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
    <script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='js/swiper.min.js'></script>
    <script type='text/javascript' src='js/jquery.countdown.min.js'></script>
    <script type='text/javascript' src='js/circle-progress.min.js'></script>
    <script type='text/javascript' src='js/jquery.countTo.min.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>
    <script src='js/callixjs.js'></script>

</body>

</html>