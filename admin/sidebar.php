<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <?php
    include("../db-connection/db connection.php");
    $select = "SELECT count(*) as category_count FROM tbl_category";
    $findingtotal = mysqli_query($conn, $select);
    $category_count = mysqli_fetch_array($findingtotal);
    ?>
    <!-- category_count end -->
    <?php
    include("../db-connection/db connection.php");
    $select = "SELECT count(*) as product_count FROM tbl_product";
    $findingtotal = mysqli_query($conn, $select);
    $product_count = mysqli_fetch_array($findingtotal);
    ?>
    <!-- product_count end -->

    <?php
    include("../db-connection/db connection.php");
    $select = "SELECT count(*) as feature_count FROM tbl_feature";
    $findingtotal = mysqli_query($conn, $select);
    $feature_count = mysqli_fetch_array($findingtotal);
    ?>
    <!-- feature_count end -->

    <?php
    include("../db-connection/db connection.php");
    $select = "SELECT count(*) as best_selling_count FROM tbl_best_selling_product";
    $findingtotal = mysqli_query($conn, $select);
    $best_selling_count = mysqli_fetch_array($findingtotal);
    ?>
    <!-- best_selling_count end -->

    <?php
    include("../db-connection/db connection.php");
    $select = "SELECT count(*) as contact_count FROM tbl_contact";
    $findingtotal = mysqli_query($conn, $select);
    $contact_count = mysqli_fetch_array($findingtotal);
    ?>
    <!-- best_selling_count end -->

    <?php
    include("../db-connection/db connection.php");
    $select = "SELECT count(*) as order_count FROM tbl_order_master";
    $findingtotal = mysqli_query($conn, $select);
    $order_count = mysqli_fetch_array($findingtotal);
    ?>
    <!-- order_count end -->
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a href="index.php" class="collapsed">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Category-list.php" class="collapsed">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Categoryes</p>
                        <span class="badge badge-secondary rounded-pill"><?= $category_count["category_count"] ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="product-list.php" class="collapsed">
                        <i class="far fa-arrow-alt-circle-right"></i>
                        <p>Product</p>
                        <span class="badge badge-danger rounded-pill"><?= $product_count["product_count"] ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Featured-list.php" class="collapsed">
                        <i class="far fa-star"></i>
                        <p>Featured Product</p>
                        <span class="badge badge-secondary rounded-pill"><?= $feature_count["feature_count"] ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="best_selling_products-list.php" class="collapsed">
                        <i class="far fa-thumbs-up"></i>
                        <p>Best Selling Product</p>
                        <span
                            class="badge badge-danger rounded-pill"><?= $best_selling_count["best_selling_count"] ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact-list.php" class="collapsed">
                        <i class="fas fa-phone"></i>
                        <p>Contact Us</p>
                        <span class="badge badge-secondary rounded-pill"><?= $contact_count["contact_count"] ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="order-list.php" class="collapsed">
                        <i class="fas fa-box-open"></i>
                        <p>Order List</p>
                        <span class="badge badge-danger rounded-pill"><?= $order_count["order_count"] ?></span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="Blogs-list.php" class="collapsed">
                        <i class="fas fa-layer-group"></i>
                        <p>Blogs</p>
                    </a>
                </li> -->

                <li class="nav-item">
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
<!-- End Sidebar -->