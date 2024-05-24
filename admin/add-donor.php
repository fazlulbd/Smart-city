
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$city=$_POST['city'];
$age=$_POST['age'];
$bgroup=$_POST['bgroup'];
$sql="INSERT INTO  tblbbstoke(Name,Email,MobileNumber,City,Age,Bgroup) VALUES(:name,:email,:mobile,:city,:age,:bgroup)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':bgroup',$bgroup,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg=" Add Donor Successfully";
}
else
{
$error="Something went wrong. Please try again";
}

}

?>

<!DOCTYPE html>

<html lang="en">
<head>
<title>Smart City | Admin Blood Donor Inserting </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<link rel="stylesheet" href="css/news.css">
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
<div class="page-container">
   <div class="left-content"> 
       <div class="mother-grid-inner">
	      <?php include('includes/header.php');?>
	       <div class="clearfix"> </div>
	   </div>
			<div class="grid-form">
				<div class="grid-form1">
					<h3>Add Blood Donor</h3>
						<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
						else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
						 <div class="tab-content">
							 <div class="tab-pane active" id="horizontal-form">
			 					<form class="form-horizontal" name="hotel" method="post" enctype="multipart/form-data">
			 						<div class="form-group">
										 <label for="focusedinput" class="col-sm-2 control-label">Full Name</label>
											 <div class="col-sm-8">
												 <input type="text" class="box" name="name" id="name" placeholder="Full Name" required></input>
			 								 </div>
									</div>
									<div class="form-group">
										 <label for="focusedinput" class="col-sm-2 control-label">Email</label>
											 <div class="col-sm-8">
												 <input type="text" class="box" name="email" id="Email" placeholder="E-mail" required></input>
			 								 </div>
									</div>
									<div class="form-group">
										 <label for="focusedinput" class="col-sm-2 control-label">Mobile Number</label>
											 <div class="col-sm-8">
												 <input type="text" class="box" name="mobile" id="mobile number" placeholder="Mobile_number" required></input>
			 								 </div>
									</div>
									<div class="form-group">
										 <label for="focusedinput" class="col-sm-2 control-label">City Name</label>
											 <div class="col-sm-8">
												 <input type="text" class="box" name="city" id="city_name" placeholder="city name" required></input>
			 								 </div>
									</div>
									<div class="form-group">
										 <label for="focusedinput" class="col-sm-2 control-label">Age</label>
											 <div class="col-sm-8">
												 <input type="text" class="box" name="age" id="age" placeholder="age" required></input>
			 								 </div>
									</div>
									<div class="form-group">
									
									    <label for="focusedinput" class="col-sm-2 control-label">Blood Group</label>
										<div class="col-sm-8">
											<select class="box" name="bgroup" >
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
                        			</div>
									<div class="row">
										<div class="col-sm-8 col-sm-offset-2">
											<button type="submit" name="submit" class="btn-primary btn">Submit</button>
											<button type="reset" class="btn-inverse btn">Reset</button>
										</div>
									</div>
							   </form>
							      <div class="panel-footer">
								  </div>
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
							<?php include('includes/footer.php');?>
									<!---->
							   <!--COPY rights end here-->

			   </div>
		  </div>

		    	 <!--//content-inner-->
		         <!--/sidebar-menu-->
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
