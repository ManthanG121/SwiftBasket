<?php
include "header.php";
include("./db-connection/db connection.php");
$product_id = isset($_GET["product_id"]) ? (int) $_GET["product_id"] : 0;

mysqli_query($conn, "UPDATE tbl_product SET view_count = view_count + 1 WHERE product_id = $product_id");
$query = "SELECT * FROM tbl_product WHERE product_id = $product_id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Product not found.";
    exit;
}
?>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<section class="py-5 bg-light">
    <div class="container">
        <div class="card border-0 shadow-lg">
            <div class="row g-0">
                <div class="col-lg-6 d-flex align-items-center bg-white p-4">
                    <img src="admin/uplodes/image/<?= $row['product_img'] ?>" class="img-fluid rounded w-100"
                        style="max-height: 500px; object-fit: contain;" alt="Product Image">
                </div>
                <div class="col-lg-6 p-5 bg-white">
                    <h1 class="fw-bold mb-3"><?= $row['product_name'] ?></h1>
                    <div class="d-flex align-items-center mb-3">
                        <h3 class="text-success fw-semibold mb-0"><?= $row['product_sell_price'] ?> Rs</h3>
                        <span class="text-muted text-decoration-line-through ms-3 fs-5"><?= $row['product_mrp'] ?>
                            Rs</span>
                        <span class="badge bg-danger ms-3 px-3 py-2 fs-6"><?= $row['product_discount_percentage'] ?>%
                            OFF</span>
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
<div class="container py-5">
    <h3 class="fw-bold mb-4">Recommended For You</h3>
    <div class="row g-4">
        <?php
        if (isset($_SESSION["customer_id"])) {
            $customer = $_SESSION["customer_id"];
        } else {
            $customer = null;
        }
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
</div <?php include "footer.php"; ?>