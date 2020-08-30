<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Bootstrap files-->
    <link rel="stylesheet" href="../../ak_com/assets/css/bootstrap.3.4.1.min.css">
    
    <!--Fontawesome files-->
    <link rel="stylesheet" href="../../ak_com/assets/fonts/font-awesome.min.css">
    
    <!--Jquery files-->
    <script src="../../ak_com/assets/js/jquery.3.3.1.min.js"></script>
    <script src="../../ak_com/assets/js/bootstrap.3.4.1.min.js"></script>
    
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="../../ak_com/assets/images/A_Logo_sky_blue_32x32.png">
    
        <!--DataTables JS Files--> 
    <script src="../../ak_com/assets/js/report/1.10.19-js-jquery.dataTables.min.js"></script>  
    <script src="../../ak_com/assets/js/report/1.10.19-js-dataTables.bootstrap.min.js"></script>
    <script src="../../ak_com/assets/js/report/buttons-1.5.2-js-dataTables.buttons.min.js"></script>
    <script src="../../ak_com/assets/js/report/ajax-libs-jszip-3.1.3-jszip.min.js"></script> 
    <script src="../../ak_com/assets/js/report/ajax-libs-pdfmake-0.1.36-pdfmake.min.js"></script> 
    <script src="../../ak_com/assets/js/report/ajax-libs-pdfmake-0.1.36-vfs_fonts.js"></script> 
    <script src="../../ak_com/assets/js/report/buttons-1.5.2-js-buttons.html5.min.js"></script>
    <script src="../../ak_com/assets/js/report/buttons-1.5.2-js-buttons.print.min.js"></script>
    
    <!--DataTables CSS Files--> 
    <!--<link rel="stylesheet" href="../../ak_com/assets/css/report/1.10.19-css-jquery.dataTables.min.css" />-->
    <link rel="stylesheet" href="../../ak_com/assets/css/report/1.10.19-css-dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="../../ak_com/assets/css/report/buttons-1.5.2-css-buttons.dataTables.min.css"/>
    
    <!--DataTables Display JS-->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable( {
                "pageLength": 5,
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'print',
                ]
            } );
            } );
    </script>
    
    
    <!--Style for Top/Side Nav Bar-->
    <style>
        /*
         * Base structure
         */

        /* Move down content because we have a fixed navbar that is 50px tall */
        body {
          padding-top: 50px;
        }


        /*
         * Global add-ons
         */

        .sub-header {
          padding-bottom: 10px;
          border-bottom: 1px solid #eee;
        }

        /*
         * Top navigation
         * Hide default border to remove 1px line.
         */
        .navbar-fixed-top {
          border: 0;
        }

        /*
         * Sidebar
         */

        /* Hide for mobile, show later */
        .sidebar {
          display: none;
        }
        @media (min-width: 768px) {
          .sidebar {
            position: fixed;
            top: 51px;
            bottom: 0;
            left: 0;
            z-index: 1000;
            display: block;
            padding: 20px;
            overflow-x: hidden;
            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
            background-color: #f5f5f5;
            border-right: 1px solid #eee;
          }
        }

        /* Sidebar navigation */
        .nav-sidebar {
          margin-right: -21px; /* 20px padding + 1px border */
          margin-bottom: 20px;
          margin-left: -20px;
        }
        .nav-sidebar > li > a {
          padding-right: 20px;
          padding-left: 20px;
        }
        .nav-sidebar > .active > a,
        .nav-sidebar > .active > a:hover,
        .nav-sidebar > .active > a:focus {
          color: #fff;
          background-color: #428bca;
        }


        /*
         * Main content
         */

        .main {
          padding: 20px;
        }
        @media (min-width: 768px) {
          .main {
            padding-right: 40px;
            padding-left: 40px;
          }
        }
        .main .page-header {
          margin-top: 0;
        }


        /*
         * Placeholder dashboard ideas
         */

        .placeholders {
          margin-bottom: 30px;
          text-align: center;
        }
        .placeholders h4 {
          margin-bottom: 0;
        }
        .placeholder {
          margin-bottom: 20px;
        }
        .placeholder img {
          display: inline-block;
          border-radius: 50%;
        }
    
    </style>
    <!--Style for Vertical Nav Bar -->
    <style>
        .vertical-menu {
        background-color: #7386D5;
        /*color: black;*/
        display: block;
        padding: 4px;
        text-decoration: none;
        border-top-left-radius:4px;
        border-bottom-left-radius:4px;
        border-top-right-radius:4px;
        border-bottom-right-radius:4px;
        font-size: 16px;
        }

        .vertical-menu a {
        background-color: #2c2c2c;
        color: black;
        display: block;
        padding: 12px;
        text-decoration: none;
        color: white;

        }

        .vertical-menu a:hover {
        background-color: #ccc;

        }

        .vertical-menu a.active {
        background-color: #2c2c2c;
        color: white;
        }
    </style>
    <!--JS for Vertical Nav Bar -->
    <script>
        $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
        });
        });
    </script>
    
    <header> 
