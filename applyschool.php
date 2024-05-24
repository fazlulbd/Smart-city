
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
$pid=intval($_GET['pkgid']);
$useremail=$_SESSION['login'];
$name=$_POST['name'];
$dob=$_POST['dob'];
$reg=$_POST['reg'];
$gender=$_POST['gender'];
$mobile=$_POST['mobile'];
$fname=$_POST['fname'];
$fnid=$_POST['fnid'];
$mname=$_POST['mname'];
$mnid=$_POST['mnid'];
$classname=$_POST['classname'];

$status=0;
$sql="INSERT INTO tblapplyschool(sid,UserEmail,Name,DOB,DOB_Reg,Gender,Mobile,F_name,F_nid,M_name,M_nid,Class_name,status) VALUES(:pid,:useremail,:name,:dob,:reg,:gender,:mobile,:fname,:fnid,:mname,:mnid,:classname,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':reg',$reg,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':fnid',$fnid,PDO::PARAM_STR);
$query->bindParam(':mname',$mname,PDO::PARAM_STR);
$query->bindParam(':mnid',$mnid,PDO::PARAM_STR);
$query->bindParam(':classname',$classname,PDO::PARAM_STR);

$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg=" Successfully";
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
<title>Smart City || School admition Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/styls.css">
<link rel="stylesheet" href="css/styles.css">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		 new WOW().init();
	</script>
<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
						$( "#datepicker,#datepicker1" ).datepicker();
						});
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
<?php include('includes/header.php');?>
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> Smart City - SCHOOL ADMITION</h1>
	</div>
</div>
<!--- /banner ---->
<!--- selectroom ---->
<div class="selectroom">
	<div class="container">	
<?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT * from tblschoolinfo where id=:pid";
$query = $dbh->prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>


<div class="containe ">
	<div class="regfrom containe-group">
			<form name="book" method="post">
		<!-- <form name="enquiry" method="post"> -->
		 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="desi">
				   <h3>SCHOOL ADMISSION FORM</h3>
				</div>
	       
			 <div class="from">
					<label for="">Student name</label>
					<input type="text" name="name" class="form-control" placeholder="Full name" required>
			  </div>
			  <div class="from">
					<label for="">Date of Birth</label>
					<input type="date" name="dob" class="form-control" placeholder="" required>
			  </div>
			  <div class="from">
					<label for="">Birth Registration Number</label>
					<input type="text" name="reg" class="form-control" placeholder="17-digits registration number" required>
			  </div>
              <div class="ques">
					<label>Gender</label>
						<div class="redies">
							<label><input type="radio" class="option-input-radio"  value="Male" name="gender" >Male</label>
							<label><input type="radio" class="option-input-radio"  value="Femele" name="gender" >Femele</label>
                            <label><input type="radio" class="option-input-radio"  value="Other" name="gender" >Other</label>
   					   </div>
			  </div>
			  <div class="from">
					<label for="">mobile number</label>
					<input type="text" name="mobile" class="form-control" placeholder="Moblie Number" required>
			  </div>
			  <div class="from">
					<label for="">Father's name </label>
					<input type="text" name="fname" class="form-control" placeholder="father's name" required>
			  </div>
			  <div class="from">
					<label for="">NID Number</label>
					<input type="text" name="fnid" class="form-control" placeholder="NID number" required>
			  </div>
              <div class="from">
					<label for="">Mother's name </label>
					<input type="text" name="mname" class="form-control" placeholder="mother's name" required>
			  </div>
			  <div class="from">
					<label for="">NID Number</label>
					<input type="text" name="mnid" class="form-control" placeholder="NID number" required>
			  </div>
              
              <div class="from">
			 			  <label>Class Name</label>
                          <select class="form-control" name="classname" >
						      <option></option>
                              <option>Class-1</option>
                              <option>Class-2</option>
                              <option>Class-3</option>
                              <option>Class-4</option>
                              <option>Class-5</option>
                              <option>Class-6</option>
                              <option>Class-7</option>
                              <option>Class-8</option>
                              <option>Class-9</option>
                              <option>Class-10</option>
                              
                          </select>
			  </div>
			 

			  <?php if($_SESSION['login'])
					{?>
						<li class="spe" align="center">
					<button type="submit" name="submit2" class="btn-primary btn">Submit</button>
						</li>
						<?php } else {?>
							<li class="sigi" align="center" style="margin-top: 1%">
							<a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn" >Submit</a></li>
							<?php } ?>

							
			 
		
						</form>
		</div>

	</div>





		
<?php }} ?>


	</div>
</div>
<!--- /selectroom ---->
<<!--- /footer-top ---->
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

