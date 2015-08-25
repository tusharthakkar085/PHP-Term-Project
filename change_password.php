<?php require_once('db.php'); 

if(!$_SESSION['user_id']){
	header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Change Password</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
      <!--right slidebar-->
      <link href="css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />




    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->


  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
          </div>
          <!--logo start-->
          <a href="index.php" class="logo" >Tushar's<span>Blog</span></a>
          <!--logo end-->
          <?php 

			$qry="select * from user where user_id='".$_SESSION['user_id']."'";
			$rs=mysql_query($qry);
			$data=mysql_fetch_assoc($rs);
			
			?>
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  
                  <!-- user login dropdown start-->
                  <li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" width="35" src="uploads/<?php echo $data['profile_photo']; ?>">
                          <span class="username"><?php echo $data['user_name']; ?></span>
                          <b class="caret"></b>
                      </a>                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <!--li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                          <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                          <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li-->
                          <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
                  
              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="create_post.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Create Post</span>
                      </a>
                  </li>
                  
                  <li>
                      <a href="change_password.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Change Password</span>
                      </a>
                  </li>
                  
                  <li>
                      <a href="profile.php">
                          <i class="fa fa-dashboard"></i>
                          <span>My Profile</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              
              <div class="row">
                  <div class="col-lg-8">
                      <section class="panel">
                          <header class="panel-heading">
                              Change Password
                          </header>
                          <div class="panel-body">
                              <form role="form" method="post" action="changePaswordAction.php">
                                  <div class="form-group">
                                      <label for="post_title">Current Password</label>
                                      <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="new_password">Password</label>
                                      <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required>
                                      <p class="pwd_strength"></p>
                                  </div>
                                  
                                  <input type="submit" name="submit" value="submit" class="btn btn-info" />
                              
                              </form>

                          </div>
                      </section>
                  </div>
                  
              </div>
             
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!-- Right Slidebar start -->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>

  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>

  <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>

  <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>


  <!--common script for all pages-->
  <script src="js/common-scripts.js"></script>

  <!--script for this page-->
  <script src="js/form-component.js"></script>
	<script type="text/javascript">
	
		jQuery('#new_password').keyup(function(e) {
			
			
			if(jQuery('#new_password').val()=='')
			{
				jQuery('.pwd_strength').html('');
			}
			
			if(jQuery('#new_password').val().length<=3)
			{
				//alert('weak');
				jQuery('.pwd_strength').html('Weak');
				jQuery('.pwd_strength').css('padding-left','10px');
				jQuery('.pwd_strength').css('color','red');
				jQuery('.pwd_strength').css('font-weight','bold');
			}
			else if(jQuery('#new_password').val().length>=4 && jQuery('#new_password').val().length<=6)
			{
				//alert('Medium');
				jQuery('.pwd_strength').html('Medium');
				jQuery('.pwd_strength').css('padding-left','10px');
				jQuery('.pwd_strength').css('color','blue');
				jQuery('.pwd_strength').css('font-weight','bold');
			}
			else if(jQuery('#new_password').val().length>=7 && jQuery('#new_password').val().length<=9)
			{
				//alert('strong');
				jQuery('.pwd_strength').html('Strong');
				jQuery('.pwd_strength').css('padding-left','10px');
				jQuery('.pwd_strength').css('color','green');
				jQuery('.pwd_strength').css('font-weight','bold');
			}
        });
	</script>
  </body>
</html>