<!-- Fixed Top NavBar Start ================================================== -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php"> ANANDKUNJ - Subscription</a>
        </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="../../Logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
                <li>
                    <img class="img-circle" width="40" height="50" src="../../ak_com/database/photos/<?php echo $_SESSION['user_photo'];?>"> 
                </li>  
            </ul> 
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="../../home.php"><span class="glyphicon glyphicon-home"></span></a>
                </li>
                <li>
                    <a href="../../ak_com/p_registration.php">Registration</a>
                </li>
                <li>
                    <a href="../sb_subscription_form.php">Subscription Form</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Operations <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../sb_payment.php">Subscription Payment</a></li>
                        <li><a href="../sb_subscription_deactivation.php">Subscription Deactivation</a></li>
                        <li><a href="../../ak_sb/reports/Sb_all_subscribers_report.php">Subscription Reminder</a></li>
                    </ul>
                </li> 
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Update <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../sb_subscription_form_up.php">Subscription Form</a></li>
                        <li><a href="../sb_payment.php">Subscription Payment</a></li>
                    </ul>
                </li>  
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../reports/Sb_all_subscribers_report.php">Subscription Register</a></li>
                        <li><a href="../reports/Sb_ss_subscribers_report.php">SS Subscribers Register</a></li>
                        <li><a href="../reports/Sb_un_subscribers_report.php">UN Subscribers Register</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../reports/Sb_all_payment_report.php">ALL Payment Register</a></li>
                        <li><a href="../reports/Sb_ss_payment_report.php">SS Payment Register</a></li>
                        <li><a href="../reports/Sb_un_payment_report.php">UN Payment Register</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../sb_magazine_name.php">Magazine Name</a></li>
                        <li><a href="../sb_subscription_type.php">Subscription Type</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../sb_magazine_name_up.php">Update-Magazine Name</a></li>
                        <li><a href="../sb_subscription_type_up.php">Update-Subscription Type</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<!-- Top NavBar End ================================================== -->
<!-- Side NavBar Start================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <div class="vertical-menu">  
               <a href="../../ak_op/index.php"><span class="glyphicon glyphicon-tint" style="font-size:13px"></span> OPD</a>
                <a href="../../ak_rt/index.php"><span class="glyphicon glyphicon-leaf" style="font-size:13px"></span> Retreat</a>
                <a href="../../ak_stu/index.php"><span class="glyphicon glyphicon-education" style="font-size:13px"></span> Student</a>
                <a href="../../ak_sb/index.php"><span class="glyphicon glyphicon-book" style="font-size:13px"></span> Subscription</a>
                <a href="../../ak_mb/index.php"><span class="glyphicon glyphicon-user" style="font-size:13px"></span> Membership</a>
                <!--<a href="../../ak_cu/index.php"><span class="glyphicon glyphicon-bullhorn" style="font-size:13px"></span> Commune</a>-->
                <a href="../../ak_li/index.php"><span class="glyphicon glyphicon-duplicate" style="font-size:13px"></span> Library</a>
                <a href="../../ak_re/index.php"><span class="glyphicon glyphicon-filter" style="font-size:13px" ></span> Research</a>
                <a href="../../ak_sto/index.php"><span class="glyphicon glyphicon-th" style="font-size:13px"></span> Store</a>
                <a href="../../ak_ac/index.php"><span class="glyphicon glyphicon-save" style="font-size:13px"></span> Accounts</a>
                <a href="../../ak_com/index.php"><span class="glyphicon glyphicon-cog" style="font-size:13px"></span> Settings</a>
             </div>
            </ul>
      </div>
<!-- Side NavBar End================================================== -->
    </div>
</div>
    </header>