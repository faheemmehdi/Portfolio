<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 style="color: #000" class="modal-title" id="exampleModalLabel">Contact Us</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="" method="POST" >
               <div class="form-group">
                  <label style="color: #000" for="name" class="col-form-label">Name:</label>
                  <input type="text" name="user_name" class="form-control" id="name" required>
               </div>
               <div class="form-group">
                  <label style="color: #000" for="email" class="col-form-label">Email:</label>
                  <input type="email" name="user_email" class="form-control" id="email" required>
               </div>
               <div class="form-group">
                  <label style="color: #000" for="message" class="col-form-label">Message:</label>
                  <textarea class="form-control" name="user_msg" id="message" required></textarea>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" name="submit" class="btn btn-primary" value="Send">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>


 <?php 
    include('config.php'); 

    $msg="";
    extract($_REQUEST);
     if (isset($_REQUEST['submit'])) {

          $query = "INSERT INTO `contactus`( `user_name`,`user_email`, `user_msg`) VALUES ('$user_name','$user_email','$user_msg')";
          $run = mysqli_query($conn,$query);
          
     if ($run) {
              echo "<script type='text/javascript'>
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Send Success',
                    showConfirmButton: false,
                    timer: 1500
                  })
              </script>";
     }else{
          echo "<script type='text/javascript'>
                  Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Not Send',
                    showConfirmButton: false,
                    timer: 1500
                  })
              </script>";
     }
     };
    
 ?>