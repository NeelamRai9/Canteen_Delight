<?php
session_start();


// Function to get the count of orders, users, and menu items
function getCounts($conn) {
  $counts = array();

  // Count orders
  $orderQuery = "SELECT COUNT(*) as orderCount FROM Reservation";
  $orderResult = $conn->query($orderQuery);
  $orderCount = $orderResult->fetch_assoc()['orderCount'];
  $counts['orderCount'] = $orderCount;

  // Count users
  $userQuery = "SELECT COUNT(*) as userCount FROM users";
  $userResult = $conn->query($userQuery);
  $userCount = $userResult->fetch_assoc()['userCount'];
  $counts['userCount'] = $userCount;

  // Count menu items
  $menuQuery = "SELECT COUNT(*) as menuCount FROM menu";
  $menuResult = $conn->query($menuQuery);
  $menuCount = $menuResult->fetch_assoc()['menuCount'];
  $counts['menuCount'] = $menuCount;

  return $counts;
}

// Check if the user is not logged in as admin, redirect to login page
if (!isset($_SESSION['admin'])) {
    header("Location: http://localhost/index.php");
    exit();
}

require 'forms/config.php';

// Create a connection to the MySQL database
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$query = "SELECT id, username, email FROM users";
$result = $conn->query($query);

// Check if there are users
if ($result->num_rows > 0) {
    $users = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $users = [];
}



// Establish a database connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Fetch updated data for the menu table
$sql = "SELECT * FROM Menu";
$result = $conn->query($sql);

$menuItems = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menuItems[] = $row;
    }
}

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


