<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rawds Entertainment || Home</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="images/titleLogo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css" />

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/callixstyle.css">
    <script src="js/custom.js"></script>
</head>

<body>

    <?php
    include "header.php";
    include "paths.php";
    ?>

    <div class="homepage-info-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-5">
                    <figure>
                        <img src="images/logoOriginal.jpg" alt="logo">
                    </figure>
                </div>

                <div class="col-12 col-md-8 col-lg-7">
                    <header class="entry-header">
                        <h2 class="entry-title">What is RAWDS and why choose our services?</h2>
                    </header>

                    <div class="entry-content">
                        <p>
                            RAWDS Entertainment, is established with the thought of “Entertainment is more than
                            just an experience, it’s a fundamental human need”. And we are empowered by a bunch
                            of young enthusiasts who have got that unique ability to add boundless joy, excitement,
                            and cherished memories to every event we organize.
                            <br /><br />
                            From intimate gatherings to large-scale celebrations, we specialize in crafting unique,
                            immersive experiences that allow people to escape their daily routines and fully
                            embrace the moment. With a passion for creativity, meticulous planning, and a
                            commitment to excellence, we ensure that every event we curate is seamless, engaging,
                            and truly extraordinary.
                            <br /><br />
                            At RAWDS Entertainment, we don’t just plan events—we create memories that last a
                            lifetime.

                        </p>
                    </div>

                    <footer class="entry-footer">
                        <a href="aboutus.php" class="btn gradient-bg">Read More</a>
                        <?php
                        if (!isset($_SESSION["u"])) {
                        ?>
                            <a href="signuporsignin.php" class="btn dark">Register Now</a>
                        <?php
                        } else {
                        ?>
                            <a href="event_scheduler.php" class="btn dark">Create Event</a>
                        <?php
                        }
                        ?>

                    </footer>
                </div>
            </div>
        </div>
    </div>

    <div class="homepage-featured-events">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h1 class="text-white fw-bolder" style="font-size: 60px;font-style: Broadway;letter-spacing: 50px;font-weight: bolder;">
                        Event Gallery
                    </h1>
                </div>

                <?php
                $ads_rs = Database::search("SELECT * FROM `ads` WHERE `ad_status_ad_status_id`='6'");
                $ads_num = $ads_rs->num_rows;

                if ($ads_num != 0) {

                    $offset_pattern = 0;

                    for ($x = 0; $x < $ads_num; $x++) {

                        $offset_pattern = $x * 3;

                        $selected_ads_rs = Database::search("SELECT * FROM `ads` WHERE `ad_status_ad_status_id`='6' ORDER BY 
                                `ad_end_date` DESC LIMIT 3 OFFSET " . $offset_pattern . "");

                ?>
                        <div class="col-12 mb-4">
                            <div class="row">

                                <?php
                                $selected_ads_num = $selected_ads_rs->num_rows;

                                for ($y = 0; $y < $selected_ads_num; $y++) {
                                    $selected_ads_data = $selected_ads_rs->fetch_assoc();

                                ?>
                                    <div class="col-12 col-lg-4 position-relative text-center text-white">
                                        <?php
                                        $ad_img_rs = Database::search("SELECT * FROM `ad_img` WHERE `ads_ad_id`='" . $selected_ads_data["ad_id"] . "'");
                                        $ad_img_data = $ad_img_rs->fetch_assoc();

                                        ?>
                                        <img src="<?php echo $AD_IMG_PATH_DESIGN . $ad_img_data["aimg_path"]; ?>" class="w-100 shadow-1-strong rounded mb-4 callix-img" />
                                        <div class="bg-gradient callix-centered">
                                            <span class="fw-bold h5 text-black"><?php echo $selected_ads_data["ad_name"]; ?></span><br />
                                            <span class="text-black"><?php echo $selected_ads_data["ad_end_date"]; ?></span><br />
                                            <a href="#" class="fw-bold text-black"><i class="bi bi-eye-fill"></i> See more</a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                    <?php
                    }
                    ?>

                    <div class="offset-lg-4 col-12 col-lg-4 d-grid">
                        <button class="btn btn-premium">See More</button>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 text-center mt-lg-5">
                                <label class="form-label h1 text-white">Will be available soon... 😊</label>
                            </div>
                            <div class="offset-lg-2 col-12 col-lg-8 mt-lg-5">
                                <img class="img-fluid" src="resource/background_imgs/soon.gif" />
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="col-12 mt-5" style="background-image: url(resource/background_imgs/background01.png);background-repeat: no-repeat;background-size: cover;">
        <div class="row">

            <div class="col-12 text-center">
                <span class="text-black fw-bolder" style="font-size: 50px;font-style: Broadway;letter-spacing: 20px;">Client Reviews</span>
            </div>

            <?php

            $feedback_rs = Database::search("SELECT * FROM `feedback` INNER JOIN `ads` ON feedback.ads_ad_id=ads.ad_id 
            INNER JOIN `user` ON ads.user_user_id=user.user_id ORDER BY `feed_date` DESC LIMIT 3");

            for ($z = 0; $z < $feedback_rs->num_rows; $z++) {
                $feedback_data = $feedback_rs->fetch_assoc();

            ?>

                <div class="col-12 col-lg-4">
                    <div class="row">
                        <div class="offset-1 col-10 mt-3 mb-3 rounded-3" style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 40%, #1C1C1C 150%), linear-gradient(to top, rgba(255,255,255,0.40) 0%, rgba(0,0,0,0.25) 200%);background-blend-mode: multiply;">
                            <div class="row text-center">

                                <div class="col-12 mt-2">
                                    <span class="fw-bold text-warning h3"><?php echo $feedback_data["ad_name"]; ?></span>
                                </div>
                                <div class="col-12 mt-1 mb-1">
                                    <div id="carouselExampleFade<?php echo $feedback_data["feed_id"]; ?>" class="carousel slide carousel-fade rounded" data-bs-ride="carousel" style="border-style: solid;border-color: black;border-width: 1px;">
                                        <div class="carousel-inner">

                                            <?php

                                            $feed_img_rs = Database::search("SELECT * FROM `feed_img` WHERE `feedback_feed_id`='" . $feedback_data["feed_id"] . "'");

                                            if ($feed_img_rs->num_rows == 0) {
                                            ?>

                                                <div class="carousel-item active">
                                                    <img src="resource/ad_images/not_available_img.jpg" class="d-block w-100 img-thumbnail" />
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="resource/ad_images/not_available_img.jpg" class="d-block w-100 img-thumbnail" />
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="resource/ad_images/not_available_img.jpg" class="d-block w-100 img-thumbnail" />
                                                </div>

                                                <?php
                                            } else {
                                                for ($a = 0; $a < $feed_img_rs->num_rows; $a++) {
                                                    $feed_img_data = $feed_img_rs->fetch_assoc();
                                                ?>
                                                    <div class="carousel-item active">
                                                        <img src="<?php echo $FEED_IMG_PATH_DESIGN . $feed_img_data["feed_img_path"]; ?>" class="d-block w-100 img-thumbnail" style="height: 250px;" />
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade<?php echo $feedback_data["feed_id"]; ?>" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon text-bg-danger" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade<?php echo $feedback_data["feed_id"]; ?>" data-bs-slide="next">
                                            <span class="carousel-control-next-icon text-bg-danger" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="offset-1 col-10">
                                    <span class="fw-bold text-white"><?php echo $feedback_data["fname"] . " " . $feedback_data["lname"]; ?></span><br />
                                    <span class="text-black-50"><?php echo $feedback_data["ad_end_date"]; ?></span>
                                    <hr style="border-style: solid;border-color: black;border-width: 1px;" />
                                </div>
                                <!--  -->
                                <div class="col-12">
                                    <h5 class="fw-bold text-warning">Rate</h5>
                                    <div class="star-rating">
                                        <?php
                                        $rate = $feedback_data["rate"]; // assumed to be 0–5

                                        for ($b = 1; $b <= 5; $b++) {
                                            if ($b <= $rate) {
                                                // filled/starred
                                        ?>
                                                <input type="radio" name="rating<?php echo $feedback_data["feed_id"]; ?>" value="<?php echo $b; ?>" checked><i></i>
                                            <?php
                                            } else {
                                                // empty/unfilled
                                            ?>
                                                <input type="radio" name="rating<?php echo $feedback_data["feed_id"]; ?>" value="<?php echo $b; ?>" disabled><i></i>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="mt-1 mb-2">
                                        <span id="rating-value" class="h6 text-danger fw-bold">
                                            <?php echo $rate; ?> out of 5 stars
                                        </span>
                                    </div>
                                </div>
                                <!--  -->

                                <div class="offset-1 col-10">
                                    <hr style="border-style: solid;border-color: black;border-width: 1px;" />
                                </div>
                                <div class="col-12">
                                    <h5 class="fw-bold text-warning">Comment</h5>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center"
                                    style="height: 450px; position: relative; overflow: hidden;">

                                    <!-- Background image as a pseudo-overlay -->
                                    <div style="
                                                position: absolute;
                                                top: 0; left: 0;
                                                width: 100%; height: 100%;
                                                background-image: url('resource/background_imgs/background02.jpg');
                                                background-size: cover;
                                                background-position: center;
                                                opacity: 0.15;
                                                z-index: 0;
                                        "></div>

                                    <!-- Feedback message -->
                                    <blockquote class="h3 text-center"
                                        style="font-family: 'Freestyle Script', cursive; color: white; z-index: 1; max-width: 80%;">
                                        “<?php echo htmlspecialchars($feedback_data["feed_msg"]); ?>”
                                    </blockquote>
                                </div>
                                <div class="col-12 text-end mt-2 mb-2">
                                    <span class="text-white">Added on <?php echo $feedback_data["feed_date"]; ?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            <?php

            }

            ?>

            <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-5">
                <button class="btn btn-premium" onclick="window.location='history.php';">See More</button>
            </div>

        </div>
    </div>

    <!-- <div class="homepage-next-events">
        <div class="container">
            <div class="row">
                <div class="next-events-section-header">
                    <h2 class="entry-title">Our next events</h2>
                    <p>
                        Stay updated with our latest happenings! Explore our upcoming events and featured
                        projects designed to inspire, connect, and create impact. From workshops and innovation
                        challenges to creative collaborations, each event and project brings new opportunities to
                        learn, grow, and engage with our community. Don’t miss what’s coming next!
                    </p>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="row">
        <div class="offset-lg-2 col-12 col-lg-8">
            <div class="row gap-1">
                <?php

                $event_rs = Database::search("SELECT * FROM `ads` INNER JOIN `ad_status` ON 
                ads.ad_status_ad_status_id = ad_status.ad_status_id WHERE ads.ad_status_ad_status_id IN 
                (1, 4, 5, 10, 11) ORDER BY ads.ad_start_date DESC, ads.ad_time_from ASC LIMIT 3");

                for ($c = 0; $c < $event_rs->num_rows; $c++) {
                    $event_data = $event_rs->fetch_assoc();

                    if (
                        $event_data["ad_type_ad_type_id"] == 3 ||
                        $event_data["ad_type_ad_type_id"] == 4 ||
                        $event_data["ad_type_ad_type_id"] == 6 ||
                        $event_data["ad_type_ad_type_id"] == 7
                    ) {

                ?>

                        <div class="col-12 col-lg-6" style="border-style: solid; border-width: 1px; border-color: black; border-radius: 6px;">
                            <div class="card">
                                <figure>

                                    <?php

                                    $event_img = Database::search("SELECT * FROM `ad_img` WHERE `ads_ad_id`='" . $event_data["ad_id"] . "'");
                                    $event_img_data = $event_img->fetch_assoc();

                                    ?>

                                    <a href="#">
                                        <img class="img-thumbnail" style="height: 250px;" src="<?php echo $AD_IMG_PATH_DESIGN . $event_img_data["aimg_path"]; ?>" />
                                    </a>

                                    <div class="event-rating" style="font-size: 12px;">
                                        <?php
                                        if ($event_data["ad_status_id"] == 1) {
                                            echo ("Tickets Out Now");
                                        } else {
                                            echo $event_data["ad_status_type"];
                                        }
                                        ?>
                                    </div>
                                </figure>

                                <header class="entry-header">
                                    <h3 class="entry-title"><?php echo $event_data["ad_name"]; ?></h3>

                                    <div class="posted-date">
                                        FROM <br />
                                        <span><?php echo $event_data["ad_start_date"]; ?></span>
                                        -
                                        <span><?php echo $event_data["ad_time_from"]; ?></span>
                                    </div>

                                    <div class="posted-date">
                                        TO <br />
                                        <span><?php echo $event_data["ad_end_date"]; ?></span>
                                        -
                                        <span><?php echo $event_data["ad_time_to"]; ?></span>
                                    </div>
                                </header>

                                <div class="entry-content mt-3">
                                    <hr style="border-style: solid;border-width: 3;border-color: black;" />
                                    <a href="<?php echo $event_data["location"]; ?>" class="text-black-50 text-decoration-none">
                                        <img src="resource/icons/location_ico.svg" style="height: 50px;" />
                                        <br />
                                        <span class="h6 fw-bold">Click here to view location on map</span>
                                    </a>
                                    <hr style="border-style: solid;border-width: 3;border-color: black;" />
                                </div>

                                <footer class="col-12">
                                    <div class="row">
                                        <div class="col-6 d-grid">
                                            <button class="buy-btn">BUY TICKET</button>
                                        </div>
                                        <div class="col-6 d-grid">
                                            <button class="view-btn">VIEW DETAILS</button>
                                        </div>
                                        <hr class="mt-3" style="border-style: solid;border-width: 3;border-color: black;" />
                                    </div>
                                </footer>
                            </div>
                        </div>

                <?php
                    }
                }

                ?>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
            <button class="btn btn-premium" onclick="window.location='events.php';">See More</button>
        </div>
    </div> -->

    <div class="mb-5 contact-body">
        <div class="container contact-container">
            <h1 class="main-title">Get In Touch</h1>
            <p class="subtitle">Let's start planning your perfect event together</p>

            <div class="contact-card">
                <div class="row g-0">
                    <!-- Contact Information -->
                    <div class="col-lg-5">
                        <div class="contact-info-section">
                            <h3>Contact Information</h3>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Rawds Entertainments</h5>
                                    <p>
                                        No. 215, Gajaba Lane, 
                                        <br>
                                        Waththekade junction,Gonapola Junction.
                                    </p>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Phone</h5>
                                    <p>(+94)76 901 3806</p>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Email</h5>
                                    <p>rawdsentrtainment@gmail.com</p>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Business Hours</h5>
                                    <p><b>24 Hour Service</b></p>
                                </div>
                            </div>

                            <div class="social-section">
                                <h5>Follow Us</h5>
                                <div class="social-icons">
                                    <a href="#" class="social-icon" aria-label="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="#" class="social-icon" aria-label="Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="social-icon" aria-label="Pinterest">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                    <a href="#" class="social-icon" aria-label="Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="col-lg-7">
                        <div class="form-section">
                            <h3>Contact Us Dirrectly via Email</h3>
                            <!-- <form id="contactForm"> -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Full Name *</label>
                                        <input type="text" class="form-control" id="name" placeholder="John Doe" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="email" placeholder="john@example.com" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="075 000 0000">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="eventType" class="form-label">Event Type *</label>
                                        <select class="form-select" id="eventType" onchange="enableField();" required>
                                            <option value="*">Select event type</option>
                                            <?php 
                                            $type_rs = Database::search("SELECT * FROM `ad_type`");
                                            $type_num = $type_rs->num_rows;
                                            
                                            for($x = 0;$x < $type_num;$x++){
                                                $type_data = $type_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo ($type_data["ad_type_id"]); ?>">
                                                    <?php echo ($type_data["ad_type_name"]); ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                            <option value="00">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="otherType" class="form-label">If Other, Mention the Type</label>
                                        <input type="text" class="form-control" id="otherType" placeholder="Other Type Name" disabled/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="eventDate" class="form-label">Event Date *</label>
                                        <input type="date" class="form-control" id="eventDate" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="guestCount" class="form-label">Expected Guests</label>
                                        <input type="number" class="form-control" id="guestCount" placeholder="100">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea class="form-control" id="message" rows="4" placeholder="Tell us about your event vision..." required></textarea>
                                </div>

                                <button class="submit-btn" onclick="SendRequestEmail();">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="map-section">
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.968361995627!2d80.04481687448187!3d6.773705220206294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24db4bd1c93b5%3A0xb84d149789d8b789!2sK.P.S.Y.A.%20Karunarathna!5e0!3m2!1sen!2slk!4v1772901685154!5m2!1sen!2slk"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
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

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your message! Our team will contact you ASAP.');
            this.reset();
        });
    </script>

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
    <script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='js/swiper.min.js'></script>
    <script type='text/javascript' src='js/jquery.countdown.min.js'></script>
    <script type='text/javascript' src='js/circle-progress.min.js'></script>
    <script type='text/javascript' src='js/jquery.countTo.min.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/callixjs.js"></script>

</body>

</html>