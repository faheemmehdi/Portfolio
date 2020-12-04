<?php 
session_start();
include('../include/config.php'); 
if(isset($_POST['addskill'])){
    // $id=$_POST['id'];
    $skill=mysqli_real_escape_string($conn,$_POST['skill']);
    $percentage=mysqli_real_escape_string($conn,$_POST['percentage']);
    $query="INSERT INTO skills (skill,percentage) VALUES ('$skill','$percentage')";
    $run=mysqli_query($conn,$query);
    if($run){
        $_SESSION['status']="Add Skill Successfully";
        $_SESSION['icon']="success";
        header("location:about.php");
    }else{
        $_SESSION['status']="Not Add Skill";
        $_SESSION['icon']="error";
        header("location:about.php");
    }
}
if(isset($_POST['saveabout'])){
    // $id=$_POST['id'];
    $heading=mysqli_real_escape_string($conn,$_POST['heading']);
    $abouttext=mysqli_real_escape_string($conn,$_POST['abouttext']);
    $query="UPDATE about SET heading='$heading',abouttext='$abouttext'";
    $run=mysqli_query($conn,$query);
    if($run){
        $_SESSION['status']="Save Successfully";
        $_SESSION['icon']="success";
        header("location:about.php");
    }else{
        $_SESSION['status']="Not Save";
        $_SESSION['icon']="error";
        header("location:about.php");
    }
}

if(isset($_GET['del'])){
    $id=$_GET['del'];
    $query="DELETE FROM skills WHERE id='$id'";
    $run=mysqli_query($conn,$query);
    if($run){
        $_SESSION['status']="Delete Skill Successfully";
        $_SESSION['icon']="success";
        header("location:about.php");
    }else{
        $_SESSION['status']="Not Delete";
        $_SESSION['icon']="error";
        header("location:about.php");
    }
}
if(isset($_POST['supdate'])){
    $id=$_POST['id'];
    $skill=mysqli_real_escape_string($conn,$_POST['skill']);
    $percentage=mysqli_real_escape_string($conn,$_POST['percentage']);
    $query="UPDATE skills SET skill='$skill',percentage='$percentage' WHERE id='$id'";
    $run=mysqli_query($conn,$query);
    if($run){
        $_SESSION['status']="Update Skill Successfully";
        $_SESSION['icon']="success";
        header("location:about.php");
    }else{
        $_SESSION['status']="Not Update";
        $_SESSION['icon']="error";
        header("location:about.php");
    }
}
 ?>