<?php 
require_once('db.php');

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='submit')
{
	
	$qry="select * from user where user_id='".$_SESSION['user_id']."' and password='".$_REQUEST['current_password']."'";	
	$rs=mysql_query($qry);
	$is_valid=mysql_num_rows($rs);
	//echo $qry."--".$is_valid;exit;
	if($is_valid>0)
	{
		$qry="update user set password='".$_REQUEST['new_password']."' where user_id='".$_SESSION['user_id']."'";	
		$rs=mysql_query($qry);
		$_SESSION['pwd_change_success']='success';
		header('Location:create_post.php');

	}
	else
	{
		$_SESSION['pwd_change_fail']='fail';
		header('Location:change_password.php');
	}	
			


}

?> 