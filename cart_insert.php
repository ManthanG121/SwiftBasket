<?php
session_start();
if (!isset($_SESSION["login"])) {
  echo "<script> window.location.href='SignUp_LogIn_Form.php'</script>";
}
include("./db-connection/db connection.php");
$product_id = $_POST["id"];
$customer = $_SESSION["customer_id"];
$cart_qty = $_POST["cart_qty"];

$query = "INSERT INTO tbl_cart(`cart_product_id`,`cart_customer_id`,`cart_qty`) VALUES('$product_id','$customer','$cart_qty')";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "<script>window.location.href='cart.php'</script>";
    $_SESSION["success"] = "Add Successfully..!";
} 
?>
