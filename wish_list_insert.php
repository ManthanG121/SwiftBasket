<?php
session_start();
include("./db-connection/db connection.php");
$product_id = $_POST["id"];
$customer = $_SESSION["customer_id"];
$query = "INSERT INTO tbl_wishlist(`wishlist_product_id`,`wishlist_customer`) VALUES('$product_id','$customer')";
$result = mysqli_query($conn, $query);
if ($result) {
    $_SESSION["success"] = "Add Successfully..!";
    echo "<script>window.location.href='wish_list.php'</script>";
} else {

}
?>