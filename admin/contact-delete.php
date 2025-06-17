<?php
include("../db-connection/db connection.php");
$contact_id = $_GET['contact_id'];

$query = "DELETE FROM tbl_contact WHERE `contact_id` = '$contact_id'";
$result = mysqli_query($conn, $query);

if($result){
    $_SESSION["contact_delete"] = "Delete Successfully..!";
    echo "<script>window.location.href='contact-list.php'</script>";
}
else 
{
    $_SESSION["contact_not_delete"] = "Delete Unsuccessfully..! Try Again.";
    echo "<script>window.location.href='contact-list.php'</script>";
}