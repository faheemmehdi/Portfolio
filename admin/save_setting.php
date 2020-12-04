<?php 
session_start();
include('../include/config.php'); 

if (isset($_REQUEST['submit'])) {
	
$username= $_POST["username"];
$password= $_POST["password"];
$salt= "portfolio";
$password_encrypted = sha1($password.$salt);
$query = "UPDATE `login` SET `username`='$username',`password` = '$password_encrypted'";
$run = mysqli_query($conn,$query) or die($mysqli_error());
if ($run) {
   $_SESSION['status']="Password Change Successfully";
   $_SESSION['icon']="success";
   header("location: setting.php");
}else{
   $_SESSION['status']="Not Save";
   $_SESSION['icon']="error";
   header("location: setting.php");
}         

}

?>