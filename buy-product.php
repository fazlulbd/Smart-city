<?php
session_start();
error_reporting(0);
include('includes/config.php');



if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $p_id = $_POST['p_id'];
    $address = $_POST['address'];
    $UserEmail = $_SESSION['login'];
    $sql = "INSERT INTO tblcart(name,address,price,UserEmail,p_id) VALUES(:name,:address,:price,:UserEmail,:p_id)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_STR);;
    $query->bindParam(':UserEmail', $UserEmail, PDO::PARAM_STR);
    $query->bindParam(':p_id', $p_id, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $msg = "Product Added Successfully";
    } else {
        $error = "Something went wrong. Please try again";
    }
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Smart City ||Buy Product</title>
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
            $sql = "SELECT * from tblproduct where id=:pid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':pid', $pid, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $result) {    ?>

                    <div class="selectroom_top">
                        <div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
                            <img src="admin/images/shop/product/<?php echo htmlentities($result->image); ?>" class="img-responsive" alt="">
                        </div>

                        <h2><?php echo htmlentities($result->name); ?></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="selectroom_top">

                        <h3 class="mb-3 text-center">Buy Product</h3>
                        <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

                        <form action="" method="POST">
                            <div class="form-group ">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" value="<?php echo htmlentities($result->name); ?>" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="price">Product price</label>
                                <input type="text" name="price" value="<?php echo htmlentities($result->price); ?>" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="p_id">Product ID</label>
                                <br>
                                <input type="text" name="p_id" value="<?php echo htmlentities($result->id); ?>" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="address">Delivery Address</label>
                                <textarea name="address" class="form-control" id="" cols="30" rows="3" required></textarea>
                            </div>

                            <?php if ($_SESSION['login']) { ?>
                                <div class="spe" align="center">
                                    <button type="submit" name="submit" class="btn-primary btn">Buy</button>
                                </div>
                            <?php } else { ?>
                                <dclass="sigi" align="center" style="margin-top: 1%">
                                    <a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn">Buy</a></dclass=>
                                <?php
                            } ?>




                        </form>




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