<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
$pid=intval($_GET['pid']);	
if(isset($_POST['submit']))
{
$pname=$_POST['housename'];
$ptype=$_POST['housetype'];	
$plocation=$_POST['houselocation'];
$pbedroom=$_POST['bedroom'];
$pkitchen=$_POST['kitchen'];
$pbathroom=$_POST['bathroom'];
$pprice=$_POST['price'];
$pdetails=$_POST['housedetails'];	
$pimage=$_FILES["houseimage"]["name"];
$sql="update Tblhouse set HouseName=:pname,HouseType=:ptype,HouseLocation=:plocation,Bedroom=:pbedroom,Bathroom=:pbathroom,Kitchen=:pkitchen,Price=:pprice,HouseDetails=:pdetails where HouseId=:pid";
$query = $dbh->prepare($sql);
$query->bindParam(':pname',$pname,PDO::PARAM_STR);
$query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
$query->bindParam(':plocation',$plocation,PDO::PARAM_STR);
$query->bindParam(':pbedroom',$pbedroom,PDO::PARAM_STR);
$query->bindParam(':pkitchen',$pkitchen,PDO::PARAM_STR);
$query->bindParam(':pbathroom',$pbathroom,PDO::PARAM_STR);
$query->bindParam(':pprice',$pprice,PDO::PARAM_STR);
$query->bindParam(':pdetails',$pdetails,PDO::PARAM_STR);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->execute();
$msg=" House Updated Successfully";
}

	?>
<!DOCTYPE HTML>
<html>
<head>
<title>Smart City || Admin Update House </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
              <!--header start here-->
<?php include('includes/header.php');?>
							
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Update House </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Update House</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						
<?php 
$pid=intval($_GET['pid']);
$sql = "SELECT * from tblhouse where HouseId=:pid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

							<form class="form-horizontal" name="house" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">House Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="housename" id="housename" placeholder="Add House" value="<?php echo htmlentities($result->HouseName);?>" required>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">House Type</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="housetype" id="housetype" placeholder=" House Type " value="<?php echo htmlentities($result->HouseType);?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="houselocation" id="houselocation" placeholder=" House Location" value="<?php echo htmlentities($result->HouseLocation);?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bedroom</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="bedroom" id="bedroom" placeholder=" Bedroom" value="<?php echo htmlentities($result->Bedroom);?>" required>
									</div>
								</div>	

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Kitchen</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="kitchen" id="kitchen" placeholder=" Kitchen" value="<?php echo htmlentities($result->Kitchen);?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bathroom</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="bathroom" id="bathroom" placeholder=" Bathroom" value="<?php echo htmlentities($result->Bathroom);?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Rent Per Month</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="price" id="price" placeholder=" Rent" value="<?php echo htmlentities($result->Price);?>" required>
									</div>
								</div>


<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">House Details</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="5" cols="50" name="housedetails" id="housedetails" placeholder="House Details" required><?php echo htmlentities($result->HouseDetails);?></textarea> 
									</div>
								</div>															
<div class="form-group">
<label for="focusedinput" class="col-sm-2 control-label">House Image</label>
<div class="col-sm-8">
<img src="houseimages/<?php echo htmlentities($result->HouseImage);?>" width="200">&nbsp;&nbsp;&nbsp;<a href="house-image.php?imgid=<?php echo htmlentities($result->HouseId);?>">Change Image</a>
</div>
</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Last Updation Date</label>
									<div class="col-sm-8">
<?php echo htmlentities($result->UpdationDate);?>
									</div>
								</div>		
								<?php }} ?>

								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" class="btn-primary btn">Update</button>
			</div>
		</div>
						
					
						
						
						
					</div>
					
					</form>

     
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	<!--//grid-->

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

</body>
</html>
<?php } ?>