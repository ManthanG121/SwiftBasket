<?php
include "header.php";
include("./db-connection/db connection.php");
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
</head>

<body>

    <div class="container my-5">
        <h2 class="mb-4">Order History</h2>

        <!-- Order Card -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <strong>All Orders:</strong>
                </div>
            </div>

            <div class="card-body">

                <table class="table table-sm table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Order No</th>
                            <th>Orderd Date</th>
                            <th>Total Bill</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        $customer_id = $_SESSION['customer_id'];
                        $query = "SELECT * FROM tbl_order_master  WHERE tbl_order_master.order_master_customer_id = $customer_id";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= ($row['date']) ?></td>
                                <td><?= ($row['order_master_total']) ?></td>
                                <td><?= ($row['order_master_payment_status']) ?></td>
                                <td><?= ($row['order_master_status']) ?></td>
                                <td class="text-center">
                                    <a href="product-view-list.php?order_master_customer_id=<?= $row['order_master_customer_id'] ?>&order_master_id=<?= $row['order_master_id'] ?>"
                                        class="btn btn-sm btn-outline-info mb-1" title="View">
                                        <i class="fa fa-eye"></i>View Order
                                    </a>
                                    <a href="cancle_order.php?order_master_customer_id=<?= $row['order_master_customer_id'] ?>&order_master_id=<?= $row['order_master_id'] ?>"
                                        class="btn btn-sm btn-outline-danger mb-1" title="Delete"
                                        onclick="return confirm('Are you sure you want to Cancle this Order?');">
                                        <i class="fa fa-trash"></i>Cancle Order
                                    </a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include "footer.php";
?>