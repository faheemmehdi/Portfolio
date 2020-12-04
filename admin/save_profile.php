<?php
session_start();
include('../include/config.php'); 
$que="SELECT * FROM cms";
$queryrun=mysqli_query($conn,$que);
$data=mysqli_fetch_array($queryrun);
$target_dir = "../img/";
extract($_REQUEST);
if (isset($_REQUEST['submit'])) {
$image = $_FILES['file']['name'];
  if($image == ""){
   $image=$data['profile_img'];
  }
     $query = "UPDATE `cms` SET `title`='$title',`description` = '$des',`profile_img`='$image', `web_title`= '$web_title', `web_footer`= '$web_footer'";
     $run = mysqli_query($conn,$query) or die($mysqli_error());
     $traget = "../img/". $image; 
      if ($run) {
      	$_SESSION['status']="Save Successfully";
        $_SESSION['icon']="success";
        header("location:profile.php");
      }else{
      	$_SESSION['status']="Not Save";
        $_SESSION['icon']="error";
        header("location:profile.php");
       }

}
            
?>
