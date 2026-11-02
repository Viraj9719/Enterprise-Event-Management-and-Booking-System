<?php

session_start();
include "controller/connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="images/titleLogo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/callixstyle.css">
    <script src="js/custom.js"></script>

</head>

<body>
    <header class="site-header">
        <div class="header-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-10 col-lg-2 order-lg-1">
                        <div class="site-branding">
                            <div class="site-title">
                                <a href="index.php"><img src="images/mainLogo.png" alt="logo"></a>
                            </div><!-- .site-title -->
                        </div><!-- .site-branding -->
                    </div><!-- .col -->

                    <div class="col-2 col-lg-10 order-3 order-lg-2">
                        <nav class="site-navigation">
                            <div class="hamburger-menu d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div><!-- .hamburger-menu -->

                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="events.php">Upcomming Events</a></li>
                                <li><a href="history.php">Events History</a></li>
                                <li><a href="how_it_works.php">How it Works</a></li>
                                <li><a href="packages.php">Packages & Pricing</a></li>
                                <li><a href="blog.php">Blog & tips</a></li>
                                <li><a href="aboutus.php">About us</a></li>
                                <?php

                                if (isset($_SESSION["u"])) {
                                ?>
                                    <li class="text-white">Welcome <?php echo $_SESSION["u"]["fname"]; ?></li>
                                    <li class="text-white signout-txt" onclick="signout();"><i class="bi bi-box-arrow-in-left"></i> Signout</li>
                                <?php
                                } else {
                                ?>
                                    <li><a href="signuporsignin.php">Signup or Signin</a></li>
                                <?php
                                }

                                ?>
                            </ul>
                        </nav><!-- .site-navigation -->
                    </div><!-- .col -->

                    <!-- <div class="col-lg-3 d-none d-lg-block order-2 order-lg-3">
                        <div class="buy-tickets">
                            <a class="btn gradient-bg" href="#">Buy Tickets</a>
                        </div>
                    </div> -->

                </div><!-- .row -->
            </div><!-- .container-fluid -->
        </div><!-- .header-bar -->

        <div class="swiper-container hero-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-date="2025/03/01" style="background: url('images/header-bg.jpg') no-repeat">
                    <div class="hero-content">
                        <div class="container">
                            <div class="row">
                                <div class="col flex flex-column justify-content-center">
                                    <div class="entry-header">

                                        <h4 class="entry-title">
                                            “We Don’t Just Plan Events — We Create Experiences!”
                                            <br>
                                            Ideal for a vibrant, creative agency that handles parties, concerts, or festivals.
                                        </h4>
                                    </div><!--- .entry-header -->

                                    <div class="entry-footer">
                                        <a class="btn gradient-bg" href="#">Get a Quote</a>
                                    </div><!-- .entry-footer" -->
                                </div><!-- .col -->
                            </div><!-- .container -->
                        </div><!-- .hero-content -->
                    </div><!-- .swiper-slide -->
                </div><!-- .swiper-wrapper -->

                <div class="swiper-slide" data-date="2019/05/01" style="background: url('images/header-bg.jpg') no-repeat">
                    <div class="hero-content">
                        <div class="container">
                            <div class="row">
                                <div class="col flex flex-column justify-content-center">
                                    <div class="entry-header">

                                        <h4 class="entry-title">
                                            “Turning Your Vision Into Unforgettable Celebrations.”.
                                            <br>
                                            Perfect for wedding or corporate event planners — clean, classy, and confident.
                                        </h4>
                                    </div><!--- .entry-header -->

                                    <div class="entry-footer">
                                        <a class="btn gradient-bg" href="#">Plan Your Event</a>
                                    </div><!-- .entry-footer" -->
                                </div><!-- .col -->
                            </div><!-- .container -->
                        </div><!-- .hero-content -->
                    </div><!-- .swiper-slide -->
                </div><!-- .swiper-wrapper -->

                <div class="swiper-slide" data-date="2020/05/01" style="background: url('images/header-bg.jpg') no-repeat">
                    <div class="hero-content">
                        <div class="container">
                            <div class="row">
                                <div class="col flex flex-column justify-content-center">
                                    <div class="entry-header">

                                        <h4 class="entry-title">
                                            “Where Every Moment Becomes a Memory.”
                                            <br>
                                            Great, modern partner with emotional storytelling — suitable for all event types.
                                        </h4>
                                    </div><!--- .entry-header -->

                                    <div class="entry-footer">
                                        <a class="btn gradient-bg" href="#">Get a Quote</a>
                                    </div><!-- .entry-footer" -->
                                </div><!-- .col -->
                            </div><!-- .container -->
                        </div><!-- .hero-content -->
                    </div><!-- .swiper-slide -->
                </div><!-- .swiper-wrapper -->
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Add Arrows -->
            <div class="swiper-button-next flex justify-content-center align-items-center">
                <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z" />
                    </svg></span>
            </div>

            <div class="swiper-button-prev flex justify-content-center align-items-center">
                <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z" />
                    </svg></span>
            </div>
        </div><!-- .swiper-container -->

        <!-- <div class="page-header events-page-header "> -->
        <!-- <div class="container">
                <div class="row">
                    <div class="col-12">
                        <header class="entry-header">
                            <h1 class="entry-title">Events.</h1>
                        </header>
                    </div>
                </div>
            </div> -->
        <!-- </div> -->


    </header><!-- .site-header -->

    <script>
        document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for subscribing! Check your inbox for a welcome email.');
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
    <script src="js/callixjs.js"></script>

</body>

</html>