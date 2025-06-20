<?php
session_start();
include("../db-connection/db connection.php");
$master_id = $_POST['master_id'];
$customer_id = $_POST['customer_id'];
$order_status = $_POST["tracking"];
$payment_status = $_POST["payment"];

$query = "UPDATE `tbl_order_master` SET `order_master_status`='$order_status',`order_master_payment_status`='$payment_status' WHERE `order_master_customer_id`='$customer_id' AND `order_master_id`='$master_id'";
$result = mysqli_query($conn, $query);
if ($result) {
    $_SESSION["edit"] = "Status Update Successfully..!";
    echo "<script>window.location.href='order-list.php'</script>";
} else {
    echo "<br>Data Not insert";
}
?>