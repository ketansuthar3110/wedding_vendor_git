<?php
require './class/connection.php';
$dmsg = "";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Vendor - Wedding Vendor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php
        include './theme/header.php';
        ?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php
                    include './theme/sidebar.php';
            ?>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Vendor</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin<i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Vendor table</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-danger">
                                                <tr class="text-white">
                                                  <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Detail</th>
                                                <th scope="col">Cat_name</th>
                                                <th scope="col">Area_name</th>
                                                <th scope="col">Pic</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Mobile</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Password</th>
                                                <th scope="col">Delete</th>
                                                <th scope="col">Update</th>
  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        if (isset($_GET['did'])) {
                                            $delid = $_GET['did'];
                                            $dq = mysqli_query($connection, "delete from tbl_vendormaster where vendor_id = '{$delid}'") or die(mysqli_error($connection));
                                            if ($dq) {
                                                $dmsg = '<div class="alert alert-danger" role="alert">
                         Record Deleted
                        </div>';
                                            }
                                            echo $dmsg;
                                        }
                                        $sql = "SELECT
                                        `tbl_vendormaster`.`vendor_id`
                                        , `tbl_vendormaster`.`vendor_name`
                                        , `tbl_vendormaster`.`vendor_gender`
                                        , `tbl_vendormaster`.`vendor_details`
                                        , `tbl_category`.`category_name`
                                        , `tbl_area`.`area_name`
                                        , `tbl_vendormaster`.`vendor_photo`
                                        , `tbl_vendormaster`.`vendor_price`
                                        , `tbl_vendormaster`.`vendor_mobileno`
                                        , `tbl_vendormaster`.`vendor_email`
                                        ,`tbl_vendormaster`.`vendor_password`
                                        FROM
                                        `tbl_category`
                                        INNER JOIN `tbl_vendormaster`
                                        ON(`tbl_category`.`category_id` = `tbl_vendormaster`.`category_id`)
                                        INNER JOIN `tbl_area`
                                        ON(`tbl_area`.`area_id` = `tbl_vendormaster`.`area_id`);
                                        ";
                                        $join = mysqli_query($connection, $sql) or die(mysqli_error($connection));

                                        while ($data = mysqli_fetch_array($join)) {
                                            echo "<tr>";
                                            echo "<td>{$data['vendor_id']}</td>";
                                            echo "<td>{$data['vendor_name']}</td>";
                                            echo "<td>{$data['vendor_gender']}</td>";
                                            echo "<td>{$data['vendor_details']}</td>";
                                            echo "<td>{$data['category_name']}</td>";
                                            echo "<td>{$data['area_name']}</td>";
                                            echo "<td><img src='../upload{$data['vendor_photo']}'</td>";
                                            echo "<td>{$data['vendor_price']}</td>";
                                            echo "<td>{$data['vendor_mobileno']}</td>";
                                            echo "<td>{$data['vendor_email']}</td>";
                                            echo "<td>{$data['vendor_password']}</td>";
                                            echo "<td><button><a style='color:red;' href='view-vendor.php?did=$data[0]'>Delete</a></button></td>";
                                             echo "<td><button><a style='color:blue;' href='edit-vendor.php?uid=$data[0]'>Update</a></button></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php
        include './theme/footer.php';
        ?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
 
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
