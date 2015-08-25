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

    <title>Profile</title>

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
<?php 

$qry="select * from user where user_id='".$_SESSION['user_id']."'";
$rs=mysql_query($qry);
$data=mysql_fetch_assoc($rs);

?>
  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
          </div>
          <!--logo start-->
          <a href="index.php" class="logo" >Tushar's<span>Blog</span></a>
          <!--logo end-->
          
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" width="35" src="uploads/<?php echo $data['profile_photo']; ?>">
                          <span class="username"><?php echo $data['user_name']; ?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
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
                              User Profile
                          </header>
                          <div class="panel-body">
                              <form enctype="multipart/form-data" action="saveProfileAction.php" method="post" role="form">
                                  <div class="form-group">
                                      <label for="first_name">First Name</label>
                                      <input required class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="<?php echo $data['first_name']; ?>">
                                  </div>
                                  <div class="form-group">
                                      <label for="last_name">Last Name</label>
                                      <input required class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" value="<?php echo $data['last_name']; ?>">
                                  </div>
                                  <div class="form-group">
                                      <label for="phone_no">Phone Number</label>
                                      <input required class="form-control" name="phone_no" id="phone_no" placeholder="Enter Phone Number" value="<?php echo $data['phone_no']; ?>">
                                  </div>
                                  
                                  <div class="form-group">
                                      <label for="post_title">User Name</label>
                                      <input required class="form-control" name="user_name" id="user_name" placeholder="Enter Username" value="<?php echo $data['user_name']; ?>">
                                  </div>
                                  
                                  <div class="form-group">
                                      <label for="email_id">Email ID</label>
                                      <input type="email" required name="email_id" class="form-control" id="email_id" placeholder="Enter Email ID" value="<?php echo $data['email_id']; ?>">
                                  </div>
                                  <div class="form-group">
                                      <label for="profile_photo">Upload Profile Photo</label>
                                      <input type="file" name="profile_photo" id="profile_photo" />
                                  	  <?php if(isset($_SESSION['error_image_upload'])){ ?>
                                      	<p style="color:#F00"><?php echo $_SESSION['error_image_upload']; ?></p>
                                      <?php unset($_SESSION['error_image_upload']); } ?>
                                  </div>
                                  <div class="form-group">
                                      <label for="about me">About Me(Optional)</label>
                                      <textarea name="about_me" id="about_me" class="form-control"><?php echo $data['about_me']; ?></textarea>
                                  
                                  </div>
                                  
                                  <input type="submit" name="submit" value="Submit" class="btn btn-info" />
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

  </body>
</html>
