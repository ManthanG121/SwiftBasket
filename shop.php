<?php
include "header.php";
include("./db-connection/db connection.php");
?>

<!-- Shop Hero Section -->
<!-- <div class="bg-dark py-5 mb-4"
    style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1555529669-e69e7aa0ba9a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center; background-size: cover;">
    <div class="container py-5 text-white text-center">
        <h1 class="display-4 fw-bold mb-3">Our Premium Collection</h1>
        <p class="lead mb-4">Discover quality products at unbeatable prices</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#products" class="btn btn-warning btn-lg px-4">Shop Now</a>
            <a href="#categories" class="btn btn-outline-light btn-lg px-4">Browse Categories</a>
        </div>
    </div>
</div> -->

<!-- Main Shop Content -->
<div class="container py-5" id="products">
    <!-- Page Header with Breadcrumb -->
    <div class="row mb-5">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none"><i
                                class="fas fa-home me-1"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 fw-bold mb-0">All Products</h2>

            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Filters Sidebar -->
        <div class="col-lg-3" id="categories">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0"><i class="fas fa-filter me-2"></i>Filters</h5>
                </div>
                <div class="card-body">
                    <!-- Price Filter -->
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3">Price Range</h6>
                        <div class="list-group list-group-flush">
                            <a href="shop.php"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                All Prices
                                <span class="badge bg-secondary rounded-pill">
                                    <?php
                                    $query = "SELECT count(*) AS all_count FROM tbl_product";
                                    $result = mysqli_query($conn, $query);
                                    $Fquery = mysqli_fetch_array($result);
                                    echo $Fquery["all_count"];
                                    ?>
                                </span>
                            </a>
                            <a href="?min_range=0&max_range=100"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                ₹0 - ₹100
                                <span class="badge bg-secondary rounded-pill">
                                    <?php
                                    $query = "SELECT count(*) AS all_count FROM tbl_product WHERE product_sell_price > 0 AND product_sell_price <= 100";
                                    $result = mysqli_query($conn, $query);
                                    $Fquery = mysqli_fetch_array($result);
                                    echo $Fquery["all_count"];
                                    ?>
                                </span>
                            </a>
                            <a href="?min_range=101&max_range=300"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                ₹101 - ₹300
                                <span class="badge bg-secondary rounded-pill">
                                    <?php
                                    $query = "SELECT count(*) AS all_count FROM tbl_product WHERE product_sell_price > 101 AND product_sell_price <= 300";
                                    $result = mysqli_query($conn, $query);
                                    $Fquery = mysqli_fetch_array($result);
                                    echo $Fquery["all_count"];
                                    ?>
                                </span>
                            </a>
                            <a href="?min_range=301&max_range=500"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                ₹301 - ₹500
                                <span class="badge bg-secondary rounded-pill">
                                    <?php
                                    $query = "SELECT count(*) AS all_count FROM tbl_product WHERE product_sell_price > 301 AND product_sell_price <= 500";
                                    $result = mysqli_query($conn, $query);
                                    $Fquery = mysqli_fetch_array($result);
                                    echo $Fquery["all_count"];
                                    ?>
                                </span>
                            </a>
                            <a href="?min_range=501&max_range=700"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                ₹501 - ₹700
                                <span class="badge bg-secondary rounded-pill">
                                    <?php
                                    $query = "SELECT count(*) AS all_count FROM tbl_product WHERE product_sell_price > 501 AND product_sell_price <= 700";
                                    $result = mysqli_query($conn, $query);
                                    $Fquery = mysqli_fetch_array($result);
                                    echo $Fquery["all_count"];
                                    ?>
                                </span>
                            </a>
                            <a href="?min_range=701&max_range=1000"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                ₹701 - ₹1000
                                <span class="badge bg-secondary rounded-pill">
                                    <?php
                                    $query = "SELECT count(*) AS all_count FROM tbl_product WHERE product_sell_price > 701 AND product_sell_price <= 1000";
                                    $result = mysqli_query($conn, $query);
                                    $Fquery = mysqli_fetch_array($result);
                                    echo $Fquery["all_count"];
                                    ?>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-lg-9">
            <div class="row g-4">
                <?php
                $product_name = isset($_GET["product_name"]) ? $_GET["product_name"] : "";
                $conditions = [];

                if (!empty($product_name)) {
                    $safe_product_name = mysqli_real_escape_string($conn, $product_name);
                    $conditions[] = "`product_name` LIKE '%$safe_product_name%'";
                }

                if (isset($_GET["min_range"]) && isset($_GET["max_range"])) {
                    $min_range = (int) $_GET["min_range"];
                    $max_range = (int) $_GET["max_range"];
                    $conditions[] = "product_sell_price >= $min_range AND product_sell_price <= $max_range";
                }

                $query = "SELECT * FROM `tbl_product`";
                if (!empty($conditions)) {
                    $query .= " WHERE " . implode(" AND ", $conditions);
                }

                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $discount = $row['product_mrp'] - $row['product_sell_price'];
                        ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card product-card h-100 border-0 shadow-sm overflow-hidden">
                                <div class="position-relative">
                                    <!-- Discount Badge -->
                                    <?php if ($row['product_discount_percentage'] > 0): ?>
                                        <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                            <?= $row['product_discount_percentage'] ?>% OFF
                                        </span>
                                    <?php endif; ?>

                                    <!-- Product Image -->
                                    <a href="single_productview.php?product_id=<?= $row['product_id'] ?>">
                                        <img src="admin/uplodes/image/<?= $row['product_img'] ?>" class="card-img-top p-3"
                                            style="height: 220px; object-fit: contain; background-color: #f8f9fa;"
                                            alt="<?= $row['product_name'] ?>">
                                    </a>

                                    <!-- Quick Actions -->
                                    <div class="position-absolute top-0 end-0 m-2 d-flex flex-column gap-2">
                                        <form action="wish_list_insert.php" method="post">
                                            <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                            <input type="hidden" name="cart_qty" value="1">
                                            <button type="submit" class="btn btn-sm btn-light rounded-circle shadow-sm"
                                                data-bs-toggle="tooltip" title="Add to wishlist">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        </form>

                                    </div>
                                </div>

                                <div class="card-body pt-0 text-center">
                                    <!-- Product Title -->
                                    <h5 class="card-title mb-1">
                                        <a href="single_productview.php?product_id=<?= $row['product_id'] ?>"
                                            class="text-decoration-none text-dark">
                                            <?= $row['product_name'] ?>
                                        </a>
                                    </h5>

                                    <!-- Rating -->
                                    <div class="mb-2">
                                        <div class="text-warning small">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span class="text-muted ms-1 small">(<?= rand(50, 500) ?> reviews)</span>
                                        </div>
                                    </div>

                                    <!-- Price -->
                                    <div class="mb-3">
                                        <span class="text-success fw-bold fs-5">₹<?= $row['product_sell_price'] ?></span>
                                        <?php if ($row['product_mrp'] > $row['product_sell_price']): ?>
                                            <span
                                                class="text-muted text-decoration-line-through ms-2">₹<?= $row['product_mrp'] ?></span>
                                            <span class="d-block small text-success">Save ₹<?= $discount ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Add to Cart Button -->
                                    <form action="cart_insert.php" method="post" class="d-grid">
                                        <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                        <input type="hidden" name="cart_qty" value="1">
                                        <button type="submit" class="btn btn-primary rounded-pill">
                                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<div class="col-12 text-center py-5">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i> No products found matching your criteria.
                            </div>
                            <a href="shop.php" class="btn btn-primary">Clear Filters</a>
                          </div>';
                }
                ?>
            </div>


        </div>
    </div>
