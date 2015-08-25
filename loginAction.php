<?php 
require_once('db.php');

if(isset($_REQUEST['login']) && $_REQUEST['login']=='SIGN IN')
{

	$qry="select * from user where email_id='".$_REQUEST['email_id']."' and password='".$_REQUEST['password']."'";	
	$rs=mysql_query($qry);
	$data=mysql_fetch_assoc($rs);
	
	$is_valid=mysql_num_rows($rs);
	if($is_valid>0)
	{	
		$_SESSION['user_id']=$data['user_id'];	
		$_SESSION['login_success']="success";
		header('Location:create_post.php');
	}
	else
	{	
		$_SESSION['login_fail']="fail";
		header('Location:login.php?errorinlogin=Your id or password is invalid');		
	}
}

?> 