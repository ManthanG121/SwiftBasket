<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_swiftbasket";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {

    echo "Connection Error";
}

?>