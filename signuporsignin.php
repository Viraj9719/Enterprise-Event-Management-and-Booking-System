<?php
session_start();

include "controller/connection.php";
require_once 'gAuth_config.php';

if (isset($_SESSION['access_token'])) {
    header('Location: callback.php');
    exit();
}

$login_url = $client->createAuthUrl();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rawds Entertainment || Signin or Signup</title>

    <link rel="icon" href="images/titleLogo.png">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/callixstyle.css">

    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body class="signin_background">

    <div class="container-fluid">
        <!-- Signin box -->
        <div class="row" id="signInBox">
            <div class="offset-1 offset-lg-5 col-10 col-lg-2 mt-5">
                <img class="img-thumbnail" src="images/mainLogo.png" alt="main logo" />
            </div>
            <div class="col-12 text-center mt-3">
                <h3 class="text-white">Have an Account?</h3>
            </div>
            <div class="offset-lg-4 col-12 col-lg-4 d-none" id="msgdiv1">
                <div class="alert alert-danger" role="alert" id="msg1">
                    <!-- alert loads here -->
                </div>
            </div>
            <?php
            $email = "";
            $password = "";

            if (isset($_COOKIE["email"])) {
                $email = $_COOKIE["email"];
            }
            if (isset($_COOKIE["password"])) {
                $password = $_COOKIE["password"];
            }
            ?>
            <div class="offset-lg-4 col-12 col-lg-4 mt-3">
                <label class="text-white">Email address</label>
                <input value="<?php echo $email; ?>" type="email" class="form-control" placeholder="name@example.com" id="email2" />
            </div>
            <div class="offset-lg-4 col-12 col-lg-4 mt-3">
                <label class="text-white">Password</label>
                <input value="<?php echo $password; ?>" type="password" class="form-control" placeholder="Password" id="pw" />
            </div>
            <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3">
                <button class="btn btn-primary" onclick="signin();">Sign in</button>
            </div>
            <div class="offset-lg-4 col-12 col-lg-2 mt-3 form-check">
                <input class="form-check-input" type="checkbox" id="remember" checked />
                <label class="form-check-label text-white" for="remember">
                    Remember me.
                </label>
            </div>
            <div class="col-12 col-lg-2 mt-3 form-check text-end">
                <label class="form-label text-white" onclick="openFWModal();">Forgotten Password?</label>
            </div>

            <!-- Forgot password Modal -->

            <div class="modal" tabindex="-1" id="fpMpdal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Forgotten Password?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12 mb-2">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control border border-primary shadow-none" id="email3" />
                                    </div>
                                    <div class="col-12 d-grid mb-2">
                                        <button class="btn btn-primary" onclick="fpwVcode();">Send Verification Code</button>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label class="form-label">Verification Code</label>
                                        <input id="vc" type="text" class="form-control border border-primary shadow-none" disabled />
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label">New Password</label>
                                        <div class="input-group mb-3">
                                            <input id="np" type="password" class="form-control border border-secondary shadow-none" disabled placeholder="Password" aria-describedby="npb">
                                            <button id="npb" class="btn btn-outline-secondary" type="button" onclick="showPw1();"><i class="bi bi-eye-fill"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label">Retype Password</label>
                                        <div class="input-group mb-3">
                                            <input id="rtnp" type="password" class="form-control border border-secondary shadow-none" disabled placeholder="Password" aria-describedby="rtnpb">
                                            <button class="btn btn-outline-secondary" type="button" id="rtnpb" onclick="showPw2();"><i class="bi bi-eye-fill"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetPw();">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Forgot password Modal -->

            <div class="col-12 text-center text-white mt-3 d-none">
                <label>&mdash; Or Sign In With &mdash;</label>
            </div>
            <div class="offset-lg-4 col-12 col-lg-4 mt-3 d-none">
                <div class="row">
                    <div class="col-12 col-lg-4 mb-2 mb-lg-0 d-grid">

                        <a href="#" class='btn btn-success'><i class='bi bi-google'></i> Google</a>;

                        <!-- <button class="btn btn-success"><i class="bi bi-google"></i> Google</button> -->
                    </div>
                    <div class="col-12 col-lg-4 mb-2 mb-lg-0 d-grid">
                        <button class="btn btn-primary"><i class="bi bi-facebook"></i> Facebook</button>
                    </div>
                    <div class="col-12 col-lg-4 mb-2 mb-lg-0 d-grid">
                        <button class="btn btn-danger bg-gradient"><i class="bi bi-instagram"></i> Instagram</button>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center text-white mt-3 mb-5">
                <label>Don't have an account?<a href="#" class="fw-bold text-white" onclick="changeView();"> Click Here to Sign up</a> </label>
            </div>
        </div>
        <!-- Signin box -->
        <!-- Signup box -->
        <div class="row d-none" id="signUpBox">
            <div class="offset-1 offset-lg-5 col-10 col-lg-2 mt-5">
                <img class="img-thumbnail" src="images/mainLogo.png" alt="main logo" />
            </div>
            <div class="col-12 text-center mt-3">
                <h3 class="text-white">Don't Have an Account?</h3>
            </div>
            <div class="offset-lg-4 col-12 col-lg-4 d-none" id="msgdiv">
                <div class="alert alert-danger" role="alert" id="msg">
                    <!-- alert loads here -->
                </div>
            </div>
            <div class="offset-lg-4 col-12 col-lg-2 mt-3">
                <label class="text-white">First Name</label>
                <input type="email" class="form-control" placeholder="John" id="fname" />
            </div>
            <div class="col-12 col-lg-2 mt-3">
                <label class="text-white">Last Name</label>
                <input type="email" class="form-control" placeholder="Doe" id="lname" />
            </div>
            <div class="offset-lg-4 col-12 col-lg-4 mt-3">
                <label class="text-white">Email address</label>
                <input type="email" class="form-control" placeholder="name@example.com" id="email" />
            </div>
            <div class="offset-lg-4 col-12 col-lg-2 mt-3">
                <label class="text-white">Mobile</label>
                <input type="email" class="form-control" placeholder="075#######" id="mobile" />
            </div>
            <div class="col-12 col-lg-2 mt-3">
                <label class="text-white">Gender</label>
                <select class="form-select" id="gender">
                    <option value="0">Select</option>
                    <?php

                    $gender_rs = Database::search("SELECT * FROM `gender`");
                    $gender_num = $gender_rs->num_rows;

                    for ($x = 0; $x < $gender_num; $x++) {
                        $gender_data = $gender_rs->fetch_assoc();
                    ?>
                        <option value="<?php echo $gender_data["gender_id"]; ?>">
                            <?php echo $gender_data["gender_type"]; ?>
                        </option>
                    <?php
                    }

                    ?>

                </select>
            </div>
            <div class="offset-lg-4 col-12 col-lg-2 mt-3">
                <label class="text-white">Password</label>
                <input type="password" class="form-control" placeholder="Password" id="typepw" />
            </div>
            <div class="col-12 col-lg-2 mt-3">
                <label class="text-white">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Password" id="confirmpw" />
            </div>
            <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3">
                <button class="btn btn-primary" onclick="signup();">Sign Up</button>
            </div>
            <!-- <div class="col-12 text-center text-white mt-3">
                <label>&mdash; Or Sign In With &mdash;</label>
            </div>
            <div class="offset-lg-4 col-12 col-lg-4 mt-3">
                <div class="row">
                    <div class="col-12 col-lg-4 d-grid">
                        <button class="btn btn-success"><i class="bi bi-google"></i> Google</button>
                    </div>
                    <div class="col-12 col-lg-4 d-grid">
                        <button class="btn btn-primary"><i class="bi bi-facebook"></i> Facebook</button>
                    </div>
                    <div class="col-12 col-lg-4 d-grid">
                        <button class="btn btn-danger bg-gradient"><i class="bi bi-instagram"></i> Instagram</button>
                    </div>
                </div>
            </div> -->
            <div class="col-12 text-center text-white mt-3 mb-5">
                <label>Do you have an account?<a href="#" class="fw-bold text-white" onclick="changeView();"> Click here to Sign In</b></label>
            </div>
        </div>
        <!-- Signup box -->
    </div>

    <script src="js/bootstrap.js"></script>
    <script src="js/callixjs.js"></script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>