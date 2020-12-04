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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
          .bubble {
          background: #3445B4;
          color: white;
          padding: 4px 12px;
          position: absolute;
          top: 0px;
          border-radius: 4px;
          left: 50%;
          transform: translateX(-50%);
        }
        .bubble::after {
          content: "";
          position: absolute;
          border-top: 10px solid #3445B4;
          border-left: 5px solid transparent;
          border-right: 5px solid transparent;
          top: 33px;
          left: 39%;
}

      </style>
      <?php include('../include/header.php') ?>
   </head>
   <body>
      <div class="wrapper d-flex align-items-stretch">
         <?php include('nav.php') ?>
         <?php 

            $display = "select * from about";
            $query = mysqli_query($conn,$display);
            $result = mysqli_fetch_array($query);
            
             ?>
         <!-- Page Content  -->
         <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">About Us</h2>
            <form method="post" action="addabout.php" enctype="multipart/form-data">
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label for="heading">Professional Heading</label>
                     <br>
                     <textarea style="border: 1px solid #34495e" class="form-control" name="heading" id="heading" rows="5" ><?php echo $result['heading']; ?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                     <label for="abouttext">Description About You(300 characters / You can Use Html Code)</label>
                     <br>
                     <textarea  style="padding-bottom: 100px ; border: 1px solid #34495e" class="form-control" name="abouttext" id="abouttext" rows="5" maxlength="300" ><?php echo $result['abouttext']; ?></textarea>
                     <p id="remain"></p>
                     <br>
                  </div>
                  <input class="form-control btn btn-primary" type="submit" name="saveabout" value="Save">
               </div>
            </form>
            <script>
             $('#abouttext').keydown(function(e) {
                var tval = $('#abouttext').val(),
                    tlength = tval.length,
                    set = 300,
                    remain = parseInt(set - tlength);
                $('#remain').text(remain);
                if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
                    $('#abouttext').val((tval).substring(0, tlength - 1));
                    return false;
                }
            })
            </script>
            <br><br>
            <hr>
            <form method="post" action="addabout.php">
               <div class="form-row">
                  <div class="col">
                     <label for="skill">Skill Name</label>
                     <input style="border: 1px solid #34495e" type="text" class="form-control" name="skill" placeholder="Enter Skill" required>
                  </div>
                  <div class="col">
                    <div class="range-wrap">
                     <label for="percentage">Expertise Level (Out of 100)</label>
                     <input type="range" min="0" max="100" class="range form-control" name="percentage" placeholder="1 to 10" required>
                     <output for="percentage" class="bubble" ></output>
                     </div>
                    <script>
                      const allRanges = document.querySelectorAll(".range-wrap");
                      allRanges.forEach(wrap => {
                        const range = wrap.querySelector(".range");
                        const bubble = wrap.querySelector(".bubble");

                        range.addEventListener("input", () => {
                          setBubble(range, bubble);
                        });
                        setBubble(range, bubble);
                      });

                      function setBubble(range, bubble) {
                        const val = range.value;
                        const min = range.min ? range.min : 0;
                        const max = range.max ? range.max : 100;
                        const newVal = Number(((val - min) * 100) / (max - min));
                        bubble.innerHTML = val;

                        // Sorta magic numbers based on size of the native UI thumb
                        bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
                      }
                    </script>
                  </div>
               </div>
               <br> 
               <input class="form-control btn btn-primary" type="submit" name="addskill" value="Add Skill">
            </form>
            <hr>
            <h4 ID="skillsection">Manage Skills</h4>
            <table class="table table-striped table-sm">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Skill</th>
                     <th>Skill Expertise</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php

                      $query2="SELECT * FROM skills";
                      $queryrun2=mysqli_query($conn,$query2);
                      $count=1;         
                      while($data2=mysqli_fetch_array($queryrun2)){
                          ?>
                  <tr>
                     <div class="modal fade" id="modal<?=$data2['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h6 class="modal-title" id="exampleModalLabel">Edit Skill</h6>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body" id="skilleditbox">
                                 <form method="post" action="addabout.php">
                                    <input type="hidden" name="id" value="<?=$data2['id']?>">
                                    <div class="form-row">
                                       <div class="form-group col-md-6">
                                          <label for="website">Skill</label>
                                          <input style="border:1px solid #000" type="text" name="skill" value="<?=$data2['skill']?>" class="form-control" id="website" placeholder="PHP">
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label for="website">Percentage</label>
                                          <input style="border:1px solid #000" type="text" name="percentage" value="<?=$data2['percentage']?>" class="form-control" id="website" placeholder="100">
                                       </div>
                                    </div>
                              </div>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <input type="submit" class="btn btn-primary" name="supdate" value="Update">
                              </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <td><?=$count?></td>
                     <td><?=$data2['skill']?></td>
                     <td><?=$data2['percentage']?>%</td>
                     <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?=$data2['id']?>">
                        Edit
                        </button> <a href="addabout.php?del=<?=$data2['id']?>"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Delete
                        </button></a>
                     </td>
                  </tr>
                  <?php $count++;
                     } ?>
               </tbody>
            </table>
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