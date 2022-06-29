<?php
session_start();
ob_start();
define("security", TRUE);
include_once("config/connect.php");
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/success.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/category.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="admin/ckeditor/ckeditor.js"></script>
</head>

<body>

    <!--	Header	-->
    <div id="header1">
        <div class="container">
            <div id="lienhe">
                <div class="row">
                    <div class="col-lg-5 col-md-4 col-sm-4">
                        <div class="diachi"> Địa chỉ: 475A, Điện Biên Phủ, P. 25, Q.Bình Thạnh, Tp. Hồ Chí Minh </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="hotro"> Hỗ trợ: support@dienlanhtuanbao.tech </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4">
                        <div class="hotline"> Hotline: 0866658801 </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header2">
        <div class="container">
            <div class="row">
                <!-- logo -->
                <?php
                include_once("module/logo/logo.php")
                ?>
                <!-- search_box -->
                <?php
                    include_once("module/search/search_box.php");
               
                
                ?>
                <!-- cart_notify -->
                <?php
                include_once("module/cart/cart_notify.php")
                ?>
            </div>
        </div>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <!--	End Header	-->

    <!--	Body	-->
    <div id="body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav>
                       <!-- menu -->
                       <?php
                        include_once("module/category/menu.php")
                        ?>
                    </nav>
                </div>
            </div>
            <div class="row">
                <!-- slide -->
                <div id="main" class="col-lg-12 col-md-12 col-sm-12">
                <?php
                    include_once("module/slider/slider.php")
                    ?>
                    <!-- end slide -->
                    <!-- banner -->
                    <?php
                    include_once("module/banner/banner.php")
                    ?>
                    <!-- end banner -->

                     <!-- Master Page Here -->
                     <?php
                    if (isset($_GET['page_layout'])) {
                        switch ($_GET['page_layout']) {
                            case 'cart': include_once('module/cart/cart.php'); break;
                            case 'search': include_once('module/search/search.php'); break;
                            case 'product': include_once('module/product/product.php'); break;
                            case 'success': include_once('module/cart/success.php'); break;
                            case 'category': include_once('module/category/category.php'); break;
                            case 'order': include_once('module/confirm.php'); break;
                        }
                    }else {
                        include_once("module/product/product_featured.php");
                        include_once("module/product/product_new.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--	End Body	-->


     <!--	Footer	-->
    <div id="footer-top">
        <div class="container">
            <div class="row">
                 <!-- logo footer -->
                 <?php
                include_once("module/logo/logo_footer.php");
                include_once("module/footer/address.php");
                include_once("module/footer/service.php");
                include_once("module/footer/hotline.php");
                ?>
            </div>
        </div>
    </div>

    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>
                        NVT © Copyrights 2021 Công Ty TNHH NVT Computer
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--	End Footer	-->
</body>

</html>