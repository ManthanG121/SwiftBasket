<?php
include "header.php";
include("../db-connection/db connection.php");
include "sidebar.php";
?>
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Order Traking / Payment Updates</h3>
            </div>
        </div>
        <hr>
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-dark text-white text-left fw-bold fs-4 rounded-top-4">
                <div class="row text-center"> 
                    <div class="col-lg-6">| Order Tracking Status |</div>
                    <div class="col-lg-6">| Payment Status |</div>
                </div>
            </div>
            <div class="card-body bg-light rounded-bottom-4">
                <form action="order_status_update.php" method="post">
                    <div class="table-responsive">
                        <div class="row mb-3 mt-3">
                            <div class="col-lg-6 text-center">
                                <label class="form-label fw-semibold">Update Tracking Status <span
                                        class="text-danger">*</span></label>
                                <select name="tracking" id="" class="text-center form-select">
                                    <?php
                                    $customer_id = $_GET['order_master_customer_id'];
                                    $order_master_id = $_GET['order_master_id'];
                                    $query = "SELECT * FROM `tbl_order_master` WHERE order_master_customer_id = $customer_id AND tbl_order_master.order_master_id= $order_master_id";
                                    $result = mysqli_query($conn, $query);
                                    ($row = mysqli_fetch_array($result));
                                    ?>
                                    <option value="<?= $row['order_master_status'] ?>">
                                        <?= $row['order_master_status'] ?></option>
                                    <option value="Processing">Ordered</option>
                                    <option value="Ready to Shipping">Shipped</option>
                                    <option value="Shipped">Out for Delivery</option>
                                    <option value="Deleverd">Delivered</option>
                                </select>
                            </div>
                            <div class="col-lg-6 text-center">
                                <label class="form-label fw-semibold">Update Payment Status <span
                                        class="text-danger">*</span></label>
                                <select name="payment" id="" class="text-center form-select">
                                    <option value="<?= $row['order_master_payment_status'] ?>">
                                        <?= $row['order_master_payment_status'] ?></option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" value="<?= $row['order_master_id'] ?>" name="master_id">
                        <input type="hidden" value="<?= $row['order_master_customer_id'] ?>" name="customer_id">
                        <input type="submit" value="Update" class="btn btn-info px-5 py-2 m-4 fw-bold rounded-pill">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>