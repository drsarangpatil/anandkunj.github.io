<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

<script src="js/myjs/get_rt_daily_health_record.js"></script>

<title>RT Estimation</title>

</head>
<body>
    
<!-- JS script for Calculations====================== -->  
    <script>
function addition()
{
    var retreat_donation = 0;
    var attendant_donation = 0;
    var accommodation_donation = 0;
    var food_donation = 0;
    var other_donation = 0;
    var discount_amount = 0;
    var payable_amount = 0;
    //var tax_amount = 0;
   // var payable_amount = 0;
    var amount_paid = 0;
    var balance_amount = 0;
    
    retreat_donation = parseInt($("#retreat_donation").val());
    attendant_donation = parseInt($("#attendant_donation").val());
    accommodation_donation = parseInt($("#accommodation_donation").val());
    food_donation = parseInt($("#food_donation").val());
    other_donation = parseInt($("#other_donation").val());
   // other_amount = parseInt($("#other_amount").val());
    discount_amount = parseInt($("#discount_amount").val());
    //tax_amount = parseInt($("#tax_amount").val(Math.round));
    amount_paid = parseInt($("#amount_paid").val());

    payable_amount = retreat_donation + attendant_donation + accommodation_donation + food_donation + other_donation - discount_amount; 

    //alert ( payable_amount + "----" );
    $("#payable_amount").val(payable_amount);

    //tax_amount = payable_amount*18/100
    //$("#tax_amount").val(tax_amount);

    //balance_amount = payable_amount - amount_paid;
   // $("#balance_amount").val(balance_amount);

    var payment_status;
    if (payable_amount == 0) {
        payment_status = "Completed";
        $("#payment_status").val(payment_status);

    } else {
        payment_status = "Due";
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
            url=url.replace("rt_billing.php", "reports/Rt_billing_report.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
    </script>


    <form action="database/Rt_billing.php" method="post">
         <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>RT Estimation </b></h4>
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
									<img id="photo" name="photo" class="img-rounded"  width="137" height="171" src="../ak_com/assets/images/a25.jpg" alt="Image not uploded">
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
                                <div class="form-group col-sm-8">
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
                                <div class="form-group col-sm-2">
                                    <label>Attendants:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                               id="no_attendant" name="no_attendant" readonly>
                                    </div>
                                </div>
                                </div>
                            </div>
						</div>  
                         <div class="form-group col-sm-4">
                            <label>Estimation Date:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                       id="rt_estimate_date" name="rt_estimate_date" required>
                            </div>
                        </div>
                   <!--     <div class="form-group col-sm-3">
                            <label>Bill Number:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="bill_no" name="bill_no" required>
                            </div>
                        </div>-->
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
                                <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?> readonly>
                            </div>
                        </div>
                     </div>
                  </div>
			</div>		
<!-- Fetched Personal Information Pannel end ============================================= --> 
<!--Details of RT Charges Pannel starts-->
                    <div class="panel-group">
                        <div class="panel panel-primary">
                        <div class="panel-heading">
                           Details of RT Donations
                        </div>
                        <div class="panel-body">
                             <div class="form-group col-sm-3">
                                <label>Retreat Donation:</label>
                                <div class="form-group">
                                    <input type="number" value="0.00" class="form-control" id="retreat_donation" name="retreat_donation" required onchange="addition()">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Attendant Donation:</label>
                                <div class="form-group">
                                    <input type="number" value="0.00" class="form-control" id="attendant_donation" name="attendant_donation" required onchange="addition()">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Accommodation Donation:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control"        onchange="addition()" value="0.00" id="accommodation_donation" name="accommodation_donation"required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Food Donation:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" onchange="addition()"
                                     id="food_donation" name="food_donation" value="0.00" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Other Donation:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control"
                                        id="other_donation" name="other_donation"  value="0.00" onchange="addition()">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Discount:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" align="right"
                                        id="discount_amount" name="discount_amount" value="0.00" onchange="addition()" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Total Amount Payable:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" align="right"
                                        id="payable_amount" name="payable_amount" value="0.00" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Payment Status:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" align="right"
                                        id="payment_status" name="payment_status" onchange="addition()" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Name of PAN-Card Holder:</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control"
                                       id="pan_name" name="pan_name" required>
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
<!--Details of RT Charges Pannel ends-->
               <div class="form-group col-sm-8">
                    <div class="form-group" >
                        <button type="submit" class="btn btn-primary">Generate Bill</button>
                     </div>
                </div>
                <div class="form-group col-sm-2">
                    <div class="form-group" >
                        <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Bill</button>
                    </div>
                </div>
                <div class="form-group col-sm-2">
                    <div class="form-group" >
                        <a class="btn btn-info pull-right" href="rt_billing_up.php">Edit Bill</a>
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
