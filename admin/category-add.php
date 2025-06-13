<?php
include "header.php";
include "sidebar.php";
?>

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Add Category</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="category-list.php" class="btn btn-primary btn-round">Category List</a>
            </div>
        </div>
        
        <hr>
        <div class="container">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white rounded-top-4">
                    <h4 class="mb-0"><i class="fas fa-tags me-2"></i>Add New Category</h4>
                </div>
                <div class="card-body p-4">
                    <form action="category-insert.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-semibold">Category Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control shadow-sm"
                                    placeholder="Enter Category Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="img" class="form-label fw-semibold">Upload Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" name="img" id="img" class="form-control shadow-sm" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="des" class="form-label fw-semibold">Category Description <span
                                    class="text-danger">*</span></label>
                            <textarea name="des" id="des" rows="4" class="form-control shadow-sm"
                                placeholder="Write a short description..." required></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4 py-2">
                                <i class="fas fa-paper-plane me-1"></i>Submit
                            </button>
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