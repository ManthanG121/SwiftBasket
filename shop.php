<?php
include "header.php";
include("./db-connection/db connection.php");
?>

<section class="shop-section py-5 bg-light">
    <div class="container-lg">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="display-5 fw-bold mb-3">Our Premium Products</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row g-4">
            <!-- Filters Sidebar -->
            <div class="col-lg-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <!-- Price Filter -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3">Price Range</h5>
                            <div class="list-group list-group-flush">
                                <label class="list-group-item d-flex justify-content-between align-items-center">

                                    <a href="shop.php">
                                        <label class="form-check-label" for="priceAll" style="color: black;">All
                                            Prices</label>
                                    </a>

                                    <span class="badge bg-secondary rounded-pill">
                                        <?php
                                        $query = "SELECT count(*) AS all_count FROM tbl_product";
                                        $result = mysqli_query($conn, $query);
                                        $Fquery = mysqli_fetch_array($result);
                                        ?>
                                        <?= $Fquery["all_count"] ?>
                                    </span>
                                </label>
                                <label class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="?min_range=0&max_range=100">

                                        <label class="form-check-label" id="price1" style="color: black;">0 Rs - 100
                                            Rs</label>

                                    </a>
                                    <span class="badge bg-secondary rounded-pill">
                                        <?php
                                        $query = "SELECT count(*) AS all_count FROM tbl_product WHERE product_sell_price > 0 AND product_sell_price <= 100";
                                        $result = mysqli_query($conn, $query);
                                        $Fquery = mysqli_fetch_array($result);
                                        ?>
                                        <?= $Fquery["all_count"] ?>
                                    </span>
                                </label>
                                <label class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="?min_range=101&max_range=300">

                                        <label class="form-check-label" id="price2" style="color: black;">101 Rs - 300
                                            Rs</label>

                                    </a>
                                    <span class="badge bg-secondary rounded-pill">
                                        <?php
                                        $query = "SELECT count(*) AS all_count FROM tbl_product WHERE product_sell_price > 101 AND product_sell_price <= 300";
                                        $result = mysqli_query($conn, $query);
                                        $Fquery = mysqli_fetch_array($result);
                                        ?>
                                        <?= $Fquery["all_count"] ?>
                                    </span>
                                </label>
                                <label class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="?min_range=301&max_range=500">

                                        <label class="form-check-label" id="price3" style="color: black;">301 Rs - 500
                                            Rs</label>

                                    </a>
                                    <span class="badge bg-secondary rounded-pill">
                                        <?php
                                        $query = "SELECT count(*) AS all_count FROM tbl_product WHERE product_sell_price > 301 AND product_sell_price <= 500";
                                        $result = mysqli_query($conn, $query);
                                        $Fquery = mysqli_fetch_array($result);
                                        ?>
                                        <?= $Fquery["all_count"] ?>
                                    </span>
                                </label>
                                <label class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="?min_range=501&max_range=700">

                                        <label class="form-check-label" id="price4" style="color: black;">501 Rs - 700
                                            Rs</label>

                                    </a>
                                    <span class="badge bg-secondary rounded-pill">
                                        <?php
                                        $query = "SELECT count(*) AS all_count FROM tbl_product WHERE product_sell_price > 501 AND product_sell_price <= 700";
                                        $result = mysqli_query($conn, $query);
                                        $Fquery = mysqli_fetch_array($result);
                                        ?>
                                        <?= $Fquery["all_count"] ?>
                                    </span>
                                </label>
                                <label class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="?min_range=701&max_range=1000">

                                        <label class="form-check-label" id="price5" style="color: black;">701 Rs - 1000
                                            Rs</label>

                                    </a>
                                    <span class="badge bg-secondary rounded-pill">
                                        <?php
                                        $query = "SELECT count(*) AS all_count FROM tbl_product WHERE product_sell_price > 701 AND product_sell_price <= 1000";
                                        $result = mysqli_query($conn, $query);
                                        $Fquery = mysqli_fetch_array($result);
                                        ?>
                                        <?= $Fquery["all_count"] ?>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <!-- Categories Filter -->
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row g-4">
                    <?php
                    if (isset($_GET["min_range"]) && isset($_GET["max_range"])) {
                        $min_range = (int) $_GET["min_range"];
                        $max_range = (int) $_GET["max_range"];
                        $query = "SELECT * FROM `tbl_product` WHERE product_sell_price >= $min_range AND product_sell_price <= $max_range";

                    } else {
                        $query = "SELECT * FROM `tbl_product`";
                    }
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card product-card h-100 border-0 shadow-sm hover-top">
                                    <div class="badge bg-success position-absolute top-0 end-0 m-2"><?= $row['product_discount_percentage'] ?>% OFF</div>
                                    <div class="product-image">
                                        <a href="single_productview.php?product_id=<?= $row['product_id'] ?>">
                                            <img src="admin/uplodes/image/<?= ($row['product_img']) ?>" style="width: 300px;"
                                                class="card-img-top">
                                        </a>
                                    </div>
                                    <div class="card-body d-flex flex-column shadow-sm">
                                        <div class="mb-2">
                                            <a href="singleproduct.php?product_id=<?= $row['product_id'] ?>" class="text-decoration-none">
                                                <h5 class="card-title mb-1 text-center"><?= ($row['product_name']) ?></h5>
                                            </a>
                                            <div class="d-flex text-center mb-2 ms-3">
                                                <div class="text-warning small me-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <span class="text-muted small">(400 reviews)</span>
                                            </div>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="d-flex align-items-center mb-3">
                                                <span class="text-dark fw-bold fs-5 me-2 ms-5"><?= $row['product_sell_price'] ?> Rs</span>
                                                <span class="text-muted text-decoration-line-through"><?= $row['product_mrp'] ?>
                                                    Rs</span>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <form action="add_to_cart.php" method="post" class="flex-grow-1">
                                                    <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                                    <button type="submit" class="btn btn-success w-100">
                                                        <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                                                    </button>
                                                </form>
                                                <form action="addtowishlist.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                                    <button type="submit" class="btn btn-outline-secondary">
                                                        <i class="far fa-heart"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<div class="col-12 text-center py-5">
                                <div class="alert alert-info">No products found. Please check back later.</div>
                              </div>';
                    }
                    ?>
                </div>


            </div>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>

<style>
    .hover-top {
        transition: all 0.3s ease;
    }

    .hover-top:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .product-image {
        height: 200px;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .product-image img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .shop-section {
        background-color: rgba(248, 249, 250, 0.8);
    }
</style>