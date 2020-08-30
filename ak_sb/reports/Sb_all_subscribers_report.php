<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_sb_header.php';?>

<title>All Magazines Subscribers Report</title>

</head>
<body>
   
    <script>
// JS script for display button========>       
        function dispRepo()
        {
            url ="";
            url += "Sb_all_subscribers_report.php?at_post=" + document.getElementById("at_post").value;
            url += "&sub_status=" + document.getElementById("sub_status").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&magazine_name=" + document.getElementById("magazine_name").value;
             url += "&subscription_type=" + document.getElementById("subscription_type").value;
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Sb_all_subscribers_report.php", "print/Sb_all_subscribers_report_print.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
        
        // JS script for Aprint button=========>         
        function aprintRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Sb_all_subscribers_report.php", "print/Sb_address_labels_print.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }

        // JS script for Bprint button=========>         
        function bprintRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Sb_all_subscribers_report.php", "print/Sb_dispatch_alert_email_bulk.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }
        
        // JS script for Cprint button=========>         
        function cprintRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Sb_all_subscribers_report.php", "print/Sb_renewal_request_email_bulk.php");
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
                        url: '../database/ajax/Get_magazine_subscription.php',			// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getMagazine_names" },			// what exactly required 

                        success: function (data) 
                        {
                            //alert("Success : " + data);
                            $("#magazine_name").html(data);					// to set fetched data
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
                        url: '../database/ajax/Get_magazine_subscription.php',	// call page for data to be                                                          retrived
                        type: 'GET',									// to get data in backgrouond
                        data: { process: "getSubscription_type"},	

                        success: function (data) 
                        {
                            //alert("Success : " + data);
                            $("#subscription_type").html(data);					// to set fetched data
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
                   <h4><b> All Magazines Subscribers Register</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    All Subscribers Register
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>Magazine:</label>
                                <div class="form-group" >
                                    <select class="form-control" 
                                    id="magazine_name" name="magazine_name">
                                    <option></option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Sub Status:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="sub_status" name="sub_status">
                                <option></option>
                                <option>Activate</option>
                                <option>Deactivate</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                        <label>Sub Type:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="subscription_type" name="subscription_type">
                                <option></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>From End Dt:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="from_date" name="from_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>To End Dt:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="to_date" name="to_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
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
                        <div class="form-group col-sm-6">
                            <label></label>
                            <div class="form-group" >
                                <button type="button"class="btn btn-primary pull-center" onclick="dispRepo()"> Display</button>
                                <button type="button"class="btn btn-primary pull-center" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Print Report</button>
                                <button type="button" class="btn btn-primary pull-center"  onclick="aprintRepo()"> <span class="glyphicon glyphicon-print"></span> Selected Address Labels </button>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 ">
                            <label></label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary pull-center"  onclick="bprintRepo()"> Dispatch-Alt Bulk Email <span class="glyphicon glyphicon-envelope"></span> </button>
                                <button type="button" class="btn btn-primary pull-center"  onclick="cprintRepo()"> Renewal-Rqt Bulk Email <span class="glyphicon glyphicon-envelope"></span> </button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> All Magazines Subscribers Register</b></h5> <p style= "color:slateBlue"> For Dispatch-Alert Email Ctrl+Click Full Name; For Renewal-Request Email Ctrl+Click Sub Status; For Renewal-Request SMS Ctrl+Click Mobile No.</p> 
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>ID</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Sub Status</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>Magazine</th>
                                <th>Sub Type</th>
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

                                        $query="SELECT s.sb_subscription_id, s.dos, s.doc, s.sub_status, p.photo, p.full_name, p.address, p.at_post, p.mobile_no,  s.magazine_name, s.subscription_type FROM ak_p_registration p, ak_sb_subscription_form s WHERE p.person_id= s.person_id ";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  ( s.doc between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["sub_status"]))
                                            if( $_GET["sub_status"]!=="")
                                            {
                                                $query = $query .   " and ( s.sub_status ='".  $_GET["sub_status"] . "')  "; 
                                            }
                                        if( isset($_GET["magazine_name"]))
                                            if( $_GET["magazine_name"]!=="")
                                            {
                                                $query = $query .   " and ( s.magazine_name ='".  $_GET["magazine_name"] . "')  "; 
                                            }
                                        if( isset($_GET["subscription_type"]))
                                            if( $_GET["subscription_type"]!=="")
                                            {
                                                $query = $query .   " and ( s.subscription_type ='".  $_GET["subscription_type"] . "')  "; 
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
                                                echo '<td align="left"><a href= "print/Sb_renewal_request_email.php?sbid=' .$record[0] . '">' . $record[3] . '</a></td>';
                                                //echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[4] .'">  </td>';
                                                //echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="left"><a href= "print/Sb_dispatch_alert_email.php?sbid=' .$record[0] . '">' . $record[5] . '</a></td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                echo '<td align="left">' . $record[7] . '</td>';
                                                echo '<td align="left"><a href= "print/Sb_renewal_request_sms.php?sbid=' .$record[0] . '">' . $record[8] . '</a></td>';
                                                //echo '<td align="left">' . $record[8] . '</td>';
                                                echo '<td align="left">' . $record[9] . '</td>';
                                                echo '<td align="left">' . $record[10] . '</td>';
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
                    <td><a href="../sb_subscription_form.php">Go to Menu</a></td>
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
