<?php
session_start();
include("../db-connection/db connection.php");
$name = $_POST["name"];
$des = $_POST["des"];

$img = $_FILES["img"]["name"];
$tmp_name = $_FILES["img"]["tmp_name"];
move_uploaded_file($tmp_name, "uplodes/image/$img");

$query = "INSERT INTO tbl_category(`category_name`,`category_img`,`category_description`) VALUES('$name','$img','$des')";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "<script>window.location.href='Category-list.php'</script>";
    $_SESSION["success"] = "Registration Successfully..!";
} else {
    echo "Registration Failed..!";
}
?>