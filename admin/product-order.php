<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    // code for cancel
    if (isset($_REQUEST['bkid'])) {
        $bid = intval($_GET['bkid']);
        $status = 2;
        $sql = "UPDATE tblcart SET status=:status  WHERE  id=:bid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':bid', $bid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Order Cancelled successfully";
    }


    if (isset($_REQUEST['bckid'])) {
        $bcid = intval($_GET['bckid']);
        $status = 1;
        $sql = "UPDATE tblcart SET status=:status WHERE id=:bcid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':bcid', $bcid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Order Confirm successfully";
    }




?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Smart City || Admin Manage Orders</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript">
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/morris.css" type="text/css" />
        <link href="css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/table-style.css" />
        <link rel="stylesheet" type="text/css" href="css/basictable.css" />
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
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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
        <div class="page-container">
            <!--/content-inner-->
            <div class="left-content">
                <div class="mother-grid-inner">
                    <!--header start here-->
                    <?php include('includes/header.php'); ?>
                    <div class="clearfix"> </div>
                </div>
                <!--heder end here-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Manage Order </li>
                </ol>
                <div class="agile-grids">
                    <!-- tables -->
                    <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                    <div class="agile-tables">
                        <div class="w3l-table-info">
                            <h2>Manage Orders</h2>
                            <table id="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Product ID</th>
                                        <th>Price</th>
                                        <th>Order Time</th>
                                        <th>Address</th>
                                        <th>Status </th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql =  "SELECT * from tblcart";

                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    // $d_time = new DateTime();
                                    // echo $d_time;

                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {                ?>
                                            <tr>
                                                <td>#ORDER-ID-<?php echo htmlentities($result->id); ?></td>
                                                <td><?php echo htmlentities($result->name); ?></td>
                                                <td>#PRODUCT-ID-<?php echo htmlentities($result->p_id); ?></td>
                                                <td><?php echo htmlentities($result->price); ?>BDT</td>
                                                <td><?php echo htmlentities($result->b_time); ?></td>
                                                <td><?php echo htmlentities($result->address); ?></td>

                                                <td><?php if ($result->status == 0) {
                                                        echo "Pending";
                                                    }
                                                    if ($result->status == 1) {
                                                        echo "Confirmed";
                                                    }
                                                    if ($result->status == 2) {
                                                        echo "Cancelled";
                                                    }
                                                    ?></td>

                                                <?php if ($result->status == 2) {
                                                ?><td>Cancelled</td>
                                                <?php } else { ?>
                                                    <td><a href="product-order.php?bkid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Do you really want to cancel FIR')">Cancel</a> / <a href="product-order.php?bckid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Do you really want to confirm FIR')">Confirm</a></td>
                                                <?php } ?>

                                            </tr>
                                    <?php $cnt = $cnt + 1;
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        </table>


                    </div>
                    <!-- script-for sticky-nav -->
                    <script>
                        $(document).ready(function() {
                            var navoffeset = $(".header-main").offset().top;
                            $(window).scroll(function() {
                                var scrollpos = $(window).scrollTop();
                                if (scrollpos >= navoffeset) {
                                    $(".header-main").addClass("fixed");
                                } else {
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
                    <?php include('includes/footer.php'); ?>
                    <!--COPY rights end here-->
                </div>
            </div>
            <!--//content-inner-->
            <!--/sidebar-menu-->
            <?php include('includes/sidebarmenu.php'); ?>
            <div class="clearfix"></div>
        </div>
        <script>
            var toggle = true;

            $(".sidebar-icon").click(function() {
                if (toggle) {
                    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                    $("#menu span").css({
                        "position": "absolute"
                    });
                } else {
                    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                    setTimeout(function() {
                        $("#menu span").css({
                            "position": "relative"
                        });
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