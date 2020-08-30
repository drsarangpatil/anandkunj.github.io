<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_op_header.php';?>

<title>OP Payment</title>

</head>
<body>


<script src="js/myjs/get_op_payment.js"></script>
<!-- JS Script for Addition Function====================== --> 
<script>
    function addition()
    {
        payable_amount = parseInt($("#payable_amount").val());
        amount_paid = parseInt($("#amount_paid").val());
        balance_amount = parseInt($("#balance_amount").val());

       // $("#payable_amount").val(payable_amount);
        balance_amount = payable_amount - amount_paid;
        $("#balance_amount").val(balance_amount);

        var payment_status;
        if (payable_amount == amount_paid) {
            payment_status = "Completed";
            $("#payment_status").val(payment_status);

        } else {
            payment_status = "Partial";
            $("#payment_status").val(payment_status);
        }
    }
</script>
<!-- JS script for print button====================== -->
<script>    
    function printRepo_a()
    {
        url ="";
        url=document.URL;
        url=url.replace("op_payment.php", "reports/Op_payment_report.php");
        //alert (url)
        window.open(url);

        //alert("sadsad");
    }
</script>
  
    <form action="database/Op_payment.php" method="post">
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>OP Payment</b></h4>
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
									<img id="photo" name="photo" class="img-rounded"  width="127" height="161" src="../ak_com/assets/images/a25.jpg" alt="Image not uploded">
								    </a>
                                </div>
                                <div class="form-group col-sm-6">
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
                                <div class="form-group col-sm-2">
                                    <label>Case Sheet ID:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" 
                                               id="op_case_sheet_id" name="op_case_sheet_id" readonly>
                                    </div>
                                </div>
                                    <div class="form-group col-sm-10">
                                        <label>Final Diagnosis / Nature of Illness:</label>
                                        <textarea class="form-control" rows="1" id="final_diagnosis" name="final_diagnosis" readonly placeholder="Diseases to be treated / Objective of Treatment"></textarea>
                                    </div>
                                </div>
                            </div>
						</div>
                        
                     </div>
                  </div>
			</div>		
<!-- Fetched Personal Information Pannel end ============================================= -->
<!-- Fetched OP Billing Records Pannel starts ================================== -->
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            All OP Billing Records Records 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-        hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>OP Billing ID</th>
                                        <th>Amt Payable</th>
                                        <th>OP Case Sheet ID</th>
                                        <th>Bill Date</th>
                                        <th>Schedule</th>
                                        <th>User ID</th>
                                    </tr>
                                </thead>
                                <tbody id="old_billing_records_list">	
                                </tbody>
                            </table>
                            <div class="form-group col-sm-2">
                                <label>OP Billing ID:</label>
                                <div class="form-group" >
                                    <input type="number" class="form-control"
                                       id="op_billing_id" name="op_billing_id">
                                </div>
                            </div>
                            <div class="form-group col-sm-10">
                                <label> &nbsp;</label>
                                <div class="form-group" >
                                    <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Payment Date:</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" 
                                           id="op_payment_date" name="op_payment_date" required>
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
                                    <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?>readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- Fetched OP Billing Records Records Pannel Ends================================= -->
<!--OP Payment Details Pannel starts-->  
                        <div class="panel-group">
                        <div class="panel panel-primary">
                        <div class="panel-heading">
                           OP Payment Details
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
                                        placeholder="Amount Paid" required>
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
                                <div class="form-group col-sm-8">
                                    <label>Payment Details:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                           id="payment_details" name="payment_details"
                                           placeholder="Transction Details" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Payment Status:</label>
                                     <div class="form-group">
                                        <input type="text" class="form-control"
                                           id="payment_status" name="payment_status"
                                           onchange="addition()" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>            
<!--OP Payment Details  Pannel ends-->   
                    <div class="form-group col-sm-8">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Receipt</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="op_payment_ad.php">Add Payment</a>
                         </div>
                    </div>
                </div>
<?php include'../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>
