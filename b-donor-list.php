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
<link rel="stylesheet" href="css/styl.css">
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
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">BLOOD DONOR LIST</h1>
	</div>
</div>
<!--- /banner ---->

<!--- rooms ---->
<div class="search">
    <h2>Blood Donor List</h2>
    <form method="POST" class="d-flex">
        <input class="form-control me-2" type="search" name="keyword" placeholder="Search" required="required">
        <button class="btn btn-outline-success" type="submit" name="search">Search</button>
      </form>
</div>  
<?php if(isset($_POST['search'])){  ?>
  

<div class="tables">
   <table class="contant-table">
	  <thead class="contant-head">
		<tr>
		<th>S.N</th>
			<th>name</th>
			<th>email</th>
			<th>MobileNumber</th>
			<th>Age</th>
			<th>City</th>
			<th>location</th>
			<th>blood group</th>
            <th>status</th>
		</tr>
	</thead>
	<tbody>
	

						<?php $keyword= $_POST['keyword'];
						$sql = "SELECT * from  tblbdonor WHERE Name LIKE '%$keyword%' or Email LIKE '%$keyword%' or  Location LIKE '%$keyword%' or Bgroup LIKE '%$keyword%' ";
						$query = $dbh -> prepare($sql);
						
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;
						if($query->rowCount() > 0)
						{
						foreach($results as $result)
						{				?>	
                          <tr>
                          <td><?php echo htmlentities($cnt);?></td>
                            <td><?php echo htmlentities($result->Name);?></td>
							<td><?php echo htmlentities($result->Email);?></td>
                            <td><?php echo htmlentities($result->MobileNumber);?></td>
                            <td><?php echo htmlentities($result->Age);?></td>
                            <td><?php echo htmlentities($result->City);?></td>
							<td><?php echo htmlentities($result->Location);?></td>
                            <td><?php echo htmlentities($result->Bgroup);?></td>
                            <td>
								<?php if($result->status==0){
									echo 'enable';
								}else{
									echo 'disable';
								}

								?>
				</td>
                            
                          </tr>
						  <?php $cnt=$cnt+1;} }?>  



	
	
	</tbody>
</table>
 </div>
<?php }else{ ?>
    <div class="tables">
<table class="contant-table">
	<thead class="alert-info">
		<tr>
			<th>S.N</th>
			<th>name</th>
			<th>email</th>
			<th>MobileNumber</th>
			<th>Age</th>
			<th>City</th>
			<th>location</th>
			<th>blood group</th>
            <th>status</th>
		</tr>
	</thead>
	<tbody>
		<?php $sql = "SELECT * from  tblbdonor";
			$query = $dbh -> prepare($sql);
						
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			$cnt=1;
			if($query->rowCount() > 0)
			{
			foreach($results as $result)
			{				?>	
			  <tr>
			  <td><?php echo htmlentities($cnt);?></td>
				<td><?php echo htmlentities($result->Name);?></td>
				<td><?php echo htmlentities($result->Email);?></td>
				<td><?php echo htmlentities($result->MobileNumber);?></td>
				<td><?php echo htmlentities($result->Age);?></td>
				<td><?php echo htmlentities($result->City);?></td>
				<td><?php echo htmlentities($result->Location);?></td>
				<td><?php echo htmlentities($result->Bgroup);?></td>
                <td>
								<?php if($result->status==0){
									echo 'enable';
								}
								elseif($result->status==1){
									echo 'disable';
								}
								else{
									echo 'panding';
								}

								?>
				</td>
				
			  </tr>
			  <?php $cnt=$cnt+1;} }?>  

	</tbody>
</table>
</div>
<?php }?>

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

