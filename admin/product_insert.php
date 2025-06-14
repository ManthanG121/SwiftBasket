<?php
session_start();
include("../db-connection/db connection.php");
$id = $_GET["product_id"];
$name = $_POST["name"];
$mrp = $_POST["mrp"];
$discount_percentage = $_POST["percentage"];
$discount_value = $_POST["value"];
$sell_price = $_POST["price"];
$description = $_POST["discription"];


$img = $_FILES["img"]["name"];
$tmp_name = $_FILES["img"]["tmp_name"];
if ($img) {
    move_uploaded_file($tmp_name, "uplodes/image/$img");
    $query = "UPDATE `tbl_product` SET `product_name`='$name',`product_img`='$img',`product_mrp`='$mrp',`product_discount_percentage`='$discount_percentage',`product_discount_value`='$discount_value',`product_sell_price`='$sell_price',`product_discription`='$description' WHERE `product_id`='$id'";
} else {

    $query = "UPDATE `tbl_product` SET `product_name`='$name',`product_mrp`='$mrp',`product_discount_percentage`='$discount_percentage',`product_discount_value`='$discount_value',`product_sell_price`='$sell_price',`product_discription`='$description' WHERE `product_id`='$id'";
}
$result = mysqli_query($conn, $query);
if ($result) {
    $_SESSION["edit"] = "Edit Successfully..!";
    echo "<script>window.location.href='product-list.php'</script>";
} else {
    echo "<br>Data Not insert";
}
?>