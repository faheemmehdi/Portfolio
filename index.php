<?php 
   include('admin/track.php' ); 
   include('include/config.php');
   // $con = mysqli_connect('localhost','root','','portfolio');
   $display = "select * from cms , theme ,links ";
   $query = mysqli_query($conn,$display);
   $result = mysqli_fetch_array($query);
   
   if (!$conn) {
      header("location:dbnotcon.php");
   } 
   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php echo $result['web_title'] ?></title>
      <meta content="<?php echo $result['keywords'] ?>" name="keywords">
      <meta content="<?php echo $result['site_description'] ?>" name="description">
      <link rel="stylesheet" href="css/style.css">
      <link href="fontawesome/css/all.css" rel="stylesheet">
      <link rel = "icon" type = "image/png" href = "img/<?php echo $result['siteicon'] ?>">
      <link href="img/<?php echo $result['siteicon'] ?>" rel="apple-touch-icon">

      <!-- CSS only -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <!-- JS, Popper.js, and jQuery -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
         <!-- sweet alert -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

      <script>
         window.onload=function(){
            document.getElementById('loader').style.display="none";
            document.getElementById('content').style.display="block";
         }
      </script>
      <style>
         .hide{
         display: none;
         }
         .fab{
         color: <?php echo $result['iconcolor'] ?>;
         }
         .has-text-centered figure img{
         border-radius: 50%;
         width: 148px;
         height: 148px;
         }
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
   <body  style=" background-color: <?php echo $result['bgcolor'] ?> ; color:<?php echo $result['fontcolor'] ?> " >
      <div id="loader"> <h6>loading..</h6>
         <img src="img/loader.gif" alt="">
      </div>
      <div id="content">
      <div class=" has-text-centered">
         <figure class="image is-128x128" style="display:inline-block">
            <img class="is-rounded" src="img/<?php echo $result['profile_img'] ?>" alt="" >
         </figure>
         <h2 class="title"><?php echo $result['title'] ;  ?></h2>
         <p class="subtitle"><?php echo $result['description'] ; ?></p>
         <div class="icons">
            <a class="link
               <?php 
                  if ($result['fb'] == null) {
                    echo "hide";
                  }
                  ?>
               " target="_blank" rel="noopener noreferrer" href=" <?php echo $result['fb']?>"><span class="icon is-large"><i class="fab size fa-facebook-square"></i></span></a>
            <a class="link
               <?php 
                  if ($result['insta'] == null) {
                    echo "hide";
                  }
                  ?>
               " target="_blank" rel="noopener noreferrer" href="<?php echo $result['insta']?>"><span class="icon is-large"><i class="fab size fa-instagram-square"></i></span></a>
            <a class="link 
               <?php 
                  if ($result['twitter'] == null) {
                    echo "hide";
                  }
                  ?>
               " target="_blank" rel="noopener noreferrer" href=" <?php echo $result['twitter']?>"><span class="icon is-large"><i class="fab size fa-twitter-square"></i></span></a>
            <a class="link
               <?php 
                  if ($result['linkedin'] == null) {
                    echo "hide";
                  }
                  ?>
               " target="_blank" rel="noopener noreferrer" href="<?php echo $result['linkedin']?>"><span class="icon is-large"><i class="fab size fa-linkedin"></i></span></a>
            <a class="link
               <?php 
                  if ($result['github'] == null) {
                    echo "hide";
                  }
                  ?>
               " target="_blank" rel="noopener noreferrer" href="<?php echo $result['github']?>"><span class="icon is-large"><i class="fab size fa-github-square"></i></span></a>
            <a class="link 
               <?php 
                  if ($result['medium'] == null) {
                    echo "hide";
                  }
                  ?>
               " target="_blank" rel="noopener noreferrer" href="<?php echo $result['medium']?>"><span class="icon is-large"><i class="fab size fa-medium"></i></span></a>
            <a class="link
               <?php 
                  if ($result['stackoverflow'] == null) {
                    echo "hide";
                  }
                  ?>
               " target="_blank" rel="noopener noreferrer" href="<?php echo $result['stackoverflow']?>"><span class="icon is-large"><i class="fab size fa-stack-overflow"></i></span></a>
            <a class="link 
               <?php 
                  if ($result['youtube'] == null) {
                    echo "hide";
                  }
                  ?>
               " target="_blank" rel="noopener noreferrer" href="<?php echo $result['youtube']?>"><span class="icon is-large"><i class="fab size fa-youtube"></i></span></a>
               <a class="link 
               <?php 
                  if ($result['googleplus'] == null) {
                    echo "hide";
                  }
                  ?>
               " target="_blank" rel="noopener noreferrer" href="<?php echo $result['googleplus']?>"><span class="icon is-large"><i class="fab size fa-google-plus-square"></i></span></a>
               <a class="link 
               <?php 
                  if ($result['quora'] == null) {
                    echo "hide";
                  }
                  ?>
               " target="_blank" rel="noopener noreferrer" href="<?php echo $result['quora']?>"><span class="icon is-large"><i class="fab size fa-quora"></i></span></a>
               <a class="link 
               <?php 
                  if ($result['keybase'] == null) {
                    echo "hide";
                  }
                  ?>
               " target="_blank" rel="noopener noreferrer" href="<?php echo $result['keybase']?>"><span class="icon is-large"><i class="fab size fa-keybase"></i></span></a>
               <a class="link 
               <?php 
                  if ($result['reddit'] == null) {
                    echo "hide";
                  }
                  ?>
               " target="_blank" rel="noopener noreferrer" href="<?php echo $result['reddit']?>"><span class="icon is-large"><i class="fab size fa-reddit-square"></i></span></a>
         </div>
         <div class="buttons ">
            <a  class="btn rounded-pill btn-primary" style="background-color:<?php echo $result['aboutbtn']?> "  href="about.php">About</a>
            <!-- <a class="btn rounded-pill btn-success" style="background-color:<?php echo $result['resumebtn']?> " href="awaiscv.doc" download>Resume</a> -->
         </div>
         <div class="Sayhello
            <?php 
               if ($result['email'] == null) {
                 echo "hide";
               }
               ?>
            ">
            <a  class="btn rounded-pill border border-dark " target="_blank" href="mailto:<?php echo $result['email']?>?subject=<?php echo $result['emailbody']?>"><i class="fas fa-at"></i>  say hello</a>
         </div>
      </div>
      <div class="whatsapplogo
         <?php 
            if ($result['whatsapp'] == null) {
              echo "hide";
            }
            ?>
         ">
         <a target="_blank" href="https://wa.me/<?php echo $result['whatsapp']?>?text=<?php echo $result['whatsappmsg']?>"><img class="logo" src="img/whatsapp.png" alt=""></a>
      </div>
      <!-- Button trigger modal -->
      <div class="msgbtn" type="button"  data-toggle="modal" data-target="#exampleModal">
         <img width="60px" class="logo" src="img/msg.png" alt="">
      </div>
      <?php include('include/modal.php') ?>
      <footer class="footer has-background-light">
         <div class="content has-text-centered">
            <p><span class="icon"><i class="fas fa-code"></i></span> with <span class="icon"><i class="fas fa-coffee"></i></span> by <?php echo $result['web_footer']?> </p>
         </div>
      </footer>
      </div>
   </body>
</html>