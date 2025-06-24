<?php
include("../db-connection/db connection.php");
include "header.php";
include "sidebar.php";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toastEl = document.querySelector('.toast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
            toast.show();
        }
    });
</script>
<?php if (isset($_SESSION['contact_delete'])): ?>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055;text-align: center; margin-top: 100px;">
        <div class="toast text-center align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check-circle me-2"></i>
                    <?= htmlspecialchars($_SESSION['contact_delete']) ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['contact_delete']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['contact_not_delete'])): ?>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055;text-align: center; margin-top: 100px;">
        <div class="toast text-center align-items-center text-white bg-success border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check-circle me-2"></i>
                    <?= htmlspecialchars($_SESSION['contact_not_delete']) ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['contact_not_delete']); ?>
<?php endif; ?>


<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3 pt-4">Contact List</h3>
            </div>
            
        </div>
        <hr>
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-info text-white rounded-top-4">
                <h5 class="mb-0">Contact Us</h5>
            </div>
            <div class="card-body bg-light-subtle">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $customer_name = isset($_POST["product_name"]) ? $_POST["product_name"] : "";
                            $query = "SELECT * FROM `tbl_contact` WHERE `contact_name` LIKE '%$customer_name%'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?= ++$count; ?></td>
                                    <td class="fw-semibold"><?= $row["contact_name"] ?></td>
                                   
                                    <td><?= $row["contact_email"] ?></td>
                                    <td><?= $row["contact_subject"] ?></td>
                                    <td><?= $row["contact_message"] ?></td>
                                    <td>
                                        <a href="contact-delete.php?contact_id=<?= $row["contact_id"] ?>" class="btn btn-sm btn-light text-danger border border-danger"
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