// Get counts
$counts = getCounts($conn);

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
    <title>Canteen Delight</title>

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
                <a href="index.php" class="active"> Canteen Delight </a>
              </li>
              <li>
                <a href="settings.php"> Settings </a>
              </li>
              <li>
                <a href="menu.php"> Menu </a>
              </li>
              <li>
                <a href="orders.php"> Orders </a>
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
                          <h6 class="fw-500">Sonam </h6>
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
                  <h2>Canteen Delight Dashboard</h2>
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
                        Canteen Delight
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
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon purple">
                        <i class="lni lni-cart-full"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Total Orders</h6>
                        <h3 class="text-bold mb-10"><?php echo $counts['orderCount']; ?></h3>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon orange">
                        <i class="lni lni-user"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Total Users</h6>
                        <h3 class="text-bold mb-10"><?php echo $counts['userCount']; ?></h3>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon primary">
                        <i class="lni lni-clipboard"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Total Menu</h6>
                        <h3 class="text-bold mb-10"><?php echo $counts['menuCount']; ?></h3>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
        <div class="row">
          <div class="row">
            <div class="col-lg-7">
              <div class="card-style mb-30">
                <div class="title d-flex flex-wrap justify-content-between">
                  <div class="left">
                    <h6 class="text-medium mb-10">Yearly Stats</h6>
                    <h3 class="text-bold">$245,479</h3>
                  </div>
                  <div class="right">
                    <div class="select-style-1">
                      <div class="select-position select-sm">
                        <select class="light-bg">
                          <option value="">Yearly</option>
                          <option value="">Monthly</option>
                          <option value="">Weekly</option>
                        </select>
                      </div>
                    </div>
                    <!-- end select -->
                  </div>
                </div>
                <!-- End Title -->
                <div class="chart">
                  <canvas id="Chart1" style="width: 100%; height: 400px; margin-left: -35px;"></canvas>
                </div>
                <!-- End Chart -->
              </div>
            </div>
            <!-- End Col -->
            <div class="col-lg-5">
              <div class="card-style calendar-card mb-30">
                <div id="calendar-mini"></div>
              </div>
            </div>
          </div>
          <!-- End Row -->
          <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <div class="title d-flex flex-wrap justify-content-between align-items-center">
                            <div class="left">
                                <h6 class="text-medium mb-30">Menu</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="menuTable" class="table top-selling-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <h6 class="text-sm text-medium">Products</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">Category</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">Price</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">Ingredients</h6>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody id="menuTableBody">
                                    <?php foreach ($menuItems as $item) : ?>
                                      
                                        <tr>
                                            <td><img src="uploads/<?php echo $item['productImage']; ?>" alt="Product Image" style="max-width: 50px;"></td>
                                            <td><?php echo $item['productName']; ?></td>
                                            <td><?php echo $item['category']; ?></td>
                                            <td><?php echo $item['price']; ?></td>
                                            <td><?php echo $item['ingredients']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
          <!-- End Row -->
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
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          <!-- End Row -->
          <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <h6 class="mb-10">USERS</h6>
                            <div class="table-wrapper table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="lead-info"><h6>Users</h6></th>
                                            <th class="lead-email"><h6>Email</h6></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                            <tr>
                                                <td class="min-width">
                                                    <div class="lead">
                                                        <!-- Display user name and image here -->
                                                        <div class="lead-text">
                                                            <p><?= $user['username'] ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="min-width">
                                                    <p><a href="#0"><?= $user['email'] ?></a></p>
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

    <script>
      // ======== jvectormap activation
      var markers = [
        { name: "Egypt", coords: [26.8206, 30.8025] },
        { name: "Russia", coords: [61.524, 105.3188] },
        { name: "Canada", coords: [56.1304, -106.3468] },
        { name: "Greenland", coords: [71.7069, -42.6043] },
        { name: "Brazil", coords: [-14.235, -51.9253] },
      ];

      var jvm = new jsVectorMap({
        map: "world_merc",
        selector: "#map",
        zoomButtons: true,

        regionStyle: {
          initial: {
            fill: "#d1d5db",
          },
        },

        labels: {
          markers: {
            render: (marker) => marker.name,
          },
        },

        markersSelectable: true,
        selectedMarkers: markers.map((marker, index) => {
          var name = marker.name;

          if (name === "Russia" || name === "Brazil") {
            return index;
          }
        }),
        markers: markers,
        markerStyle: {
          initial: { fill: "#4A6CF7" },
          selected: { fill: "#ff5050" },
        },
        markerLabelStyle: {
          initial: {
            fontWeight: 400,
            fontSize: 14,
          },
        },
      });
      // ====== calendar activation
      document.addEventListener("DOMContentLoaded", function () {
        var calendarMiniEl = document.getElementById("calendar-mini");
        var calendarMini = new FullCalendar.Calendar(calendarMiniEl, {
          initialView: "dayGridMonth",
          headerToolbar: {
            end: "today prev,next",
          },
        });
        calendarMini.render();
      });

      // =========== chart one start
      const ctx1 = document.getElementById("Chart1").getContext("2d");
      const chart1 = new Chart(ctx1, {
        type: "line",
        data: {
          labels: [
            "Jan",
            "Fab",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          datasets: [
            {
              label: "",
              backgroundColor: "transparent",
              borderColor: "#365CF5",
              data: [
                600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
              ],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#365CF5",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 5,
              borderWidth: 5,
              pointRadius: 8,
              pointHoverRadius: 8,
              cubicInterpolationMode: "monotone", // Add this line for curved line
            },
          ],
        },
        options: {
          plugins: {
            tooltip: {
              callbacks: {
                labelColor: function (context) {
                  return {
                    backgroundColor: "#ffffff",
                    color: "#171717"
                  };
                },
              },
              intersect: false,
              backgroundColor: "#f9f9f9",
              title: {
                fontFamily: "Plus Jakarta Sans",
                color: "#8F92A1",
                fontSize: 12,
              },
              body: {
                fontFamily: "Plus Jakarta Sans",
                color: "#171717",
                fontStyle: "bold",
                fontSize: 16,
              },
              multiKeyBackground: "transparent",
              displayColors: false,
              padding: {
                x: 30,
                y: 10,
              },
              bodyAlign: "center",
              titleAlign: "center",
              titleColor: "#8F92A1",
              bodyColor: "#171717",
              bodyFont: {
                family: "Plus Jakarta Sans",
                size: "16",
                weight: "bold",
              },
            },
            legend: {
              display: false,
            },
          },
          responsive: true,
          maintainAspectRatio: false,
          title: {
            display: false,
          },
          scales: {
            y: {
              grid: {
                display: false,
                drawTicks: false,
                drawBorder: false,
              },
              ticks: {
                padding: 35,
                max: 1200,
                min: 500,
              },
            },
            x: {
              grid: {
                drawBorder: false,
                color: "rgba(143, 146, 161, .1)",
                zeroLineColor: "rgba(143, 146, 161, .1)",
              },
              ticks: {
                padding: 20,
              },
            },
          },
        },
      });
      // =========== chart one end

      // =========== chart two start
      const ctx2 = document.getElementById("Chart2").getContext("2d");
      const chart2 = new Chart(ctx2, {
        type: "bar",
        data: {
          labels: [
            "Jan",
            "Fab",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          datasets: [
            {
              label: "",
              backgroundColor: "#365CF5",
              borderRadius: 30,
              barThickness: 6,
              maxBarThickness: 8,
              data: [
                600, 700, 1000, 700, 650, 800, 690, 740, 720, 1120, 876, 900,
              ],
            },
          ],
        },
        options: {
          plugins: {
            tooltip: {
              callbacks: {
                titleColor: function (context) {
                  return "#8F92A1";
                },
                label: function (context) {
                  let label = context.dataset.label || "";

                  if (label) {
                    label += ": ";
                  }
                  label += context.parsed.y;
                  return label;
                },
              },
              backgroundColor: "#F3F6F8",
              titleAlign: "center",
              bodyAlign: "center",
              titleFont: {
                size: 12,
                weight: "bold",
                color: "#8F92A1",
              },
              bodyFont: {
                size: 16,
                weight: "bold",
                color: "#171717",
              },
              displayColors: false,
              padding: {
                x: 30,
                y: 10,
              },
          },
          },
          legend: {
            display: false,
            },
          legend: {
            display: false,
          },
          layout: {
            padding: {
              top: 15,
              right: 15,
              bottom: 15,
              left: 15,
            },
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              grid: {
                display: false,
                drawTicks: false,
                drawBorder: false,
              },
              ticks: {
                padding: 35,
                max: 1200,
                min: 0,
              },
            },
            x: {
              grid: {
                display: false,
                drawBorder: false,
                color: "rgba(143, 146, 161, .1)",
                drawTicks: false,
                zeroLineColor: "rgba(143, 146, 161, .1)",
              },
              ticks: {
                padding: 20,
              },
            },
          },
          plugins: {
            legend: {
              display: false,
            },
            title: {
              display: false,
            },
          },
        },
      });
      // =========== chart two end

      // =========== chart three start
      const ctx3 = document.getElementById("Chart3").getContext("2d");
      const chart3 = new Chart(ctx3, {
        type: "line",
        data: {
          labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          datasets: [
            {
              label: "Revenue",
              backgroundColor: "transparent",
              borderColor: "#365CF5",
              data: [80, 120, 110, 100, 130, 150, 115, 145, 140, 130, 160, 210],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#365CF5",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#365CF5",
              pointHoverBorderWidth: 3,
              pointBorderWidth: 5,
              pointRadius: 5,
              pointHoverRadius: 8,
              fill: false,
              tension: 0.4,
            },
            {
              label: "Profit",
              backgroundColor: "transparent",
              borderColor: "#9b51e0",
              data: [
                120, 160, 150, 140, 165, 210, 135, 155, 170, 140, 130, 200,
              ],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#9b51e0",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#9b51e0",
              pointHoverBorderWidth: 3,
              pointBorderWidth: 5,
              pointRadius: 5,
              pointHoverRadius: 8,
              fill: false,
              tension: 0.4,
            },
            {
              label: "Order",
              backgroundColor: "transparent",
              borderColor: "#f2994a",
              data: [180, 110, 140, 135, 100, 90, 145, 115, 100, 110, 115, 150],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#f2994a",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#f2994a",
              pointHoverBorderWidth: 3,
              pointBorderWidth: 5,
              pointRadius: 5,
              pointHoverRadius: 8,
              fill: false,
              tension: 0.4,
            },
          ],
        },
        options: {
          plugins: {
            tooltip: {
              intersect: false,
              backgroundColor: "#fbfbfb",
              titleColor: "#8F92A1",
              bodyColor: "#272727",
              titleFont: {
                size: 16,
                family: "Plus Jakarta Sans",
                weight: "400",
              },
              bodyFont: {
                family: "Plus Jakarta Sans",
                size: 16,
              },
              multiKeyBackground: "transparent",
              displayColors: false,
              padding: {
                x: 30,
                y: 15,
              },
              borderColor: "rgba(143, 146, 161, .1)",
              borderWidth: 1,
              enabled: true,
            },
            title: {
              display: false,
            },
            legend: {
              display: false,
            },
          },
          layout: {
            padding: {
              top: 0,
            },
          },
          responsive: true,
          // maintainAspectRatio: false,
          legend: {
            display: false,
          },
          scales: {
            y: {
              grid: {
                display: false,
                drawTicks: false,
                drawBorder: false,
              },
              ticks: {
                padding: 35,
              },
              max: 350,
              min: 50,
            },
            x: {
              grid: {
                drawBorder: false,
                color: "rgba(143, 146, 161, .1)",
                drawTicks: false,
                zeroLineColor: "rgba(143, 146, 161, .1)",
              },
              ticks: {
                padding: 20,
              },
            },
          },
        },
      });
      // =========== chart three end

      // ================== chart four start
      const ctx4 = document.getElementById("Chart4").getContext("2d");
      const chart4 = new Chart(ctx4, {
        type: "bar",
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
          datasets: [
            {
              label: "",
              backgroundColor: "#365CF5",
              borderColor: "transparent",
              borderRadius: 20,
              borderWidth: 5,
              barThickness: 20,
              maxBarThickness: 20,
              data: [600, 700, 1000, 700, 650, 800],
            },
            {
              label: "",
              backgroundColor: "#d50100",
              borderColor: "transparent",
              borderRadius: 20,
              borderWidth: 5,
              barThickness: 20,
              maxBarThickness: 20,
              data: [690, 740, 720, 1120, 876, 900],
            },
          ],
        },
        options: {
          plugins: {
            tooltip: {
              backgroundColor: "#F3F6F8",
              titleColor: "#8F92A1",
              titleFontSize: 12,
              bodyColor: "#171717",
              bodyFont: {
                weight: "bold",
                size: 16,
              },
              multiKeyBackground: "transparent",
              displayColors: false,
              padding: {
                x: 30,
                y: 10,
              },
              bodyAlign: "center",
              titleAlign: "center",
              enabled: true,
            },
            legend: {
              display: false,
            },
          },
          layout: {
            padding: {
              top: 0,
            },
          },
          responsive: true,
          // maintainAspectRatio: false,
          title: {
            display: false,
          },
          scales: {
            y: {
              grid: {
                display: false,
                drawTicks: false,
                drawBorder: false,
              },
              ticks: {
                padding: 35,
                max: 1200,
                min: 0,
              },
            },
            x: {
              grid: {
                display: false,
                drawBorder: false,
                color: "rgba(143, 146, 161, .1)",
                zeroLineColor: "rgba(143, 146, 161, .1)",
              },
              ticks: {
                padding: 20,
              },
            },
          },
        },
      });
        // =========== chart four end
    </script>
  </body>
</html>
