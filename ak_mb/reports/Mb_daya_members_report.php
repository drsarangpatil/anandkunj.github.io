<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_mb_header.php';?>

<title>DAYA Members Register</title>

</head>
<body>
        <script>
// JS script for display button========>       
        function dispRepo()
        {
            url ="";
            url += "Mb_daya_members_report.php?at_post=" + document.getElementById("at_post").value;
            url += "&mem_status=" + document.getElementById("mem_status").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&membership_type=" + document.getElementById("membership_type").value;
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Mb_daya_members_report.php", "print/Mb_daya_members_report_print.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }
        
        // JS script for Aprint button=========>         
        function aprintRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Mb_daya_members_report.php", "print/Mb_address_labels_print.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }

        // JS script for Bprint button=========>         
        function bprintRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Mb_daya_members_report.php", "print/Mb_dispatch_alert_email_bulk.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }
        
        // JS script for Cprint button=========>         
        function cprintRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Mb_daya_members_report.php", "print/Mb_renewal_request_email_bulk.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }


// JQ script for AJAX Call ===========-> 			
        $(document).ready
        (
            function () 
            {	
                $.ajax
                (
                    {
                        url: '../../ak_com/database/ajax/Get_place.php',		// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getPlace" },			   // what exactly required 

                        success: function (data) 
                        {
                            //alert("Success : " + data);
                            $("#at_post").html(data);				// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }
                );
                
	           $.ajax
				(
					{
						url: '../database/ajax/Get_association_membership.php',	// call page for data to be                                                          retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getMembership_type"},	

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#membership_type").html(data);					// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					 }
				  );
            }
        ); 
// JQ script for AJAX Call Ends =========> 
    </script>

        <form action="" method="POST" class="form-inline">
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b> DAYA Members Register</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    DAYA Members Register
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>Membership Type:</label>
                                <div class="form-group" >
                                    <select class="form-control" 
                                    id="membership_type" name="membership_type">
                                    <option></option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Mem Status:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="mem_status" name="mem_status">
                                <option></option>
                                <option>Activate</option>
                                <option>Deactivate</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                                <label>Place:</label>
                                <div class="form-group" >
                                    <select class="form-control" 
                                    id="at_post" name="at_post">
                                    <option></option>
                                    </select>
                                </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>From End Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="from_date" name="from_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>To End Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="to_date" name="to_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label></label>
                            <div class="form-group" >
                                <button type="button"class="btn btn-primary pull-center" onclick="dispRepo()"> Display</button>
                                <button type="button"class="btn btn-primary pull-center" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Print Report</button>
                                
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="form-group col-sm-9 pull-right ">
                            <label></label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary pull-center"  onclick="aprintRepo()"> <span class="glyphicon glyphicon-print"></span> Selected Address Labels </button>
                                <button type="button" class="btn btn-primary pull-center"  onclick="bprintRepo()"> Dispatch-Alert Bulk Email <span class="glyphicon glyphicon-envelope"></span> </button>
                                <button type="button" class="btn btn-primary pull-center"  onclick="cprintRepo()"> Renewal-Request Bulk Email <span class="glyphicon glyphicon-envelope"></span> </button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> DAYA Members Register</b></h5><p style= "color:slateBlue"> For Dispatch-Alert Email Ctrl+Click Full Name; For Renewal-Request Email Ctrl+Click Mem Status; For Renewal-Request SMS Ctrl+Click Mobile No.</p> 
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>ID</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Mem Status</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>Mem Type</th>
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

                                        $query="SELECT s.mb_membership_id, s.dos, s.doc, s.mem_status, p.photo, p.full_name, p.address, p.at_post, p.mobile_no, s.membership_type FROM ak_p_registration p, ak_mb_membership_form s WHERE p.person_id=s.person_id and s.association_name='DAY Alumni Association'";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (s.doc between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["mem_status"]))
                                            if( $_GET["mem_status"]!=="")
                                            {
                                                $query = $query .   " and ( mem_status ='".  $_GET["mem_status"] . "')  "; 
                                            }
                                        if( isset($_GET["membership_type"]))
                                            if( $_GET["membership_type"]!=="")
                                            {
                                                $query = $query .   " and ( s.membership_type ='".  $_GET["membership_type"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       //$i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="center">' . $record[0] . '</td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="left">' . $record[2] . '</td>';
                                                echo '<td align="left"><a href= "print/Mb_renewal_request_email.php?sbid=' .$record[0] . '">' . $record[3] . '</a></td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[4] .'">  </td>';
                                                echo '<td align="left"><a href= "print/Mb_dispatch_alert_email.php?sbid=' .$record[0] . '">' . $record[5] . '</a></td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                echo '<td align="left">' . $record[7] . '</td>';
                                                echo '<td align="left"><a href= "print/Mb_renewal_request_sms.php?sbid=' .$record[0] . '">' . $record[8] . '</a></td>';
                                                echo '<td align="left">' . $record[9] . '</td>';
                                            echo "</tr>";
                                           // $i = $i+1;
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
                    <td><a href="../mb_membership_form.php">Go to Menu</a></td>
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
