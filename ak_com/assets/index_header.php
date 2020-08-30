<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Bootstrap files-->
    <link rel="stylesheet" href="./ak_com/assets/css/bootstrap.3.4.1.min.css">
    
    <!--Fontawesome files-->
    <link rel="stylesheet" href="./ak_com/assets/fonts/font-awesome.min.css">
    
    <!--Jquery files-->
    <script src="./ak_com/assets/js/jquery.3.3.1.min.js"></script>
    <script src="./ak_com/assets/js/bootstrap.3.4.1.min.js"></script>
    
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="./ak_com/assets/images/A_Logo_red_32x32.png">
    <!--Style for Top Nav Bar-->
     <style>
        /* GLOBAL STYLES
        -------------------------------------------------- */
        /* Padding below the footer and lighter body text */

        body {
          padding-top: 70px;
          padding-bottom: 40px;
          color: #5a5a5a;
        }


        /* CUSTOMIZE THE NAVBAR
        -------------------------------------------------- */

        /* Special class on .container surrounding .navbar, used for positioning it into place. */
        .navbar-wrapper {
          position: absolute;
          top: 0;
          right: 0;
          left: 0;
          z-index: 20;
        }

        /* Flip around the padding for proper display in narrow viewports */
        .navbar-wrapper > .container {
          padding-right: 0;
          padding-left: 0;
        }
        .navbar-wrapper .navbar {
          padding-right: 15px;
          padding-left: 15px;
        }
        .navbar-wrapper .navbar .container {
          width: auto;
        }


        /* CUSTOMIZE THE CAROUSEL
        -------------------------------------------------- */

        /* Carousel base class */
        .carousel {
          height: 290px;
          margin-bottom: 20px;
          }
          /* Since positioning the image, we need to help out the caption */
          .carousel-caption {
          z-index: 10;
          }

          /* Declare heights because of positioning of img element */
          .carousel .item {
          height: 290px;
          background-color: #777;
          }
          .carousel-inner > .item > img {
          position: absolute;
          top: 0;
          left: 0;
          min-width: 100%;
          height: 290px;
          }


        /* MARKETING CONTENT
        -------------------------------------------------- */

        /* Center align the text within the three columns below the carousel */
        .marketing .col-lg-4 {
          margin-bottom: 20px;
          text-align: center;
        }
        .marketing h2 {
          font-weight: normal;
        }
        .marketing .col-lg-4 p {
          margin-right: 10px;
          margin-left: 10px;
        }


        /* Featurettes
        ------------------------- */

        .featurette-divider {
          margin: 80px 0; /* Space out the Bootstrap <hr> more */
        }

        /* Thin out the marketing headings */
        .featurette-heading {
          font-weight: 300;
          line-height: 1;
          letter-spacing: -1px;
        }


        /* RESPONSIVE CSS
        -------------------------------------------------- */

        @media (min-width: 768px) {
          /* Navbar positioning foo */
          .navbar-wrapper {
            margin-top: 20px;
          }
          .navbar-wrapper .container {
            padding-right: 15px;
            padding-left: 15px;
          }
          .navbar-wrapper .navbar {
            padding-right: 0;
            padding-left: 0;
          }

          /* The navbar becomes detached from the top, so we round the corners */
          .navbar-wrapper .navbar {
            border-radius: 4px;
          }

          /* Bump up size of carousel content */
          .carousel-caption p {
            margin-bottom: 20px;
            font-size: 21px;
            line-height: 1.4;
          }

          .featurette-heading {
            font-size: 50px;
          }
        }

        @media (min-width: 992px) {
          .featurette-heading {
            margin-top: 120px;
          }
        }
    </style>
    <!--Style for Vertical Nav Bar -->
    <style>
        .vertical-menu {
        width: 150px;
        background-color: #2c2c2c;
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

        .dropdown-submenu {
        position: relative;
        }

        .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
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
        <div class="navbar-header" >
          <a class="navbar-brand" href="index.php"> ANANDKUNJ MANAGMENT SYSTEM</a>
        </div>
           <!-- <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
                <li>
                    <img class="img-circle" width="40" height="50" src="./ak_com/images/a25.jpg">
                </li>  
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="index.php"><span class="glyphicon glyphicon-home"></span></a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-edit"></span> Registration<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="./ak_com/p_registration.php"> New Registration</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="./ak_com/p_registration.php">Update Registration</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="./ak_com/reports/P_registration_mini_report.php">Registration Mini Register</a></li>
                        <li><a href="./ak_com/reports/P_registration_report.php">Registration Register</a></li>
                        <li><a href="./ak_com/reports/P_registration_card.php">Registration Card</a>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="./ak_com/nation.php">Add Nation</a></li>
                        <li><a href="./ak_com/state.php">Add State</a></li>
                        <li><a href="./ak_com/district.php">Add District</a></li>
                        <li><a href="./ak_com/tahsil.php">Add Tahsil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="./ak_com/nation_up.php">Update Nation</a></li>
                        <li><a href="./ak_com/state_up.php">Update State</a></li>
                        <li><a href="./ak_com/district_up.php">Update District</a></li>
                        <li><a href="./ak_com/tahsil_up.php">Update Tahsil</a></li>
                    </ul>
                </li>
            </ul>-->
      </div>
    </nav>
<!-- Top NavBar End ================================================== -->
<!-- Side NavBar Start================================================== --> 
            <div class="container col-sm-1">
                  <!--<div class="vertical-menu">  
                    <a href="./ak_op/index.php"><span class="glyphicon glyphicon-tint" style="font-size:13px"></span> OPD</a>
                    <a href="./ak_rt/index.php"><span class="glyphicon glyphicon-leaf" style="font-size:13px"></span> Retreat</a>
                    <a href="./ak_stu/index.php"><span class="glyphicon glyphicon-education" style="font-size:13px"></span> Student</a>
                    <a href="./ak_sb/index.php"><span class="glyphicon glyphicon-book" style="font-size:13px"></span> Subscription</a>
                    <a href="./ak_mb/index.php"><span class="glyphicon glyphicon-user" style="font-size:13px"></span> Membership</a>
                    <a href="./ak_cu/index.php"><span class="glyphicon glyphicon-bullhorn" style="font-size:13px"></span> Commune</a>
                    <a href="./ak_li/index.php"><span class="glyphicon glyphicon-duplicate" style="font-size:13px"></span> Library</a>
                    <a href="./ak_re/index.php"><span class="glyphicon glyphicon-filter" style="font-size:13px" ></span> Research</a>
                    <a href="./ak_sto/index.php"><span class="glyphicon glyphicon-th" style="font-size:13px"></span>   Store</a>
                    <a href="./ak_ac/index.php"><span class="glyphicon glyphicon-save" style="font-size:13px"></span> Accounts</a>
                    <a href="./ak_com/index.php"><span class="glyphicon glyphicon-cog" style="font-size:13px"></span> Settings</a>
                </div>-->
            </div>
<!-- Side NavBar End================================================== -->
    </header> 
    