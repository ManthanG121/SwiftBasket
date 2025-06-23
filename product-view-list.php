<?php
include "header.php";
include("./db-connection/db connection.php");
?>
<?php
$customer_id = $_GET['order_master_customer_id'];
$order_master_id = $_GET['order_master_id'];
$query2 = "SELECT * FROM tbl_order_master_child INNER JOIN tbl_product ON tbl_order_master_child.order_child_product_id = tbl_product.product_id WHERE tbl_order_master_child.order_child_customer_id = $customer_id AND tbl_order_master_child.order_child_order_master_id	 = $order_master_id";
$result = mysqli_query($conn, $query2);
$loop = ($row = mysqli_fetch_array($result));
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
    .step {
        position: relative;
        text-align: center;
        flex: 1;
    }

    .step::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        height: 4px;
        width: 100%;
        background: #dee2e6;
        z-index: 0;
        transform: translateY(-50%);
    }

    .step:last-child::before {
        display: none;
    }

    .step .circle {
        z-index: 1;
        position: relative;
        display: inline-block;
        width: 30px;
        height: 30px;
        background: #ccc;
        border-radius: 50%;
        line-height: 30px;
        color: white;
    }

    .step.completed .circle {
        background: #0d6efd;
    }
</style>
<div class="container my-5">
    <h2 class="mb-4">Order Product</h2>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <div>
                <strong>Order ID :</strong> #<?= $row["order_child_order_master_id"] ?><br />
                <!-- <small>Orderd Date : </small> -->
            </div>
            <div class="text-end">
                <strong>Total:</strong> <?= $row["order_child_total_price"] ?>
                <a href="invoice.php?order_master_customer_id=<?= $row['order_master_customer_id'] ?>&order_master_id=<?= $row['order_master_id'] ?>"
                    class="btn btn-sm btn-outline-info mb-1" title="View">
                    <i class="fa fa-eye"></i>View Invoice
                </a>
            </div>
        </div>

        <div class="card-body">
            <h6>Products</h6>
            <table class="table table-sm table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Item Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $customer_id = $_GET['order_master_customer_id'];
                    $order_master_id = $_GET['order_master_id'];
                    $query2 = "SELECT * FROM tbl_order_master_child INNER JOIN tbl_product ON tbl_order_master_child.order_child_product_id = tbl_product.product_id WHERE tbl_order_master_child.order_child_customer_id = $customer_id AND tbl_order_master_child.order_child_order_master_id	 = $order_master_id";
                    $result = mysqli_query($conn, $query2);
                    while ($row = mysqli_fetch_array($result)) {
                        $lineTotal = $row['order_child_qty'] * $row['product_sell_price'];
                        ?>
                        <tr>
                            <td><?= $row["product_name"] ?></td>
                            <td><?= $row["order_child_qty"] ?></td>
                            <td><?= $row["product_sell_price"] ?></td>
                            <td><?= $lineTotal ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

            <h6 class="mt-4">Tracking Status</h6>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="step completed">
                    <div class="circle">1</div>
                    <small class="d-block mt-2">Ordered</small>
                </div>
                <div class="step completed">
                    <div class="circle">2</div>
                    <small class="d-block mt-2">Shipped</small>
                </div>
                <div class="step">
                    <div class="circle">3</div>
                    <small class="d-block mt-2">Out for Delivery</small>
                </div>
                <div class="step">
                    <div class="circle">4</div>
                    <small class="d-block mt-2">Delivered</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include "footer.php";
?>