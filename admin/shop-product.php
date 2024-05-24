<?php
session_start();
error_reporting(0);

$shop_id = $_GET['pid'];
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $cat = $_POST['cat'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $image = $_FILES["image"]["name"];

        move_uploaded_file($_FILES["image"]["tmp_name"], "images/shop/product/" . $_FILES["image"]["name"]);
        $sql = "INSERT INTO tblproduct(name,cat,price,shop_id,image,brand) VALUES(:name,:cat,:price,:shop_id,:image,:brand)";

        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':cat', $cat, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_STR);
        $query->bindParam(':brand', $brand, PDO::PARAM_STR);
        $query->bindParam(':shop_id', $shop_id, PDO::PARAM_STR);
        $query->bindParam(':image', $image, PDO::PARAM_STR);

        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            $msg = " product uploded Successfully";
        } else {
            $error = "Something went wrong. Please try again";
        }
    }

?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Smart City | Admin Police Service Creation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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

                    <div class="agile-tables">
                        <div class="w3l-table-info">
                            <h2>Product list</h2>
                            <table class="table text-dark">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>categories</th>
                                        <th>price</th>
                                        <th>brand</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                    <?php $sql = "SELECT * from tblproduct WHERE `shop_id`='$shop_id'";
                                    $query = $dbh->prepare($sql);

                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {                ?>
                                            <tr>
                                                <td><?php echo htmlentities($result->name); ?></td>
                                                <td><?php echo htmlentities($result->cat); ?></td>
                                                <td><?php echo htmlentities($result->price); ?></td>
                                                <td><?php echo htmlentities($result->brand); ?></td>
                                                
                                                <td class='edit'>
                                                    <a href='update-product.php?pid=<?php echo htmlentities($result->id); ?>'><i class='fa fa-edit'></i></a></td>
                                                <td class='delete'><a onclick="return confirm('Are you sure ?')" href='delete-product.php?id=<?php echo htmlentities($result->id); ?>'><i class='fa fa-trash-o'></i></a></td>

                                            </tr>
                                    <?php $cnt = $cnt + 1;
                                        }
                                    } ?>
                                </tbody>
                                </tbody>
                            </table>
 
                        </div>
                    </div>
                </div>

                <!--heder end here-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Add Shop </li>
                </ol>
                <!--grid-->
                <div class="grid-form">

                    <!---->
                    <div class="grid-form1">
                        <h3>Add product </h3>
                        <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
                                <form class="form-horizontal" name="service" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="name" id="name" placeholder="product Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cat" class="col-sm-2 control-label">category</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="cat" id="cat" placeholder="product category" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="col-sm-2 control-label">price</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="price" id="price" placeholder="product price" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="brand" class="col-sm-2 control-label">brand</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="brand" id="brand" placeholder="product brand" required>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Add Image</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="image" id="image" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" name="submit" class="btn-primary btn">Add product</button>

                                            <button type="reset" class="btn-inverse btn">Reset</button>
                                        </div>
                                    </div>



                                </form>


                            </div>






                            <div class="panel-footer">

                            </div>
                            </form>
                        </div>
                    </div>
                    <!--//grid-->

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