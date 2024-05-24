<?php
session_start();
error_reporting(0);
include('includes/config.php');



if (isset($_POST['fir'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $place = $_POST['place'];
    $details = $_POST['fir'];
    $p_station = $_POST['p_station'];
    $UserEmail = $_SESSION['login'];
    $sql = "INSERT INTO tblfir(name,address,date,place,details,p_station,UserEmail) VALUES(:name,:address,:date,:place,:details,:p_station, :UserEmail)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    $query->bindParam(':place', $place, PDO::PARAM_STR);
    $query->bindParam(':details', $details, PDO::PARAM_STR);
    $query->bindParam(':p_station', $p_station, PDO::PARAM_STR);
    $query->bindParam(':UserEmail', $UserEmail, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $msg = "FIR applied Successfully";
    } else {
        $error = "Something went wrong. Please try again";
    }
}

if (isset($_POST['gd'])) {
    $name = $_POST['name'];
    $nid = $_POST['nid'];
    $contact = $_POST['contact'];
    $details = $_POST['gd'];
    $p_station = $_POST['p_station'];
    $image = $_FILES["image"]["name"];
    $UserEmail = $_SESSION['login'];




    move_uploaded_file($_FILES["image"]["tmp_name"], "images/gd/" . $_FILES["image"]["name"]);

    $sql = "INSERT INTO tblgd(name,nid,contact,details,p_station,image, UserEmail) VALUES(:name,:nid,:contact,:details,:p_station,:image,:UserEmail)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':nid', $nid, PDO::PARAM_STR);
    $query->bindParam(':contact', $contact, PDO::PARAM_STR);
    $query->bindParam(':details', $details, PDO::PARAM_STR);
    $query->bindParam(':p_station', $p_station, PDO::PARAM_STR);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
    $query->bindParam(':UserEmail', $UserEmail, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $msg = "GD applied Successfully";
    } else {
        $error = "Something went wrong. Please try again";
    }
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Smart City || police Station</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 

    </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.css" rel="stylesheet">
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
            $("#datepicker,#datepicker1").datepicker();
        });
    </script>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>
</head>

<body>
    <!-- top-header -->
    <?php include('includes/header.php'); ?>
    <div class="banner-3">
        <div class="container">
            <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> Smart City - Police Station</h1>
        </div>
    </div>
    <!--- /banner ---->
    <!--- selectroom ---->
    <div class="selectroom">
        <div class="container">
            <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
            <?php
            $pid = intval($_GET['pkgid']);
            $sql = "SELECT * from tblpolicestation where id=:pid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':pid', $pid, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $result) {    ?>

                    <div class="selectroom_top">
                        <div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
                            <img src="admin/policestationimg/<?php echo htmlentities($result->P_img); ?>" class="img-responsive" alt="">
                        </div>

                        <h2><?php echo htmlentities($result->Location); ?></h2>
                        <p style="padding-top: 1%"><?php echo htmlentities($result->Description); ?> </p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="selectroom_top">
                        <div class="row ">
                            <div class="col-md-6 ">
                                <h3 class="mb-3 text-center">Apply for FIR</h3>

                                <form action="" method="POST">
                                    <div class="form-group ">
                                        <label for="name">Your Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group ">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>

                                    <div class="form-group ">
                                        <label for="date">Date and time of the crime/offence</label>
                                        <input type="datetime-local" name="date" class="form-control">
                                    </div>
                                    <div class="form-group ">
                                        <label for="place">Place of the Offence</label>
                                        <input type="text" name="place" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="fir">Details</label>
                                        <input type="text" name="fir" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="p_station">Police Station</label>
                                        <input type="text" name="p_station" value="<?php echo htmlentities($result->Location); ?>" class="form-control">
                                    </div>
                                    <?php if ($_SESSION['login']) { ?>
                                        <div class="spe" align="center">
                                            <button type="submit" name="submit" class="btn-primary btn">Submit</button>
                                        </div>
                                    <?php } else { ?>
                                        <dclass="sigi" align="center" style="margin-top: 1%">
                                            <a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn">Submit</a></dclass=>
                                        <?php
                                    } ?>




                                </form>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3 text-center">Apply for GD</h3>

                                <form action="" method="POST"  enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="name">Your Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group ">
                                        <label for="nid">NID No</label>
                                        <input type="text" name="nid" class="form-control">
                                    </div>
                                    <div class="form-group ">
                                        <label for="contact">Contact NO</label>
                                        <input type="text" name="contact" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="gd">Details</label>
                                        <input type="text" name="gd" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="p_station">Police Station</label>
                                        <input type="text" name="p_station" value="<?php echo htmlentities($result->Location); ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Select Your Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <?php if ($_SESSION['login']) { ?>
                                        <class="spe" align="center">
                                            <button type="submit" name="submit" class="btn-primary btn">Submit</button>
                                            </class=>
                                        <?php } else { ?>
                                            <class="sigi" align="center" style="margin-top: 1%">
                                                <a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn">Submit</a></class=>
                                            <?php
                                        } ?>


                                </form>
                            </div>
                        </div>


                    </div>


        </div>
<?php }
            } ?>


    </div>
    </div>
    <!--- /selectroom ---->
    <<!--- /footer-top ---->
        <?php include('includes/footer.php'); ?>
        <!-- signup -->
        <?php include('includes/signup.php'); ?>
        <!-- //signu -->
        <!-- signin -->
        <?php include('includes/signin.php'); ?>
        <!-- //signin -->
        <!-- write us -->
        <?php include('includes/write-us.php'); ?>
</body>

</html>