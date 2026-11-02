<!DOCTYPE html>
<html lang="en">

<head>

    <title>Rawds Entertainment || Event Scheduler</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="images/titleLogo.png">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/callixstyle.css" />

</head>

<body>

    <?php
    include "header.php";
    include "paths.php";

    if (isset($_SESSION["u"])) {
    ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-center">Event Scheduler</h1>
                </div>
                <div class="offset-lg-3 col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label class="form-label"><b>Event Name</b></label>
                            <input class="form-control" type="text" id="ename" required />
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label"><b>Event Start Date</b></label>
                            <input class="form-control" type="date" id="esdate" required />
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label"><b>Event End Date</b></label>
                            <input class="form-control" type="date" id="eedate" />
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label"><b>Event Location</b></label>
                            <input class="form-control" type="text" id="elocaton" required />
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label"><b>Nearest City</b></label>
                            <select class="form-control" style="height: 50px;" id="ecity" required>
                                <option value="0">Select nearest city</option>
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
                        <div class="col-6 mb-2">
                            <label class="form-label"><b>Event Type</b></label>
                            <select class="form-control" style="height: 50px;" id="etype" required>
                                <option value="0">Select event type</option>
                                <?php

                                $event_type_rs = Database::search("SELECT * FROM `ad_type`");
                                for ($y = 0; $y < $event_type_rs->num_rows; $y++) {
                                    $event_type_data = $event_type_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $event_type_data["ad_type_id"]; ?>">
                                        <?php echo $event_type_data["ad_type_name"]; ?>
                                    </option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label"><b>Start Time</b></label>
                            <input type="time" class="form-control" id="estart" required />
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label"><b>End Time</b></label>
                            <input type="time" class="form-control" id="eend" required />
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label"><b>Expected Crowd</b></label>
                            <input type="number" class="form-control" id="ecrowd" required />
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label"><b>Event Environment</b></label>
                            <select class="form-control" style="height: 50px;" id="envtype" required>
                                <option value="0">Select Event Environment</option>
                                <?php

                                $event_env_rs = Database::search("SELECT * FROM `environment`");
                                for ($z = 0; $z < $event_env_rs->num_rows; $z++) {
                                    $event_env_data = $event_env_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $event_env_data["env_id"]; ?>">
                                        <?php echo $event_env_data["env_type"]; ?>
                                    </option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label"><b>Event Co-ordinator</b></label>
                            <input class="form-control" disabled type="text" id="ecoordinator" value="<?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?>" />
                        </div>
                        <div class="col-12">
                            <label class="form-label"><b>Ticket Price Breakdown</b></label>
                        </div>
                        <div class="col-12 mb-2">
                            <div class="row">
                                <div class="col-12 border border-1 border-dark-subtle">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <label class="form-label fw-bold text-decoration-underline text-primary-emphasis">Ticket Category</label>
                                        </div>
                                        <div class="col-4 text-center">
                                            <label class="form-label fw-bold text-decoration-underline text-primary-emphasis">Ticket Price</label>
                                        </div>
                                        <div class="col-4 text-center">
                                            <label class="form-label fw-bold text-decoration-underline text-primary-emphasis">Ticket Quantity</label>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $ticket_rs = Database::search("SELECT * FROM `price_category`");
                                for ($a = 0; $a < $ticket_rs->num_rows; $a++) {
                                    $ticket_data = $ticket_rs->fetch_assoc();
                                ?>
                                    <div class="col-12 border border-1 border-dark-subtle">
                                        <div class="row">
                                            <div class="col-4">
                                                <input type="text" class="form-control text-center" disabled placeholder="Ticket Name" id="tname<?php echo $ticket_data["p_cat_id"]; ?>" value="<?php echo $ticket_data["p_cat_name"]; ?>" />
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control text-center" placeholder="Ticket Price" id="tprice<?php echo $ticket_data["p_cat_id"]; ?>" value="0" />
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control text-center" placeholder="Ticket Count" id="tqty<?php echo $ticket_data["p_cat_id"]; ?>" value="0" />
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label"><b>Event Description</b></label>
                            <textarea class="form-control" rows="20" id="edesc"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label fw-bold">Add Event Images</label>
                                </div>
                                <div class="offset-lg-1 col-12 col-lg-10">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 border border-primary rounded">
                                            <img src="images/add_img.png" class="img-thumbnail" id="i0" style="height: 200px;" />
                                        </div>
                                        <div class="col-12 col-lg-4 border border-primary rounded">
                                            <img src="images/add_img.png" class="img-thumbnail" id="i1" style="height: 200px;" />
                                        </div>
                                        <div class="col-12 col-lg-4 border border-primary rounded">
                                            <img src="images/add_img.png" class="img-thumbnail" id="i2" style="height: 200px;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                    <input type="file" class="d-none" multiple id="imageUploader" required />
                                    <label for="imageUploader" class="btn btn-success" onclick="setImg();">Upload Images</label>
                                </div>
                                <div class="offset-lg-3 col-12 col-lg-6 mb-3 mt-3 d-grid">
                                    <button class="btn btn-primary" onclick="schedule();">Get Quotation</button>
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

        <script src='js/callixjs.js'></script>

    <?php
    } else {
    ?>
        <script>
            window.location = "index.php";
        </script>
    <?php
    }
    ?>

</body>

</html>