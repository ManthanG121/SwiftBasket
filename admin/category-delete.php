<?php
session_start();
include("../db-connection/db connection.php");
$id = $_GET["category_id"];
$query = "DELETE  FROM `tbl_category` WHERE `category_id` = $id";
$result = mysqli_query($conn, $query);
if ($result) {
    $_SESSION["delete"] = "Delete Successfully..!";
    echo "<script>window.location.href='category-list.php'</script>";
} else {
    echo "<br>Not delete";
}
?>