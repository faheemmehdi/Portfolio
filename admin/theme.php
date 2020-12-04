<?php
   include('session.php');
   include('../include/config.php'); 
   if(!isset($_SESSION['login_user'])){
   header("location: index.php"); 
   }
   ?>
<!doctype html>
<html lang="en">
   <head>
      <?php include('../include/header.php') ?>
   </head>
   <body>
      <div class="wrapper d-flex align-items-stretch">
         <?php include('nav.php') ?>
         <!-- Page Content  -->
         <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Colors</h2>
            <form action="theme.php" method="POST" >
               <?php 

                    $display = "select * from theme";
                    $query = mysqli_query($conn,$display);
                    $result = mysqli_fetch_array($query);
                  ?>
               <div class="form-group">
                  <label for="bgcolor">Background Color</label>
                  <input type="color" class="form-control" id="bgcolor" name="bgcolor" value='<?php echo$result['bgcolor']?>' >
               </div>
               <div class="form-group">
                  <label for="fontcolor">Font Color</label>
                  <input type="color" class="form-control" id="fontcolor" name="fontcolor" value='<?php echo$result['fontcolor']?>' >
               </div>
               <div class="form-group">
                  <label for="iconcolor">Icon Color</label>
                  <input type="color" class="form-control" id="iconcolor" name="iconcolor" value='<?php echo $result['iconcolor']?>' >
               </div>
               <div class="form-group">
                  <label for="aboutbtn">About Button Color</label>
                  <input type="color" class="form-control" id="aboutbtn" name="aboutbtn" value='<?php echo $result['aboutbtn']?>' >
               </div>
              <!--  <div class="form-group">
                  <label for="resumebtn">Resume Button Color</label>
                  <input type="color" class="form-control" id="resumebtn" name="resumebtn" value='<?php echo $result['resumebtn']?>' >
               </div> -->
               <input type="submit" name="submit" value="Save" class="form-control btn btn-primary">
            </form>
         </div>
      </div>
      <?php 
         extract($_REQUEST);
         if (isset($_REQUEST['submit'])) {
         $query = "UPDATE `theme` SET `bgcolor`='$bgcolor',`fontcolor` = '$fontcolor', `iconcolor`= '$iconcolor', `aboutbtn`= '$aboutbtn'";
         $run = mysqli_query($conn,$query) or die($mysqli_error());
         
         header("location: theme.php");
         
         
         
         
         }
         
         ?>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>