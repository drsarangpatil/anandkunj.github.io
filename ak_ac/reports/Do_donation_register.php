<?php
	if(session_id() == '') 
		session_start();
	
	if($_SESSION['role']!=="Director" && $_SESSION['role']!=="Account Staff")
	{
        echo "<script language='javascript'>alert('You do not have rights to use this page')</script>";
        header("location:../index.php");
	}
		
?>
<?php include 'Ak_ac_header.php';?>

<title>Donation Register</title>

</head>
<body>
        <form action="" method="POST" class="form-inline" >
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Donation Register</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    Donation Register
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>Mode of Payment:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="payment_mode" name="payment_mode">
                                    <option>Cash</option>
                                    <option>Cheque</option>
                                    <option>Bank Transfer</option>
                                    <option>Card</option>
                                    <option>Other</option>
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
                <h5><b> Donation Register</b></h5><p style= "color:slateBlue"> For Donation Receipt Print Ctrl+Click <span style= "color:orange"> Full Name</span>  For Donation Acknowledgement Email Ctrl+Click <span style= "color:orange">At Post</span><br> For Donation Acknowledgement SMS Ctrl+Click <span style= "color:orange">Mobile No</span>  </p>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>Photo</th>
                                <th>Full Name</th> 
                                <th>At Post</th>
                                <th>Mobile No</th>
                                <th>Date</th>
                                <th>Donation Amt</th>
                                <th>Towards</th>
                                <th>Mode</th>
                                <th>PAN</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for Donation Register Starts =============================== -->
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

                                        $query="SELECT p.photo, p.full_name, p.at_post, p.mobile_no, d.do_payment_date, d.donation_paid, d.donation_towards, d.payment_mode, d.pan_number, d.user_id, d.do_donation_id FROM ak_p_registration p, ak_do_donation d WHERE p.person_id= d.person_id ";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  ( d.do_payment_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["payment_mode"]))
                                            if( $_GET["payment_mode"]!=="")
                                            {
                                                $query = $query .   " and ( d.payment_mode ='".  $_GET["payment_mode"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       $i =1;
                                       $donation_paid =0; 
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                               echo '<td align="center">' . $i . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[0] .'">  </td>';
                                                echo '<td align="center"><a href= "print/Do_receipt_print.php?doid=' .$record[10] . '">' . $record[1] . '</a></td>';
                                                echo '<td align="center"><a href= "print/Do_acknowledgment_email.php?doid=' .$record[10] . '">' . $record[2] . '</a></td>';
                                                echo '<td align="center"><a href= "print/Do_acknowledgment_sms.php?doid=' .$record[10] . '">' . $record[3] . '</a></td>';
                                                echo '<td align="center">' . $record[4] . '</td>';
                                                echo '<td align="right">' . $record[5] . '</td>';
                                                echo '<td align="center">' . $record[6] . '</td>';
                                                echo '<td align="center">' . $record[7] . '</td>';
                                                echo '<td align="center">' . $record[8] . '</td>';
                                                echo '<td align="center">' . $record[9] . '</td>';
                                            echo "</tr>";
                                            $i = $i+1;
                                            $donation_paid = $donation_paid + $record[5]; 
                                        }
                                        
                                            echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td colspan="6" style="font-weight: bold" align="right">Total Donation</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $donation_paid . '</td>';
                                                echo '<td align="center"></td>';
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
<!-- Php code for Donation Register Ends =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../do_donation_form.php">Go to Menu</a></td>
                    </div>
                    </div>
                </div>
                </div>
            <div class="container col-sm-0">
            </div></div>
<?php include'../../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>
