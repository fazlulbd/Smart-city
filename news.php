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
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Smart City News</h1>
	</div>
</div>
<!--- /banner ---->

<!--- rooms ---->
  <div class="news-conntant">
      
    <?php $sql = "SELECT * from tblnews ORDER BY id DESC";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {	?>
        <div class="news-con">
            <div class="news-left">
                <div class="images">
                    
                  <img src="admin/newsimages/<?php echo htmlentities($result->newsimg);?>" class="img-responsive" alt="">
                </div>
            </div>
            <div class="news-right">
                <div class="tital"> <?php echo htmlentities($result->title);?></div>
                <div class="post-information">
                      <span>
                         <i class="fa fa-calendar" aria-hidden="true"></i>
                          <?php echo htmlentities($result->post_date);?>
                      </span>
                </div>
                <div class="descreption">
                    <p> <?php echo  substr(($result->description),0,400).'...';?></p>
                </div>
                <div class="readmore">
                    <a href="news-details.php?id=<?php echo htmlentities($result->id);?>">readmore</a>
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
