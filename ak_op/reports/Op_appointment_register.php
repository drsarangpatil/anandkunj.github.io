<?php
if(session_id() == '') 
    session_start();
?>
<?php include 'Ak_op_header.php';?>

<title>OP Appointment Register</title>

</head>
<body>
 <!--JS script for display button======== -->      
    <script>
      
        function dispRepo()
        {
            url ="";

            url += "Op_appointment_register.php?at_post=" + document.getElementById("at_post").value;
            url += "&ap_with=" + document.getElementById("ap_with").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&ap_status=" + document.getElementById("ap_status").value;
            location.replace(url);
            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Op_appointment_register.php", "print/Op_appointment_register_print.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }

// JQ script for AJAX Call of Get Place ===========-> 			
        $(document).ready
        (
            function () 
            {	
                $.ajax
                (
                    {
                        url: '../database/ajax/Get_op_at_post.php',	
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getAtpost" },			   // what exactly required 

                        success: function (data) 
                        {
                            //alert("Success : " + data);
                            $("#at_posts").html(data);				// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }
                );
                
                $('#at_post').change			// process to call on change in  dropdown
                ( 
                    function() 
                    {
                        var at_post = $('#at_post').val();	// read at_post from full_name dropdown
                        $('#at_post').val(at_post);
                        
                        //alert(at_post);
                    }
                );
            }
        ); 
// JQ script for AJAX Call Ends =========>
    </script>
    
        <form action="" method="POST" class="form-inline" >
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b> OP Appointment Register</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    OP Appointment Register
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>Appoint Status:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="ap_status" name="ap_status" required>
                                    <option></option>
                                    <option>Completed</option>
                                    <option>Pending</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Appoint With:</label>
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
                            <label>Place:</label>
                            <div class="form-group">
                                <input list="at_posts" class="form-control" id= "at_post" name="at_post">
                                <datalist id="at_posts">
                                <option value="">
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>From Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="from_date" name="from_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>To Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="to_date" name="to_date" required>
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
                <h5><b> OP Appointment Register</b></h5><p style= "color:slateBlue"> For OP Appointment Alert Email Ctrl+Click Name; For OP Appointment Alert SMS Ctrl+Click Mobile </p>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>ID</th>
                                <th>Date</th>
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

                                        $query="SELECT  op_ap_id, ap_date, ap_session, ap_time, full_name, at_post, mobile_no, ap_type, ap_with, ap_purpose, ap_status FROM ak_op_appointment WHERE 1";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  ( ap_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["ap_with"]))
                                            if( $_GET["ap_with"]!=="")
                                            {
                                                $query = $query .   " and ( ap_with ='".  $_GET["ap_with"] . "')  "; 
                                            }
                                        if( isset($_GET["ap_status"]))
                                            if( $_GET["ap_status"]!=="")
                                            {
                                                $query = $query .   " and ( ap_status ='".  $_GET["ap_status"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                               echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left">' . $record[0] . '</td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
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
