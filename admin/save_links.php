<?php 
session_start();
include('../include/config.php'); 
extract($_REQUEST);
if (isset($_REQUEST['submit'])) {

$query = "UPDATE `links` SET `fb`='$fb',`insta` = '$insta', `twitter`= '$twitter', `linkedin`= '$linkedin', `github`= '$github', `medium`= '$medium' , `stackoverflow`= '$stackoverflow' , `youtube`= '$youtube',`googleplus`='$googleplus',`quora`='$quora',`keybase`='$keybase',`reddit`='$reddit', `email`= '$email',`emailbody`= '$emailbody', `whatsapp`= '$whatsapp', `whatsappmsg`= '$whatsappmsg'";
$run = mysqli_query($conn,$query) or die($mysqli_error());


  if ($run) {
      $_SESSION['status']="Save Successfully";
      $_SESSION['icon']="success";
      header("location: links.php");
   }else{
      $_SESSION['status']="Not Save";
      $_SESSION['icon']="error";
      header("location: links.php");

   }

}



?>