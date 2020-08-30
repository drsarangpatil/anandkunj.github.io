<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Bootstrap files-->
    <link rel="stylesheet" href="../ak_com/assets/css/bootstrap.3.4.1.min.css">
    
    <!--Fontawesome files-->
    <link rel="stylesheet" href="../ak_com/assets/fonts/font-awesome.min.css">
    
    <!--Jquery files-->
    <script src="../ak_com/assets/js/jquery.3.3.1.min.js"></script>
    <script src="../ak_com/assets/js/bootstrap.3.4.1.min.js"></script>
    
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="../ak_com/assets/images/A_Logo_blue_32x32.png">
    
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
          <a class="navbar-brand" href="index.php"> ANANDKUNJ - Student</a>
        </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="../Logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
                <li>
                    <img class="img-circle" width="40" height="50" src="../ak_com/database/photos/<?php echo $_SESSION['user_photo'];?>"> 
                </li>  
            </ul> 
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="../home.php"><span class="glyphicon glyphicon-home"></span></a>
                </li>
                <li>
                    <a href="../ak_com/p_registration.php">Registration</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Course Application From <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="st_course_application_from.php">New Application From</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="st_course_application_from_up.php">Update Application From</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="reports/St_student_register.php">Student Register</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Operations <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="st_billing.php">Course Billing</a></li>
                        <li><a href="st_payment.php">Fees Payment</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="st_course_material_dispatch.php">Course Material Dispatch</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="st_assignment_allocation.php">Assignment Allocation</a></li>
                        <li><a href="st_assignment_submission.php">Assignment Submission</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="st_practicals_allocation.php">Practicals Allocation</a></li>
                        <li><a href="st_practicals_completion.php">Practicals Completion</a></li>
                    </ul>
                </li> 
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Update<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="st_course_application_from_up.php">Update-Application From</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="st_billing_up.php">Update-Billing</a></li>
                        <li><a href="st_payment_ad.php">Add Payment</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="st_course_material_dispatch_up.php">Course Material Dispatch</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="st_assignment_allocation_up.php">Assignment Allocation</a></li>
                        <li><a href="st_assignment_submission_up.php">Assignment Submission</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="st_practicals_allocation_up.php">Practicals Allocation</a></li>
                        <li><a href="st_practicals_completion_up.php">Practicals Completion</a></li>
                    </ul>
              </li>
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="reports/St_student_register.php">Student Register</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="reports/St_billing_report.php">Billing Register</a></li>
                        <li><a href="reports/St_payment_report.php">Payment Register</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="reports/St_course_material_register.php">Course Material Register</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="reports/St_assignment_allocation_register.php">Assignment Allocation Register</a></li>
                         <li><a href="reports/St_assignment_submission_register.php">Assignment Submission Register</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="reports/St_practicals_allocation_register.php">Practicals Allocation Register</a></li>
                        <li><a href="reports/St_practicals_completion_register.php">Practicals Completion Register</a></li>
                    </ul>
              </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="st_course_name.php">Course Name</a></li>
                        <li><a href="st_course_name_up.php">Update-Course Name</a></li>
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
               <a href="../ak_op/index.php"><span class="glyphicon glyphicon-tint" style="font-size:13px"></span> OPD</a>
                <a href="../ak_rt/index.php"><span class="glyphicon glyphicon-leaf" style="font-size:13px"></span> Retreat</a>
                <a href="../ak_stu/index.php"><span class="glyphicon glyphicon-education" style="font-size:13px"></span> Student</a>
                <a href="../ak_sb/index.php"><span class="glyphicon glyphicon-book" style="font-size:13px"></span> Subscription</a>
                <a href="../ak_mb/index.php"><span class="glyphicon glyphicon-user" style="font-size:13px"></span> Membership</a>
                <!--<a href="../ak_cu/index.php"><span class="glyphicon glyphicon-bullhorn" style="font-size:13px"></span> Commune</a>-->
                <a href="../ak_li/index.php"><span class="glyphicon glyphicon-duplicate" style="font-size:13px"></span> Library</a>
                <a href="../ak_re/index.php"><span class="glyphicon glyphicon-filter" style="font-size:13px" ></span> Research</a>
                <a href="../ak_sto/index.php"><span class="glyphicon glyphicon-th" style="font-size:13px"></span>   Store</a>
                <a href="../ak_ac/index.php"><span class="glyphicon glyphicon-save" style="font-size:13px"></span> Accounts</a>
                <a href="../ak_com/index.php"><span class="glyphicon glyphicon-cog" style="font-size:13px"></span> Settings</a>
             </div>
            </ul>
      </div>
<!-- Side NavBar End================================================== -->
    </div>
</div>
    </header>