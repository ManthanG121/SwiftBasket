<?php
include("header.php");
include 'sidebar.php';
include("../db-connection/db connection.php");
$id = $_GET["product_id"];
$query = "SELECT * FROM `tbl_product` WHERE `product_id` = $id";
$result = mysqli_query($conn, $query);
($row = mysqli_fetch_array($result))
    ?>

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Update Product</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="product-list.php" class="btn btn btn-outline-primary btn-round">Product List</a>
            </div>
        </div>
        <hr>
        <div class="container mb-4">
            <div class="card border-0 shadow-sm rounded-4 bg-light">
                <div class="card-header bg-info text-white rounded-top-4">
                    <h5 class="mb-0">Update Category</h5>
                </div>
                <div class="card-body p-4">
                    <form action="product_insert.php?product_id=<?= $row["product_id"] ?>" method="post"
                        enctype="multipart/form-data">

                        <!-- Row 1 -->
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-3">
                                <label for="name" class="form-label fw-bold">Product Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Product Name"
                                    value="<?= $row["product_name"] ?>" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="img" class="form-label fw-bold">Product Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" name="img" id="img" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <!-- Row 2 -->
                        <div class="row mb-4">
                            <div class="col-lg-3 mb-3">
                                <label for="mrp" class="form-label fw-bold">MRP <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="mrp" id="mrp" class="form-control" placeholder="MRP"
                                    onkeyup="add()" value="<?= $row["product_mrp"] ?>" required>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="disper" class="form-label fw-bold">Discount % <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="percentage" id="disper" class="form-control" placeholder="%"
                                    onkeyup="add()" value="<?= $row["product_discount_percentage"] ?>" required>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="disval" class="form-label fw-bold">Discount Value <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="value" id="disval" class="form-control" placeholder="₹"
                                    readonly>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="net" class="form-label fw-bold">Sell Price <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="price" id="net" class="form-control" placeholder="₹" readonly>
                            </div>
                        </div>

                        <!-- Row 3 -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <label for="discription" class="form-label fw-bold">Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="discription" id="discription" rows="4" class="form-control"
                                    required><?= $row["product_discription"] ?></textarea>
                            </div>
                        </div>

                        <!-- Row 4 -->
                        <div class="row">
                            <div class="col-12 text-center">
                                <input type="submit" value="Submit"
                                    class="btn btn-info px-5 py-2 fw-bold rounded-pill">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function add() {
        let mrp = parseFloat(document.getElementById("mrp").value) || 0;
        let discount = parseFloat(document.getElementById("disper").value) || 0;

        let discountValue = (mrp * discount / 100).toFixed(2);
        let sellPrice = (mrp - discountValue).toFixed(2);

        document.getElementById("disval").value = discountValue;
        document.getElementById("net").value = sellPrice;
    }
</script>

<?php
include "footer.php";
?>