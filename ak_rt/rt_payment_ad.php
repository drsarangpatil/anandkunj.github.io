<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

    <script src="js/myjs/get_rt_payment_ad.js"></script>

    <title>Add RT Payment</title>

</head>
<body>
 
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
            url=url.replace("rt_payment_ad.php", "reports/Rt_payment_report.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
    </script>

    <form action="database/Rt_payment_ad.php" method="post">
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b> Add RT Payment</b></h4>
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
									<img id="photo" name="photo" class="img-rounded"  width="137" height="171" src="../ak_com/ak_com_header.php" alt="Image not uploded">
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
                                               id="rt_case_sheet_id" name="rt_case_sheet_id" readonly>
                                    </div>
                                </div>
                                 <div class="form-group col-sm-3">
                                    <label>Date of Birth:</label>
                                    <div class="form-group" >
                                        <input type="date" class="form-control"
                                               id="dob" name="dob"
                                               readonly>
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
                                <div class="form-group col-sm-3">
                                    <label>Date of Admission:</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" 
                                               onchange= "calculateRTdays()" id="doa" name="doa" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Retreat Name:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" 
                                               id="retreat_name" name="retreat_name" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>RT Duration:</label>
                                    <div class="form-group">
                                        <input type="number" class="form-control"
                                               id="retreat_duration" name="retreat_duration"
                                               placeholder="10 days"readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Date of Completion :</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" 
                                        id="doc" name="doc" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-10">
                                    <label>Final Diagnosis / Nature of Illness:</label>
                                    <textarea class="form-control" rows="1" id="final_diagnosis" name="final_diagnosis" readonly placeholder="Diseases to be Treated / Objective of Treatment"></textarea>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Room No.:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                               id="room_number" name="room_number" readonly>
                                    </div>
                                </div>
                                </div>
                            </div>
						</div>
                     </div>
                  </div>
			</div>		
<!-- Fetched Personal Information Pannel end ============================================= --> 
<!-- Fetched RT Payment Records Pannel starts ================================== -->
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            All RT Payment Records 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-        hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>RT Payment ID</th>
                                        <th>Total Payable</th>
                                        <th>Payment Date</th>
                                        <th>Amt Paid</th>
                                        <th>Pay Mode</th>
                                        <th>Balance Payable</th>
                                        <th>User ID</th>
                                    </tr>
                                </thead>
                                <tbody id="old_payment_records_list">	
                                </tbody>
                            </table>
                            <div class="form-group col-sm-2">
                                <label>RT Payment ID:</label>
                                <div class="form-group" >
                                    <input type="number" class="form-control"
                                       id="rt_payment_id" name="rt_payment_id">
                                </div>
                            </div>
                            <div class="form-group col-sm-10">
                                <label> &nbsp;</label>
                                <div class="form-group" >
                                    <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                                </div>
                            </div>
                            <!--<div class="form-group col-sm-2">
                                <label>Receipt Number:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                    id="receipt_no" name="receipt_no" required>
                                </div>
                            </div>-->
                            <div class="form-group col-sm-3">
                                <label>Payment Date:</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" 
                                           id="rt_payment_date" name="rt_payment_date" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
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
                            <div class="form-group col-sm-3">
                                <label>User ID:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?> readonly>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>RT Estimation ID:</label>
                                <div class="form-group">
                                <input type="text" class="form-control" 
                                   id="rt_estimation_id" name="rt_estimation_id" readonly>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- Fetched RT Payment Records Records Pannel Ends================================= -->
<!--RT Payment Details Pannel starts-->  
                        <div class="panel-group">
                        <div class="panel panel-primary">
                        <div class="panel-heading">
                           RT Payment Details
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
                                <div class="form-group col-sm-9">
                                    <label>Payment Details:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                           id="payment_details" name="payment_details"
                                           placeholder="Transction Details" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Payment Status:</label>
                                     <div class="form-group">
                                        <input type="text" class="form-control"
                                           id="payment_status" name="payment_status"
                                           onchange="addition()" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Name of PAN-Card Holder:</label>
                                     <div class="form-group">
                                        <input type="text" class="form-control"
                                           id="pan_name" name="pan_name"
                                           onchange="addition()" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>PAN Card No:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                           id="pan_number" name="pan_number"
                                           placeholder="PAN Number" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>            
<!--RT Payment Details  Pannel ends-->     
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
                </div>
<?php include'../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>
