<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_rt_header.php';?>

<title>RT Booking Register</title>

</head>
<body>
    
    <script>
// JS script for display button========>       
        function dispRepo()
        {
            url ="";

            url += "Rt_appointment_register.php?at_post=" + document.getElementById("at_post").value;
            url += "&rm_expected=" + document.getElementById("rm_expected").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&ad_status=" + document.getElementById("ad_status").value;
            location.replace(url);
            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Rt_appointment_register.php", "print/Rt_appointment_register_print.php");
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
                        url: '../database/ajax/Get_rt_at_post.php',	
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
                   <h4><b> RT Booking Register</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    RT Booking Register
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>Admission Status:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="ad_status" name="ad_status" required>
                                    <option></option>
                                    <option>Admitted</option>
                                    <option>Pending</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group col-sm-4">
                            <label>Room Expected:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="rm_expected" name="rm_expected" required>
                                    <option></option>
                                    <option>Special</option>
                                    <option>Delux</option>
                                    <option>Super Delux</option>
                                    <option>Delux Suit</option>
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
                <h5><b> RT Booking Register</b></h5><p style= "color:slateBlue"> For RT Booking Alert Email Ctrl+Click Name;    For RT Booking Alert SMS Ctrl+Click Mobile </p>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>ID</th>
                                <th>Ar Date</th>
                                <th>Ar Time</th>
                                <th>Days</th>
                                <th>Name</th>
                                <th>Place</th>
                                <th>Mobile</th>
                                <th>MOT</th>
                                <th>Ad Type</th>
                                <th>Room Ex</th>
                                <th>Ad Purpose</th>
                                <th>Ad Status</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for OP Case Sheet Table Starts =============================== -->
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

                                        $query="SELECT  rt_ap_id, ar_date, ar_time, st_days, full_name, at_post, mobile_no, tr_mode, ad_type, rm_expected, ad_purpose, ad_status FROM ak_rt_appointment WHERE 1";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  ( ar_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["rm_expected"]))
                                            if( $_GET["rm_expected"]!=="")
                                            {
                                                $query = $query .   " and ( rm_expected ='".  $_GET["rm_expected"] . "')  "; 
                                            }
                                        if( isset($_GET["ad_status"]))
                                            if( $_GET["ad_status"]!=="")
                                            {
                                                $query = $query .   " and ( ad_status ='".  $_GET["ad_status"] . "')  "; 
                                            }

                                        //echo $query;
                                        

                                        $response = mysqli_query($con, $query);

                                       $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                               echo '<td align="center">' . $i . '</td>';
                                                echo '<td align="center">' . $record[0] . '</td>';
                                                echo '<td align="center">' . $record[1] . '</td>';
                                                echo '<td align="center">' . $record[2] . '</td>';
                                                echo '<td align="center">' . $record[3] . '</td>';
                                                echo '<td align="center"><a href= "print/Rt_ad_alert_email.php?apid=' .$record[0] . '">' . $record[4] . '</a></td>';
                                                echo '<td align="center">' . $record[5] . '</td>';
                                                echo '<td align="center"><a href= "print/Rt_ad_alert_sms.php?apid=' .$record[0] . '">' . $record[6] . '</a></td>';
                                                echo '<td align="center">' . $record[7] . '</td>';
                                                echo '<td align="center">' . $record[8] . '</td>';
                                                echo '<td align="center">' . $record[9] . '</td>';
                                                echo '<td align="center">' . $record[10] . '</td>';
                                                echo '<td align="center">' . $record[11] . '</td>';
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
<!-- Php code for OP Case Sheet Table Ends =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../rt_appointment.php">Go to Menu</a></td>
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
