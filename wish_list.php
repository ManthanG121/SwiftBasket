<?php
include("./db-connection/db connection.php");
include 'header.php';
if (!isset($_SESSION["login"])) {
    echo "<script> window.location.href='SignUp_LogIn_Form.php'</script>";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toastEl = document.querySelector('.toast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
            toast.show();
        }
    });
</script>
<?php if (isset($_SESSION['success'])): ?>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055;text-align: center;">
        <div class="toast text-center align-items-center text-white bg-success border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check-circle me-2"></i>
                    <?= htmlspecialchars($_SESSION['success']) ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
<?php if (isset($_SESSION['delete'])): ?>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055;text-align: center;">
        <div class="toast text-center align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check-circle me-2"></i>
                    <?= htmlspecialchars($_SESSION['delete']) ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['delete']); ?>
<?php endif; ?>

<!-- Hero Section -->
<div class="bg-dark py-5 mb-5" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1555529669-e69e7aa0ba9a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center; background-size: cover;">
    <div class="container py-5 text-white text-center">
        <h1 class="display-4 fw-bold mb-3">Your Wishlist</h1>
        <p class="lead mb-4">The products you love, all in one place.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="shop.php" class="btn btn-warning btn-lg px-4">Continue Shopping</a>
            <a href="cart.php" class="btn btn-outline-light btn-lg px-4">View Cart</a>
        </div>
    </div>
</div>

<!-- Wishlist Items -->
<div class="container py-5" id="wishlist-items">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="h4 fw-bold">Saved Items</h2>
                <div class="text-muted">
                    <?php
                    $customer = $_SESSION["customer_id"];
                    $count_query = "SELECT COUNT(*) as total FROM tbl_wishlist WHERE wishlist_customer = $customer";
                    $count_result = mysqli_query($conn, $count_query);
                    $count_row = mysqli_fetch_assoc($count_result);
                    echo $count_row['total'] . " items";
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <?php
        $customer = $_SESSION["customer_id"];
        $query = "SELECT * FROM tbl_wishlist 
                  INNER JOIN tbl_product ON tbl_product.product_id = tbl_wishlist.wishlist_product_id 
                  WHERE tbl_wishlist.wishlist_customer = $customer";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                        <!-- Product Image with Badge -->
                        <div class="position-relative">
                            <a href="single_productview.php?product_id=<?= $row['product_id'] ?>" class="text-decoration-none">
                                <img src="admin/uplodes/image/<?= $row['product_img'] ?>" class="card-img-top p-3" style="height: 220px; object-fit: contain; background-color: #f8f9fa;">
                            </a>
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2 px-2 py-1 rounded">
                                <?= $row['product_discount_percentage'] ?>% OFF
                            </span>
                            <button class="btn btn-sm position-absolute top-0 end-0 m-2 p-2 bg-white rounded-circle shadow-sm"
                                onclick="window.location.href='wish_list_delete.php?product_id=<?= $row['product_id'] ?>'"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="Remove from wishlist">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </div>

                        <!-- Product Details -->
                        <div class="card-body d-flex flex-column text-center">
                            <h5 class="card-title mb-2">
                                <a href="single_productview.php?product_id=<?= $row['product_id'] ?>" class="text-dark text-decoration-none">
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
                                <span class="h5 text-success fw-bold"><?= $row['product_sell_price'] ?> Rs</span>
                                <span class="text-muted text-decoration-line-through ms-2 small"><?= $row['product_mrp'] ?> Rs</span>
                                <span class="d-block small text-success">You save <?= $row['product_mrp'] - $row['product_sell_price'] ?> Rs</span>
                            </div>
                            
                            <!-- Actions -->
                            <div class="mt-auto">
                                <form action="cart_insert.php" method="post" class="d-grid gap-2">
                                    <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                    <input type="hidden" name="cart_qty" value="1">
                                    <button type="submit" class="btn btn-primary rounded-pill shadow-sm">
                                        <i class="fas fa-cart-plus me-2"></i> Add to Cart
                                    </button>
                                    <a href="single_productview.php?product_id=<?= $row['product_id'] ?>" class="btn btn-outline-secondary rounded-pill">
                                        <i class="fas fa-eye me-2"></i> View Details
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body text-center py-5">
                        <div class="mb-4">
                            <i class="far fa-heart text-muted" style="font-size: 5rem;"></i>
                        </div>
                        <h3 class="h4 mb-3">Your wishlist is empty</h3>
                        <p class="text-muted mb-4">Looks like you haven't added any items to your wishlist yet.</p>
                        <a href="shop.php" class="btn btn-warning px-4 rounded-pill">
                            <i class="fas fa-shopping-bag me-2"></i> Start Shopping
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php
include 'footer.php';
?>