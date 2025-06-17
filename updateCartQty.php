<?php
session_start();
include("./db-connection/db connection.php");
$cart_id = $_POST["cart_id"];
$cart_qty = $_POST["cart_qty"];

$query = "UPDATE `tbl_cart` SET `cart_qty`='$cart_qty' WHERE `cart_id`='$cart_id'";

$result = mysqli_query($conn, $query);
if ($result) {
    echo "<script>window.location.href='cart.php'</script>";
} else {
    echo "<br>Data Not insert";
}
?>