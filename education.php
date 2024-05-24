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
<link rel="stylesheet" href="css/styles.css">
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
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Smart City - SCHOOL&COLLEGE INFORMATION</h1>
	</div>
</div>
<!--- /banner ---->
<!--- rooms ---->
<div class="edication-content">
    
        <h3 class="sname">SCHOOL INFORMATIOM</h3>
        <?php $sql = "SELECT * from tblschoolinfo";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {	?>
        
        <div class="edication">
            <div class="edication-left">
                <div class="school-img">
                    <img src="admin/serviceimages/<?php echo htmlentities($result->school_img);?>" class="img-responsive" alt="School image">

                </div>
            </div>
            <div class="edication-right">
                <div class="title">
                    <p><?php echo htmlentities($result->S_name);?></p>

                </div>
                <div class="description">
                    <p><?php echo htmlentities($result->S_info);?></p>
                </div>
                <br>
                <div class="apply">
                <a href="applyschool.php?pkgid=<?php echo htmlentities($result->id);?>">ADMITION FROM</a>
                   </div>
            </div>
           
        </div>
        <?php }} ?>
        <h3 class="sname">COLLEGE  INFORMATION</h3>
        <?php $sql = "SELECT * from tblcollegeinfo";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {	?>
        
        <div class="edication">
            <div class="edication-left">
                <div class="img">
                   <img src="admin/serviceimages/<?php echo htmlentities($result->C_img);?>" class="img-responsive" alt="College image">

                </div>
            </div>
            <div class="edication-right">
                <div class="title">
                    <p><?php echo htmlentities($result->C_name);?></p>

                </div>
                <div class="description">
                    <p><?php echo htmlentities($result->C_info);?></p>
                </div>
                <br>
                <div class="apply">
                <a href="applycollege.php?pkgid=<?php echo htmlentities($result->id);?>">ADMITION FROM</a>
                   
                   </div>
            </div>
           
        </div>
        <?php }} ?>
        
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
