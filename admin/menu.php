<?php
session_start();
// Check if the user is not logged in as admin, redirect to login page
if (!isset($_SESSION['admin'])) {
  header("Location: http://localhost/index.php");
  exit();
}
require_once('forms/config.php');
require_once('forms/get_menu_details.php');

// Establish a database connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract form data
    $productName = isset($_POST['productName']) ? $_POST['productName'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $ingredients = isset($_POST['ingredients']) ? $_POST['ingredients'] : '';

    // Check if an image is uploaded
    $productImage = '';
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === 0) {
        // Create the "uploads" directory if it doesn't exist
        $target_dir = __DIR__ . "/uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Upload the product image
        $productImage = $_FILES['productImage']['name'];
        $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
        move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file);

        // Add these lines after moving the uploaded file
        // $uploadPath = 'uploads/' . basename($_FILES["productImage"]["name"]);
        // echo "Upload Path: " . $uploadPath;  // Debugging
    }

    // Prepare and execute the SQL query to insert the menu item
    $sql = "INSERT INTO Menu (productName, category, price, ingredients, productImage) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdss", $productName, $category, $price, $ingredients, $productImage);

    if ($stmt->execute()) {
        // If insertion is successful, send a success response
        $response = [
            'success' => true,
            'productName' => $productName,
            'category' => $category,
            'price' => $price,
            'ingredients' => $ingredients,
            'productImage' => $productImage
        ];
        // echo json_encode($response);
    } else {
        // If an error occurs, send an error response
        echo json_encode(['error' => 'Failed to insert menu item']);
    }

    // Close the prepared statement
    $stmt->close();
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
    <title>Canteen Delight | Menu</title>

   <!-- Bootstrap CSS -->
   
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



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
                <a href="menu.php" class="active"> Menu </a>
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
                  <h2>Menu</h2>
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
                       Menu
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
                                        <th></th>
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
                                            <td>
                                                <button class="btn btn-danger deleteBtn" data-id="<?php echo $item['id']; ?>">Delete</button>
                                                <button class="btn btn-success editBtn" data-id="<?php echo $item['id']; ?>" >Edit</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card-style mb-30">
                        <h5 class="text-medium mb-25" style="margin-left: 10%;">
                            Got new menu?
                        </h5>
                        <button type="button" class="main-btn info-btn-outline rounded-full" onclick="showAddForm()">Add</button>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        
       <!-- Add this before the closing </body> tag -->
            <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addMenuModalLabel">Add Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="addMenuForm" action="menu.php" method="post" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" required>
                      </div>
                      <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category" required>
                          <option value="Veg">Veg</option>
                          <option value="NonVeg">NonVeg</option>
                          <option value="Snacks">Snacks</option>
                          <option value="Drinks">Drinks</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group">
                          <span class="input-group-text">NU</span>
                          <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="ingredients" class="form-label">Ingredients</label>
                        <textarea class="form-control" id="ingredients" name="ingredients" rows="3" ></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="productImage" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Menu</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <!-- end row -->

          <!-- Add this somewhere in your HTML, typically near the end of the body -->
          <div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- Add your form elements for editing here -->
                  <form id="editMenuForm" action="forms/update_menu.php" method="post">
                    <?php if (isset($menuDetails) && !empty($menuDetails)) : ?>
                      <div class="mb-3">
                        <label for="editProductName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="editProductName" name="editProductName" value="<?php echo htmlspecialchars($menuDetails['productName']); ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="editCategory" class="form-label">Category</label>
                        <select class="form-select" id="editCategory" name="editCategory" required>
                          <option value="Veg" <?php echo ($menuDetails['category'] === 'Veg') ? 'selected' : ''; ?>>Veg</option>
                          <option value="NonVeg" <?php echo ($menuDetails['category'] === 'NonVeg') ? 'selected' : ''; ?>>NonVeg</option>
                          <option value="Snacks" <?php echo ($menuDetails['category'] === 'Snacks') ? 'selected' : ''; ?>>Snacks</option>
                          <option value="Drinks" <?php echo ($menuDetails['category'] === 'Drinks') ? 'selected' : ''; ?>>Drinks</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="editPrice" class="form-label">Price</label>
                        <div class="input-group">
                          <span class="input-group-text">NU</span>
                          <input type="number" class="form-control" id="editPrice" name="editPrice" value="<?php echo htmlspecialchars($menuDetails['price']); ?>" required>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="editIngredients" class="form-label">Ingredients</label>
                        <textarea class="form-control" id="editIngredients" name="editIngredients" rows="3" required><?php echo htmlspecialchars($menuDetails['ingredients']); ?></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                      </div>
                    <?php else : ?>
                      <!-- Handle the case where menuDetails is not set or empty -->
                      <p>No menu details found.</p>
                    <?php endif; ?>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

    </main>
    <!-- ======== main-wrapper end =========== -->
    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>\
    <!-- Keep only one Bootstrap JS instance -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/Amenu.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    
  </body>
</html>
