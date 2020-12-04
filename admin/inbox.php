<?php
   include('session.php');
   include('../include/config.php');
   if(!isset($_SESSION['login_user'])){
   header("location: index.php"); 
   }
   ?>
<?php 
   if (isset($_GET['id'])) {
   	$main_id = $_GET['id'];
   
   	mysqli_query($conn, "UPDATE contactus SET status=1 WHERE id ='$main_id'");
   }
   ?>
<!doctype html>
<html lang="en">
   <head>
      <?php include('../include/header.php') ?>
      <style>
         .hide{
         display: none;
         }
         .row-msg:hover{
         background-color: #e3e3e3;
         }
         .row-msg:hover .hide{
         display: block;
         }
         .row-msg:hover .date-time{
         display: none;
         }
         .fa-trash{
         font-size: 30px
         }
      </style>
   </head>
   <body>
      <div class="wrapper d-flex align-items-stretch">
      <?php include('nav.php') ?>
      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
         <h2 class="mb-4">Inbox</h2>
         <?php

            
            // Check connection
            if($conn === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            
            	// Attempt select query execution
            	// SELECT * FROM myTable ORDER BY id DESC LIMIT 1
            
            	$sql = "SELECT * FROM contactus  ORDER BY id DESC ";
            	if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            	    	?>
         <div style="max-height: 450px; overflow: scroll; ">
            <table class="table" >
            <thead >
               <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Message <?php echo $total_msg ?></th>
                  <th scope="col">Date & Time</th>
                  <th scope="col"></th>
               </tr>
            </thead>
            <?php 
               $num = 1;
                  while($row = mysqli_fetch_array($result)){ ?>
            <tbody>
               <tr class="row-msg">
                  <th scope="row"><?php echo $num++;?></th>
                  <th scope="row"><?php echo  $row['user_name'];?></th>
                  <td>
                     <a target="_blank" href="mailto: <?php echo $row['user_email']?>?subject=Hello'<?php echo  $row['user_name'];?>"><?php echo  $row['user_email'];?></a>
                  </td>
                  <td><?php echo  $row['user_msg'];?></td>
                  <td class="hide" >
                     <input type="hidden" class="delete_id_value" value="<?php echo $row['id']; ?>">
                     <a href="javascript:void(0)" class="delete"> <i class=" fa fa-trash">
                  </td>
                  <td class="date-time">
                     <?php echo $row['date_time']; ?>
                  </td>
               </tr>
            </tbody>
            <?php 
               }
               
               	echo "</table>";
               	echo "</div>";
               
               // Free result set
               mysqli_free_result($result);
               } else{
                echo "No records matching your query were found.";
               }
               } else{
               echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
               }
               
               // Close connection
               mysqli_close($conn);
               ?>
         </div>
      </div>
      <script>
         jQuery(document).ready(function($) {
            $('.delete').click(function(event) {
               // alert('ok');
               var deleteid = $(this).closest("tr").find('.delete_id_value').val();
               // console.log(deleteid);
               Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to recover this message!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                       $.ajax({
                         type: "POST",
                         url: "delete.php",
                         data: {
                           "delete_btn_set":1,
                           "delete_id":deleteid,
                         },
                         success: function(response){
                              Swal.fire({
                                text: "Message Deleted Successfully!",
                                icon: 'success',
                              }).then((result) =>{
                                 location.reload();
                              })

                           }
                           })
                    }
                  })
            });
         });
      </script>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>