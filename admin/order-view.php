<?php
include "header.php";
include("../db-connection/db connection.php");
include "sidebar.php";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<body>
    <div class="container">
        <h2 class="order-title page-inner">Order Details - #1</h2>

        <div class="table-responsive table-details">
            <table class="table table-bordered">
                <tbody>
                    <?php
                    $query = "SELECT * FROM `tbl_order_master`";
                    $result = mysqli_query($conn,$query);
                    ($row= mysqli_fetch_array($result));
                    ?>
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
                         <td><?= $row['address'] ?>, <?= $row['city'] ?>-<?= $row['zip_code'] ?>, <?= $row['state'] ?></td>
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
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Comfortable Cotton T-Shirt</td>
                        <td>2</td>
                        <td>₹1,624.35</td>
                        <td>₹3,248.70</td>
                        <td>19/02/2025 11:45 PM</td>
                    </tr>
                    <tr>
                        <td>Trendy Leather Jacket</td>
                        <td>1</td>
                        <td>₹4,249.15</td>
                        <td>₹4,249.15</td>
                        <td>19/02/2025 11:45 PM</td>
                    </tr>
                    <tr>
                        <td>Classic Formal Suit</td>
                        <td>1</td>
                        <td>₹5,399.10</td>
                        <td>₹5,399.10</td>
                        <td>19/02/2025 11:45 PM</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>Copyright © 2014-2023 Online Shopping System. All rights reserved.</p>
            <p>Version 3.1.0</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    .header {
        margin-bottom: 30px;
    }

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