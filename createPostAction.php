<?php 
require_once('db.php');

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Submit')
{

		$qry="INSERT INTO post(post_title, post_description) VALUES ('".$_REQUEST['post_title']."','".$_REQUEST['post_description']."')";
		$rs=mysql_query($qry);
		$_SESSION['create_post_success']='success';
		header('Location:create_post.php');

}
?> 