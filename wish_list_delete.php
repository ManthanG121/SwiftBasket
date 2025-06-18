<?php
session_start();
include("./db-connection/db connection.php");
$id = $_GET["product_id"];
$query = "DELETE  FROM `tbl_wishlist` WHERE `wishlist_product_id` ='$id'";
$result = mysqli_query($conn, $query);
if ($result) {
    $_SESSION["delete"] = "Delete Successfully..!";
    echo "<script>window.location.href='wish_list.php'</script>";
} else {
    echo "<br>Not delete";
}
?>