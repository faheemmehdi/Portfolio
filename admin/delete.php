<?php 
	include('../include/config.php'); 
	if (isset($_POST['delete_btn_set'])) {
		$del_id= $_POST[delete_id];
		$q = "DELETE FROM `contactus` WHERE id = $del_id";
		mysqli_query($conn,$q);
	}

 ?>
