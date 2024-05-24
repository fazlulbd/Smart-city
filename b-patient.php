
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
$description=$_POST['description'];
$sql="INSERT INTO   tblbpasent(Name,Email,MobileNumber,City,Age,Bgroup,Description) VALUES(:name,:email,:mobile,:city,:age,:bgroup,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':bgroup',$bgroup,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg=" Successfully submited";
}
else
{
$error="Something went wrong. Please try again";
}

}

?>

<?php include('includes/header.php');?>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />

<link rel="stylesheet" href="css/news.css">
<link rel="stylesheet" href="css/blood.css">



  <!-- <div id="admin-content"> -->
                    
      <div class="container">
      <div class="images">
                        <img src="images/p.jpg" alt="image">
                    </div>
          <div class="row">
    
              <div class="col-md-12">
                    
                  <h1 class="admin-heading"> Blood Patient Registration</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">

              <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                  <!-- Form Start -->
                  <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Full Name</label>
                          <input type="text" name="name" class="form-control" placeholder=" Name" required>
                      </div>
                          <div class="form-group">
                          <label>E-mail</label>
                          <input type="text" name="email" class="form-control" placeholder="Email" required>
                      </div>
                      <div class="form-group">
                          <label>Mobile Number</label>
                          <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" required>
                      </div>
                      <div class="form-group">
                          <label>City Name</label>
                          <input type="text" name="city" class="form-control" placeholder="City name" required>
                      </div>
                     <div class="form-group">
                          <label>AGE</label>
                          <input type="text" name="age" class="form-control" placeholder="age" required>
                      </div>

                      <!-- <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div> -->
                      <div class="form-group">
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
                       <div class="form-group">
                            <label>Descreption</label>
								<div class="col">
									<textarea class="form-control" rows="5" cols="50" name="description" id="form-control" placeholder="description" required></textarea> 
								</div>
						</div>


                      <input type="submit"  name="submit" class=" btn-primary" value="     Submit    " required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>

  
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->


<!-- signup -->
<?php include('includes/signup.php');?>
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
<?php include('includes/footer.php');?>

