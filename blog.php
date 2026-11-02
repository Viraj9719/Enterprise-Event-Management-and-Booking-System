<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="images/titleLogo.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/swiper.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/callixstyle.css">
    <script src="js/custom.js"></script>

    <title>Rawds Entertainment || Blog & Tips</title>
</head>

<body>

    <?php
    include "header.php";
    include "paths.php";
    ?>

    <div class="mt-5 mb-5 blog-body">
        <div class="container blog-container">
            <h1 class="main-title">Blog & Event Planning Tips</h1>
            <p class="subtitle">Expert advice and inspiration for your perfect event</p>

            <!-- Featured Blog Post -->
            <div class="featured-post">
                <div class="featured-image">
                    <div class="featured-badge">
                        <i class="fas fa-star"></i> Featured
                    </div>
                    <!-- <i class="fa fa-rings-wedding"></i> -->
                    <img class="img-fluid h-75 opacity-50" src="<?php echo $ICONS_IMG_PATH_DESIGN; ?>wedding_rings_ico.svg" />
                    
                </div>
                <div class="featured-content">
                    <div class="post-meta">
                        <span><i class="far fa-calendar"></i> January 15, 2025</span>
                        <span><i class="far fa-clock"></i> 8 min read</span>
                        <span><i class="fas fa-tag"></i> Wedding Planning</span>
                    </div>
                    <h2>Top 10 Wedding Themes for 2025</h2>
                    <p>Discover the hottest wedding themes that will dominate 2025! From sustainable ceremonies to tech-integrated celebrations, we explore the trends that modern couples are embracing. Learn about color palettes, décor ideas, and how to personalize each theme to reflect your unique love story.</p>
                    <a href="#" class="read-more-btn">Read Full Article <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Blog Grid Section -->
            <div class="section-divider">
                <h3>Latest Articles</h3>
                <p>Stay updated with our expert tips and insights</p>
            </div>

            <div class="row">
                <!-- Blog Card 1 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-card">
                        <div class="blog-image budget">
                            <div class="category-tag" style="color: #4facfe;">Budget</div>
                            <i class="fas fa-calculator"></i>
                        </div>
                        <div class="blog-content">
                            <h3>How to Budget Your Event Like a Pro</h3>
                            <p>Master the art of event budgeting with our comprehensive guide. Learn how to allocate funds wisely, negotiate with vendors, and avoid common financial pitfalls.</p>
                            <div class="blog-footer">
                                <span class="blog-date">
                                    <i class="far fa-calendar"></i> Jan 10, 2025
                                </span>
                                <a href="#" class="blog-link">Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog Card 2 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-card">
                        <div class="blog-image eco">
                            <div class="category-tag" style="color: #43e97b;">Eco-Friendly</div>
                            <i class="fas fa-leaf"></i>
                        </div>
                        <div class="blog-content">
                            <h3>Eco-Friendly Event Planning Ideas</h3>
                            <p>Create stunning events while minimizing your environmental impact. Discover sustainable décor, zero-waste catering, and green venue options.</p>
                            <div class="blog-footer">
                                <span class="blog-date">
                                    <i class="far fa-calendar"></i> Jan 8, 2025
                                </span>
                                <a href="#" class="blog-link">Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog Card 3 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-card">
                        <div class="blog-image corporate">
                            <div class="category-tag" style="color: #fa709a;">Corporate</div>
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="blog-content">
                            <h3>5 Tips for Successful Corporate Events</h3>
                            <p>Elevate your corporate gatherings with professional planning strategies. From team building activities to networking mixers that impress.</p>
                            <div class="blog-footer">
                                <span class="blog-date">
                                    <i class="far fa-calendar"></i> Jan 5, 2025
                                </span>
                                <a href="#" class="blog-link">Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog Card 4 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-card">
                        <div class="blog-image decor">
                            <div class="category-tag" style="color: #30cfd0;">Décor</div>
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="blog-content">
                            <h3>Trending Décor Styles That Wow</h3>
                            <p>Explore the latest in event décor from minimalist elegance to bold maximalist designs. Get inspired by real event transformations.</p>
                            <div class="blog-footer">
                                <span class="blog-date">
                                    <i class="far fa-calendar"></i> Jan 3, 2025
                                </span>
                                <a href="#" class="blog-link">Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog Card 5 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-card">
                        <div class="blog-image venue">
                            <div class="category-tag" style="color: #fed6e3;">Venues</div>
                            <i class="fas fa-location-dot"></i>
                        </div>
                        <div class="blog-content">
                            <h3>Choosing the Perfect Venue: A Guide</h3>
                            <p>Location, location, location! Learn how to select a venue that matches your vision, accommodates your guests, and fits your budget.</p>
                            <div class="blog-footer">
                                <span class="blog-date">
                                    <i class="far fa-calendar"></i> Dec 28, 2024
                                </span>
                                <a href="#" class="blog-link">Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog Card 6 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-card">
                        <div class="blog-image wedding">
                            <div class="category-tag" style="color: #f093fb;">Wedding</div>
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="blog-content">
                            <h3>Timeline Planning for Your Big Day</h3>
                            <p>Create a stress-free wedding day with our detailed timeline template. From hair and makeup to the last dance, we've got you covered.</p>
                            <div class="blog-footer">
                                <span class="blog-date">
                                    <i class="far fa-calendar"></i> Dec 25, 2024
                                </span>
                                <a href="#" class="blog-link">Read More <i class="fas fa-arrow-right"></i>
                                </a>
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

    <?php include "footer.php"; ?>

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/callixjs.js"></script>

</body>

</html>