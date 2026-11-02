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

    <title>Rawds Entertainment || How it works</title>
</head>

<body>

    <?php 
    include "header.php";
    include "paths.php"; 
    ?>

    <div class="mt-5 mb-5 callix-body">

        <div class="container process-container">
            <h1 class="main-title">How It Works</h1>
            <p class="subtitle text-white">Our proven 5-step process ensures your event is flawless from start to finish</p>

            <!-- Step 1 -->
            <div class="process-step" data-aos="fade-up">
                <div class="step-number">1</div>
                <div class="icon-wrapper">
                    <i class="fas fa-comments"></i>
                </div>
                <h3 class="step-title">Consultation</h3>
                <p class="step-description">
                    We begin with an in-depth consultation to understand your vision, goals, and budget. This is where we learn about your style preferences, guest count, and any special requirements to create a personalized event plan just for you.
                </p>
            </div>

            <div class="connector mt-3 mb-3">
                <i class="fas fa-chevron-down"></i>
            </div>

            <!-- Step 2 -->
            <div class="process-step" data-aos="fade-up">
                <div class="step-number">2</div>
                <div class="icon-wrapper">
                    <i class="fas fa-pencil-ruler"></i>
                </div>
                <h3 class="step-title">Design & Planning</h3>
                <p class="step-description">
                    Our creative team develops a comprehensive event design and detailed plan. We'll present mood boards, venue options, and vendor recommendations tailored to your vision. Every detail is carefully mapped out to ensure nothing is overlooked.
                </p>
            </div>

            <div class="connector mt-3 mb-3">
                <i class="fas fa-chevron-down"></i>
            </div>

            <!-- Step 3 -->
            <div class="process-step" data-aos="fade-up">
                <div class="step-number">3</div>
                <div class="icon-wrapper">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="step-title">Coordination</h3>
                <p class="step-description">
                    We coordinate with all vendors, venues, and service providers on your behalf. From catering to entertainment, we manage contracts, schedules, and logistics so you can relax knowing everything is handled professionally.
                </p>
            </div>

            <div class="connector mt-3 mb-3">
                <i class="fas fa-chevron-down"></i>
            </div>

            <!-- Step 4 -->
            <div class="process-step" data-aos="fade-up">
                <div class="step-number">4</div>
                <div class="icon-wrapper">
                    <i class="fas fa-star"></i>
                </div>
                <h3 class="step-title">Execution</h3>
                <p class="step-description">
                    On the big day, our team is on-site to manage every aspect of your event. We oversee setup, coordinate with vendors, handle any unexpected issues, and ensure your timeline runs smoothly so you can enjoy every moment stress-free.
                </p>
            </div>

            <div class="connector mt-3 mb-3">
                <i class="fas fa-chevron-down"></i>
            </div>

            <!-- Step 5 -->
            <div class="process-step" data-aos="fade-up">
                <div class="step-number">5</div>
                <div class="icon-wrapper">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <h3 class="step-title">Post-Event Follow-up</h3>
                <p class="step-description">
                    After your event, we conduct a thorough follow-up to ensure your complete satisfaction. We gather feedback, handle final vendor payments and returns, and provide you with a recap of your special day including any photos or videos captured.
                </p>
            </div>
        </div>

    </div>

    <div class="mt-5 mb-5 callix-body">
        <div class="container process-container">

            <h1 class="main-title">Our Partners</h1>
            <p class="subtitle text-white">Our network of trusted partners strengthens every aspect of what we do — ensuring flawless execution.</p>

            <div class="row">
                <div class="col-3 col-lg-3">
                    <div class="row">
                        <div class="col-12">
                            <img class="img-thumbnail" src="<?php echo $LOGOS_IMG_PATH_DESIGN; ?>CallixLogo.jpg" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="text-black-50 fw-bold h6">Callix Software Solutions</p>
                        </div>
                    </div>
                </div>
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