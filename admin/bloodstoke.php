<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	?>
<!DOCTYPE HTML>
<html>
<head>
<title>Smart City || Admin Manage News</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head>
  <body>
  <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
  <?php include('includes/header.php');?>
 <div class="clearfix"> </div>	
				</div>
<!--heder end here-->

<div class="agile-grids">	
				<!-- tables -->
				
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Bloodstoke Available</h2>
					    <table id="table">
						<thead>
						  <tr>
                   <th>Name</th>
                   <th>Quality</th>
							
						  </tr>
						</thead>
						<tbody>
					  
            </tbody>
            <tr>
                            <td>A+</td>
                            <td>
                            <?php 
                            $q=$dbh->query("SELECT * FROM tblbbstoke WHERE bgroup='A+'");
                            echo $row=$q->rowcount();
                            ?>
                            </td>
                          </tr>
                          <tr>
                            <td>A-</td>
                            <td>
                            <?php 
                            $q=$dbh->query("SELECT * FROM tblbbstoke WHERE bgroup='A-'");
                            echo $row=$q->rowcount();
                            ?>
                            </td>
                          </tr>
                          <tr>
                            <td>B+</td>
                            <td>
                            <?php 
                            $q=$dbh->query("SELECT * FROM tblbbstoke WHERE bgroup='B+'");
                            echo $row=$q->rowcount();
                            ?>
                            </td>
                          </tr>
                          <tr>
                            <td>B-</td>
                            <td>
                            <?php 
                            $q=$dbh->query("SELECT * FROM tblbbstoke WHERE bgroup='B-'");
                            echo $row=$q->rowcount();
                            ?>
                            </td>
                          </tr>
                          <tr>
                            <td>AB+</td>
                            <td>
                            <?php 
                            $q=$dbh->query("SELECT * FROM tblbbstoke WHERE bgroup='AB+'");
                            echo $row=$q->rowcount();
                            ?>
                            </td>
                          </tr>
                          <tr>
                            <td>AB-</td>
                            <td>
                            <?php 
                            $q=$dbh->query("SELECT * FROM tblbbstoke WHERE bgroup='AB-'");
                            echo $row=$q->rowcount();
                            ?>
                            </td>
                          </tr>
                          <tr>
                            <td>O+</td>
                            <td>
                            <?php 
                            $q=$dbh->query("SELECT * FROM tblbbstoke WHERE bgroup='O+'");
                            echo $row=$q->rowcount();
                            ?>
                            </td>
                          </tr>
                          <tr>
                            <td>O-</td>
                            <td>
                            <?php 
                            $q=$dbh->query("SELECT * FROM tblbbstoke WHERE bgroup='O-'");
                            echo $row=$q->rowcount();
                            ?>
                            </td>
                          </tr>
            </table>
              </div>
          </div>
                                <!-- script-for sticky-nav -->
									<script>
										$(document).ready(function() {
											var navoffeset=$(".header-main").offset().top;
											$(window).scroll(function(){
											var scrollpos=$(window).scrollTop(); 
											if(scrollpos >=navoffeset){
												$(".header-main").addClass("fixed");
												}else{
												$(".header-main").removeClass("fixed");
												}
										});
										
									});
									</script>
								<!-- /script-for sticky-nav -->
							    <!--inner block start here-->
									<div class="inner-block">

									</div>
							   <!--inner block end here-->
							   <!--copy rights start here-->
							   <?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>
