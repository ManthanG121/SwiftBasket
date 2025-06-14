<?php
include 'header.php';
include("../db-connection/db connection.php");
include 'sidebar.php';
$id = $_GET["category_id"];
$query = "SELECT * FROM `tbl_category` WHERE `category_id` = $id";
$result = mysqli_query($conn, $query);
($row = mysqli_fetch_array($result))
    ?>
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Update Category</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="category-list.php" class="btn btn btn-outline-primary btn-round">Category List</a>
            </div>
        </div>
        <hr>
        <div class="container mb-4">
            <div class="card border-0 shadow-sm rounded-4 bg-light">
                <div class="card-header bg-info text-white rounded-top-4">
                    <h5 class="mb-0">Update Category</h5>
                </div>
                <div class="card-body p-4">
                    <form action="category-update.php?category_id=<?= $row["category_id"] ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="row g-3">
                            <!-- Category Name -->
                            <div class="col-lg-4">
                                <label for="name" class="form-label fw-semibold">Category Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter category name" value="<?= $row["category_name"] ?>" required>
                            </div>

                            <!-- Upload Image -->
                            <div class="col-lg-4">
                                <label for="img" class="form-label fw-semibold">Upload Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" name="img" id="img" class="form-control">
                            </div>
                        </div>

                        <!-- Category Description -->
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <label for="des" class="form-label fw-semibold">Category Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="des" id="des" rows="4" class="form-control"
                                    placeholder="Enter description"><?= $row["category_description"] ?></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mt-4">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-info px-4">
                                    <i class="fas fa-paper-plane me-2"></i>Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include "footer.php";
?>