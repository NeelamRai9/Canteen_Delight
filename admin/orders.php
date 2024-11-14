<?php
session_start();
// Check if the user is not logged in as admin, redirect to login page
if (!isset($_SESSION['admin'])) {
  header("Location: http://localhost/index.php");
  exit();
}
require_once('forms/config.php');

// Create a connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch reservation data from the database
$query = "SELECT * FROM Reservation";
$result = $conn->query($query);

// Check if there are reservations
if ($result->num_rows > 0) {
    $reservations = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $reservations = [];
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Canteen Delight | Orders</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
        <a href="index.php">
          <img src="assets/images/logo/logo.png" alt="logo" />
        </a>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_1"
              aria-controls="ddmenu_1"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                  <path
                    d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
                </svg>
              </span>
              <span class="text">Dashboard</span>
            </a>
            <ul id="ddmenu_1" class="collapse show dropdown-nav">
              <li>
                <a href="index.php" > Canteen Delight </a>
              </li>
              <li>
                <a href="settings.php"> Settings </a>
              </li>
              <li>
                <a href="menu.php" > Menu </a>
              </li>
              <li>
                <a href="orders.php" class="active"> Orders </a>
              </li>
              <li>
                <a href="users.php"> Users </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-15">
                  <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                    <i class="lni lni-chevron-left me-2"></i> Menu
                  </button>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- profile start -->
                <div class="profile-box ml-15">
                  <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-info">
                      <div class="info">
                        <div class="image">
                          <img src="assets/images/profile/profile-image.png" alt="" />
                        </div>
                        <div>
                          <h6 class="fw-500">Sonam</h6>
                          <p>Admin</p>
                        </div>
                      </div>
                    </div>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                    <li>
                      <div class="author-info flex items-center !p-1">
                        <div class="image">
                          <img src="assets/images/profile/profile-image.png" alt="image">
                        </div>
                        <div class="content">
                          <h4 class="text-sm">Sonam</h4>
                          <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs" href="#">canteendelight@gmail.com</a>
                        </div>
                      </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="settings.php">
                        <i class="lni lni-user"></i> View Profile
                      </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="logout.php"> <i class="lni lni-exit"></i> Sign Out </a>
                    </li>
                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- ========== header end ========== -->

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Orders</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      
                      <li class="breadcrumb-item active" aria-current="page">
                       Orders
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <div class="row">
           <div class="col-lg-12">
                <div class="card-style mb-30">
                    <h6 class="mb-10">Orders</h6>
                    <div class="table-wrapper table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="Name"><h6>Name</h6></th>
                                    <th class="lead-phone min-width"><h6>Phone No</h6></th>
                                    <th class="Date min-width"><h6>Date</h6></th>
                                    <th class="Time min-width"><h6>Time</h6></th>
                                    <th class="no_people min-width"><h6>No. of People</h6></th>
                                    <th class="Reservation min-width"><h6>Reservation Type</h6></th>
                                    <th class="Orders min-width"><h6>Orders</h6></th>
                                    <th class="min-width"><h6>Total Amount</h6></th>
                                    
                                    <th><h6>Actions</h6></th>
                                </tr>
                            </thead>
                            <tbody id="reservationTable">
                                <?php foreach ($reservations as $reservation): ?>
                                    <tr data-reservation-id="<?= $reservation['id'] ?>">
                                        <td class="min-width"><?= $reservation['name'] ?></td>
                                        <td class="min-width"><?= $reservation['phone'] ?></td>
                                        <td class="min-width"><?= $reservation['reservation_date'] ?></td>
                                        <td class="min-width"><?= $reservation['reservation_time'] ?></td>
                                        <td class="min-width"><?= $reservation['num_people'] ?></td>
                                        <td class="min-width"><?= $reservation['reservation_type'] ?></td>
                                        <td ><?= $reservation['order_message'] ?></td>
                                        <td class="min-width"><?= $reservation['total_price'] ?></td>
                                        <td class="min-width">
                                            <button class="btn btn-danger btn-delete" data-reservation-id="<?= $reservation['id'] ?>">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

              <!-- End Col -->
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function() {
        // Handle status change
        $('.status-select').on('change', function() {
            var reservationId = $(this).data('reservation-id');
            var newStatus = $(this).val();

            $.ajax({
                type: 'POST',
                url: 'forms/update-status.php', // Replace with the actual PHP file to handle status update
                data: { reservationId: reservationId, newStatus: newStatus },
                success: function(response) {
                    // Handle success (if needed)
                    console.log(response);
                },
                error: function(error) {
                    // Handle error (if needed)
                    console.error(error);
                }
            });
        });

        // Handle delete button click
        $('.btn-delete').on('click', function() {
            var reservationId = $(this).data('reservation-id');

            $.ajax({
                type: 'POST',
                url: 'forms/delete-reservation.php', // Replace with the actual PHP file to handle reservation deletion
                data: { reservationId: reservationId },
                success: function(response) {
                    // Handle success (if needed)
                    console.log(response);
                    // Remove the row from the table on success
                    $('tr[data-reservation-id="' + reservationId + '"]').remove();
                },
                error: function(error) {
                    // Handle error (if needed)
                    console.error(error);
                }
            });
        });
    });
    </script>
  </body>
</html>
