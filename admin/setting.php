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
      <style>
         input{
            border:1px solid #EDEDED ; 
            color: #000
         }
      </style>
   </head>
   <body>
      <div class="wrapper d-flex align-items-stretch">
         <?php include('nav.php') ?>
         <!-- Page Content  -->
         <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Setting</h2>
            <form action="save_setting.php" method="POST" >
               <?php 
                    $display = "select * from login";
                    $query = mysqli_query($conn,$display);
                    $result = mysqli_fetch_array($query);
                  ?>
               <div class="form-group">
                  <label for="username">Username</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" id="username" name="username" value="<?php echo$result['username']?>" required >
               </div>
               <div class="form-group">
                  <label for="password">Password</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" id="password" name="password" required>
               </div>
               <input type="submit" name="submit" value="Save" class="form-control btn btn-primary">
            </form>
         </div>
      </div>
         <?php 
            if (isset($_SESSION['status']) && $_SESSION['status'] !='') {
         ?>
                  <script type='text/javascript'>
                  Swal.fire({
                    position: 'center',
                    icon: '<?php echo $_SESSION['icon']; ?>',
                    title: '<?php echo $_SESSION['status']; ?>',
                    showConfirmButton: false,
                    timer: 1500
                  })
              </script>
         <?php
               unset($_SESSION['status']);
            } 
         ?>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>