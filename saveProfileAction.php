<?php 
require_once('db.php');

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Submit')
{

		if($_FILES["profile_photo"]["name"]!='')
		{
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			$target_file = $target_dir . 'profile_photo.'.$imageFileType;
			//echo $target_file;
			//exit;
			// Check if image file is a actual image or fake image
			
			$check = getimagesize($_FILES["profile_photo"]["tmp_name"]);
			if($check !== false) {
				//$_SESSION['error_image_upload']= "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				$_SESSION['error_image_upload']= "File is not an image.";
				$uploadOk = 0;
			}
			/*
			if (file_exists($target_file)) {
				$_SESSION['error_image_upload']= "Sorry, file already exists.";
				$uploadOk = 0;
			}
			*/
			
			// Check file size
			if ($_FILES["profile_photo"]["size"] > 500000) {
				$_SESSION['error_image_upload']= "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
			{
				$_SESSION['error_image_upload']="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) 
			{
				$_SESSION['error_image_upload']="Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			} 
			else 
			{
				if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
					//echo "The file ". basename( $_FILES["profile_photo"]["name"]). " has been uploaded.";
				} 
				else 
				{
					$_SESSION['error_image_upload']="Sorry, there was an error uploading your file."; 
				}
			}
		}
	
		$qry="update user set user_name='".$_REQUEST['user_name']."',email_id='".$_REQUEST['email_id']."',profile_photo='profile_photo.".$imageFileType."',about_me='".$_REQUEST['about_me']."',first_name='".$_REQUEST['first_name']."',last_name='".$_REQUEST['last_name']."',phone_no='".$_REQUEST['phone_no']."' where user_id='".$_SESSION['user_id']."'";
		$rs=mysql_query($qry);
		$_SESSION['save_profile_success']='success';
		header('Location:profile.php');
}
?> 