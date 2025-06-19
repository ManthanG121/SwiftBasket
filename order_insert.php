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



?>

