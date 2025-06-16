<?php
include 'header.php';
include("../db-connection/db connection.php");
include 'sidebar.php';

$id = $_GET["product_id"];
$query = "SELECT * FROM `tbl_product` WHERE `product_id` = $id";
$result = mysqli_query($conn, $query);
($row = mysqli_fetch_array($result))
    ?>

<div class="container">
    <div class="page-inner">
        <div class="container-fluid">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Product List</h3>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <!-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> -->
                    <a href="product-list.php" class="btn btn-primary btn-round">Product List</a>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="row bg-light p-4 rounded shadow-sm">
                    <!-- Left: Product Image -->
                    <div class="col-md-6 text-center">
                        <img src="uplodes/image/<?= $row["product_img"] ?>" alt="<?= $row["product_name"] ?>"
                            class="img-fluid rounded border" style="max-height: 450px;">
                    </div>

                    <!-- Right: Product Info -->
                    <div class="col-md-6">
                        <h4 class="fw-bold"><?= $row["product_name"] ?></h4>
                        <hr>
                        <p><strong>Product ID:</strong> <?= $row["product_id"] ?></p>
                        <p><strong>MRP:</strong> ₹<?= $row["product_mrp"] ?></p>
                        <p><strong>Discount Percentage:</strong> <?= $row["product_discount_percentage"] ?>%</p>
                        <p><strong>Discount Value:</strong> ₹<?= $row["product_discount_value"] ?></p>
                        <p><strong>Selling Price:</strong> ₹<?= $row["product_sell_price"] ?></p>
                        <p><strong>Description:</strong><br><?= nl2br($row["product_discription"]) ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php
include 'footer.php';
?>