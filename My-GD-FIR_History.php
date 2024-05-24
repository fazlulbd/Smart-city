<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Smart City || Smart Sylhet</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>
<body>
<?php include('includes/header.php');?>
<!--- banner ---->
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">All History</h1>
	</div>
</div>
<!--- /banner ---->
<!--- rooms ---->
<div class="rooms">
	<div class="container">

		<div class="room-bottom">
			<h3>All History</h3>



			<div class="rom-btm-MyBookingHistory">
				<!--<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
					<!--<img src="admin/hotelimages/<?php echo htmlentities($result->HotelImage);?>" class="img-responsive" alt="">
				</div>-->
				<div class="col-md-6 room-midle-MyBookingHistory wow fadeInUp animated" data-wow-delay=".5s">
					<h4>See Your GD Apply History </h4>
					<h4>See Your FIR Apply History </h4>
					<!-- <h4>See Your Bus Booking History </h4> -->
					<!-- <h4>See Your School Apply History </h4> -->
				</div>
				<div class="col-md-3 room-right-MyBookingHistory wow fadeInRight animated" data-wow-delay=".5s">
					<a href="gd-history.php" class="viewMyBookingHistory">Details</a>
					<a href="fir-history.php" class="viewMyBookingHistory">Details</a>
				</div>



				

				<div class="clearfix"></div>
			</div>

			



		</div>
	</div>
</div>
<!--- /rooms ---->

<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
<!-- //write us -->
</body>
</html>
