<?php 
// session_start();
if (isset($_REQUEST['submit'])) {
	
$username= $_POST["username"];
$password= $_POST["password"];
$salt= "portfolio";
$password_encrypted = sha1($password.$salt);
$query = "UPDATE `login` SET `username`='$username',`password` = '$password_encrypted'";
$run = mysqli_query($conn,$query) or die($mysqli_error());
     if ($run) {
          header("location: setting.php");
     }
}

               ?>