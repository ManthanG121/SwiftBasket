<?php
include "header.php";
include("./db-connection/db connection.php");
$product_id = $_GET["product_id"];
$query = "SELECT * FROM `tbl_product` WHERE `product_id` = $product_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<section class="py-5 bg-light">
    <div class="container">
        <div class="card border-0 shadow-lg">
            <div class="row g-0">
                <div class="col-lg-6 d-flex align-items-center bg-white p-4">
                    <img src="admin/uplodes/image/<?= $row['product_img'] ?>" class="img-fluid rounded w-100" style="max-height: 500px; object-fit: contain;" alt="Product Image">
                </div>
                <div class="col-lg-6 p-5 bg-white">
                    <h1 class="fw-bold mb-3"><?= $row['product_name'] ?></h1>
                    <div class="d-flex align-items-center mb-3">
                        <h3 class="text-success fw-semibold mb-0"><?= $row['product_sell_price'] ?> Rs</h3>
                        <span class="text-muted text-decoration-line-through ms-3 fs-5"><?= $row['product_mrp'] ?> Rs</span>
                        <span class="badge bg-danger ms-3 px-3 py-2 fs-6"><?= $row['product_discount_percentage'] ?>% OFF</span>
                    </div>
                    <div class="mb-3 text-warning fs-5">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <span class="text-muted small ms-2">(400+ Reviews)</span>
                    </div>
                    <p class="text-secondary mb-4 fs-6 lh-base">
                        <?= $row['product_discription'] ?? "Experience premium quality, comfort, and design with this product. Perfect for your lifestyle, crafted to impress." ?>
                    </p>
                    <div class="d-grid gap-3 mt-4">
                        <form action="cart_insert.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                            <input type="hidden" name="cart_qty" value="1">
                            <button type="submit" class="btn btn-success btn-lg w-100">
                                <i class="bi bi-cart-plus me-2"></i>Add to Cart
                            </button>
                        </form>
                        <form action="wish_list_insert.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                            <button type="submit" class="btn btn-outline-danger btn-lg w-100">
                                <i class="bi bi-heart me-2"></i>Add to Wishlist
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>
