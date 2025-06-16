<?php
session_start();
include("../db-connection/db connection.php");
$id = $_GET["feature_id"];
$query = "DELETE  FROM `tbl_feature` WHERE `feature_id` = $id";
$result = mysqli_query($conn, $query);
if ($result) {
    $_SESSION["delete"] = "Delete Successfully..!";
    echo "<script>window.location.href='Featured-list.php'</script>";
} else {
    echo "<br>Not delete";
}
?>