</div>
<!-- Recommended Products Section -->
<div class="container py-5">
    <h3 class="fw-bold mb-4">Recommended For You</h3>
    <div class="row g-4">
        <?php
        $customer = $_SESSION["customer_id"];
        $recommend_query = "SELECT * FROM tbl_product ORDER BY view_count DESC LIMIT 4";
        $recommend_result = mysqli_query($conn, $recommend_query);
        while ($row = mysqli_fetch_array($recommend_result)) {
            $discount = $row['product_mrp'] - $row['product_sell_price'];
            ?>
            <div class="col-md-6 col-lg-3">
                <div class="card product-card h-100 border-0 shadow-sm overflow-hidden">
                    <div class="position-relative">
                        <?php if ($row['product_discount_percentage'] > 0): ?>
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                <?= $row['product_discount_percentage'] ?>% OFF
                            </span>
                        <?php endif; ?>

                        <a href="single_productview.php?product_id=<?= $row['product_id'] ?>">
                            <img src="admin/uplodes/image/<?= $row['product_img'] ?>" class="card-img-top p-3"
                                style="height: 200px; object-fit: contain; background-color: #f8f9fa;"
                                alt="<?= $row['product_name'] ?>">
                        </a>
                    </div>

                    <div class="card-body text-center">
                        <h6 class="card-title mb-1">
                            <a href="single_productview.php?product_id=<?= $row['product_id'] ?>"
                                class="text-decoration-none text-dark">
                                <?= $row['product_name'] ?>
                            </a>
                        </h6>

                        <div class="mb-2">
                            <span class="text-success fw-bold">₹<?= $row['product_sell_price'] ?></span>
                            <?php if ($row['product_mrp'] > $row['product_sell_price']): ?>
                                <span class="text-muted text-decoration-line-through ms-2">₹<?= $row['product_mrp'] ?></span>
                            <?php endif; ?>
                        </div>

                        <form action="cart_insert.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                            <input type="hidden" name="cart_qty" value="1">
                            <button type="submit" class="btn btn-sm btn-outline-primary rounded-pill">
                                <i class="fas fa-cart-plus me-1"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include "footer.php"; ?>

<style>
    .product-card {
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .breadcrumb {
        background-color: transparent;
        padding: 0;
    }

    .quick-view {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .product-card:hover .quick-view {
        opacity: 1;
    }
</style>