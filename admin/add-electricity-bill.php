<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
$meter =$_POST['meter'];
$consumer=$_POST['consumer'];	
$monthandyear=$_POST['monthandyear'];
$presentunit =$_POST['lamount'];
$prevousunit =$_POST['duration'];
// $irate=$_POST['irate'];	
$totaltaka=$_POST['tamount'];	
$lastdate =$_POST['lastdate'];
$sql="INSERT INTO tblelectricitybill(Meter_name,consumer_number,Month,Present_unit,prevous_unit,total_taka,last_date) VALUES(:meter,:consumer,:monthandyear,:presentunit,:prevousunit,:totaltaka,:lastdate)";
$query = $dbh->prepare($sql);
$query->bindParam(':meter',$meter,PDO::PARAM_STR);
$query->bindParam(':consumer',$consumer,PDO::PARAM_STR);
$query->bindParam(':monthandyear',$monthandyear,PDO::PARAM_STR);
$query->bindParam(':presentunit',$presentunit,PDO::PARAM_STR);
$query->bindParam(':prevousunit',$prevousunit,PDO::PARAM_STR);
// $query->bindParam(':irate',$irate,PDO::PARAM_STR);
$query->bindParam(':totaltaka',$totaltaka,PDO::PARAM_STR);
$query->bindParam(':lastdate',$lastdate,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="News Create Successfully";
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
<title>Smart City || Admin News Inserting </title>
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
	   <!--heder end here-->
	
			<!--grid-->
			<div class="grid-form">
				<div class="grid-form1">
					<h3>Add Electricity Bill</h3>
						<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
						else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
						 <div class="tab-content">
							 <div class="tab-pane active" id="horizontal-form">
                             <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                            <div class="container">
                                                <form action=""  method="post" class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="">Meter name </label>
                                                            <input type="text" name="meter"  class="form-control" id="meter" placeholder="Add meter name" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label for="">Consumer Number</label>
                                                            <input type="text" name="consumer"  class="form-control" id="consumer" placeholder="Add consumer number" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="">Present Unit </label>
                                                            <input type="text" name="lamount"  class="form-control" id="lamount" >
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label for="">Prevous Unit</label>
                                                            <input type="text" name="duration"  class="form-control" id="duration" >
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="">Per Unit </label>
                                                            <input type="text" name="irate"  class="form-control" id="irate" >
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label for="">Total Taka</label>
                                                            <input type="text" name="tamount"  class="form-control" id="tamount"  readonly value="0.00"> 
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="">Month and Year</label>
                                                            <input type="text" name="monthandyear"  class="form-control" id="monthandyear" placeholder="add month & year" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label for="">Last Date </label>
                                                            <input type="date" name="lastdate"  class="form-control">
                                                        </div>
                                                    </div>
                                                    <br>
                                                     <div class="row">
                                                        <div class="col-sm-8 col-sm-offset-2">
                                                            <button type="submit" name="submit" class="btn-primary btn">Create</button>
                                                            <button type="reset" class="btn-inverse btn">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                       </div>
			 			             </div>
			                      </div>

                                  <script>
                                            $("#irate").change(function()
                                            {
                                                calLoan();
                                            }
                                            
                                            );
                                            $("#lamount").change(function()
                                            {
                                                calLoan();
                                            }
                                            
                                            );
                                            $("#duration").change(function()
                                            {
                                                calLoan();
                                            }
                                            
                                            );

                                            function calLoan(){
                                                if($("#lamount").val()==""){
                                                    return false;
                                                }
                                                else if($("#duration").val()==""){
                                                    return flase;
                                                }
                                                else if($("#irate").val()==""){
                                                    return false;
                                                }
                                                else{
                                                    var totalamount = 0;
                                                    
                                                    totalamount=((Number($("#lamount").val())- Number($("#duration").val()))* Number($("#irate").val()))
                                                    // totalamount=(Number($("#lamount").val())-Number($("#duration").val())*Number($("#irate").val())

                                                    $("#tamount").val(totalamount.toFixed(2));

                                                    
                                                }
                                            }
                                            

                                   </script>
                                  
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

</body>
</html>
<?php } ?>

