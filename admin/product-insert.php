<?php
session_start();
include("../db-connection/db connection.php");
$name = $_POST["name"];
$mrp = $_POST["mrp"];
$discount_percentage = $_POST["percentage"];
$discount_value = $_POST["value"];
$sell_price = $_POST["price"];
$description = $_POST["discription"];
$categori = $_POST["categori"];

$img = $_FILES["img"]["name"];
$tmp_name = $_FILES["img"]["tmp_name"];
move_uploaded_file($tmp_name, "uplodes/image/$img");


$query = "INSERT INTO tbl_product(`product_name`,`product_img`,`product_mrp`,`product_discount_percentage`,`product_discount_value`,`product_sell_price`,`product_discription`,`category`) VALUES('$name','$img','$mrp','$discount_percentage','$discount_value','$sell_price','$description','$categori')";
$result = mysqli_query($conn, $query);
if ($result) {
    $_SESSION["success"] = "Add Successfully..!";
    echo "<script>window.location.href='product-list.php'</script>";
} else {
    echo "Registration Failed..!";
}
?>