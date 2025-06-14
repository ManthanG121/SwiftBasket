<?php
include "header.php";
include("../db-connection/db connection.php");
include "sidebar.php";
?>
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Add Product</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="product-list.php" class="btn btn btn-outline-primary btn-round">Product List</a>
            </div>
        </div>
        <hr>
        <div class="container mb-4">
            <div class="card border-0 shadow-sm rounded-4 bg-light">
                <div class="card-header bg-info text-white rounded-top-4">
                    <h5 class="mb-0">Add New Product</h5>
                </div>
                <div class="card-body p-4">
                    <form action="product-insert.php" method="post" enctype="multipart/form-data">
                        <!-- Row 1: Product Name, Image, Category -->
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <label class="form-label fw-semibold">Product Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter product name"
                                    required>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label fw-semibold">Product Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" name="img" class="form-control" required>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label fw-semibold">Select Category <span
                                        class="text-danger">*</span></label>
                                <select name="categori" class="form-select" required>
                                    <?php
                                    $query = "SELECT * FROM `tbl_category`";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?= $row["category_id"] ?>"><?= $row["category_name"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Row 2: MRP, Discount %, Discount Value, Sell Price -->
                        <div class="row mt-4 g-4">
                            <div class="col-lg-3">
                                <label class="form-label fw-semibold">MRP <span class="text-danger">*</span></label>
                                <input type="text" name="mrp" id="mrp" class="form-control" placeholder="Enter MRP"
                                    onkeyup="add()" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label fw-semibold">Discount (%) <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="percentage" id="disper" class="form-control"
                                    placeholder="Enter %" onkeyup="add()" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label fw-semibold">Discount Value <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="value" id="disval" class="form-control"
                                    placeholder="Auto-calculated" readonly>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label fw-semibold">Selling Price <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="price" id="net" class="form-control" placeholder="Net Price"
                                    readonly>
                            </div>
                        </div>

                        <!-- Row 3: Description -->
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <label class="form-label fw-semibold">Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="discription" class="form-control" rows="4"
                                    placeholder="Product description..." required></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mt-4">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-info px-4">
                                    <i class="fas fa-plus me-2"></i>Submit Product
                                </button>
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
        var mrp = document.getElementById('mrp').value
        var disper = document.getElementById('disper').value
        var disval = document.getElementById('disval').value = (mrp * disper / 100)
        var net = document.getElementById('net').value = (mrp - disval)

    }
</script>
<?php
include "footer.php";
?>