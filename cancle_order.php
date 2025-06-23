<?php
session_start();
include("./db-connection/db connection.php");
$customer_id = $_GET['order_master_customer_id'];
                    $order_master_id = $_GET['order_master_id'];
$query = "DELETE  FROM `tbl_order_master` WHERE `order_master_id` = $order_master_id AND `order_master_customer_id` = $customer_id";
$result = mysqli_query($conn, $query);

$query2 = "DELETE  FROM `tbl_order_master_child` WHERE `order_child_order_master_id` = $order_master_id AND `order_child_customer_id` = $customer_id";
$result2 = mysqli_query($conn, $query2);
if ($result & $result2) {
    $_SESSION["delete"] = "Delete Successfully..!";
    echo "<script>window.location.href='track-order.php'</script>";
} else {
    echo "<br>Not delete";
}
?>