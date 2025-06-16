<?php
include("../db-connection/db connection.php");
include "header.php";
include "sidebar.php";
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
<?php if (isset($_SESSION['delete'])): ?>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055;text-align: center; margin-top: 100px;">
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
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055;text-align: center; margin-top: 100px;">
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
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Product List</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <!-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> -->
                <a href="product-add.php" class="btn btn-primary btn-round">Add Product</a>
            </div>
        </div>
        <hr>
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-info text-white text-left fw-bold fs-4 rounded-top-4">
                Product List
            </div>
            <div class="card-body bg-light rounded-bottom-4">
                <div class="table-responsive">
                    <table
                        class="table table-bordered text-center align-middle table-hover table-striped table-sm mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>MRP</th>
                                <th>Discount %</th>
                                <th>Discount ₹</th>
                                <th>Sell Price</th>
                                <th>Category</th>
                                <th>Featured</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $query = "SELECT * FROM tbl_product";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?= ++$count; ?></td>
                                    <td class="fw-semibold"><?= $row["product_name"] ?></td>
                                    <td>
                                        <img src="uplodes/image/<?= $row["product_img"] ?>" class="rounded border"
                                            style="width: 50px; height: 50px;" alt="">
                                    </td>
                                    <td><span class="badge bg-secondary">₹<?= $row["product_mrp"] ?></span></td>
                                    <td><span class="text-danger fw-bold"><?= $row["product_discount_percentage"] ?>%</span>
                                    </td>
                                    <td><span class="text-success fw-semibold">₹<?= $row["product_discount_value"] ?></span>
                                    </td>
                                    <td><span class="badge bg-success">₹<?= $row["product_sell_price"] ?></span></td>
                                    <td><span class="badge bg-info text-dark"><?= $row["category"] ?></span></td>
                                    <td>
                                        <a href="Featured-insert.php?product_id=<?= $row["product_id"] ?>"
                                            class="text-warning fs-5">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="product-view.php?product_id=<?= $row["product_id"] ?>"
                                            class="btn btn-sm btn-outline-info mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="product-edit.php?product_id=<?= $row["product_id"] ?>"
                                            class="btn btn-sm btn-outline-success mb-1" title="Edit">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <a href="product-delete.php?product_id=<?= $row["product_id"] ?>"
                                            class="btn btn-sm btn-outline-danger mb-1" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this product?');">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            if ($count == 0) {
                                ?>
                                <tr>
                                    <td colspan="11">
                                        <div class="text-danger fw-bold py-3">No Data Found</div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
include "footer.php";
?>