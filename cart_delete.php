<?php
session_start();
include("./db-connection/db connection.php");
$id = $_GET["product_id"];
$query = "DELETE  FROM `tbl_cart` WHERE `cart_product_id` ='$id'";
$result = mysqli_query($conn, $query);
if ($result) {
    $_SESSION["delete"] = "Delete Successfully..!";
    echo "<script>window.location.href='cart.php'</script>";
} else {
    echo "<br>Not delete";
}
?>