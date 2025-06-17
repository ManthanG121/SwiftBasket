<?php
session_start();
include("./db-connection/db connection.php");
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$query = "INSERT INTO tbl_contact(`contact_name`,`contact_email`,`contact_subject`,`contact_message`) VALUES ('$name','$email','$subject','$message')";
$result = mysqli_query($conn,$query);
if($result)
{
    $_SESSION["contact_us"] = "Your Message Is Send Please Wait For Responce...";
    echo "<script>window.location.href='contact.php'</script>";
}
else{
    $_SESSION["contact_us_field"] = "Message Send Faild..";
}