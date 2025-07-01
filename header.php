<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SwiftBasket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .compact-modal .modal-dialog {
      max-width: 400px;
    }

    .compact-modal .profile-img {
      width: 60px;
      height: 60px;
      object-fit: cover;
    }

    .compact-modal .info-item {
      margin-bottom: 0.5rem;
    }

    .compact-modal .info-label {
      font-size: 0.8rem;
      color: #6c757d;
    }

    .compact-modal .info-value {
      font-size: 0.9rem;
    }

    :root {
      --primary-color: #28a745;
      --secondary-color: #ffc107;
      --dark-color: #343a40;
      --light-color: #f8f9fa;
    }

    body {
      font-family: 'Poppins', sans-serif;
    }

    .navbar-brand img {
      height: 50px;
      transition: all 0.3s ease;
    }

    .navbar-brand img:hover {
      transform: scale(1.05);
    }

    .nav-link {
      font-weight: 500;
      color: var(--dark-color);
      position: relative;
      padding: 0.5rem 1rem;
    }

    .nav-link:hover,
    .nav-link.active {
      color: var(--primary-color);
    }

    .nav-link.active::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 1rem;
      right: 1rem;
      height: 2px;
      background-color: var(--primary-color);
    }

    .search-bar {
      background-color: #f1f3f5;
      border-radius: 50px;
      transition: all 0.3s ease;
    }

    .search-bar:focus-within {
      box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.25);
    }

    .search-input {
      border: none;
      background: transparent;
      outline: none;
    }

    .search-btn {
      background: transparent;
      border: none;
      color: var(--primary-color);
    }

    .cart-icon,
    .user-icon,
    .wishlist-icon {
      position: relative;
      color: var(--dark-color);
      transition: all 0.3s ease;
    }

    .cart-icon:hover,
    .user-icon:hover,
    .wishlist-icon:hover {
      color: var(--primary-color);
    }

    .cart-count {
      position: absolute;
      top: -5px;
      right: -5px;
      background-color: var(--primary-color);
      color: white;
      border-radius: 50%;
      width: 18px;
      height: 18px;
      font-size: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .offcanvas-header {
      border-bottom: 1px solid #eee;
    }

    .offcanvas-body {
      padding: 0;
    }

    .menu-list .nav-link {
      border-bottom: 1px dashed #eee;
      padding: 0.75rem 1.5rem;
    }

    .menu-list .nav-link:hover {
      background-color: rgba(40, 167, 69, 0.05);
    }

    .dropdown-toggle::after {
      display: none;
    }

    .btn-toggle {
      padding: 0.75rem 1.5rem;
      width: 100%;
      text-align: left;
      border: none;
      background: transparent;
      border-bottom: 1px dashed #eee;
    }

    .btn-toggle:hover {
      background-color: rgba(40, 167, 69, 0.05);
    }

    .btn-toggle-nav a {
      padding: 0.5rem 1rem;
      color: #495057;
      text-decoration: none;
    }

    .btn-toggle-nav a:hover {
      color: var(--primary-color);
      background-color: rgba(40, 167, 69, 0.05);
    }

    .search-bar {
      background-color: #f1f3f5;
      border-radius: 50px;
      transition: all 0.3s ease;
      padding: 5px 15px;
    }

    .search-bar:focus-within {
      box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.25);
    }

    .search-input {
      border: none;
      background: transparent;
      outline: none;
      width: 100%;
    }

    .search-btn {
      background: transparent;
      border: none;
      color: var(--primary-color);
    }
  </style>
</head>

