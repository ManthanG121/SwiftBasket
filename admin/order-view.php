<?php
include "header.php";
include "sidebar.php";
include("../db-connection/db connection.php");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<body>
    <div class="container">
        <div class="page-inner">
            <?php
            $customer_id = $_GET['order_master_customer_id'];
            $order_master_id = $_GET['order_master_id'];
            $query = "SELECT * FROM `tbl_order_master` WHERE order_master_customer_id = $customer_id AND tbl_order_master.order_master_id= $order_master_id";
            $result = mysqli_query($conn, $query);
            ($row = mysqli_fetch_array($result));
            ?>
            <h2 class="order-title page-inner">Order Details - #<?= $row['order_master_id'] ?></h2>

            <div class="table-responsive table-details">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <th>Order ID</th>
                            <td><?= $row['order_master_id'] ?></td>
                            <th>Payment Method</th>
                            <td><?= $row['order_master_payment_method'] ?></td>

                        </tr>
                        <tr>
                            <th>Customer ID</th>
                            <td><?= $row['order_master_customer_id'] ?></td>
                            <th>Payment Status</th>
                            <td><?= $row['order_master_payment_status'] ?></td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td><?= $row['date'] ?></td>
                            <th>Order Status</th>
                            <td><?= $row['order_master_status'] ?></td>
                        </tr>
                        <tr>
                            <th>Total Price</th>
                            <td><?= $row['order_master_total'] ?></td>

                            <th>Shipping Address</th>
                            <td><?= $row['address'] ?>, <?= $row['city'] ?>-<?= $row['zip_code'] ?>,
                                <?= $row['state'] ?>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <h5>Products in Order</h5>
            <div class="table-responsive products-table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
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
                        <?php
                        $customer_id = $_GET['order_master_customer_id'];
                        $order_master_id = $_GET['order_master_id'];
                        $query2 = "SELECT * FROM tbl_order_master_child INNER JOIN tbl_product ON tbl_order_master_child.order_child_product_id = tbl_product.product_id WHERE tbl_order_master_child.order_child_customer_id = $customer_id AND tbl_order_master_child.order_child_order_master_id	 = $order_master_id";
                        $result = mysqli_query($conn, $query2);
                        ($row = mysqli_fetch_array($result));
                        ?>
                        <tr>
                            <th colspan="3">TOTAL BILL :</th>
                            <th colspan="1"><?= $row["order_child_total_price"] ?></th>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<style>
    .order-title {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .table-details {
        margin-bottom: 30px;
    }

    .products-table {
        margin-bottom: 30px;
    }

    .footer {
        margin-top: 50px;
        font-size: 0.8rem;
        color: #666;
        text-align: center;
    }
</style>
<?php
include "footer.php";
?>