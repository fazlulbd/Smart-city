<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
$id=intval($_GET['id']);

$status=0;
$sql="INSERT INTO tblapplycollege(id,) VALUES(:id)";
$query = $dbh->prepare($sql);

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
<link rel="stylesheet" href="css/styles.css">
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



          <div class="contant">
          <?php 
                        $id=intval($_GET['id']);
                        $sql = "SELECT * from tblapplycollege where id=:id";
                        $query = $dbh->prepare($sql);
                        $query -> bindParam(':id', $id, PDO::PARAM_STR);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        {	?>
        <div class="reg">College Admition From</div>
        <div class="from">
            <strong class="name">Full Name : </strong>
            <strong class="names"> <td><?php echo htmlentities($result->Name);?></td></strong>
            <strong class="name">Mobile Number : </strong>
            <strong class="names"> <td><?php echo htmlentities($result->Mobile);?></td></strong>

            <div class="from">
                <strong class="name">Date of barth : </strong>
                <strong class="names"><td><?php echo htmlentities($result->DOB);?></td></strong>
                <strong class="name">Date of barth reg : </strong>
                <strong class="names"> <td><?php echo htmlentities($result->DOB_reg);?></td></strong>
                <strong class="name">Gender: </strong>
                <strong class="names"><td><?php echo htmlentities($result->Gender);?></td></strong>
            </div>
            <div class="from">
                <strong class="name">Father's Name : </strong>
                <strong class="names"><td><?php echo htmlentities($result->F_name);?></td></strong>
                <strong class="name">Father's NID  : </strong>
                <strong class="names"><td><?php echo htmlentities($result->F_nid);?></td></strong>
               
            </div>
            <div class="from">
                <strong class="name">Mother's Name : </strong>
                <strong class="names"><td><?php echo htmlentities($result->M_name);?></td></strong>
                <strong class="name">Mother's NID  : </strong>
                <strong class="names"><td><?php echo htmlentities($result->M_nid);?></td></strong>
               
            </div>

            <div class="from">
                <strong class="name">SSc Exam Year : </strong>
                <strong class="names"> <td><?php echo htmlentities($result->ssc_examyear);?></td></td></strong>
                <strong class="name">Department : </strong>
                <strong class="names"><td><?php echo htmlentities($result->Dept);?></td></strong>
            </div>
            <div class="from">
                <strong class="name">SSc Roll number: </strong>
                <strong class="names"> <td><?php echo htmlentities($result->ssc_roll);?></td></td></strong>
                <strong class="name">SSc Reg number : </strong>
                <strong class="names"><td><?php echo htmlentities($result->ssc_reg);?></td></strong>
                <strong class="name">SSc Board: </strong>
                <strong class="names"> <td><?php echo htmlentities($result->Board);?></td></td></strong>
            </div>
            <div class="from">
               
                <!-- <strong class="name"> College : </strong>
                <strong class="names"><td><?php echo htmlentities($result->College);?></td></strong> -->
                <strong class="name"> Class : </strong>
                <strong class="names"><td><?php echo htmlentities($result->Class);?></td></strong>
            </div>

            
        </div>
        <?php }} ?>
    </div>
                       
                    </div>
               </div>

   </div>
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
