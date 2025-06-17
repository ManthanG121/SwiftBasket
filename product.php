<?php
include "header.php";
include("./db-connection/db connection.php");
?>

<!-- Include Bootstrap Icons if not already -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2 class="section-title mb-0">Best Products</h2>
            </div>
        </div>

        <div class="row g-4">
            <?php
            $categoryid = $_GET["category_id"];
            $query = "SELECT * FROM `tbl_product` WHERE `category` = $categoryid";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 hover-shadow">
                        <div class="position-relative">
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2"><?= $row['product_discount_percentage'] ?> % </span>
                            <a href="product-detail.php?product_id=<?= $row['product_id'] ?>">
                                <img src="admin/uplodes/image/<?= $row['product_img'] ?>" class="card-img-top p-3" style="height: 200px; object-fit: contain;" alt="<?= $row['product_name'] ?>">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h6 class="card-title mb-2">
                                <a href="product-detail.php?product_id=<?= $row['product_id'] ?>" class="text-dark text-decoration-none fw-semibold">
                                    <?= $row['product_name'] ?>
                                </a>
                            </h6>

                            <div class="mb-2">
                                <span class="text-muted text-decoration-line-through">₹<?= $row['product_mrp'] ?></span>
                                <span class="fw-bold text-primary ms-1">₹<?= $row['product_sell_price'] ?></span>
                            </div>

                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <button class="btn btn-outline-danger btn-sm rounded-circle" title="Add to Wishlist">
                                    <i class="bi bi-heart"></i>
                                </button>
                                <button class="btn btn-primary btn-sm px-3 rounded-pill" title="Add to Cart">
                                    <i class="bi bi-cart-plus me-1"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>
