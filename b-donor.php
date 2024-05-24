<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobileno'];
$city=$_POST['city'];
$location=$_POST['location'];
$age=$_POST['age'];
$bgroup=$_POST['bgroup'];
$blood=$_POST['bloods'];
$corona=$_POST['corona'];
$diabetes=$_POST['diabetes'];
$cancer=$_POST['cancer'];
$sql="INSERT INTO tblbdonor(Name,Email,MobileNumber,City,Location,Age,Bgroup,Donor,Corona,Diabetes,Cancer) VALUES(:name,:email,:mobile,:city,:location,:age,:bgroup,:blood,:corona,:diabetes,:cancer)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':location',$location,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':bgroup',$bgroup,PDO::PARAM_STR);
$query->bindParam(':blood',$blood,PDO::PARAM_STR);
$query->bindParam(':corona',$corona,PDO::PARAM_STR);
$query->bindParam(':diabetes',$diabetes,PDO::PARAM_STR);
$query->bindParam(':cancer',$cancer,PDO::PARAM_STR);


$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Contact  Successfully submited";
}
else
{
$error="Something went wrong. Please try again";
}

}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Smart City || Smart Sylhet</title>
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
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/styls.css">
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
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>
<body>
<!-- top-header -->
<div class="top-header">
<?php include('includes/header.php');?>
<div class="bannar">
	<img src="images/s1.jpg" alt="">
</div>
<!--- /banner-1 ---->
<!--- privacy ---->
<div class="privacy">
	<div class="container">
		<div class="regfrom">
		<form name="enquiry" method="post">
		 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="desi">
				   <h3>Donor Registion from</h3>
				</div>
	       
			 <div class="from">
					<label for="">Full name</label>
					<input type="text" name="name" class="form-control" placeholder="Full name" required>
			  </div>
			  <div class="from">
					<label for="">Email</label>
					<input type="text" name="email" class="form-control" placeholder="exam@gmail.com" required>
			  </div>
			  <div class="from">
					<label for="">Mobile Number</label>
					<input type="text" name="mobileno" class="form-control" placeholder="01700-000000" required>
			  </div>
			  <div class="from">
					<label for="">City</label>
					<input type="text" name="city" class="form-control" placeholder="city name" required>
			  </div>
			  <div class="from">
					<label for="">Location</label>
					<input type="text" name="location" class="form-control" placeholder="location" required>
			  </div>
			  <div class="from">
					<label for="">Age</label>
					<input type="text" name="age" class="form-control" placeholder="age" required>
			  </div>
			 
			  <div class="from">
			 			  <label>Blood Group</label>
                          <select class="form-control" name="bgroup" >
                              <option>A+</option>
                              <option>B+</option>
                              <option>AB+</option>
                              <option>O+</option>
                              <option>A-</option>
                              <option>B-</option>
                              <option>AB-</option>
                              <option>O-</option>
                              
                          </select>
			  </div>
			

			  <div class="ques">
					<label>Did you donate blood in 4 months?</label>
						<div class="redies">
							<label><input type="radio" class="option-input-radio"  value="Yes" name="bloods" >Yes</label>
							<label><input type="radio" class="option-input-radio"  value="No" name="bloods" >No</label>
   					   </div>
			  </div>

			  <div class="ques">
					<label>Are you affect by corona virus?</label>
						<div class="redies">
							<label><input type="radio" class="option-input-radio" value="Yes" name="corona">Yes</label>
							<label><input type="radio" class="option-input-radio"  value="No" name="corona" >No</label>
   					   </div>
			  </div>
			  <div class="ques">
			  		<label>Do you have diabetes?</label>
						<div class="redies">
							<label><input type="radio" class="option-input-radio" value="Yes" name="diabetes">Yes</label>
							<label><input type="radio" class="option-input-radio"  value="No" name="diabetes" >No</label>
   					   </div>
			  </div>
			  <div class="ques">
			 		 <label>Are you affect by cancer?</label>
						<div class="redies">
							<label><input type="radio" class="option-input-radio" value="Yes" name="cancer" >Yes</label>
							<label><input type="radio" class="option-input-radio"  value="No" name="cancer" >No</label>
   					   </div>
			  </div>
			 

							<?php if($_SESSION['login']){?>
						<class="spe" align="center">
						
							<button type="submit" name="submit" class="btn-primary btn">Submit</button>
						</class=>
						<?php } else {?>
							<class="sigi" align="center" style="margin-top: 1%">
								
							<a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn">Submit</a></class=>
							<?php } ?>

							
			 
			</form>
		</div>

	</div>
</div>
<!--- /privacy ---->
<!--- footer-top ---->
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
</body>
</html>
