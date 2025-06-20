<?php
include "header.php";
include "sidebar.php";
include("../db-connection/db connection.php");
?>
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Order List</h3>
            </div>
        </div>
        <hr>
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
                            $query = "SELECT * FROM tbl_order_master";
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
                                        <a href="order-view.php" class="btn btn-sm btn-outline-info mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="order-update.php?order_master_id=<?= $row["order_master_id"] ?>"
                                            class="btn btn-sm btn-outline-success mb-1" title="Edit">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <a href="order-delete.php?order_master_id=<?= $row["order_master_id"] ?>"
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