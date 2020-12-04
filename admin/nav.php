<?php 
      include('../include/config.php'); 
     $display = "select * from cms";
     $query = mysqli_query($conn,$display);
     $result = mysqli_fetch_array($query);
 
   ?>
<nav id="sidebar">
   <div class="custom-menu">
      <button type="button" id="sidebarCollapse" class="btn btn-primary">
      <i class="fa fa-bars"></i>
      <span class="sr-only">Toggle Menu</span>
      </button>
   </div>
   <div class="p-4">
      <figure class="aaa">
         <img src="../img/<?php echo $result['profile_img'] ?>"  >
      </figure>
      <h1><a style="font-size: 20px;" href="profile.php" class="logo"><?php echo $result['title'] ?> <span><?php echo $result['description'] ?></span></a></h1>
      <ul class="list-unstyled components mb-5 nav-list">
         <li >
            <a href="profile.php"><span class="fa fa-home mr-3"></span> Home</a>
         </li>
         <li>
            <a href="links.php"><span class="fa fa-briefcase mr-3"></span> Socal Links</a>
         </li>
         <li>
            <a href="about.php"><span class="fa fa-sticky-note mr-3"></span> About</a>
         </li>
         <li>
            <a href="theme.php"><span class="fa fa-suitcase mr-3"></span> Colors</a>
         </li>
         <li>
            <a href="inbox.php"><span class="fa fa-envelope mr-3"></span> Inbox</a>
         </li>
         <li>
            <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><span class="fa fa-at mr-3"></span> SEO</a>
         </li>
         <li>
            <a href="setting.php"><span class="fa fa-cog mr-3"></span> Setting</a>
         </li>
         <li>
            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Log Out</a>
         </li>
      </ul>
      <div class="footer">
         <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <a style="color: #fff; text-decoration: none;" href="http://faheem.wtf/">FaheemMehdi</a>
         </p>
      </div>
      <div>
      	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">SEO EDIT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="seo.php" method="POST" enctype="multipart/form-data">
			 <?php 
                 $display = "select * from cms , visit";
                 $query = mysqli_query($conn,$display);
                 $result = mysqli_fetch_array($query);
               ?>
	        <div class="form-group">
	        	<div class="row">
	        		<div class="col-3">
			        	<img class="img-thumbnail" src="../img/<?php echo $result['siteicon'] ?>" width=70px ><br>
	        		</div>
	        		<div class="col">
	        			<label style="color: #000" for="file">Siteicon (Minimum 100px X 100px, Maxsize 2mb)</label>
                 <div class="custom-file">
                    <input type="file" class="form-control-file" id="siteicon" name="siteicon" accept="image/*" >
                    <label class="custom-file-label" for="siteicon">Choose Siteicon Pic...</label>
                 </div>
	        		</div>
	        	</div>
				
	        </div>
	        <div class="form-group">
	            <label style="color: #000" for="message-text" class="col-form-label">Website Title:</label>
	            <input style="border:1px solid #EDEDED ; color: #000" type="text" class="form-control" name="web_title" id="web_title" placeholder="Enter Website Title" value="<?php echo $result['web_title'] ?>">
	        </div> 
          <div class="form-group">
              <label style="color: #000" for="message-text" class="col-form-label">Keywords (Seperate with ',' comma):</label>
              <input style="border:1px solid #EDEDED" type="text" class="form-control" id="keywords" name="keywords" value="<?php echo $result['keywords'] ?>">
          </div>
          <div class="form-group">
              <label style="color: #000" for="message-text" class="col-form-label">Site Description (160 Characters recommended):</label>
              <input style="border:1px solid #EDEDED" type="text" name="site_description" class="form-control" value="<?php echo $result['site_description'] ?>" id="site_description" >
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input class="btn btn-primary" type="submit" name="submit" value="Save changes">
      </div>
        </form>
    </div>
  </div>
</div>
      </div>
   </div>
</nav>
