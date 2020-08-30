<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_mb_header.php';?>

<!--<script src="./js/myjs/get_building_name_up.js"> </script>-->

<title>Membership Payment</title>

</head>
<body>
  
    <script src="js/myjs/get_mb_payment.js"></script>
<!-- JS script for Calculations====================== -->  
    <script>
    function addition()
    {
        payable_amount = parseInt($("#payable_amount").val());
        amount_paid = parseInt($("#amount_paid").val());
        balance_amount = parseInt($("#balance_amount").val());

       // $("#payable_amount").val(payable_amount);
        balance_amount = payable_amount - amount_paid;
        $("#balance_amount").val(balance_amount);

    }

</script>
<!-- JS script for print button====================== -->
    <script>    
        function printRepo_a()
        {
            url ="";
            url=document.URL;
            url=url.replace("mb_payment.php", "reports/Mb_all_payment_report.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
    </script>
    
    <form action="database/Mb_payment.php" method="post">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>Membership Payment</b></h4>
<!-- Fetched Personal Information ================================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Personal Information
                    </div>
                    <div class="panel-body">
                        <div class="well">
				            <div class="media">
				            <div class="media-body">
                                <div> 
                                    <a class="pull-left" href="#">
									<img id="photo" name="photo" class="img-rounded" width="137" height="171" src="../ak_com/assets/images/a25.jpg" alt="Image not uploded">
								    </a>
                                </div>
                                <div class="form-group col-sm-8">
                                    <label>Full Name:</label>
                                        <div class="form-group">
                                            <input list="full_names" class="form-control" id= "full_name" name="full_name">
                                            <datalist id="full_names">
                                            <option value="">
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Person ID:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" 
                                               id="person_id" name="person_id" readonly>
                                    </div>
                                </div>                                
                                <div class="form-group col-sm-3">
                                    <label>Date of Birth:</label>
                                    <div class="form-group" >
                                        <input type="date" class="form-control"
                                            id="dob" name="dob" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Age:</label>
                                        <div class="form-group">
                                        <input type="number" class="form-control"
                                           id="age" name="age" readonly>
                                      </div>
                               </div>
                                <div class="form-group col-sm-2">
                                    <label>Gender:</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control" 
                                            id="gender" name="gender" readonly>
                                      </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Mobile No.:</label>
                                    <div class="form-group">
                                    <input type="number" class="form-control"
                                        id="mobile_no" name="mobile_no"
                                        placeholder="Mobile Number" readonly>
                                    </div>
                                </div>
                            </div>
						  </div>
						</div>
                        <div class="form-group col-sm-4">
                            <label>Payment Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                   id="mb_payment_date" name="mb_payment_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Schedule:</label>
                            <div class="form-group">
                                    <select class="form-control" 
                                    id="schedule" name="schedule" required>
                                <option>Morning</option>
                                <option>Afternoon</option>
                                <option>Evening</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>User ID:</label>
                            <div class="form-group">
                                    <input type="text" class="form-control" id="user_id" name="user_id" <?php echo " value='". $_SESSION['user_id'] ."'";?> readonly>
                            </div>
                        </div>
                     </div>
                  </div>
			</div>		
<!-- Fetched Personal Information Pannel end ================================================== -->
<!-- Fetched Membership Records Pannel starts ========================================= -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All Membership Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>  
                                    <th>Mem ID</th>
                                    <th>Association Name</th>
                                    <th>Membership Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>User ID</th>  
                                </tr>
                            </thead>
                            <tbody id="old_membership_records_list">	
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-sm-2">
                        <label>Sub ID:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" 
                               id="mb_membership_id" name="mb_membership_id">
                        </div>
                    </div>
                     <div class="form-group col-sm-2">
                        <label> &nbsp;</label>
                        <div class="form-group" >
                         <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched Subscription Records Pannel Ends ==================================== -->
<!--MB Payment Details Pannel starts-->  
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Subscription Payment Details
                        </div>
                            <div class="panel-body"> 
                               <div class="form-group col-sm-3">
                                    <label>Total Amount Payble:</label>
                                    <div class="form-group">
                                        <input type="number" class="form-control" value="0.00"
                                           onchange="addition()" id="payable_amount" name="payable_amount" readonly>                       
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Amount Paid:</label>
                                    <div class="form-group">
                                        <input type="number" class="form-control" value="0.00" onchange="addition()" id="amount_paid" name="amount_paid"
                                        placeholder="Amount Paid">
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Balance Amount:</label>
                                    <div class="form-group">
                                        <input type="number" class="form-control" value="0.00"
                                           id="balance_amount" name="balance_amount"
                                           placeholder="Balance Amount" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
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
                                <div class="form-group col-sm-10">
                                    <label>Payment Details:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                           id="payment_details" name="payment_details"
                                           placeholder="Transction Details" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                <label>Pay Status:</label>
                                <div class="form-group">
                                     <select class="form-control" 
                                        id="pay_status" name="pay_status" readonly>
                                        <option>Completed</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>            
<!--MB Payment Details  Pannel ends------------------------------------------------------------->   
                    <div class="form-group col-sm-10">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Receipt</button>
                        </div>
                    </div>
                    <!--<div class="form-group col-sm-2">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="rt_payment_ad.php">Add Payment</a>
                         </div>
                    </div>-->
                </div>
<?php include'../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>
