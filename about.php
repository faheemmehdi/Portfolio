<?php 
include('include/config.php'); 
 ?>

<html>
   <head>
      <meta charset="UTF-8">
      <title>About</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/style.css">
      <link rel = "icon" type = "image/png" href = "img/title.png">
      <!-- CSS only -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <!-- JS, Popper.js, and jQuery -->
      <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      <script>
         jQuery(document).ready(function() {
         $('.skillbar').each(function() {
          $(this).find('.skillbar-bar').animate({
            width: $(this).attr('data-percent')
          }, 2000);
         });
         });
      </script>
      <script>
         window.onload=function(){
            document.getElementById('loader').style.display="none";
            document.getElementById('content').style.display="block";
         }
      </script>
      <style>
         #content{
            display: none;
         }
         #loader{
            position: absolute;
            margin: auto;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100px;
            height: 100px;
         }
      </style>

   </head>
   <body>
      <div id="loader"> <h6>loading..</h6>
         <img src="img/loader.gif" >
      </div>
      <div class="container" id="content">
         <div class="d-flex justify-content-center content ">
            <div class="card" style="width: 60rem;">
               <div class="card-body">
                  <?php 
                       $display = "select * from cms , visit,theme ,links,about";
                       $query = mysqli_query($conn,$display);
                       $result = mysqli_fetch_array($query);
                     ?>
                  <div class="row">
                     <div class="col-2">
                        <img src="img/<?php echo $result['profile_img'] ?>" alt="" width="100px">
                     </div>
                     <div class="col">
                        <h2 class="title"><?php echo $result['title'] ;  ?></h2>
                        <p class="subtitle"><?php echo $result['description'] ; ?></p>
                     </div>
                  </div>
                  <br>
                  <div class="row container">
                     <h2><?php echo $result['heading'] ; ?></h2>
                     <p><?php echo $result['abouttext'] ; ?></p>
                  </div>
                  <br>
                  <div class="skill">
                     <h1 >Skills</h1>
                     <?php
                                          $query3 = "SELECT * FROM skills";
                                          $runquery3= mysqli_query($conn,$query3);
                                          while($data3=mysqli_fetch_array($runquery3)){
                                          ?>
                     <div class="skillbar clearfix " data-percent="<?=$data3['percentage']?>%">
                        <div class="skillbar-title" style="background: #124e8c;"><span><?=$data3['skill']?></span></div>
                        <div class="skillbar-bar" style="background: #4288d0;"></div>
                        <div class="skill-bar-percent"><?=$data3['percentage']?>%</div>
                     </div>
                     <?php
                        }
                                            ?>
                  </div>
               </div>
               <div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>