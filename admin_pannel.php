<?php

session_start();
include "controller/connection.php";

if (isset($_SESSION)) {
  $admin = $_SESSION["ad"];
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel — RAWDS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet" />

    <link rel="icon" href="images/titleLogo.png">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/admin_panel_css.css" />

    <style>

    </style>
  </head>

  <body>

    <!-- ═══ SIDEBAR ═══ -->
    <aside class="sidebar" id="sidebar">

      <!-- Brand -->
      <div class="sidebar-brand">
        <div class="brand-logo">
          <img src="images/logoOriginal.jpg" class="img-thumbnail" />
        </div>
        <div class="brand-text">
          <div class="brand-company">Rawds</div>
          <div class="brand-company">Entertainment</div>
          <div class="brand-sub">Admin Control</div>
        </div>
      </div>

      <?php

      $ongoing = 0;
      $requests = 0;
      $reminders = 0;

      $event_rs = Database::search("SELECT * FROM `ads`");
      $event_num = $event_rs->num_rows;

      for ($x = 0; $x < $event_num; $x++) {
        $event_data = $event_rs->fetch_assoc();

        if ($event_data["ad_status_ad_status_id"] == 1 || $event_data["ad_status_ad_status_id"] == 4 || $event_data["ad_status_ad_status_id"] == 5 || $event_data["ad_status_ad_status_id"] == 8 || $event_data["ad_status_ad_status_id"] == 11) {
          $ongoing = $ongoing + 1;
        } else if ($event_data["ad_status_ad_status_id"] == 3 || $event_data["ad_status_ad_status_id"] == 7) {
          $requests = $requests + 1;
        }
      }

      $reminder_rs = Database::search("SELECT * FROM `reminder` WHERE `rem_status`='1'");
      $reminder_num = $reminder_rs->num_rows;
      $reminders = $reminder_num;

      ?>

      <!-- Profile -->
      <div class="sidebar-profile">
        <?php
        $first_char = substr($admin["a_fname"], 0, 1);
        $second_char = substr($admin["a_lname"], 0, 1);
        ?>
        <div class="avatar"><?php echo $first_char . $second_char; ?></div>
        <div class="profile-info">
          <div class="profile-name"><?php echo $admin["a_fname"] . " " . $admin["a_lname"]; ?></div>
          <div class="profile-role">Administrator</div>
        </div>
      </div>

      <!-- Nav -->
      <nav class="sidebar-nav">
        <div class="nav-section-label">Main</div>

        <a href="#" class="nav-link active">
          <span class="nav-icon">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <rect x="3" y="3" width="7" height="7" rx="1" />
              <rect x="14" y="3" width="7" height="7" rx="1" />
              <rect x="3" y="14" width="7" height="7" rx="1" />
              <rect x="14" y="14" width="7" height="7" rx="1" />
            </svg>
          </span>
          <span class="nav-label">Dashboard</span>
        </a>

        <a href="#" class="nav-link">
          <span class="nav-icon">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </span>
          <span class="nav-label">Events</span>
          <span class="nav-badge"><?php echo $ongoing; ?></span>
        </a>

        <a href="#" class="nav-link">
          <span class="nav-icon">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zm13 10v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
            </svg>
          </span>
          <span class="nav-label">Attendees</span>
        </a>

        <a href="#" class="nav-link">
          <span class="nav-icon">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
          </span>
          <span class="nav-label">Reports</span>
        </a>

        <div class="nav-section-label">System</div>

        <a href="#" class="nav-link">
          <span class="nav-icon">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </span>
          <span class="nav-label">Reminders</span>
          <span class="nav-badge" style="background:var(--amber)"><?php echo $reminders; ?></span>
        </a>

        <a href="#" class="nav-link">
          <span class="nav-icon">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
              <circle cx="12" cy="12" r="3" />
            </svg>
          </span>
          <span class="nav-label">Settings</span>
        </a>

        <a href="#" class="nav-link">
          <span class="nav-icon">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
          </span>
          <span class="nav-label">Logout</span>
        </a>
      </nav>

      <!-- Toggle -->
      <div class="sidebar-toggle">
        <button class="toggle-btn" id="sidebarToggle" title="Toggle sidebar">
          <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
          </svg>
        </button>
        <span class="toggle-label">Collapse</span>
      </div>

    </aside>

    <!-- ═══ MAIN ═══ -->
    <div class="main-wrap" id="mainWrap">

      <!-- Topbar -->
      <header class="topbar">
        <div class="topbar-left">
          <h1>Dashboard</h1>
          <p id="topbarDate">Loading...</p>
        </div>
        <div class="topbar-right">
          <div class="clock-widget">
            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="rgba(255,255,255,0.5)" stroke-width="2">
              <circle cx="12" cy="12" r="10" />
              <polyline points="12 6 12 12 16 14" />
            </svg>
            <div>
              <div class="clock-time" id="clockTime">--:--:--</div>
              <div class="clock-date" id="clockDateSub">Loading...</div>
            </div>
          </div>
          <div class="topbar-btn" title="Notifications">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <span class="notif-dot"></span>
          </div>
          <div class="topbar-btn" title="Profile">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
          </div>
        </div>
      </header>

      <!-- Content -->
      <main class="content">
        <!-- Stat Row -->
        <div class="row g-3 mb-4">
          <div class="col-6 col-xl-3">
            <div class="stat-card delay-1">
              <div class="stat-icon" style="background:var(--green-soft)">
                <svg fill="none" viewBox="0 0 24 24" stroke="var(--green)" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div>
                <div class="stat-val"><?php echo $ongoing; ?></div>
                <div class="stat-lbl">Ongoing</div>
              </div>
            </div>
          </div>
          <div class="col-6 col-xl-3">
            <div class="stat-card delay-2">
              <div class="stat-icon" style="background:var(--amber-soft)">
                <svg fill="none" viewBox="0 0 24 24" stroke="var(--amber)" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div>
                <div class="stat-val"><?php echo $requests; ?></div>
                <div class="stat-lbl">Pending Requests</div>
              </div>
            </div>
          </div>
          <div class="col-6 col-xl-3">
            <div class="stat-card delay-3">
              <div class="stat-icon" style="background:var(--red-soft)">
                <svg fill="none" viewBox="0 0 24 24" stroke="var(--red)" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
              </div>
              <div>
                <div class="stat-val"><?php echo $reminders; ?></div>
                <div class="stat-lbl">Reminders</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Top Row: New Requests + Ongoing Events -->
        <div class="row g-3 mb-3">

          <!-- New Event Requests -->
          <div class="col-12 col-lg-6">
            <div class="panel delay-1">
              <div class="panel-header">
                <div class="panel-title">
                  <span class="panel-dot" style="background:var(--accent)"></span>
                  New Event Requests
                </div>
                <a href="#" class="panel-action">View all →</a>
              </div>
              <div class="panel-body">
                <?php

                $request_rs = Database::search("SELECT * FROM `ads` WHERE `ad_status_ad_status_id`='3' OR `ad_status_ad_status_id`='7'");
                $request_num = $request_rs->num_rows;

                for ($x = 0; $x < $request_num; $x++) {
                  $request_data = $request_rs->fetch_assoc();
                ?>

                  <div class="event-item">
                    <div class="event-indicator" style="background:var(--accent)"></div>
                    <div class="event-info">
                      <div class="event-name"><?php echo $request_data["ad_name"]; ?></div>
                      <div class="event-meta"><?php echo $request_data["desc"]; ?></div>
                    </div>

                    <?php

                    if ($request_data["ad_status_ad_status_id"] == 3) {
                    ?>
                      <span class="event-badge" style="background:var(--accent-soft);color:var(--accent)">New</span>
                    <?php
                    } else if ($request_data["ad_status_ad_status_id"] == 7) {
                    ?>
                      <span class="event-badge" style="background:var(--amber-soft);color:var(--amber)">Pending</span>
                    <?php
                    }

                    ?>

                  </div>

                <?php
                }

                ?>
              </div>
            </div>
          </div>

          <!-- Ongoing Events -->
          <div class="col-12 col-lg-6">
            <div class="panel delay-2">
              <div class="panel-header">
                <div class="panel-title">
                  <span class="panel-dot" style="background:var(--green)"></span>
                  Ongoing Events
                </div>
                <a href="#" class="panel-action">Manage →</a>
              </div>
              <div class="panel-body">
                <?php

                $progress_rs = Database::search("SELECT * FROM `ads` INNER JOIN `progress` ON ads.ad_id=progress.eve_id 
                INNER JOIN `progress_type` ON progress.prog_type_id=progress_type.prog_type_id WHERE 
                `ad_status_ad_status_id`='1' OR `ad_status_ad_status_id`='4' OR `ad_status_ad_status_id`='5' OR 
                `ad_status_ad_status_id`='6' OR `ad_status_ad_status_id`='10' OR `ad_status_ad_status_id`='11' 
                ORDER BY `ad_start_date` ASC LIMIT 5");

                $progress_num = $progress_rs->num_rows;

                for ($z = 0; $z < $progress_num; $z++) {
                  $progress_data = $progress_rs->fetch_assoc();
                ?>

                  <div class="ongoing-item">
                    <div class="progress-ring-wrap">
                      <svg width="38" height="38" viewBox="0 0 38 38">
                        <circle class="ring-bg" cx="19" cy="19" r="15" />
                        <circle class="ring-fill" cx="19" cy="19" r="15"
                        <?php
                        if($progress_data["phase"] == 1){
                          ?>
                          PMstroke="var(--green)"
                          <?php
                        }else if($progress_data["phase"] == 2){
                          ?>
                          stroke="var(--accent)"
                          <?php
                        }else if($progress_data["phase"] == 3){
                          ?>
                          stroke="var(--amber)"
                          <?php
                        }else if($progress_data["phase"] == 4){
                          ?>
                          stroke="var(--red)"
                          <?php
                        }else if($progress_data["phase"] == 5){
                          ?>
                          stroke="var(--accent)"
                          <?php
                        }
                        ?>
                          stroke-dasharray="94.2" stroke-dashoffset="23" />
                      </svg>
                      <div class="ring-label"><?php echo $progress_data["percentage"]; ?>%</div>
                    </div>
                    <div class="ongoing-info">
                      <div class="ongoing-name"><?php echo $progress_data["ad_name"]; ?></div>
                      <div class="ongoing-meta">
                        <?php
                        if($progress_data["phase"] == 1){
                          ?>
                          <span style="color:var(--green)">●</span> Active · 
                          <?php
                        }else if($progress_data["phase"] == 2){
                          ?>
                          <span style="color:var(--accent)">●</span> Active · 
                          <?php
                        }else if($progress_data["phase"] == 3){
                          ?>
                          <span style="color:var(--amber)">●</span> Active · 
                          <?php
                        }else if($progress_data["phase"] == 4){
                          ?>
                          <span style="color:var(--red)">●</span> Live · 
                          <?php
                        }else if($progress_data["phase"] == 5){
                          ?>
                          <span style="color:var(--accent)">●</span> Active · 
                          <?php
                        }
                        ?>
                        from <?php echo $progress_data["ad_start_date"]?> · <?php echo $progress_data["ad_time_from"]?> · 
                        ends <?php echo $progress_data["ad_end_date"]?> · <?php echo $progress_data["ad_time_to"]?>
                      </div>
                    </div>
                    <a href="<?php echo $progress_data["location"]?>" class="event-badge" style="background:var(--green-soft);color:var(--green)">Location</a>
                  </div>

                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Bottom Row: Reminders -->
        <div class="row g-3">
          <div class="col-12">
            <div class="panel delay-3">
              <div class="panel-header">
                <div class="panel-title">
                  <span class="panel-dot" style="background:var(--amber)"></span>
                  Reminders
                </div>
                <a href="#" class="panel-action">All reminders →</a>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-12 col-md-4">
                    <div class="reminder-item">
                      <div class="reminder-icon" style="background:var(--red-soft)">
                        <svg fill="none" viewBox="0 0 24 24" stroke="var(--red)" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                      </div>
                      <div class="reminder-info">
                        <div class="reminder-text">Submit venue permits for Tech Summit</div>
                        <div class="reminder-time">Due: Today, 5:00 PM</div>
                      </div>
                      <span class="reminder-urgency" style="background:var(--red-soft);color:var(--red)">Due Today</span>
                    </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="reminder-item">
                      <div class="reminder-icon" style="background:var(--amber-soft)">
                        <svg fill="none" viewBox="0 0 24 24" stroke="var(--amber)" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                      </div>
                      <div class="reminder-info">
                        <div class="reminder-text">Review catering proposals — Gala Night</div>
                        <div class="reminder-time">Due: Mar 10, 12:00 PM</div>
                      </div>
                      <span class="reminder-urgency" style="background:var(--amber-soft);color:var(--amber)">Soon</span>
                    </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="reminder-item">
                      <div class="reminder-icon" style="background:var(--green-soft)">
                        <svg fill="none" viewBox="0 0 24 24" stroke="var(--green)" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                      </div>
                      <div class="reminder-info">
                        <div class="reminder-text">Send confirmation emails to all attendees</div>
                        <div class="reminder-time">Due: Mar 12, 9:00 AM</div>
                      </div>
                      <span class="reminder-urgency" style="background:var(--green-soft);color:var(--green)">Upcoming</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </main>

      <!-- Footer -->
      <footer class="main-footer">
        <div class="footer-left">
          &copy; 2025 <strong>NexaCore</strong>. All rights reserved. &nbsp;·&nbsp; Admin Panel v2.4.1
        </div>
        <div class="footer-links">
          <a href="#">Help</a>
          <a href="#">Privacy</a>
          <a href="#">Terms</a>
          <a href="#">Support</a>
        </div>
        <div class="footer-status">
          <span class="status-dot"></span>
          All systems operational
        </div>
      </footer>

    </div><!-- /main-wrap -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="js/admin_panel_js.js"></script>

  </body>

  </html>

<?php
} else {
?>

  <script>
    window.location = "admin_login.php";
  </script>

<?php
}

?>