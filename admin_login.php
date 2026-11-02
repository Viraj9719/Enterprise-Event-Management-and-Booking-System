<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login — Rawds</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />

    <link rel="icon" href="images/titleLogo.png">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/admin_css.css" />
</head>

<body>

    <div class="bg-grid"></div>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <div class="login-wrapper">
        <div class="login-card">

            <!-- Logo + Branding -->
            <div class="logo-area">
                <div class="logo-ring">
                    <!-- Shield/Admin Icon -->
                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 3L5 7.5V15C5 21.08 9.84 26.77 16 28C22.16 26.77 27 21.08 27 15V7.5L16 3Z"
                            fill="rgba(255,255,255,0.15)" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 16l2.5 2.5 5.5-5.5" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="page-name">Admin Portal</span>
                <span class="company-name text-center">RAWDS Entertainment</span>
            </div>

            <div class="divider"></div>

            <!-- Form -->
            <form autocomplete="off" onsubmit="return false;">

                <!-- Username -->
                <div class="input-wrap">
                    <label class="form-label" for="username">Username</label>
                    <div style="position:relative">
                        <span class="input-icon">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z" />
                            </svg>
                        </span>
                        <input type="text" id="username" class="form-control"
                            placeholder="Enter your username" autocomplete="off" />
                    </div>
                </div>

                <!-- Password -->
                <div class="input-wrap" style="margin-bottom:8px">
                    <label class="form-label" for="password">Password</label>
                    <div style="position:relative">
                        <span class="input-icon">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" stroke-linecap="round" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 11V7a5 5 0 0110 0v4" />
                            </svg>
                        </span>
                        <input type="password" id="password" class="form-control"
                            placeholder="Enter your password" autocomplete="new-password" />
                        <button type="button" class="eye-btn" id="eyeBtn" aria-label="Toggle password">
                            <svg id="eyeIcon" width="16" height="16" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                <circle cx="12" cy="12" r="3" stroke-linecap="round" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember me + Forgot password -->
                <div class="util-row">
                    <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input" type="checkbox" id="rememberMe" />
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <a href="#" class="forgot-link">Forgot password?</a>
                </div>

                <!-- Sign In Button -->
                <button class="btn-signin" onclick="signin();">
                    Sign In <span class="arrow">→</span>
                </button>

            </form>

            <!-- Footer -->
            <p class="footer-note">
                Protected by Callix Software solutions &nbsp;·&nbsp;
                <a href="#">Privacy Policy</a>
            </p>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/admin_js.js"></script>
</body>

</html>