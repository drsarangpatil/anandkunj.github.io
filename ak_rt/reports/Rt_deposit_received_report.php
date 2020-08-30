<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_rt_header.php';?>

<title>RT Deposit Received Report</title>

</head>
<body>
       
    <script>
// JS script for display button========>       
        function dispRepo()
        {
            url ="";

            url += "Rt_deposit_received_report.php?at_post=" + document.getElementById("at_post").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&full_name=" + document.getElementById("full_name").value;
           // url += "&payment_mode=" + document.getElementById("payment_mode").value;
            url += "&v_d_status=" + document.getElementById("v_d_status").value;
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
           
            url=document.URL;
            url=url.replace("Rt_deposit_received_report.php", "print/Rt_deposit_received_report_print.php");
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
                        url: '../../ak_com/database/ajax/Get_place.php',		// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getPlace" },			   // what exactly required 

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
// JQ script for AJAX Call of full name ===========-> 			
        $(document).ready
        (
            function () 
            {	
                $.ajax
                (
                    {
                        url: '../database/ajax/Get_rt_daily_health_record.php',	// call page for data to be retrived
                        type: 'GET',								            // to get data in backgrouond
                        data: { process: "getFullnames", isCasepaper:"1"}, // what exactly required 

                        success: function (data) 
                        {
                           //alert("Success : " + data);

                            $("#full_names").html(data);			// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }

                );

                $('#full_name').change			// process to call on change in  dropdown
                ( 
                    function() 
                    {
                        var full_name = $('#full_name').val();	// read full_name from dropdown
                        full_name=  full_name.split("-")[0];
                        $('#full_name').val(full_name);

                        //alert(full_name);
                    }
                );
            }
        );
// JQ script for AJAX Call Ends =========>
    </script>
        <form action="" method="POST" class="form-inline" >
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b> RT Deposit Received Register</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    RT Deposit Received Register
				    </div>
                    <div class="panel-body">
                    <div class="well">
                      <div class="media">
                        <div class="form-group col-sm-4">
                            <label>Name:</label>
                            <div class="form-group">
                                <input list="full_names" class="form-control" id= "full_name" name="full_name">
                                <datalist id="full_names">
                                <option value="">
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>From Rec Dt:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="from_date" name="from_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>To Rec Dt:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="to_date" name="to_date" required>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                       <div class="form-group col-sm-4">
                            <label>Place:</label>
                            <div class="form-group">
                                <input list="at_posts" class="form-control" id= "at_post" name="at_post">
                                <datalist id="at_posts">
                                <option value="">
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Deposit Status:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="v_d_status" name="v_d_status">
                                <option></option>
                                <option>Received</option>
                                <option>Partial</option>
                                <option>Returned</option>
                                </select>
                            </div>
                        </div>
                        <!--<div class="form-group col-sm-3">
                            <label>Mode of Payment:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="payment_mode" name="payment_mode">
                                    <option></option>
                                    <option>Cash</option>
                                    <option>Cheque</option>
                                    <option>Bank Transfer</option>
                                    <option>Card</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>-->
                         <div class="form-group col-sm-4">
                            <label>&nbsp;&nbsp; &nbsp; </label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary" onclick="dispRepo()"> Display </button>
                                <button type="button" class="btn btn-primary" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Deposit Register</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> RT Deposit Received Report</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th> Date Received</th>
                                <th>Photo</th>
                                <th>Full Name</th> 
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>Deposit</th>
                                <th>Valuables</th>
                                <th>VD Status</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for RT Case Sheet Table Starts =============================== -->
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

                                        $query="SELECT y.rt_v_d_received_date, p.photo, p.full_name, p.at_post, p.mobile_no, c.rt_case_sheet_id, y.rt_case_sheet_id, y.deposit_amount, y.v_items, y.v_d_status, y.rt_v_d_received_id FROM ak_p_registration p, ak_rt_case_sheet c, ak_rt_valuables_deposit_received y WHERE p.person_id= c.person_id  and c.rt_case_sheet_id= y.rt_case_sheet_id";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (y.rt_v_d_received_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        
                                        if( isset($_GET["full_name"]))
                                            if( $_GET["full_name"]!=="")
                                            {
                                                $query = $query .   " and ( p.full_name ='".  $_GET["full_name"] . "')  "; 
                                            }
                                        if( isset($_GET["v_d_status"]))
                                            if( $_GET["v_d_status"]!=="")
                                            {
                                                $query = $query .   " and ( v_d_status ='".  $_GET["v_d_status"] . "')  "; 
                                            }

                                       //echo $query;

                                        $response = mysqli_query($con, $query);

                                        $i =1;                                       
                                        $deposit_amt =0; 
                                        while($record = mysqli_fetch_array($response))
                                        {
                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                /*echo '<td align="center">' . $i . '</td>';*/
                                                echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="center">' . $record[0] . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[1] .'">  </td>';
                                                echo '<td align="left"><a href= "print/Rt_deposit_received_voucher.php?drid=' .$record[10] . '">' . $record[2] . '</a></td>';
                                                echo '<td align="center">' . $record[3] . '</td>';
                                                echo '<td align="center">' . $record[4] . '</td>';
                                                /*echo '<td align="center">' . $record[5] . '</td>';
                                                echo '<td align="center">' . $record[6] . '</td>';*/
                                                //echo '<td align="right">' . $record[7] . '</td>';
                                                echo '<td align="right">' . number_format((float) $record[7], 2, '.', '') . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
                                                echo '<td align="left">' . $record[9] . '</td>';
                                                /*echo '<td align="center">' . $record[10] . '</td>';*/
                                            echo "</tr>";
                                            $i = $i+1;
                                            $deposit_amt = $deposit_amt + $record[7]; 
                                        }
                                            echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td style="font-weight: bold" align="right">Total Deposit</td>';
                                                echo '<td align="center"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="center"></td>';
                                                echo '<td align="center"></td>';
                                                echo '<td style="font-weight: bold"  align="right">' . number_format((float) $deposit_amt, 2, '.', '') . '</td>';
                                                //echo '<td style="font-weight: bold" align="right">' . $deposit_amt . '</td>';
                                                echo '<td align="center"></td>';
                                                echo '<td align="center"></td>';
                                                echo '<td align="center"></td>';
                                            echo "</tr>";
                                    }
                                }
                                catch(Exception $ex)
                                {
                                    echo "<script language='javascript'>alert('Error in Reading data')</script>";
                                }
                                mysqli_close ($con);
                            ?>
<!-- Php code for RT Case Sheet Table Ends =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../rt_valuables_deposit_received.php">Go to Menu</a></td>
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
