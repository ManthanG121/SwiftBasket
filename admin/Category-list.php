<?php
include("../db-connection/db connection.php");
include "header.php";
include "sidebar.php";
?>
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Category List</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <!-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> -->
                <a href="category-add.php" class="btn btn-primary btn-round">Add Category</a>
            </div>
        </div>
        <hr>
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-info text-white rounded-top-4">
                <h5 class="mb-0">Category List</h5>
            </div>
            <div class="card-body bg-light-subtle">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $query = "SELECT * FROM `tbl_category`";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?= ++$count; ?></td>
                                    <td class="fw-semibold"><?= $row["category_name"] ?></td>
                                    <td>
                                        <img src="uplodes/image/<?= $row["category_img"] ?>"
                                            class="rounded-circle shadow-sm border"
                                            style="width: 45px; height: 45px; object-fit: cover;" alt="Category Image">
                                    </td>
                                    <td><?= $row["category_description"] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-light text-info border border-info me-1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="category-edit.php?category_id=<?= $row["category_id"] ?>" class="btn btn-sm btn-light text-success border border-success me-1">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="category-delete.php?category_id=<?= $row["category_id"] ?>" class="btn btn-sm btn-light text-danger border border-danger"
                                            onclick="return confirm('Are You Sure?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            if ($count == 0) {
                                ?>
                                <tr>
                                    <td colspan="5">
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