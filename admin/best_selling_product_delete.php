<?php
session_start();
include("../db-connection/db connection.php");
$id = $_GET["best_selling_product_id"];
$query = "DELETE  FROM `tbl_best_selling_product` WHERE `best_selling_product_id` = $id";
$result = mysqli_query($conn, $query);
if ($result) {
    $_SESSION["delete"] = "Delete Successfully..!";
    echo "<script>window.location.href='best_selling_products-list.php'</script>";
} else {
    echo "<br>Not delete";
}
?>