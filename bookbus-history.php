<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['bkid'])) {
		$bid = intval($_GET['bkid']);
		$email = $_SESSION['login'];
		$sql = "SELECT FromDate FROM tblbusbooking WHERE UserEmail=:email and BusBookingId=:bid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':bid', $bid, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount() > 0) {
			foreach ($results as $result) {
				$fdate = $result->FromDate;

				$a = explode("/", $fdate);
				$val = array_reverse($a);
				$mydate = implode("/", $val);
				$cdate = date('Y/m/d');
				$date1 = date_create("$cdate");
				$date2 = date_create("$fdate");
				$diff = date_diff($date1, $date2);
				echo $df = $diff->format("%a");
				if ($df > 1) {
					$status = 2;
					$cancelby = 'u';
					$sql = "UPDATE tblbusbooking SET status=:status,CancelledBy=:cancelby WHERE UserEmail=:email and BusBookingId=:bid";
					$query = $dbh->prepare($sql);
					$query->bindParam(':status', $status, PDO::PARAM_STR);
					$query->bindParam(':cancelby', $cancelby, PDO::PARAM_STR);
					$query->bindParam(':email', $email, PDO::PARAM_STR);
					$query->bindParam(':bid', $bid, PDO::PARAM_STR);
					$query->execute();

					$msg = "Booking Cancelled successfully";
				} else {
					$error = "Something Wrong. Please try again";
				}
			}
		}
	}

?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title>Smart City || Bus Booking History</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Smart City Management System In PHP" />
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

		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>
	</head>

	<body>
		<!-- top-header -->
		<div class="top-header">
			<?php include('includes/header.php'); ?>
			<div class="banner-1 ">
				<div class="container">
					<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Smart City-Bus Booking History</h1>
				</div>
			</div>
			<!--- /banner-1 ---->
			<!--- privacy ---->
			<div class="privacy">
				<div class="container">
					<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">My Bus Booking History</h3>
					<form name="chngpwd" method="post" onSubmit="return valid();">
						<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
						<p>
						<table border="1" width="100%">
							<tr align="center">
								<th>No.</th>
								<th>Bus Booking Id</th>
								<th>Bus Number</th>
								<th>From</th>
								<th>To</th>
								<th>Price</th>
								<th>Booking Date</th>
								<th>Comment</th>
								<th>Status</th>
								<th>Action</th>

							</tr>
							<?php

							$uemail = $_SESSION['login'];;
							$sql = "SELECT tblbusbooking.BusBookingId as bookid,tblbusbooking.BusId as pkgid,tblbusroutelist.BusNumber as busnumber,tblbusroutelist.BusFrom as busfrom,tblbusroutelist.BusTo as busto,tblbusroutelist.TicketPrice as ticketprice,tblbusbooking.FromDate as fromdate,tblbusbooking.Comment as comment,tblbusbooking.status as status,tblbusbooking.CancelledBy as cancelby,tblbusbooking.UpdationDate as upddate from tblbusbooking join tblbusroutelist on tblbusroutelist.id=tblbusbooking.BusId where UserEmail=:uemail";
							$query = $dbh->prepare($sql);
							$query->bindParam(':uemail', $uemail, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							$cnt = 1;
							if ($query->rowCount() > 0) {
								foreach ($results as $result) {	?>
									<tr align="center">
										<td><?php echo htmlentities($cnt); ?></td>
										<td>#BK<?php echo htmlentities($result->bookid); ?></td>
										<td><a href="bus-details.php?pkgid=<?php echo htmlentities($result->pkgid); ?>"><?php echo htmlentities($result->busnumber); ?></a></td>
										<td><?php echo htmlentities($result->busfrom); ?></td>
										<td><?php echo htmlentities($result->busto); ?></td>
										<td><?php echo htmlentities($result->ticketprice); ?>Tk</td>
										<td><?php echo htmlentities($result->fromdate); ?></td>
										<td><?php echo htmlentities($result->comment); ?></td>
										<td><?php if ($result->status == 0) {
												echo "Pending";
											}
											if ($result->status == 1) {
												echo "Confirmed";
											}
											if ($result->status == 2 and  $result->cancelby == 'u') {
												echo "Canceled by you at " . $result->upddate;
											}
											if ($result->status == 2 and $result->cancelby == 'a') {
												echo "Canceled by admin at " . $result->upddate;
											}
											?></td>
										<?php if ($result->status == 2) {
										?><td>Cancelled</td>
										<?php } else { ?>
											<td><a href="bookbus-history.php?bkid=<?php echo htmlentities($result->bookid); ?>" onclick="return confirm('Do you really want to cancel booking')">Cancel</a></td>
										<?php } ?>
									</tr>
							<?php $cnt = $cnt + 1;
								}
							} ?>
						</table>

						</p>
					</form>


				</div>
			</div>
			<!--- /privacy ---->
			<!--- footer-top ---->
			<!--- /footer-top ---->
			<?php include('includes/footer.php'); ?>
			<!-- signup -->
			<?php include('includes/signup.php'); ?>
			<!-- //signu -->
			<!-- signin -->
			<?php include('includes/signin.php'); ?>
			<!-- //signin -->
			<!-- write us -->
			<?php include('includes/write-us.php'); ?>
	</body>

	</html>
<?php } ?>