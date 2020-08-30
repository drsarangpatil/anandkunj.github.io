<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_mb_header.php';?>

<title>IAFF Payment Report</title>

</head>
<body>
        <script>
// JS script for display button========>       
        function dispRepo()
        {
            url ="";

            url += "Mb_iaff_payment_report.php?at_post=" + document.getElementById("at_post").value;
            url += "&membership_type=" + document.getElementById("membership_type").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&payment_mode=" + document.getElementById("payment_mode").value;
            location.replace(url);

            //alert("sadsad");
        }   
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
           
            url=document.URL;
            url=url.replace("Mb_iaff_payment_report.php", "print/Mb_iaff_payment_report_print.php");
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
                   <h4><b> International Amroli Followers Forum Payment Report</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    IAFF Payment Register
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <div class="form-group col-sm-4">
                        <label>Sub Type:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="membership_type" name="membership_type">
                                <option></option>
                                </select>
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
                        <div class="form-group col-sm-4">
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
                         <div class="form-group col-sm-2">
                            <label></label>
                            <div class="form-group" >
                                <button type="button"class="btn btn-primary" onclick="dispRepo()"> Display</button>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label></label>
                            <div class="form-group" >
                                <button type="button"class="btn btn-primary" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Print</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> IAFF Payment Report</b></h5><p style= "color:slateBlue"> For Receipt-Print Ctrl+Click on Full Name; For Acknowledgement Email Ctrl+Click on Email Id; For Acknowledgement SMS Ctrl+Click on Mobile No.</p> 
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>ID</th>
                                <th>Pay Date</th>
                                <th>Mem Type</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>At Post</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Mem Amount</th>
                                <th>Amount Paid</th>
                                <th>Mode</th>
                                <th>Pay Details</th>
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
                                        
                                        $query="SELECT Distinct p.full_name, r.mb_payment_id, r.mb_payment_date, s.membership_type, p.photo,  p.at_post, p.mobile_no, s.membership_amount, r.amount_paid, r.payment_mode, r.payment_details, s.association_name, p.email FROM ak_p_registration p, ak_mb_membership_form s, ak_mb_payment r WHERE p.person_id= s.person_id and s.association_name='International Amroli Followers Forum'";
                                        $query = $query . " and s.person_id  = r.person_id";
                                        //$query = $query . " and p.person_id  = s.person_id";
                                        

                                         if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (r.mb_payment_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["payment_mode"]))
                                            if( $_GET["payment_mode"]!=="")
                                            {
                                                $query = $query .   " and ( r.payment_mode ='".  $_GET["payment_mode"] . "')  "; 
                                            }
                                        if( isset($_GET["membership_type"]))
                                            if( $_GET["membership_type"]!=="")
                                            {
                                                $query = $query .   " and ( s.membership_type ='".  $_GET["membership_type"] . "')  "; 
                                            }
                                       //echo $query;

                                         $response = mysqli_query($con, $query);

                                        $totalSub_amt =0;
                                        $totalPay_amt =0;
                                        while($record = mysqli_fetch_array($response))
                                        {
                                         echo '<tr class="odd gradeX" style="font-size:13px" >';
                                            echo '<td align="center">' . $record[1] . '</td>';
                                            echo '<td align="left">' . $record[2] . '</td>';
                                            echo '<td align="left">' . $record[3] . '</td>';
                                            echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[4] .'">  </td>';
                                            echo '<td align="left"><a href= "print/Mb_receipt_print.php?pyid=' .$record[1] . '">' . $record[0] . '</a></td>';
                                            echo '<td align="left">' . $record[5] . '</td>';
                                            echo '<td align="left"><a href= "print/Mb_acknowledgement_email.php?pyid=' .$record[1] . '">' . $record[12] . '</a></td>';
                                            //echo '<td align="left">' . $record[12] . '</td>';
                                            echo '<td align="left"><a href= "print/Mb_acknowledgement_sms.php?pyid=' .$record[1] . '">' . $record[6] . '</a></td>';
                                            //echo '<td align="left">' . $record[5] . '</td>';
                                            //echo '<td align="left">' . $record[6] . '</td>';
                                            echo '<td align="right">' . $record[7] . '</td>';
                                            echo  '<td align="right">' . $record[8] . '</td>';
                                            echo '<td align="left">' . $record[9] . '</td>';
                                            echo '<td align="left">' . $record[10] . '</td>';
                                            //echo '<td align="left">' . $record[11] . '</td>';
                                        echo "</tr>";
                                        $totalSub_amt = $totalSub_amt + $record[7];
                                            $totalPay_amt = $totalPay_amt + $record[8];
                                        }
                                        echo '<tr class="odd gradeX" style="font-size:13px" >';
                                            echo '<td colspan="6" align="center"></td>';
                                            /*echo '<td align="left"></td>';
                                            echo '<td align="left"></td>';
                                            echo '<td align="left"></td>';
                                            echo '<td align="left"></td>';
                                            echo '<td align="left"></td>';*/
                                            echo '<td align="left"></td>';
                                            echo '<td style="font-weight: bold" align="right">Total</td>';
                                            echo '<td style="font-weight: bold" align="right">' . $totalSub_amt . '</td>';
                                            echo '<td style="font-weight: bold" align="right">' . $totalPay_amt . '</td>';
                                            echo '<td align="left"></td>';
                                            echo '<td align="left"></td>';
                                        echo "</tr>";
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
                    <td><a href="../mb_payment.php">Go to Menu</a></td>
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
