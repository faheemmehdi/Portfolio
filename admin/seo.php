  <?php
            include('../include/config.php'); 
            $que="SELECT * FROM cms";
            $queryrun=mysqli_query($conn,$que);
            $data=mysqli_fetch_array($queryrun);
                 $target_dir = "../img/";
                 extract($_REQUEST);
            
                 if (isset($_REQUEST['submit'])) {
                 $siteicon = $_FILES['siteicon']['name'];

                if($siteicon == ""){
                 $siteicon=$data['siteicon'];
            }
            
                 $query = "UPDATE `cms` SET `siteicon`='$siteicon',`web_title` = '$web_title',`keywords`='$keywords', `site_description`= '$site_description'";
                 $run = mysqli_query($conn,$query) or die($mysqli_error());
            
                 $traget = "../img/". $siteicon;
                         header("location:profile.php");

            
            }
            
            ?>


