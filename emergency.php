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
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Emergency Service</h1>
	</div>
</div>
<!--- /banner ---->
<!--- rooms ---->
<div class="rooms">
	<div class="container">

		<div class="room-bottom">
			<h3>EMERGENCY SERVICE</h3>




<div class="rom-btm">
<div class="card-body">
<form name="donar" method="post">
<div class="row form-group">
<div class="col-sm-3">
<label for="default" class="col-sm-2 control-label">SERVICE</label>
<select name="servicefrom" class="form-control" required>
<option value="">Select Service-</option>
<?php $sql = "SELECT * from  tblemergency";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->ServiceFrom);?>"><?php echo htmlentities($result->ServiceFrom);?></option>
<?php }} ?>
 </select>
</div>




<div class="col-sm-3">
<label for="default" class="col-sm-2 control-label">LOCATION</label>
<select name="locationto" class="form-control" required>
<option value="">Select Location-</option>
<?php $sql = "SELECT * from  tblemergency";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->LocationTo);?>"><?php echo htmlentities($result->LocationTo);?></option>
<?php }} ?>
 </select>
</div>
                                      <!--<div class="col-sm-3">
                                            <label for="" class="control-label">Departure Time</label>
                                            <input type="time" class="form-control input-sm datetimepicker2" name="appt" autocomplete="off">
                                        </div>--->


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
$servicefrom=$_POST['servicefrom'];
$locationto=$_POST['locationto'];
$sql = "SELECT * from tblemergencylist where (LocationTo=:locationto and ServiceFrom=:servicefrom)";
$query = $dbh -> prepare($sql);
$query->bindParam(':servicefrom',$servicefrom,PDO::PARAM_STR);
$query->bindParam(':locationto',$locationto,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

			<div class="rom-btm">
			<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
			      <a href="<?php echo htmlentities($result->EmergencyImage);?>"><img src="admin/emergencyimages/<?php echo htmlentities($result->EmergencyImage);?>" class="img-responsive" alt=""></a>
				</div>
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4>Service: <?php echo htmlentities($result->ServiceFrom);?></h4>
					<h4>Location: <?php echo htmlentities($result->LocationTo);?></h4>
					<h2>Name: <?php echo htmlentities($result->NameService);?></h2>
					<h6>Details: <?php echo htmlentities($result->Details);?></h6>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
					
				<a href="<?php echo htmlentities($result->EmergencyMap);?>" class="view">See Map Location</a>
				</div>
				<div class="clearfix"></div>
			</div>
                
<?php if($result->LocationTo=="")
{
echo htmlentities('NA');
} 
?>  		
<?php }}
else
{
echo htmlentities("Sorry...! This Service Is Not Available In This Location");
}}?>
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
