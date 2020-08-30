<?php
if(session_id() == '') 
    session_start();
?>
<?php include 'Ak_op_header.php';?>

<title>Daily Pending OP Appointments</title>

</head>
<body>

 <!--JS script for display button======== -->      
    <script>
      
        function dispRepo()
        {
            url ="";

            url += "Op_daily_pending_appointments.php?ap_with=" + document.getElementById("ap_with").value;
            location.replace(url);
            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Op_daily_pending_appointments.php", "print/Op_daily_pending_appointments_print.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }

    </script>
        
        <form action="" method="POST" class="form-inline" >
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b> Daily Pending OP Appointments</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    Daily Pending OP Appointments
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>Appointment With:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="ap_with" name="ap_with" required>
                                    <option></option>
                                    <option>Dr. Sarang Patil</option>
                                    <option>Dr. Nitin Patil</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label></label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary pull-center" onclick="dispRepo()"> Display</button>
                                <button type="button" class="btn btn-primary pull-center"  onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Print</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> Daily Pending OP Appointments - <span><?php echo date("d-m-Y");?></span></b></h5>
                <p style= "color:slateBlue"> For OP Appointment Alert Email Ctrl+Click Name; For OP Appointment Alert SMS Ctrl+Click Mobile </p>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <!--<th>ID</th>-->
                                <!--<th>Date</th>-->
                                <th>Session</th>
                                <th>Time</th>
                                <th>Name</th>
                                <th>Place</th>
                                <th>Mobile</th>
                                <th>Ap Type</th>
                                <th>Ap With</th>
                                <th>Ap Purpose</th>
                                <th>Ap Status</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for OP Appointment Register Table Starts =============================== -->
                            <?php 
                                include( "../database/Config.php");
                                $data = new myConfig();

                                $retStr = "";
                                try
                                {
                                    $con = mysqli_connect($data->host, $data->user, $data->password,$data->db);
                                    if (!$con)
                                        echo('Could not connect: ' . mysql_error());
                                    else
                                    {
                                        mysqli_set_charset( $con, 'utf8' );
                                        
                                        $to_date = date("Y-m-d");

                                        $query="SELECT  op_ap_id, ap_date, ap_session, ap_time, full_name, at_post, mobile_no, ap_type, ap_with, ap_purpose, ap_status FROM ak_op_appointment WHERE ap_status='Pending'";
                                        $query = $query . " and  ( ap_date ='". $to_date . "')";


                                        if( isset($_GET["ap_with"]))
                                            if( $_GET["ap_with"]!=="")
                                            {
                                                $query = $query .   " and ( ap_with ='".  $_GET["ap_with"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                               echo '<td align="left">' . $i . '</td>';
                                                //echo '<td align="left">' . $record[0] . '</td>';
                                                //echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="left">' . $record[2] . '</td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left"><a href= "print/Op_ap_alert_email.php?apid=' .$record[0] . '">' . $record[4] . '</a></td>';
                                                echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="left"><a href= "print/Op_ap_alert_sms.php?apid=' .$record[0] . '">' . $record[6] . '</a></td>';
                                                echo '<td align="left">' . $record[7] . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
                                                echo '<td align="left">' . $record[9] . '</td>';
                                                echo '<td align="left">' . $record[10] . '</td>';
                                            echo "</tr>";
                                            $i = $i+1;
                                        }
                                    }
                                }
                                catch(Exception $ex)
                                {
                                    echo "<script language='javascript'>alert('Error in Reading data')</script>";
                                }
                                mysqli_close ($con);
                            ?>
<!-- Php code for OP Appointment Register Table Ends =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../op_appointment.php">Go to Menu</a></td>
                    </div>
                    </div>
                </div>
                </div>
            </div>
<?php include'../../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>
