<?php
if(session_id() == '') 
    session_start();
?>
<?php include 'Ak_op_header.php';?>

<title>OP Billing Report</title>

</head>
<body>
    
<!--// JS script for display button========>--> 
    <script>       
        function dispRepo()
        {
            url ="";

            url += "Op_billing_report.php?at_post=" + document.getElementById("at_post").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&full_name=" + document.getElementById("full_name").value;
            url += "&payment_status=" + document.getElementById("payment_status").value;
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
           
            url=document.URL;
            url=url.replace("Op_billing_report.php", "print/Op_billing_report_print.php");
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
                        url: '../database/ajax/Get_personal_details_pr.php', // call page for data to be retrived
                        type: 'GET',							// to get data in backgrouond
                        data: { process: "getFullnames", isCasepaper:"1"},	// what exactly required 

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
                        var full_name = $('#full_name').val();	// read full_name from full_name dropdown
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
                   <h4><b> OP Billing Register</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    OP Billing Register
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
                            <label>Payment Status:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="payment_status" name="payment_status">
                                <option></option>
                                <option>Due</option>
                                <option>Partial</option>
                                <option>Completed</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group col-sm-3 pull-right">
                            <label></label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary" onclick="dispRepo()"> Display </button>
                                <button type="button" class="btn btn-primary" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span>  Print</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> OP Billing Report</b></h5><p style= "color:slateBlue"> For OP Bill Print Ctrl+Click Full Name </p>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>Date</th>
                                <th>Photo</th>
                                <th>Full Name</th> 
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>Case paper Fee</th>
                                <th>Consultion Fee</th>
                                <th>Treatment Fee</th>
                                <th>Diet Fee</th>
                                <th>Medicine Fee</th>
                                <th>Other Fee</th>
                                <th>Dis-count</th>
                                <th>Total Bill</th>
                                <th>P Status</th>
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

                                        $query="SELECT y.op_bill_date, p.photo, p.full_name, p.at_post, p.mobile_no, c.op_case_sheet_id, y.op_case_sheet_id, y.casepaper_amount, y.consultation_amount, y.treatment_amount, y.diet_amount, y.medicine_amount, y.other_amount, y.discount_amount, y.payable_amount, y.payment_status, y.op_billing_id FROM ak_p_registration p, ak_op_case_sheet c, ak_op_billing y WHERE p.person_id= c.person_id  and c.op_case_sheet_id= y.op_case_sheet_id";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (y.op_bill_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["payment_status"]))
                                            if( $_GET["payment_status"]!=="")
                                            {
                                                $query = $query .   " and ( payment_status ='".  $_GET["payment_status"] . "')  "; 
                                            }
                                         if( isset($_GET["full_name"]))
                                            if( $_GET["full_name"]!=="")
                                            {
                                                $query = $query .   " and ( p.full_name ='".  $_GET["full_name"] . "')  "; 
                                            }

                                       //echo $query;

                                        $response = mysqli_query($con, $query);

                                        $i =1;
                                        $cpfee_amt =0; 
                                        $confee_amt =0; 
                                        $treatfee_amt =0; 
                                        $dietfee_amt =0; 
                                        $medfee_amt =0; 
                                        $othfee_amt =0; 
                                        $disfee_amt =0;
                                        $totalBill_amt =0;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left">' . $record[0] . '</td>';
                                                echo '<td align="center"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[1] .'">  </td>';
                                                echo '<td align="left"><a href= "print/Op_bill_print.php?blid=' .$record[16] . '">' . $record[2] . '</a></td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left">' . $record[4] . '</td>';
                                                /*echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="left">' . $record[6] . '</td>';*/
                                                echo '<td align="right">' . $record[7] . '</td>';
                                                echo '<td align="right">' . $record[8] . '</td>';
                                                echo '<td align="right">' . $record[9] . '</td>';
                                                echo '<td align="right">' . $record[10] . '</td>';
                                                echo '<td align="right">' . $record[11] . '</td>';
                                                echo '<td align="right">' . $record[12] . '</td>';
                                                echo '<td align="right">' . $record[13] . '</td>';
                                                echo '<td align="right">' . $record[14] . '</td>';
                                                echo '<td align="right">' . $record[15] . '</td>';
                                               /* echo '<td align="right">' . $record[16] . '</td>';*/
                                            echo "</tr>";
                                            $i = $i+1;
                                            $cpfee_amt = $cpfee_amt + $record[7]; 
                                            $confee_amt =$confee_amt + $record[8]; 
                                            $treatfee_amt =$treatfee_amt + $record[9]; 
                                            $dietfee_amt =$dietfee_amt + $record[10]; 
                                            $medfee_amt =$medfee_amt + $record[11]; 
                                            $othfee_amt =$othfee_amt + $record[12]; 
                                            $disfee_amt =$disfee_amt + $record[13];
                                            $totalBill_amt =$totalBill_amt + $record[14];
                                        }
                                            echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td colspan="6" style="font-weight: bold" align="right">Total</td>';
                                                /*echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';*/
                                                echo '<td style="font-weight: bold" align="right">' . $cpfee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $confee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $treatfee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $dietfee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $medfee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $othfee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $disfee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $totalBill_amt . '</td>';
                                                echo '<td align="right">' . $record[15] . '</td>';
                                               /* echo '<td align="right"></td>';*/
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
                    <td><a href="../op_billing.php">Go to Menu</a></td>
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
