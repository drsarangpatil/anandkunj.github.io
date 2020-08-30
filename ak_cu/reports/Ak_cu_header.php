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
    <link rel="shortcut icon" type="image/png" href="../../ak_com/assets/images/A_Logo_blue_32x32.png">
    
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
          <a class="navbar-brand" href="../index.php"> ANANDKUNJ - Retreat</a>
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
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">RT Booking <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../rt_appointment.php">Admission Booking</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../rt_appointment_up.php">Update-Admission Booking</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../reports/Rt_appointment_register.php">Booking Register</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../../ak_com/p_registration.php">Registration</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Case Sheet <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../rt_case_sheet.php">New Case-Sheet</a></li>
                        <li><a href="../rt_case_sheet_up.php">Update-Case-Sheet</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../reports/Rt_cs_register.php">Case-Sheet Register</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../rt_attendant_info.php">Attendant Information</a></li>
                        <li><a href="../rt_attendant_info.php"> Update Attendant Information</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../rt_room_allocation.php">Room Allocation</a></li>
                        <li><a href="../rt_room_allocation_up.php">Update Room Allocation</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../dir_medicine_prescription.php">Direct Medicine Prescription</a></li>
                        <li><a href="../dir_medicine_prescription_up.php"> Update Direct Medicine Prescription</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">RT Operations <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../rt_routine_treat_m_chart_todays.php">Todays Group Treatment-Male</a></li>
                        <li><a href="../rt_routine_treat_f_chart_todays.php">Todays Group Treatment-Female</a></li>
                        <li><a href="../rt_routine_diet_m_chart_todays.php">Todays Group Diet-Male</a></li>
                        <li><a href="../rt_routine_diet_f_chart_todays.php">Todays Group Diet-Female</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../rt_daily_mor_health_record.php">Daily Morning  Health Record</a></li>
                        <li><a href="../rt_daily_mor_health_record_up.php"> Update Daily Morning  Health Record</a></li>
                        <!--<li role="separator" class="divider"></li>-->
                        <li><a href="../rt_daily_aft_health_record.php">Daily Afternoon Health Record</a></li> 
                        <li><a href="rt_daily_aft_health_record_up.php"> Update Daily Afternoon Health Record</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../rt_routine_treat_m_chart.php">Morning Group Treatment-Male</a></li>
                        <li><a href="../rt_routine_treat_f_chart.php">Morning Group Treatment-Female</a></li>
                        <li><a href="../rt_routine_diet_m_chart.php">Morning Group Diet-Male</a></li>
                        <li><a href="../rt_routine_diet_f_chart.php">Morning Group Diet-Female</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../rt_daily_medicine_prescription.php">Daily Medicine Prescription</a></li>
                        <li><a href="../rt_daily_medicine_prescription_up.php">Update Daily Medicine Prescription</a></li>
                       
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">RT Payment <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../rt_billing.php">RT Bill</a></li>
                        <li><a href="../rt_billing_up.php">Update RT Bill</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../rt_payment.php">RT Payment</a></li>
                        <li><a href="../rt_payment_ad.php">Add RT Payment</a></li>
                        <li><a href="../rt_payment_up.php">Update PAN Details</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../rt_valuables_deposit_received.php">Deposit Received</a></li>
                        <li><a href="../rt_valuables_deposit_received_up.php">Update-Deposit Received</a></li>
                        <li><a href="../rt_valuables_deposit_returned.php">Deposit Returned</a></li>
                        <li><a href="../rt_valuables_deposit_returned_ad.php">Add-Deposit Returned</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../reports/Rt_billing_report.php">RT Bill Register</a></li>
                        <li><a href="../reports/Rt_payment_report.php">RT Payment Register</a></li>
                        <li><a href="../reports/Rt_deposit_received_report.php">Deposit Received Register</a></li>
                        <li><a href="../reports/Rt_deposit_returned_report.php">Deposit Returned Register</a></li>
                    </ul>
                </li> 
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Discharge <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../rt_followup_prescription.php">Follow-up Prescription</a></li>
                        <li><a href="../rt_followup_prescription_up.php"> Update Follow-up Prescription</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../rt_discharge_sheet.php">Discharge Summary</a></li>
                        <li><a href="../rt_discharge_sheet_up.php"> Update Discharge Summary</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../rt_gate_pass_clearance.php">Gate Pass Clearance</a></li>
                        <li><a href="../rt_gate_pass_clearance.php"> Update Gate Pass Clearance</a></li>
                    </ul>
                </li>
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../reports/Rt_appointment_register.php">RT Appointment Register</a></li>
                        <!--<li role="separator" class="divider"></li>-->
                        <li><a href="../reports/Rt_cs_register.php">RT CS Register</a></li>
                         <li><a href="../reports/Rt_cs_register_Dwise.php">Disease-wise CS Register</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../reports/Rt_room_allocation_chart.php">Room Register</a></li>
                        <li><a href="../reports/Rt_attendant_register.php">Attendant Register</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../reports/Rt_daily_treat_chart_Thwise.php">Daily Treatment Chart</a></li>
                        <li><a href="../reports/Rt_treat_chart.php">Treatment Chart</a></li>
                        <li><a href="../reports/Rt_treat_chart_Thwise.php">Therapist-wise Tx Chart</a></li>
                        <li><a href="../reports/Rt_treat_chart_Dtwise.php">Date-wise Tx Chart</a></li>
                        <li><a href="../reports/Rt_daily_diet_chart.php">Daily Diet Chart</a></li>
                        <li><a href="../reports/Rt_diet_chart.php">RT Diet Chart</a></li>
                        <!--<li role="separator" class="divider"></li>-->
                        <li><a href="../reports/Rt_medicine_chart.php">RT Medicine Chart</a></li>
                        <li><a href="../reports/Rt_daily_health_record.php">Daily Health Record Register</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../reports/Rt_discharge_register.php">Discharge Register</a></li>
                        <li><a href="../reports/Rt_followup_register.php">Followup Register</a></li>
                        <li><a href="../reports/Rt_followup_ls_inst_chart.php">Followup Inst Chart</a></li>
                        <li><a href="../reports/Rt_followup_medicine_chart.php">Followup Medicine Chart</a></li>
                        <li><a href="../reports/Rt_gate_pass_clearance_register.php">Gate-pass Register</a></li>
                    </ul>
              </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../../ak_com/disease_category.php">Disease Category</a></li>
                        <li><a href="../../ak_com/disease_name.php">Disease Name</a></li>
                        <li><a href="../../ak_com/disease_nick.php">Disease Nick</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../../ak_com/medicine_names.php">Medicine Name</a></li>
                        <li><a href="../../ak_com/life_style_instructions.php">LS Instructions</a></li>
                        <li><a href="../../ak_com/treatment_name.php">Treatment Name</a></li>
                        <li><a href="../../ak_com/therapy_dept.php">Therapy Department</a></li>
                        <li><a href="../../ak_com/treatment_time.php">Treatment Time</a></li>
                        <li><a href="../../ak_com/p_registration.php">Therapist Name</a></li>
                        <li><a href="../../ak_com/diet_name.php">Diet Menu</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../building_name.php">Building Name</a></li>
                        <li><a href="../building_name_up.php">Update-Building Name</a></li>
                        <li><a href="room_number.php">Room Number</a></li>
                        <li><a href="../room_number_up.php">Update-Room Number</a></li>
                        <li><a href="../rt_retreat_name.php">Retreat Name</a></li>
                        <li><a href="../rt_retreat_name_up.php">Update-Retreat Name</a></li>
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