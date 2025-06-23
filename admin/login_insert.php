<?php
session_start();
include("../db-connection/db connection.php");
$email = $_POST["email"];
$pass = $_POST["pass"];
$query = "SELECT * FROM `tbl_admin_login` WHERE `email` = '$email' and `pass` = '$pass'";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
    echo "login Successfully..!";
    $_SESSION["login"] = 1;   
    echo "<script>window.location.href='index.php';</script>";
} else {
    echo "login unsuccessfully..!";
}
?>