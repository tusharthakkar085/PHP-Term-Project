<?php require_once('db.php');?>
<?php 
$num_rec_per_page=5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM post LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysql_query ($sql); //run the query

$limit=5;

?> 


<?php 

//$qry="select * from user where user_id='".$_SESSION['user_id']."'";
//$rs=mysql_query($qry);
//$data=mysql_fetch_assoc($rs);

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

    <title>Tushar's Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!--<link href="css/navbar-fixed-top.css" rel="stylesheet">-->
	<script type="text/javascript">
	
	
	
	</script> 
	<script>
	window.onload=function(){
		var v = document.getElementById("size");
		v.onchange = function(){
			var string1 = v.options[v.selectedIndex].value;
			window.location.replace("http://localhost:8088/blog/index.php?limit="+string1);
		}
	}
	</script>

      <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="full-width">

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="fa fa-bars"></span>
              </button>

              <!--logo start-->
              <a href="index.php" class="logo" >Tushar's<span>blog</span></a>
              <!--logo end-->
              <div class="horizontal-menu navbar-collapse collapse ">
                  <ul class="nav navbar-nav">
                      <li class="active"><a href="index.php">Latest Post</a></li>
                      <!--li><a href="index.php">About Me</a></li-->
                  </ul>

              </div>
              <div class="top-nav ">
                  
                  <ul class="nav pull-right top-menu">
                      <li style="margin-top:10px;">
                          <span style="color:#2e2e2e;font-size:18px;">TOTAL VISITORS:<?php echo $counterVal; ?></span>
                      </li>
                      <!--
                       user login dropdown start
                      <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              <img alt="" src="img/avatar1_small.jpg">
                              <span class="username">Jhon Doue</span>
                              <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu extended logout">
                              <div class="log-arrow-up"></div>
                              <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                              <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                              <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                              <li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
                          </ul>
                      </li>
                      -->
                  </ul>
              </div>

          </div>

      </header>
      <!--header end-->
      <!--sidebar start-->

      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              
              <div class="row">
                  <div class="col-lg-1">
                  </div>
                  <div class="col-lg-10">
                 

              <?php 
			  
			  if(isset($_GET['limit']))
{
	$limit = $_GET['limit'];
	
$sql = "SELECT * FROM post limit $limit"; 
				$rs_result = mysql_query($sql);
				$total_records = mysql_num_rows($rs_result);
				$total_pages = ceil($total_records / $num_rec_per_page); 	
	while ($row = mysql_fetch_assoc($rs_result)) { ?> 
        				<section class="panel">
                          <header class="panel-heading">
                              
                              <?php echo $row['post_title'];
									?>
								<div style="float:right;">
							<?php echo $row['created_date'] 
								?>
                              </div>
                          </header>
                          <div class="panel-body">
       
       							<?php echo $row['post_description'];?> 
       
                          </div>
                      </section>
<?php }
$sql = "SELECT * FROM post"; 
				$rs_result = mysql_query($sql);
				$total_records = mysql_num_rows($rs_result);
				
				$total_pages = ceil($total_records / $limit); 
			
				echo "<a href='index.php?page=1'>".'|<'."</a> ";  
				
				for ($i=1; $i<=$total_pages; $i++) { 
				
				if($i==1)
				{
												echo "<a href='index.php?page=".$limit." && starting=".($i-1)."'>".$i."</a>"; 

				}
				
				else{
					echo "<a href='index.php?page=".$limit." && starting=".(($i-1)*($limit))."'>".$i."</a> ";
				}
							 
				}
				
				echo "<a href='index.php?page=$total_pages'>".'>|'."</a> ";
				}
 
				
			else if(isset($_GET['page']) && isset($_GET['starting']))
				{
					
					$num_rec_per_page=$limit;
					echo "hmjgg";
					$limit=$_GET['page'];
					$start=$_GET['starting'];
					echo $start;
					
		echo $limit1;
$sql = "SELECT * FROM post limit $start, $limit"; 
				$rs_result = mysql_query($sql);
					
	while ($row = mysql_fetch_assoc($rs_result)) { ?> 
        				<section class="panel">
                          <header class="panel-heading">
                            
                              <?php echo $row['post_title'];
									?>
								<div style="float:right;">
							<?php echo $row['created_date'] 
								?>
                              </div>
                          </header>
                          <div class="panel-body">
       
       							<?php echo $row['post_description'];?> 
       
                          </div>
                      </section>
<?php }


				$sql = "SELECT * FROM post"; 
				$rs_result = mysql_query($sql);
				$total_records = mysql_num_rows($rs_result);
				$total_pages = ceil($total_records / $limit); 
				
				echo "<a href='index.php?page=1'>".'|<'."</a> ";  
				
				for ($i=1; $i<=$total_pages; $i++) { 
				
				if($i==1)
				{
												echo "<a href='index.php?page=".$limit." && starting=".($i-1)."'>".$i."</a>"; 

				}
				
				else{
					echo "<a href='index.php?page=".$limit." && starting=".(($i-1)*($limit))."'>".$i."</a> ";
				}
							 
				}
				
				echo "<a href='index.php?page=$total_pages'>".'>|'."</a> ";
				}
				
				else{
					$sql = "SELECT * FROM post limit $limit"; 
				$rs_result = mysql_query($sql);
				$total_records = mysql_num_rows($rs_result);
				$total_pages = ceil($total_records / $num_rec_per_page); 	
	while ($row = mysql_fetch_assoc($rs_result)) { ?> 
        				<section class="panel">
                          <header class="panel-heading">
                              
                              <?php echo $row['post_title'];
									?>
								<div style="float:right;">
							<?php echo $row['created_date'] 
								?>
                              </div>
                          </header>
                          <div class="panel-body">
       
       							<?php echo $row['post_description'];?> 
       
                          </div>
                      </section>
<?php }
					
					$sql = "SELECT * FROM post"; 
				$rs_result = mysql_query($sql);
				$total_records = mysql_num_rows($rs_result);
				$total_pages = ceil($total_records / $limit); 
				
				
				echo "<a href='index.php?page=1'>".'|<'."</a> ";  
				
				for ($i=1; $i<=$total_pages; $i++) { 
				
				if($i==1)
				{
												echo "<a href='index.php?page=".$limit." && starting=".($i-1)."'>".$i."</a>"; 

				}
				
				else{
					echo "<a href='index.php?page=".$limit." && starting=".(($i-1)*($limit))."'>".$i."</a> ";
				}
							 
				}
				
				echo "<a href='index.php?page=$total_pages'>".'>|'."</a> ";
				}
				
			
			?>
			
				<div>
				<form action="index.php" method="post"> 
				<select id="size">
				<option value="select size">Select Size</option>
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="15">15</option>
				<option value="20">20</option>
				<option value="25">25</option>
				</select>
				</form>
				</div>
		

                  </div>
                  <div class="col-lg-1">
                  </div>

              </div>

              

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>


  </body>
</html>
