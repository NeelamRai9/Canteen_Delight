<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user'])) {
    header("Location: http://localhost/index.php");
    exit();
}

// The rest of your home.php content goes here
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="Cache-Control" content="no-store" />
   <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />

  <title>Canteen Delight</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo1.png" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 07:00AM - 09:00PM</span></i>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      

      <div class="logo me-auto me-lg-0"><a href="home.php">
        <img src="assets/img/logo.png" alt="">
      </a></div>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link" href="logout.php">Sign Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Canteen Delight</span></h1>
          <h2>Where Every Meal is a Celebration!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Order</a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=u6BOC7CDUTQ" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/about.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Welcome to Canteen Delight</h3>
            <p class="fst-italic">
              Canteen Delight, situated in the heart of Gcit ,Kabesa, is your gateway to a culinary journey like no other. 
              Since our inception in 2023, we've been committed to delivering exceptional dining experiences, each plate a canvas of exquisite flavors. 
             <br><br> With a menu embracing the world's finest cuisines, our kitchen celebrates the local while exploring the global. 
             From sizzling grills and savory curries, we craft each dish to reflect our passion for quality and creativity. 
             We source our ingredients locally to ensure freshness and sustainability, and our dedicated team of chefs and staff stands ready to welcome you with warm smiles and impeccable service.
             <br> <br>Whether it's a romantic dinner, a family gathering, or a special event, Canteen Delight invites you to discover the joy of exceptional dining.
            </p>
            <h5>Memorable Moments, Culinary Delights</h5>
            <p>
              Canteen Delight is more than a restaurant; it's a destination for memorable moments. Our inviting ambiance sets the stage for romantic evenings, family get-togethers, and friendly catch-ups. 
            <br><br>For those seeking more than a meal, we offer event planning and catering services, transforming your special occasions into culinary experiences that linger in the memory.
             With a commitment to excellence, we invite you to savor the delight that is Two Brothers. 
             <br><br>Join us for an extraordinary dining adventure, make reservations, and let us take you on a journey where every meal is a celebration.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why Us</h2>
          <p>Why Choose Our Restaurant</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Fair Price</h4>
              <p>Cheap yet tasty
                <br>
                Worth while meal 
              </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Taste</h4>
              <p>We provide an option for you to customize your own food <br>
                eg. salt, sugar level, spices and much more</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4>Clean and fresh</h4>
              <p>We aim to be hygiene enviroment and provide fresh meal</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-FRice">Fried Rice</li>
              <li data-filter=".filter-FFood">Fast Food</li>
              <li data-filter=".filter-Thali">Thali</li>
              <li data-filter=".filter-CDrinks">Cold Drinks</li>
              <li data-filter=".filter-HDrinks">Hot Drinks</li>
              <li data-filter=".filter-veg">Veg.</li>
              <li data-filter=".filter-nveg">Non-veg</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

          <div class="section-title menu-item col-lg-12 filter-FRice">
            <p>Fried Rice</p>
          </div>

          <div class="col-lg-6 menu-item filter-FRice filter-nveg">
            <img src="assets/img/menu/lobster-bisque.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Chicken Fried Rice</a><span>NU 100</span>
             
            </div>
            <div class="menu-ingredients">
              Beef, Onion, Cabbage, Carrot, Rice, Vegetable Oil, Soya Sauce.
            </div>
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item1">Quantity:</label>
              <input type="number" id="item1" class="form-control" min="0" oninput="updateItem('Chicken Fried Rice', 100, 'item1')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Chicken Fried Rice', 100, 'item1')" class="addButton btn  mt-2">Add to Order</button>
              </div>
              
            </div>

          </div>

          <div class="col-lg-6 menu-item filter-FRice filter-nveg">
            <img src="assets/img/menu/bread-barrel.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Beef Fried Rice</a><span>NU 100</span>
            </div>
            <div class="menu-ingredients">
              Beef, Onion, Cabbage, Carrot, Rice, Vegetable Oil, Soya Sauce.
            </div>
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item2">Quantity:</label>
              <input type="number" id="item2" class="form-control" min="0" oninput="updateItem('Chicken Fried Rice', 100, 'item2') " placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Beef Fried Rice', 100, 'item2')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-FRice filter-nveg">
            <img src="assets/img/menu/cake.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Egg Fried Rice</a><span>NU 100</span>
            </div>
            <div class="menu-ingredients">
              Egg, Onion, Cabbage, Carrot, Rice, Vegetable Oil, Soya Sauce.
            </div>
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item3">Quantity:</label>
              <input type="number" id="item3" class="form-control" min="0" oninput="updateItem('Chicken Fried Rice', 100, 'item3')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Egg Fried Rice', 100, 'item3')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-FRice filter-veg">
              <img src="assets/img/menu/caesar.jpg" class="menu-img" alt="">
              <div class="menu-content">
                <a href="#">Veg Fried Rice</a><span>NU 90</span>
              </div>
              <div class="menu-ingredients">
                Onion, Cabbage, Carrot, Rice, Vegetable Oil, Soya Sauce.
              </div>
              <div class="quantity row">
                <div class="dishNum col-md-6">
                  <label for="item4">Quantity:</label>
                  <input type="number" id="item4" class="form-control" min="0" oninput="updateItem('Chicken Fried Rice', 90, 'item4')" placeholder="Quantity:">
                </div>
                <div class="Oadd col-md-4">
                  <button onclick="addToOrder('Veg Fried Rice', 90, 'item4')" class="addButton btn mt-2">Add to Order</button>
                </div>
              </div>
          </div>

          <div class="section-title menu-item col-lg-12 filter-FFood">
            <p>Fast Food</p>
          </div>

          <div class="col-lg-6 menu-item filter-FFood filter-nveg">
            <img src="assets/img/menu/tuscan-grilled.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Juma</a><span>NU 50</span>
            </div>
            <div class="menu-ingredients">
              Veg Oil, Juma, Chilli Pepper
            </div>
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item5">Quantity:</label>
              <input type="number" id="item5" class="form-control" min="0" oninput="updateItem('Juma', 50, 'item5')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Juma', 90, 'item5')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-FFood filter-veg">
            <img src="assets/img/menu/mozzarella.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Momo</a><span>Nu 40</span>
            </div>
            <div class="menu-ingredients">
              Cabbage Onion, Chess, Flour and Baking powder 
            </div>
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item6">Quantity:</label>
              <input type="number" id="item6" class="form-control" min="0" oninput="updateItem('Momo', 40, 'item6')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Momo', 40, 'item6')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-FFood filter-veg">
            <img src="assets/img/menu/greek-salad.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Chowmien</a><span>NU 20</span>
            </div>
            <div class="menu-ingredients">
              Noodle, Carrot, Chilli Papper, Oil.
            </div>
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item7">Quantity:</label>
              <input type="number" id="item7" class="form-control" min="0" oninput="updateItem('Chowmien', 30, 'item7')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Chowmien', 30, 'item7')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-FFood filter-veg">
            <img src="assets/img/menu/spinach-salad.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Pasta</a><span>NU 90</span>
            </div>
            <div class="menu-ingredients">
              Pasta, Chess, Vegetables
            </div>
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item8">Quantity:</label>
              <input type="number" id="item8" class="form-control" min="0" oninput="updateItem('Pasta', 90, 'item8')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Pasta', 90, 'item8')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
            
          </div>

          <div class="section-title menu-item col-lg-12 filter-Thali">
            <p>Thali</p>
          </div>

          <div class="col-lg-6 menu-item filter-Thali filter-nveg">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Beef Thali</a><span>NU 150</span>
            </div>
            <div class="menu-ingredients">
              Rice with Beef Curry
            </div>
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item9">Quantity:</label>
              <input type="number" id="item9" class="form-control" min="0" oninput="updateItem('Beef Thali', 150, 'item9')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Beef Thali', 150, 'item9')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-Thali filter-nveg">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Chicken Chilli Thali</a><span>Nu 200</span>
            </div>
            <div class="menu-ingredients">
              Rice with Fired Chicken 
            </div>
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item10">Quantity:</label>
              <input type="number" id="item10" class="form-control" min="0" oninput="updateItem('Chicken Chill Thali', 200, 'item10')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Chicken Chilli Thali', 200, 'item10')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-Thali filter-veg">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Veg Thali</a><span>NU 120</span>
            </div>
            <div class="menu-ingredients">
              Rice with Chessy Potato Curry 
            </div>
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item11">Quantity:</label>
              <input type="number" id="item11" class="form-control" min="0" oninput="updateItem('Veg Thali', 120, 'item11')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Veg Thali', 120, 'item11')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="section-title menu-item col-lg-12 filter-CDrinks">
            <p>Cold Drinks</p>
          </div>

          <div class="col-lg-6 menu-item filter-CDrinks">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Pepsi</a><span>NU 30</span>
            </div>
            <!-- <div class="menu-ingredients">
              Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
            </div> -->
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item12">Quantity:</label>
              <input type="number" id="item12" class="form-control" min="0" oninput="updateItem('Pepsi', 30, 'item12')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Pepsi', 30, 'item12')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-CDrinks">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Power</a><span>NU 70</span>
            </div>
            <!-- <div class="menu-ingredients">
              Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
            </div> -->
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item13">Quantity:</label>
              <input type="number" id="item13" class="form-control" min="0" oninput="updateItem('Power', 70, 'item13')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Power', 70, 'item13')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-CDrinks">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Marinda</a><span>NU 30</span>
            </div>
            <!-- <div class="menu-ingredients">
              Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
            </div> -->
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item14">Quantity:</label>
              <input type="number" id="item14" class="form-control" min="0" oninput="updateItem('Marinda', 30, 'item14')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Marinda', 30, 'item14')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-CDrinks">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Water(s)</a><span>NU 10</span>
            </div>
            <!-- <div class="menu-ingredients">
              Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
            </div> -->
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item15">Quantity:</label>
              <input type="number" id="item15" class="form-control" min="0" oninput="updateItem('Water(s)', 10, 'item15')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Water(s)', 10, 'item15')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="section-title menu-item col-lg-12 filter-HDrinks">
            <p>Hot Drinks</p>
          </div>

          <div class="col-lg-6 menu-item filter-HDrinks">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Milk Coffee</a><span>NU 20</span>
            </div>
            <!-- <div class="menu-ingredients">
              Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
            </div> -->
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item16">Quantity:</label>
              <input type="number" id="item16" class="form-control" min="0" oninput="updateItem('Milk Coffee', 20, 'item16')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Milk Coffee', 20, 'item16')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-HDrinks">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Milk Tea</a><span>NU 20</span>
            </div>
            <!-- <div class="menu-ingredients">
              Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
            </div> -->
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item17">Quantity:</label>
              <input type="number" id="item17" class="form-control" min="0" oninput="updateItem('Milk tea', 20, 'item17')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Milk Tea', 20, 'item17')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>


          <div class="col-lg-6 menu-item filter-HDrinks">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Lemon Tea</a><span>NU 30</span>
            </div>
            <!-- <div class="menu-ingredients">
              Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
            </div> -->
            <div class="quantity row">
              <div class="dishNum col-md-6">
                <label for="item18">Quantity:</label>
              <input type="number" id="item18" class="form-control" min="0" oninput="updateItem('Lemon Tea', 30, 'item18')" placeholder="Quantity:">
              </div>
              <div class="Oadd col-md-4">
                <button onclick="addToOrder('Lemon Tea', 30, 'item18')" class="addButton btn mt-2">Add to Order</button>
              </div>
              
            </div>
          </div>

        </div>
           <!-- Order Summary -->
        <div class="OrderSummary">
          <div class="OrderContent row">
            <div class="col-lg-12 logo me-auto me-lg-0"><a href="###">
              <img src="assets/img/logo.png" alt="">
            </a></div>
            <h2>Your Order Summary</h2>
            <ul id="order-list">
            </ul>
            <p>Total Amount: Nu <span id="total-amount">0</span></p>
            <!-- <button onclick="showOrderPopup()" class="btn btn-success col-md-4">Show Order</button> -->
            <button onclick="addOrderToReservationForm()" class="add-to-reservation-button col-lg-6">Add to Reservation</button>
            <!-- <button onclick="clearOrder()" class="btn btn-danger col-md-4">Clear Order</button> -->
          </div>
        </div>

        
        
      </div>
          <!-- Message Popup -->
      <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close-popup" onclick="closePopup()">&times;</span>
            <br>
            <p id="popup-message"></p>
            <img src="./assets/img/popup.gif" alt="">
            <li id="table-link"  ><a href="#book-a-table"  onclick="closePopup()" >Go to your table</a></li>
        </div>
      </div>
       <!-- Order Popup -->
      <!-- <div id="order-popup" class="order-popup">
        <div class="order-popup-content">
            <span class="close-popup" onclick="closeOrderPopup()">&times;</span>
            <h2>Your Order</h2>
            <ul id="order-popup-list"></ul>
            <p>Total Amount: Nu <span id="order-popup-total">0</span></p>
            <button onclick="addOrderToReservationForm()" class="add-to-reservation-button">Add to Reservation</button>
        </div>
      </div> -->

    </section>

    <!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Specials</h2>
          <p>Check Our Specials</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Rice Noodle</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Unde praesentium sed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Pariatur explicabo vel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Nostrum qui quasi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Rice Noodle</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-1.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Et blanditiis nemo veritatis excepturi</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-2.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                    <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                    <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-3.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                    <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                    <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-4.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                    <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-5.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Reservation</h2>
          <p>Book Table / Takeaway  </p>
        </div>

        <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" pattern="^(17|77)\d{6,}$" title="Please enter a valid phone number starting with 17 or 77 and at least 8 digits" required>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="date" name="date" class="form-control" id="date" placeholder="Date" required>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="time" class="form-control" name="time" id="time" placeholder="Time" required>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="people" id="people" placeholder="# of people (Optional)">
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <div class="custom-dropdown-container">
                <select class="form-control custom-dropdown" id="reservation-type" name="reservation-type" required>
                  <option value="" disabled selected>Select Reservation Type    &#9660;</option>
                  <option value="book-table">Book a Table</option>
                  <option value="package">Takeaway</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <p id="preference-message" style="display: none;">You can write your preference inside the Bracket (Optional)</p>
            <textarea class="form-control" name="message" rows="5" placeholder="**Your order list will be displayed here. First go to menu and Choose your cravings!**" required></textarea>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="sent-message"></div>
          </div>
          <div class="text-center"><button type="submit">Order</button></div>
          <div class="btns col-md-2">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Go to menu</a>
          </div>
        </form>


      </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What they're saying about us</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  I highly recommend the canteen for its diverse menu, delicious food, and excellent service. The staff is friendly, and the atmosphere is always welcoming. It's my go-to place for a satisfying meal!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/yeeshay.jpg" class="testimonial-img" alt="">
                <h3>Yeshey Wangmo</h3>
                <h4>Student</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  The canteen consistently impresses with its tasty, well-prepared dishes. Whether it's a quick snack or a full meal, the quality and variety of options never disappoint. A reliable choice for a satisfying dining experience.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/neelu.jpg" class="testimonial-img" alt="">
                <h3>Neelam Rai</h3>
                <h4>Student</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  The canteen stands out for its prompt service, cleanliness, and a menu that caters to different tastes. I've consistently enjoyed flavorful meals, and the prices are reasonable. A reliable spot for a quick, enjoyable bite                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/buku.jpg" class="testimonial-img" alt="">
                <h3>Dechen Phuntsho</h3>
                <h4>Student</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Having frequented the canteen, I can attest to the consistently high-quality meals and attentive staff. The diverse menu offers something for everyone, making it a top choice for both convenience and culinary satisfaction.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/sapna.jpg" class="testimonial-img" alt="">
                <h3>Sapna Jogi</h3>
                <h4>Student</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Impressed by the canteen's commitment to freshness and flavor. The culinary variety is a highlight, and the friendly ambiance enhances the overall dining experience. A great place to enjoy delicious meals with prompt service.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/pema.jpg" class="testimonial-img" alt="">
                <h3>Pema Wangdi</h3>
                <h4>Student</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos from Our Restaurant</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <!-- <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid"> -->
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <!-- <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid"> -->
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <!-- <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid"> -->
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <!-- <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid"> -->
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <!-- <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid"> -->
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <!-- <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid"> -->
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <!-- <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid"> -->
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <!-- <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid"> -->
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Chefs</h2>
          <p>Our Proffesional Chefs</p>
        </div>

        <div style="margin-left:10% " class="row chefcont">

          <div class="col-lg-6 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="assets/img/chefs/chefs-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sonam Dorji</h4>
                  <span>Master Chef</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/img/chefs/chefs-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Tshering Choden</h4>
                  <span>Cook and Receptionist</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>

                </div>
              </div>
            </div>
          </div>

          <!-- <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <img src="assets/img/chefs/chefs-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>Cook</span>
                </div>
                <div class="social">
 
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div> -->

        </div>

      </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1322.5092961503296!2d89.6665219096335!3d27.535791085043797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sbt!4v1697547438750!5m2!1sen!2sbt" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Dragon Block, Gcit, Kabjisa, Thimphu </p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Saturday:<br>
                  07:00 AM - 09:00 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6">
            <div class="footer-info">
              <div class="col-lg-12 logo me-auto me-lg-0">
                <a href="#">
                  <img style="width: 100px" src="assets/img/logo.png" alt="">
                </a>
              </div>
              <p>
                Thimphu, Kabjisa<br>
                GCIT<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>

            </div>
          </div>

            <div class="col-lg-6 col-md-6 social-links mt-3">
              <div class="media">
                <h4>Follow us:</h4>
               <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
              </div>
              
            </div>

        </div>
      </div>
    </div>


  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

      <!-- Include the necessary JavaScript -->
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
         // Disable the back button to prevent going back after logout
         history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
     };
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.querySelector(".php-email-form");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            // Display loading message
            form.querySelector('.loading').innerHTML = 'Loading';

            // Submit the form using Fetch API
            fetch(form.getAttribute("action"), {
                method: form.getAttribute("method"),
                body: new FormData(form),
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "success") {
                  // On success, clear the form inputs
                     form.reset();
                    // Display success message
                    form.querySelector('.loading').innerHTML = '';
                    form.querySelector('.sent-message').style.display = 'block';
                    form.querySelector('.sent-message').innerHTML = 'Your request was sent. Thank you!';
                    
                } else {
                    // Display error message
                    form.querySelector('.loading').innerHTML = '';
                    form.querySelector('.error-message').style.display = 'block';
                    form.querySelector('.error-message').innerHTML = 'Error in form submission.';
                }
            })
            .catch(error => {
                // Handle network or other errors
                console.error('Error:', error);
                form.querySelector('.loading').innerHTML = '';
                form.querySelector('.error-message').style.display = 'block';
                form.querySelector('.error-message').innerHTML = 'Error in form submission.';
            });
        });

    });



</script>


</body>

</html>