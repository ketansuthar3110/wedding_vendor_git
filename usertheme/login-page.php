<?php
session_start();
require './class/connection.php';

if ($_POST) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $select = mysqli_query($connection, "select * from tbl_user where user_email = '{$email}' and user_password = '{$pass}'") or die(mysqli_error($connection));
    $count = mysqli_num_rows($select);
    $row = mysqli_fetch_array($select);
    if ($count > 0) {
        $_SESSION['userid'] = $row['user_id'];
        $_SESSION['username'] = $row['user_name'];
        header("location:index.php");
    } else {
        echo "email or password not match";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Wedding Vendor | Find The Best Wedding Vendors</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Template style.css -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <!-- Font used in template -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,300italic,300' rel='stylesheet' type='text/css'>
        <!--font awesome icon -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- favicon icon -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        
        <![endif]-->
        <script src="jquery-3.6.0.js" type="text/javascript"></script>
    <script src="jquery.validate.js" type="text/javascript"></script>
 <script>
            $(document).ready(function()
            {
                $("#myform").validate();
            });
            
        </script>
        <style>
            .error{
                color: red;
            }
            </style>
    </head>

    <body>
        <div class="collapse" id="searcharea">
            <!-- top search -->
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button">Search</button>
                </span>
            </div>
        </div>
        <!-- /.top search -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 top-message">
                        <p>Hi Welcome to Wedding Vendor.</p>
                    </div>
                    <div class="col-md-6 top-links">
                        <ul class="listnone">
                            <li><a href="faq.html"> Help </a></li>
                            <li><a href="pricing-plan.html">Pricing</a></li>
                            <li><a href="signup-couple.html" class=" ">I m couple</a></li>
                            <li><a href="signup-vendor.html">Are you vendor?</a></li>
                            <li><a href="login-page.php">Log in</a></li>

                            <li>
                                <a role="button" data-toggle="collapse" href="#searcharea" aria-expanded="false" aria-controls="searcharea"> <i class="fa fa-search"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12 logo">
                        <div class="navbar-brand">
                            <a href="index.html"><img src="images/logo.png" alt="Wedding Vendors" class="img-responsive"></a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="navigation" id="navigation">
                            <ul>
                                <li class="active"><a href="index.html">Home</a>
                                    <ul>
                                        <li><a href="index.html" title="Home" class="animsition-link">Home</a></li>
                                        <li><a href="index-2.html" title="Home v.2" class="animsition-link">Home v.2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Listing</a>
                                    <ul>
                                        <li><a href="vendor-listing-row-map.html" title="Home" class="animsition-link">List / Half Map</a></li>
                                        <li><a href="vendor-listing-sidebar.html" title="Home" class="animsition-link">List / Sidebar Left</a></li>
                                        <li><a href="vendor-listing-no-sidebar.html" title="Home" class="animsition-link">List / No Sidebar</a></li>
                                        <li><a href="vendor-listing-top-map.html" title="Home" class="animsition-link">Top Map / List</a></li>
                                        <li><a href="vendor-list-4-colmun.html" title="Home" class="animsition-link">4 Column List</a></li>
                                        <li><a href="vendor-list-3-colmun.html" title="Home" class="animsition-link">3 Column List</a></li>
                                        <li><a href="vendor-list-horizontal.html" title="Home" class="animsition-link">Horizontal List </a></li>
                                        <li><a href="vendor-list-new.html" title="Home" class="animsition-link">List Variations </a></li>
                                        <li><a href="vendor-listing-bubba.html">Bubba Style Listing</a></li>
                                        <li><a href="vendor-listing-ocean.html">Ocean Style Listing</a></li>
                                    </ul>
                                </li>
                                <li><a href="vendor-details.html">Vendor</a>
                                    <ul>
                                        <li><a href="vendor-details.html">Vendor Simple</a></li>
                                        <li><a href="vendor-details-tabbed.html">Vendor Tabbed</a></li>
                                        <li><a href="vendor-profile.html">Vendor Profile</a></li>
                                    </ul>
                                </li>
                                <li><a href="venue-listing.html" title="Home" class="animsition-link">Suppliers</a>
                                    <ul>
                                        <li><a href="venue-listing.html">Venue List</a></li>
                                        <li><a href="photography-listing.html">Photographer List</a></li>
                                        <li><a href="dresses-listing.html">Dresses List</a></li>
                                        <li><a href="florist-listing.html">Florist List</a></li>
                                        <li><a href="videography-listing.html">Videography List</a></li>
                                        <li><a href="cake-listing.html">Cake List</a></li>
                                        <li><a href="music-listing.html">Music List</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Planning Tools</a>
                                    <ul>
                                        <li><a href="planning-to-do.html">To Do List</a></li>
                                        <li><a href="planning-budget.html">Budget Planner</a></li>
                                        <li><a href="couple-landing-page.html">Couple Signup (LP)</a></li>
                                        <li><a href="couple-dashboard.html">Couple Admin</a></li>
                                        <li><a href="dashboard-vendor.html">Vendor Admin</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Features</a>
                                    <ul>
                                        <li><a href="#">Blog</a>
                                            <ul>
                                                <li><a href="blog.html">Blog Listing</a></li>
                                                <li><a href="blog-single.html">Blog Single</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about-us.html">About us</a></li>
                                        <li><a href="contact-us.html">Contact us</a></li>
                                        <li><a href="pricing-plan.html">Pricing Table</a></li>
                                        <li><a href="faq.html">FAQ's</a></li>
                                        <li><a href="404-error.html">404 Error</a></li>
                                        <li><a href="#">Shortcodes</a>
                                            <ul>
                                                <li><a href="shortcode-columns.html">Column</a></li>
                                                <li><a href="shortcode-accordion.html">Accordion</a></li>
                                                <li><a href="shortcode-tabs.html">Tabs</a></li>
                                                <li><a href="shortcode-pagination.html">Paginations</a></li>
                                                <li><a href="shortcode-typography.html">Typography</a></li>
                                                <li><a href="shortcode-accordion.html">Accordion</a></li>
                                                <li><a href="shordcods-alerts.html">Alert</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="wedding-guideline.html">Template Guideline</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Real Weddings</a>
                                    <ul>
                                        <li><a href="real-wedding-listing.html">Listing</a></li>
                                        <li><a href="real-wedding-single.html">Real Wedding Single</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="tp-page-head">
            <!-- page header -->
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="page-header text-center">
                            <div class="icon-circle">
                                <i class="icon icon-size-60 icon-padlock-1 icon-white"></i>
                            </div>
                            <h1>User login</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.page header -->
        <div class="tp-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Login User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 st-tabs">
                        <!-- Nav tabs -->
                        <div class="well-box">
                            <h3>User Login</h3>
                            <form method="post" id="myform">
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="control-label" for="email">E-mail<span class="required">*</span></label>
                                    <input id="email" name="email" type="text" placeholder="E-Mail" class="form-control input-md" required>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="control-label" for="password">Password<span class="required">*</span></label>
                                    <input id="password" name="password" type="text" placeholder="Password" class="form-control input-md" required>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <button id="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
                                    <a href="forget-password-user.php" class="pull-right"> <small>Forgot Password ?</small></a>
                                    <div class="form-group">
                                        <label class="control-label" for="user">Don't have an account?<a href="signup-user.php"><b>Register</b></a></label>
                                        <div class="form-group">
                                        <label class="control-label" for="vendor">Are you a vendor?<a href="login-vendor.php"><b>Login</b></a></label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>

                </div>
            </div>
            <?php
            include './theme/footer.php';
            ?>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="js/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
            <!-- Flex Nav Script -->
            <script src="js/jquery.flexnav.js" type="text/javascript"></script>
            <script src="js/navigation.js"></script>
            <script src="js/jquery.sticky.js"></script>
            <script src="js/header-sticky.js"></script>
    <script src="jquery.validate.js" type="text/javascript"></script>
     <script>
            $(document).ready(function()
            {
                $("#myform").validate();
            });
              
        </script>
        </body>

</html>
