<?php
include "header.php";
include "sidebar.php";
include("../db-connection/db connection.php");
?>
<?php if (isset($_SESSION['edit'])): ?>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055;text-align: center; margin-top: 100px;">
        <div class="toast text-center align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check-circle me-2"></i>
                    <?= htmlspecialchars($_SESSION['edit']) ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['edit']); ?>
<?php endif; ?>
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
<div class="container">
    <div class="page-inner">
       
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-info text-white text-left fw-bold fs-4 rounded-top-4">
                Order List
            </div>
            <div class="card-body bg-light rounded-bottom-4">
                <div class="table-responsive">
                    <table
                        class="table table-bordered text-center align-middle table-hover table-striped table-sm mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Total Bill</th>
                                <th>Address</th>
                                <th>Date</th> 
                                <th>Payment Term</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $customer_name = isset($_POST["product_name"]) ? $_POST["product_name"] : "";
                            $query = "SELECT * FROM tbl_order_master WHERE `first_name` LIKE '%$customer_name%'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?= ++$count; ?></td>
                                    <td class="fw-semibold"><?= $row["first_name"] ?> <?= $row["last_name"] ?></td>
                                    <td><span class="badge bg-secondary">₹<?= $row["order_master_total"] ?></span></td>
                                    <td><span class="fw-bold"><?= $row["address"] ?>, <?= $row["city"] ?>-<?= $row["zip_code"] ?>, <?= $row["state"] ?></span>
                                    </td>
                                    <td><span class="text-success fw-semibold"><?= $row["date"] ?></span>
                                    </td>
                                    <td><span class="badge bg-info text-dark"><?= $row["order_master_payment_method"] ?></span></td>
                                    <td><span class="badge bg-info text-dark"><?= $row["order_master_payment_status"] ?></span></td>
                                    <td><span class="badge bg-success"><?= $row["order_master_status"] ?></span></td>
                                
                                    <td>
                                        <a href="order-view.php?order_master_customer_id=<?= $row['order_master_customer_id'] ?>&order_master_id=<?= $row['order_master_id'] ?>" class="btn btn-sm btn-outline-info mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="order_status_edit.php?order_master_customer_id=<?= $row['order_master_customer_id'] ?>&order_master_id=<?= $row['order_master_id'] ?>"
                                            class="btn btn-sm btn-outline-success mb-1" title="Edit">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <a href="order_delete.php?order_master_customer_id=<?= $row['order_master_customer_id'] ?>&order_master_id=<?= $row['order_master_id'] ?>"
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