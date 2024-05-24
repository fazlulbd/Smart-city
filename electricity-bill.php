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
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Electricity Pay Bill </h1>
	</div>
</div>
<!--- /banner ---->
<!--- rooms ---->
<div class="rooms">
	<div class="container">

		<div class="room-bottom">
			<h3>Electricity Pay Bill</h3>




<div class="rom-btm contaimer">
<div class="card-body">
<form  method="post">
<div class="row form-group">
<div class="col-sm-3">
<label for="default">Meter name</label>
<select name="meter" class="form-control" required>
<option value="">--Select Meter name-- </option>
<?php $sql = "SELECT * from  tblelectricitybill";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->Meter_name);?>"><?php echo htmlentities($result->Meter_name);?></option>
<?php }} ?>
 </select>
</div>




<div class="col-sm-3">
	<label for="">Consumer number</label>
	<input type="text" name="consumer" class="form-control" placeholder="Consumer number" required>

</div>


<div class="col-sm-3">
<label for="default" >Month</label>
<select name="month" class="form-control" required>
<option value="">--Select Month--</option>
<?php $sql = "SELECT * from tblelectricitybill";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->Month);?>"><?php echo htmlentities($result->Month);?></option>
<?php }} ?>
 </select>
</div>





                                      <!-- <div class="col-sm-3">
                                            <label for="" class="control-label">Departure Time</label>
                                            <input type="time" class="form-control input-sm datetimepicker2" name="appt" autocomplete="off">
                                        </div> -->


										<div class="col-sm-3 offset-sm-5">
										<input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer">
                                        </div>
                                    </div>
									</div>
                                </form>
        <div class="clearfix"></div>
</div>

<div class="rom-btm">
<?php 
if(isset($_POST['submit']))
{
$status=1;
$meter=$_POST['meter'];
$consumer=$_POST['consumer'];
$month=$_POST['month'];
$sql = "SELECT * from tblelectricitybill where (Meter_name=:meter  and consumer_number=:consumer and  Month=:month)";
$query = $dbh -> prepare($sql);
$query->bindParam(':meter',$meter,PDO::PARAM_STR);
$query->bindParam(':consumer',$consumer,PDO::PARAM_STR);
$query->bindParam(':month',$month,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

			<div class="rom-btm">
				
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4>Meter Name:  <?php echo htmlentities($result->Meter_name);?></h4>
					<h4>Consumer Number: <?php echo htmlentities($result->Consumer_number);?></h4>
					<h4>Month: <?php echo htmlentities($result->Month);?></h4>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
					
					<a href="electricitybill-details.php?pkgid=<?php echo htmlentities($result->id);?>" class="view">Details</a>
				</div>
				<div class="clearfix"></div>
			</div>
                
<?php if($result->Meter_name=="")
{
echo htmlentities('NA');
} 
?>  		
<?php }}
else
{
echo htmlentities("No Route Found");
}}?>
</div>
<!-- <div class="rom-btm">
				
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4><br>SEE ALL THE ROUTE LIST OF CITY BUS SERVICE</h4>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
				<a href="busroute.php" class="view">Route List</a>
				</div>
				<div class="clearfix"></div>
		</div> -->
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
