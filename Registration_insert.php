<?php
include("./db-connection/db connection.php");
$name = $_POST["name"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$confirmpassword = $_POST["confirmpassword"];
$query = "INSERT INTO tbl_customer(`customer_name`,`customer_email`,`customer_password`,`customer_confirm_password`) VALUES('$name','$email','$pass','$confirmpassword')";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "Registration Successfully..!";
} else {
    echo "Registration Failed..!";
}
?>