<body>
  <header class=" bg-white shadow-sm">
    <div class="container py-2">
      <div class="row align-items-center">
        <!-- Logo and Mobile Menu Button -->
        <div class="col-6 col-lg-2">
          <div class="d-flex align-items-center">
            <a class="navbar-brand me-3" href="#">
              <img src="images/ChatGPT Image Jun 13, 2025, 12_31_35 PM.png" alt="SwiftBasket" class="img-fluid">
            </a>
            <button class="navbar-toggler d-lg-none border-0" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasNavbar">
              <i class="fas fa-bars"></i>
            </button>
          </div>
        </div>

        <!-- Search Bar -->
        <div class="col-12 col-lg-5 my-3 my-lg-0">
          <form action="shop.php" method="GET" class="search-bar d-flex align-items-center">
            <input type="search" name="product_name" class="search-input" placeholder="Search for products..."
              value="<?= isset($_GET['product_name']) ? $_GET['product_name'] : '' ?>">
            <button class="search-btn"><i class="fas fa-search"></i></button>
          </form>
        </div>

        <!-- Navigation Links -->
        <div class="col-lg-5 d-none d-lg-block">
          <div class="d-flex justify-content-end gap-4">
            <span class="navbar-text"><i class="fas fa-phone-alt me-1"></i> +91 98765 43210</span>
            <a href="track-order.php" class="navbar-text text-decoration-none"><i
                class="fas fa-map-marker-alt me-1"></i> Track Order</a>
          </div>
        </div>
      </div>
    </div>


    </div>
    </div>

    <!-- Secondary Navigation -->
    <div class="bg-light py-2 d-none justify-content-end d-lg-block">
      <div class="container row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav w-100 d-flex align-items-end justify-content-between">
              <li class="nav-item dropdown">
                <div class="d-flex justify-content-center flex-wrap gap-2">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="blog.php">Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-percentage me-1"></i> Offers</a>
              </li> -->
            </ul>
          </nav>
        </div>

        <?php
        include("./db-connection/db connection.php");
        if (isset($_SESSION["customer_id"])) {
          $customer = $_SESSION["customer_id"];
          $stmt = $conn->prepare("SELECT count(*) as total_count FROM tbl_cart WHERE cart_customer_id = ?");
          $stmt->bind_param("i", $customer);
          $stmt->execute();
          $result = $stmt->get_result();
          $test = $result->fetch_assoc();
        } else {
          $test["total_count"] = 0;
        }
        ?>
        <!-- cart count -->
        <?php
        include("./db-connection/db connection.php");
        if (isset($_SESSION["customer_id"])) {
          $customer = $_SESSION["customer_id"];
          $stmt = $conn->prepare("SELECT COUNT(*) AS total_countw FROM tbl_wishlist WHERE wishlist_customer = ?");
          $stmt->bind_param("i", $customer);
          $stmt->execute();
          $result = $stmt->get_result();
          $testw = $result->fetch_assoc();
        } else {

          $testw["total_countw"] = 0;
        }
        ?>
        <!-- wish list count -->
        <div class="col-lg-2">
          <div class="mt-3 d-flex justify-content-end">
            <div class="d-flex align-items-center gap-3">
              <a data-bs-toggle="modal" data-bs-target="#compactAccountModal" class="user-icon position-relative">
                <i class="fas fa-user fa-lg"></i>
              </a>
              <a href="wish_list.php" class="wishlist-icon position-relative">
                <i class="fas fa-heart fa-lg"></i>
                <span class="cart-count bg-warning"><?= $testw["total_countw"] ?></span>
              </a>
              <a href="cart.php" class="cart-icon position-relative" data-bs-target="#offcanvasCart">
                <i class="fas fa-shopping-bag fa-lg"></i>
                <span class="cart-count bg-warning"> <?= $test["total_count"] ?></span>
              </a>
            </div>
          </div>
        </div>
        <?php
        $row = null;
        if (isset($_SESSION['customer_id'])) {
          $customer_id = intval($_SESSION['customer_id']);
          $query = "SELECT * FROM tbl_customer WHERE customer_id = $customer_id";
          $result = mysqli_query($conn, $query);

          if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
          }
        }
        ?>

        <?php if ($row): ?>
         
          <div class="modal fade" id="compactAccountModal" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="position: absolute; top: 0%; right: 10px; margin-top: 10px; width: 400px;">
              <div class="modal-content border-0 shadow-lg" style="border-radius: 10px; overflow: hidden;">
                <div class="modal-header py-3 bg-warning">
                  <h6 class="modal-title text-white"><i class="fas fa-user-circle me-2"></i>My Account</h6>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body py-4">
                  <div class="info-item row mb-3">
                    <div class="col-4">
                      <div class="info-label text-muted"><b>Customer Name:</b></div>
                    </div>
                    <div class="col-8">
                      <div class="info-value text-dark"><?= htmlspecialchars($row["customer_name"]) ?></div>
                    </div>
                  </div>
                  <div class="info-item row mb-3">
                    <div class="col-4">
                      <div class="info-label text-muted"><b>Email:</b></div>
                    </div>
                    <div class="col-8">
                      <div class="info-value text-dark"><?= htmlspecialchars($row["customer_email"]) ?></div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="modal-footer py-3 d-flex justify-content-between border-top-0"
                  style="background-color: #f8f9fa;">
                  <button class="btn btn-sm btn-outline-secondary px-3" data-bs-dismiss="modal"
                    style="border-radius: 20px;">
                    <i class="fas fa-times me-1"></i> Close
                  </button>
                  <a href="logout.php" class="btn btn-sm btn-danger px-3" style="border-radius: 20px;">
                    <i class="fas fa-sign-out-alt me-1"></i> LogOut
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php else: ?>
          <div class="modal fade" id="compactAccountModal" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="position: absolute; top: 0%; right: 10px; margin-top: 10px; width: 400px;">
              <div class="modal-content border-0 shadow-lg" style="border-radius: 10px; overflow: hidden;">
                <div class="modal-header py-3 bg-warning">
                  <h6 class="modal-title text-white"><i class="fas fa-sign-in-alt me-2"></i>Login Required</h6>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body py-4 text-center">
                  <p class="text-muted">Please log in to view your account details.</p>
                  <hr>
                  <a href="SignUp_LogIn_Form.php" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt me-1"></i> Login
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <!--  -->

      </div>
    </div>
    </div>
  </header>



  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>

    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    });
  </script>
</body>

</html>