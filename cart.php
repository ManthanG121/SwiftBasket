<?php

include "header.php";
if (!isset($_SESSION["login"])) {
  echo "<script> window.location.href='SignUp_LogIn_Form.php'</script>";
  exit;
}

include("./db-connection/db connection.php");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
<!-- delete -->

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
<div class="container py-5">
    <div class="row g-4">
        <!-- Cart Table -->
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title mb-4 fw-bold">🛒 Your Cart</h3>
                    <div class="table-responsive">
                        <table class="table table-hover text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $customer = $_SESSION["customer_id"];
                                $query = "SELECT * FROM `tbl_cart` INNER JOIN tbl_product ON tbl_product.product_id = tbl_cart.cart_product_id WHERE tbl_cart.cart_customer_id = $customer";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <img style="width: 60px; height: 60px; object-fit: cover;"
                                                class="img-fluid rounded"
                                                src="admin/uplodes/image/<?= $row["product_img"] ?>" alt="">


                                        </td>
                                        <td class="fw-semibold"><?= $row["product_name"] ?></td>
                                        <td>₹<?= $row["product_sell_price"] ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <!-- Minus Button -->
                                                <form action="updateCartQty.php" method="post" class="d-inline">
                                                    <input type="hidden" name="cart_id" value="<?= $row["cart_id"] ?>">
                                                    <input type="hidden" name="cart_qty"
                                                        value="<?= $row["cart_qty"] - 1 ?>">
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">-</button>
                                                </form>

                                                <input type="number" class="form-control form-control-sm text-center"
                                                    value="<?= $row["cart_qty"] ?>" min="1" style="width: 60px;" readonly>

                                                <!-- Plus Button -->
                                                <form action="updateCartQty.php" method="post" class="d-inline">
                                                    <input type="hidden" name="cart_id" value="<?= $row["cart_id"] ?>">
                                                    <input type="hidden" name="cart_qty"
                                                        value="<?= $row["cart_qty"] + 1 ?>">
                                                    <button type="submit" class="btn btn-outline-success btn-sm">+</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>₹<?= $row["cart_qty"] * $row["product_sell_price"] ?></td>
                                        <td>
                                            <a href="cart_delete.php?product_id=<?= $row['product_id'] ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="if(confirm('Are You Sure ?')){}else{return false;}"><i
                                                    class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title fw-bold mb-3">Cart Summary</h4>
                    <ul class="list-group list-group-flush mb-3">
                        <?php
                        $subtotal = 0;
                        mysqli_data_seek($result, 0);
                        while ($row = mysqli_fetch_array($result)) {
                            $subtotal += $row["cart_qty"] * $row["product_sell_price"];
                        }

                        ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Subtotal</span>
                            <strong>₹ <?= $subtotal ?></strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <strong>₹<?= $subtotal ?></strong>
                        </li>
                    </ul>
                    <a href="checkout_form.php"><button class="btn btn-primary w-100 rounded-pill fw-semibold">
                        Proceed to Checkout <i class="bi bi-arrow-right ms-1"></i>
                    </button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>