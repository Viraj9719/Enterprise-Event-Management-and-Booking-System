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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/callixstyle.css">
    <script src="js/custom.js"></script>

    <title>Rawds Entertainment || Packages & Pricing</title>
</head>

<body>

    <?php
    include "header.php";
    include "paths.php";
    ?>

    <div class="mt-5 mb-5 package-body">
        <div class="container pricing-container">
            <h1 class="main-title">Packages & Pricing</h1>
            <p class="subtitle">Choose the perfect package for your special event</p>

            <div class="row">
                <!-- Basic Package -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card">
                        <div class="package-icon basic-icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <h3 class="package-title">Basic</h3>
                        <p class="package-price">Perfect for intimate gatherings</p>

                        <ul class="features-list">
                            <li><i class="fas fa-check-circle"></i> Event consultation & planning</li>
                            <li><i class="fas fa-check-circle"></i> Venue recommendations</li>
                            <li><i class="fas fa-check-circle"></i> Basic décor package</li>
                            <li><i class="fas fa-check-circle"></i> Vendor coordination</li>
                            <li><i class="fas fa-check-circle"></i> Day-of coordination (4 hours)</li>
                            <li><i class="fas fa-check-circle"></i> Event timeline creation</li>
                            <li><i class="fas fa-check-circle"></i> Email support</li>
                        </ul>

                        <button class="select-btn btn-basic">Select Basic</button>
                    </div>
                </div>

                <!-- Premium Package -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card featured">
                        <div class="badge-featured">POPULAR</div>
                        <div class="package-icon premium-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <h3 class="package-title">Premium</h3>
                        <p class="package-price">Most popular for memorable events</p>

                        <ul class="features-list">
                            <li><i class="fas fa-check-circle"></i> Everything in Basic</li>
                            <li><i class="fas fa-check-circle"></i> Custom décor design</li>
                            <li><i class="fas fa-check-circle"></i> Vendor sourcing & management</li>
                            <li><i class="fas fa-check-circle"></i> Full day coordination (8 hours)</li>
                            <li><i class="fas fa-check-circle"></i> Rehearsal attendance</li>
                            <li><i class="fas fa-check-circle"></i> Guest list management</li>
                            <li><i class="fas fa-check-circle"></i> RSVP tracking</li>
                            <li><i class="fas fa-check-circle"></i> Budget management</li>
                            <li><i class="fas fa-check-circle"></i> Phone & email support</li>
                        </ul>

                        <button class="select-btn btn-premium">Select Premium</button>
                    </div>
                </div>

                <!-- Luxury Package -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card">
                        <div class="package-icon luxury-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h3 class="package-title">Luxury</h3>
                        <p class="package-price">The ultimate experience</p>

                        <ul class="features-list">
                            <li><i class="fas fa-check-circle"></i> Everything in Premium</li>
                            <li><i class="fas fa-check-circle"></i> Unlimited consultation meetings</li>
                            <li><i class="fas fa-check-circle"></i> Premium décor & styling</li>
                            <li><i class="fas fa-check-circle"></i> Exclusive vendor access</li>
                            <li><i class="fas fa-check-circle"></i> Full event management (12+ hours)</li>
                            <li><i class="fas fa-check-circle"></i> Multiple site visits</li>
                            <li><i class="fas fa-check-circle"></i> VIP guest services</li>
                            <li><i class="fas fa-check-circle"></i> Custom stationery design</li>
                            <li><i class="fas fa-check-circle"></i> Post-event breakdown</li>
                            <li><i class="fas fa-check-circle"></i> 24/7 priority support</li>
                        </ul>

                        <button class="select-btn btn-luxury">Select Luxury</button>
                    </div>
                </div>
            </div>

            <!-- Custom Quote Section -->
            <div class="custom-quote-section">
                <h3>Need Something Custom?</h3>
                <p>Every event is unique. Let us create a personalized package tailored specifically to your vision and budget.</p>
                <button class="btn-custom-quote">
                    <i class="fas fa-envelope"></i>
                    Request a Custom Quote
                </button>
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
    </div>

    <?php include "footer.php"; ?>

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/callixjs.js"></script>

</body>

</html>