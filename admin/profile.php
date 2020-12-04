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
         .notification{
         position: absolute;
         right: 15%;
         top: 20px;
         font-size: 20px;
         }
         #count{
         position: relative;
         top: -10px;
         left: -10px;
         }
      </style>
   </head>
   <body>
      <?php 
         $sql_get = mysqli_query($conn,"SELECT * FROM contactus WHERE status=0");
         $count = mysqli_num_rows($sql_get);
          ?>
      <div class="notification ">
         <div class="dropdown dropleft " >
            <button class="btn btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-envelope"></i>
            <span class="badge badge-primary rounded-circle" id="count"><?php echo $count ?></span>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
               <?php 
                  $sql_get1 = mysqli_query($conn,"SELECT * FROM contactus WHERE status=0 ");
                  if (mysqli_num_rows($sql_get1)>0) {
                  	while ($result = mysqli_fetch_assoc($sql_get1)) {
                  	echo '<a class="dropdown-item text-muted"  href="inbox.php?id='.$result['id'].'">
                  	<i class="fa fa-user"></i>&nbsp;&nbsp;
                  	'
                  	.$result['user_name'].':<br>
                  	<i class="fa fa-envelope"></i>&nbsp;&nbsp;'
                  	.$result['user_msg'].
                  	'</a>';
                  	echo '<div class="dropdown-divider"></div>';
                  	}
                  }else{
                  	echo '<a class="dropdown-item text-danger font-weight-bold" href="#"><i class="fa fa-envelope-open"></i></i> Sorry No Mesages</a>';
                  }
                  ?>	
            </div>
         </div>
      </div>
      <div class="wrapper d-flex align-items-stretch">
      <?php include('nav.php') ?>
      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
         <h2 class="mb-4">Dashboard</h2>
         
         <form action="save_profile.php" method="POST" enctype="multipart/form-data">
            <?php 
                 $display = "select * from cms , visit";
                 $query = mysqli_query($conn,$display);
                 $result = mysqli_fetch_array($query);
               ?>
            <div>
               <p>Total Visitor Is <span class="btn-primary" style="color: #fff;"><?php echo$result['total_count']?>  </span> </p>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col">
                     <img class="img-thumbnail" src="../img/<?php echo $result['profile_img'] ?>" width=160px ><br><br>
                     <label for="file">Profile Pic</label>
                     <div class="custom-file">
                        <input  type="file" class="form-control-file" id="file" name="file" accept="image/*" >
                        <label style="border: 1px solid #34495e" class="custom-file-label" for="file">Choose Profile Pic...</label>
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                        <label for="title">Name</label>
                        <input style="border: 1px solid #34495e" type="text" class="form-control" id="title" name="title" value="<?php echo$result['title']?>">
                     </div>
                     <div class="form-group">
                        <label for="des">Description</label>
                        <input style="border: 1px solid #34495e" type="text" class="form-control" id="des" name="des" value="<?php echo $result['description'] ?>">
                     </div>
                     <div class="form-group">
                        <label for="web_title">WebSite Title</label>
                        <input style="border: 1px solid #34495e" type="text" class="form-control" name="web_title" value="<?php echo $result['web_title']?>">
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="web_footer">WebSite Footer</label>
               <input style="border: 1px solid #34495e" type="text" class="form-control" name="web_footer" value="<?php echo $result['web_footer']?>">
            </div>
            <!-- <span><?php echo $msg; ?></span> -->
            <input type="submit" name="submit" value="Save" class="form-control btn btn-primary">
         </form>
      </div>



<!-- --------------- -->

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
      <!-- ------------------------------------ -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>