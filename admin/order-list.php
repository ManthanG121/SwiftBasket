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
                                <th>MRP</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Payment Term</th>
                                <th>Payment Status</th>
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
                                        <a href="best_selling_product-insert.php?product_id=<?= $row["product_id"] ?>"
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