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
         <h2 class="mb-4">Social Media Links</h2>
         
         <form action="save_links.php" method="POST">
            <?php 
               $display = "select * from links";
               $query = mysqli_query($conn,$display);
               $result = mysqli_fetch_array($query);
               
                ?>
            <div class="row">
               <div class="col">
                  <label for="title">Facebook Link</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="fb" value="<?php echo $result['fb']?>" >
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label for="instagram">Instagram Link</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="insta" value="<?php echo $result['insta']?>" >
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label for="twitter">Twitter Link</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="twitter" value="<?php echo $result['twitter']?>" >
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label for="linkedin">linkedin Link</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="linkedin" value="<?php echo $result['linkedin']?>" >
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label for="github">Github Link</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="github" value="<?php echo $result['github'] ?>" >
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label for="medium">Medium Link</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="medium" value="<?php echo $result['medium']?>" >
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label for="stackoverflow">Stackoverflow Link</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="stackoverflow" value="<?php echo $result['stackoverflow']?>" >
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label for="youtube">Youtube Link</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="youtube" value="<?php echo $result['youtube']?>" >	
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label for="googleplus">Google Plus Link</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="googleplus" value="<?php echo $result['googleplus']?>" >	
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label for="quora">Quora Link</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="quora" value="<?php echo $result['quora']?>" >	
               </div>
            </div>
             <div class="row">
               <div class="col">
                  <label for="keybase">Keybase Link</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="keybase" value="<?php echo $result['keybase']?>" >	
               </div>
            </div>
             <div class="row">
               <div class="col">
                  <label for="reddit">Reddit Link</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="reddit" value="<?php echo $result['reddit']?>" >	
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label for="email">Email</label>
                  <input style="border: 1px solid #34495e" type="email" class="form-control" name="email" value="<?php echo $result['email']?>" >	
               </div>
               <div class="col">
                  <label for="emailbody">Email Subject</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="emailbody" value="<?php echo $result['emailbody']?>" >	
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label for="whatsapp">WhatsApp Number</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="whatsapp" value="<?php echo $result['whatsapp']?>" >
               </div>
               <div class="col">
                  <label for="whatsappmsg">WhatsApp Body Message</label>
                  <input style="border: 1px solid #34495e" type="text" class="form-control" name="whatsappmsg" value="<?php echo $result['whatsappmsg']?>" >
               </div>
            </div>
            <br>
            <input type="submit" name="submit" value="Save" class="form-control btn btn-primary">
         </form>
      </div>
      <!-- ------------- -->
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
      <!-- ------------------ -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>