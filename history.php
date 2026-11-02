<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rawds Entertainment || About Us</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="images/titleLogo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css" />

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

    <div class="mt-5 history-body">

        <div class="container history-container">
            <h1 class="main-title">Event History</h1>
            <p class="subtitle">Browse through our successfully completed events</p>

            <!-- Filter Section -->
            <div class="filter-section">
                <div class="row">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="filter-label">Event Type</label>
                        <select class="form-select filter-select" id="eventTypeFilter">
                            <option value="">All Types</option>
                            <option value="wedding">Wedding</option>
                            <option value="corporate">Corporate</option>
                            <option value="birthday">Birthday</option>
                            <option value="conference">Conference</option>
                            <option value="charity">Charity</option>
                            <option value="anniversary">Anniversary</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="filter-label">Year</label>
                        <select class="form-select filter-select" id="yearFilter">
                            <option value="">All Years</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="filter-label">Search Events</label>
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="search-input" placeholder="Search by name or location..." id="searchInput">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Events Grid -->
            <div id="eventsContainer">
                <div class="row">
                    <!-- Event Card 1 -->
                    <div class="col-lg-6 event-item" data-type="wedding" data-year="2024">
                        <div class="event-card">
                            <div class="event-image wedding">
                                <div class="event-badge">Wedding</div>
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="event-content">
                                <div class="event-date">
                                    <i class="far fa-calendar"></i>
                                    <span>December 15, 2024</span>
                                </div>
                                <h3 class="event-title">Sarah & Michael's Dream Wedding</h3>
                                <div class="event-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Grand Ballroom, Plaza Hotel</span>
                                </div>
                                <p class="event-description">
                                    A stunning romantic ceremony with elegant décor, featuring a beautiful garden theme with roses and fairy lights. The celebration included 250 guests.
                                </p>
                                <div class="event-details">
                                    <div class="event-stats">
                                        <span class="stat">
                                            <i class="fas fa-users"></i>
                                            250 Guests
                                        </span>
                                        <span class="stat">
                                            <i class="fas fa-clock"></i>
                                            8 Hours
                                        </span>
                                    </div>
                                    <a href="#" class="view-details-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 2 -->
                    <div class="col-lg-6 event-item" data-type="corporate" data-year="2024">
                        <div class="event-card">
                            <div class="event-image corporate">
                                <div class="event-badge">Corporate</div>
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="event-content">
                                <div class="event-date">
                                    <i class="far fa-calendar"></i>
                                    <span>November 22, 2024</span>
                                </div>
                                <h3 class="event-title">Tech Summit 2024</h3>
                                <div class="event-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Convention Center, Downtown</span>
                                </div>
                                <p class="event-description">
                                    A professional technology conference featuring keynote speakers, networking sessions, and product demonstrations for industry leaders.
                                </p>
                                <div class="event-details">
                                    <div class="event-stats">
                                        <span class="stat">
                                            <i class="fas fa-users"></i>
                                            500 Attendees
                                        </span>
                                        <span class="stat">
                                            <i class="fas fa-clock"></i>
                                            12 Hours
                                        </span>
                                    </div>
                                    <a href="#" class="view-details-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 3 -->
                    <div class="col-lg-6 event-item" data-type="birthday" data-year="2024">
                        <div class="event-card">
                            <div class="event-image birthday">
                                <div class="event-badge">Birthday</div>
                                <i class="fas fa-cake-candles"></i>
                            </div>
                            <div class="event-content">
                                <div class="event-date">
                                    <i class="far fa-calendar"></i>
                                    <span>October 8, 2024</span>
                                </div>
                                <h3 class="event-title">Emma's Sweet 16 Celebration</h3>
                                <div class="event-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Riverside Gardens</span>
                                </div>
                                <p class="event-description">
                                    A magical sweet sixteen party with a glamorous Hollywood theme, complete with red carpet entrance and professional photography.
                                </p>
                                <div class="event-details">
                                    <div class="event-stats">
                                        <span class="stat">
                                            <i class="fas fa-users"></i>
                                            100 Guests
                                        </span>
                                        <span class="stat">
                                            <i class="fas fa-clock"></i>
                                            6 Hours
                                        </span>
                                    </div>
                                    <a href="#" class="view-details-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 4 -->
                    <div class="col-lg-6 event-item" data-type="conference" data-year="2024">
                        <div class="event-card">
                            <div class="event-image conference">
                                <div class="event-badge">Conference</div>
                                <i class="fas fa-microphone"></i>
                            </div>
                            <div class="event-content">
                                <div class="event-date">
                                    <i class="far fa-calendar"></i>
                                    <span>September 14, 2024</span>
                                </div>
                                <h3 class="event-title">Healthcare Innovation Forum</h3>
                                <div class="event-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Medical Center Auditorium</span>
                                </div>
                                <p class="event-description">
                                    An inspiring healthcare conference featuring medical professionals discussing cutting-edge treatments and innovations.
                                </p>
                                <div class="event-details">
                                    <div class="event-stats">
                                        <span class="stat">
                                            <i class="fas fa-users"></i>
                                            300 Attendees
                                        </span>
                                        <span class="stat">
                                            <i class="fas fa-clock"></i>
                                            10 Hours
                                        </span>
                                    </div>
                                    <a href="#" class="view-details-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 5 -->
                    <div class="col-lg-6 event-item" data-type="charity" data-year="2023">
                        <div class="event-card">
                            <div class="event-image charity">
                                <div class="event-badge">Charity</div>
                                <i class="fas fa-hand-holding-heart"></i>
                            </div>
                            <div class="event-content">
                                <div class="event-date">
                                    <i class="far fa-calendar"></i>
                                    <span>August 20, 2024</span>
                                </div>
                                <h3 class="event-title">Hope Gala 2024</h3>
                                <div class="event-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>City Hall Grand Theater</span>
                                </div>
                                <p class="event-description">
                                    A fundraising gala supporting local children's education, featuring silent auctions, entertainment, and inspiring speeches.
                                </p>
                                <div class="event-details">
                                    <div class="event-stats">
                                        <span class="stat">
                                            <i class="fas fa-users"></i>
                                            400 Guests
                                        </span>
                                        <span class="stat">
                                            <i class="fas fa-clock"></i>
                                            7 Hours
                                        </span>
                                    </div>
                                    <a href="#" class="view-details-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 6 -->
                    <div class="col-lg-6 event-item" data-type="anniversary" data-year="2023">
                        <div class="event-card">
                            <div class="event-image anniversary">
                                <div class="event-badge">Anniversary</div>
                                <i class="fas fa-champagne-glasses"></i>
                            </div>
                            <div class="event-content">
                                <div class="event-date">
                                    <i class="far fa-calendar"></i>
                                    <span>July 5, 2024</span>
                                </div>
                                <h3 class="event-title">Golden Anniversary - 50 Years</h3>
                                <div class="event-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Lakeside Resort</span>
                                </div>
                                <p class="event-description">
                                    A heartwarming celebration of 50 years of marriage, featuring family memories, live music, and elegant gold-themed décor.
                                </p>
                                <div class="event-details">
                                    <div class="event-stats">
                                        <span class="stat">
                                            <i class="fas fa-users"></i>
                                            150 Guests
                                        </span>
                                        <span class="stat">
                                            <i class="fas fa-clock"></i>
                                            5 Hours
                                        </span>
                                    </div>
                                    <a href="#" class="view-details-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination-container">
                <div class="pagination-info">
                    Showing <strong id="showingStart">1</strong> to <strong id="showingEnd">6</strong> of <strong id="totalEvents">18</strong> events
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination" id="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Filter functionality
        const eventTypeFilter = document.getElementById('eventTypeFilter');
        const yearFilter = document.getElementById('yearFilter');
        const searchInput = document.getElementById('searchInput');
        const eventItems = document.querySelectorAll('.event-item');

        function filterEvents() {
            const typeValue = eventTypeFilter.value.toLowerCase();
            const yearValue = yearFilter.value;
            const searchValue = searchInput.value.toLowerCase();

            eventItems.forEach(item => {
                const itemType = item.getAttribute('data-type');
                const itemYear = item.getAttribute('data-year');
                const itemText = item.textContent.toLowerCase();

                const typeMatch = !typeValue || itemType === typeValue;
                const yearMatch = !yearValue || itemYear === yearValue;
                const searchMatch = !searchValue || itemText.includes(searchValue);

                if (typeMatch && yearMatch && searchMatch) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        eventTypeFilter.addEventListener('change', filterEvents);
        yearFilter.addEventListener('change', filterEvents);
        searchInput.addEventListener('input', filterEvents);

        // Pagination functionality
        const paginationLinks = document.querySelectorAll('.pagination .page-link');

        paginationLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove active class from all items
                document.querySelectorAll('.pagination .page-item').forEach(item => {
                    item.classList.remove('active');
                });

                // Add active class to clicked item
                if (!this.parentElement.classList.contains('disabled')) {
                    this.parentElement.classList.add('active');
                }

                // Scroll to top smoothly
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/callixjs.js"></script>

</body>

</html>