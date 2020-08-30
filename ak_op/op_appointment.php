<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_op_header.php';?>

<title>OP Appointment Scheduling </title>

</head>
<body>
<script src="js/myjs/get_op_appointment_up.js"></script>
<!-- JS script for print button====================== -->
<script>    
    function printRepo_a()
    {
        url ="";
        url=document.URL;
        url=url.replace("op_appointment.php", "reports/Op_appointment_register.php");
        //alert (url)
        window.open(url);

        //alert("sadsad");
    }
</script>
    
        
    <form action="database/Op_appointment.php" method="post">
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>OP Appointment Scheduling</b></h4>
<!-- Fetched All OP Appointment Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Pending OP Appointments 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Session</th>
                                    <th>Time</th>
                                    <th>P. Name</th>
                                    <th>Place</th>
                                    <th>Mobile</th>
                                    <th>A. Type</th>
                                    <th>A. With</th>
                                    <th>A. Purpose</th>
                                </tr>
                            </thead>
                            <tbody id="all_op_appointment_records">	
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched All OP Appointment Records Pannel Ends================================= -->
<!--Personal Information ================================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                <div class="panel-heading">
                    Personal Information
                </div>
                    <div class="panel-body">
                         <div class="form-group col-sm-8">
                            <label>Full Name:</label>
                                <div class="form-group">
                                 <input type="text" class="form-control"
                                    id="full_name" name="full_name" placeholder="Sachin Ramesh Tendulkar"required> 
                            </div>
                        </div>                        
                        <div class="form-group col-sm-2">
                            <label>Age:</label>
                                <div class="form-group">
                                <input type="number" class="form-control"
                                   id="age" name="age"
                                   placeholder="20 years"required>
                              </div>
                       </div>
                        <div class="form-group col-sm-2">
                            <label>Gender:</label>
                              <div class="form-group">
                                <select class="form-control" 
                                    id="gender" name="gender" required>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                              </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>At Post</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                   id="at_post" name="at_post"
                                   placeholder="City Name"required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Mobile No.</label>
                            <div class="form-group">
                                <input type="number" class="form-control"
                                   id="mobile_no" name="mobile_no"
                                   placeholder="Mobile Number"required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Email ID</label>
                            <div class="form-group">
                                <input type="email" class="form-control"
                                   id="email" name="email"
                                   placeholder="Email@address"required>
                            </div>
                        </div>
                       </div>
                    </div>
                </div>
<!--Personal Information ends ========================================= -->
<!--OP Appointment  Info Starts========================================= -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    OP Appointment Information
                </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-3">
                            <label>Appointment Date:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                       id="ap_date" name="ap_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Appointment Session:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="ap_session" name="ap_session" required>
                                    <option>Morning</option>
                                    <option>Afternoon</option>
                                    <option>Evening</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Appointment Time:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="ap_time" name="ap_time" required>
                                    <option>09.00 AM</option><option>09.30 AM</option><option>10.00 AM</option><option>10.30 AM</option><option>11.00 AM</option><option>11.30 AM</option><option>12.00 PM</option><option>12.30 PM</option><option>01.00 PM</option><option>03.00 PM</option><option>03.30 PM</option><option>04.00 PM</option><option>04.30 PM</option><option>05.00 PM</option><option>05.30 PM</option><option>06.00 PM</option><option>06.30 PM</option><option>07.00 PM</option><option>07.30 PM</option><option>08.00 PM</option><option>08.30 PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>User ID:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?>readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Appointment Type:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="ap_type" name="ap_type" required>
                                    <option>OP New</option>
                                    <option>OP Old</option>
                                    <option>RT Followup</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Appointment With:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="ap_with" name="ap_with" required>
                                    <option>Dr. Sarang Patil</option>
                                    <option>Dr. Nitin Patil</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group col-sm-3">
                            <label>Appointment Purpose:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                   id="ap_purpose" name="ap_purpose"
                                   placeholder=" Nature of Illness"required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Appointment Status:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="ap_status" name="ap_status" required>
                                    <option>Pending</option>
                                </select>
                            </div>
                        </div>
                        </div>
                    </div>
<!--OP Appointment  Info ends========================================= -->
                    <div class="form-group col-sm-6">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </div>
                     <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Appointment Chart</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="op_appointment_up.php">Reschedule  OP Appointment</a>
                         </div>
                    </div>
			     </div>
<?php include'../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>
