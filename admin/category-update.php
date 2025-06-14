<?php
session_start();
include("../db-connection/db connection.php");
$id = $_GET["category_id"];
$name = $_POST["name"];
$description = $_POST["des"];


$img = $_FILES["img"]["name"];
$tmp_name = $_FILES["img"]["tmp_name"];
if ($img) {
    move_uploaded_file($tmp_name, "uplodes/image/$img");
    $query = "UPDATE `tbl_category` SET `category_name`='$name',`category_img`='$img',`category_description`='$description' WHERE `category_id`='$id'";
} else {

    $query = "UPDATE `tbl_category` SET `category_name`='$name',`category_description`='$description' WHERE `category_id`='$id'";
}
$result = mysqli_query($conn, $query);
if ($result) {
    $_SESSION["edit"] = "Edit Successfully..!";
    echo "<script>window.location.href='Category-list.php'</script>";
} else {
    echo "<br>Data Not insert";
}
?>