<?php
session_start();
include("./db-connection/db connection.php");
$email = $_POST["email"];
$pass = $_POST["pass"];
$query = "SELECT * FROM `tbl_customer` WHERE `customer_email` = '$email' and `customer_confirm_password` = '$pass'";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_array($result);
    echo "login Successfully..!";
    $_SESSION["login"] = 1;
    $_SESSION["customer_id"] = $row["customer_id"];
    echo "<script>window.location.href='index.php'</script>";
} else {
    echo "login unsuccessfully..!";
}
?>