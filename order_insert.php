<?php
include "./db-connection/db connection.php";
session_start();
$customer = $_SESSION["customer_id"];
$total = $_POST['total'];
$date = $_POST['date'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$paymentMethod = $_POST['paymentMethod'];

$query = "INSERT INTO tbl_order_master(`order_master_total`,`order_master_customer_id`,`date`,`first_name`,`last_name`,`email`,`phone`,`address`,`country`,`state`,`city`,`zip_code`,`order_master_payment_method`) VALUE ('$total','$customer','$date','$firstname','$lastname','$email','$phone','$address','$country','$state','$city','$zip_code','$paymentMethod')";
$result = mysqli_query($conn,$query);

$sel = "SELECT * FROM `tbl_order_master`";
$res = mysqli_query($conn, $sel);
while ($row = mysqli_fetch_array($res)) {
    $master_id = $row["order_master_id"];
    $totaloc = $row["order_master_total"];
}

$customer = $_SESSION["customer_id"];
$sel = "SELECT * FROM `tbl_cart` WHERE tbl_cart.cart_customer_id = $customer";

$res = mysqli_query($conn, $sel);

while ($row = mysqli_fetch_array($res)) {
    $product_id = $row["cart_product_id"];
    $cardq = $row["cart_qty"];
    $sel = "INSERT INTO tbl_order_master_child(`order_child_order_master_id`,`order_child_product_id`,`order_child_qty`,`order_child_total_price`) VALUES('$master_id','$product_id','$cardq','$totaloc')";
    mysqli_query($conn, $sel);
}

$customer = $_SESSION["customer_id"];
$sel = "DELETE  FROM `tbl_cart` WHERE tbl_cart.cart_customer_id = $customer";
$result = mysqli_query($conn, $sel);
if ($result) {
} else {
    echo "<br>Not delete";
}

if ($result) {
    $_SESSION["success"] = "Order Placed..!";
    echo "<script>window.location.href='cart.php'</script>";

} else {

}

?>

