<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_op_header.php';?>

<title>Update - OP Billing</title>

</head>
<body>

<script src="js/myjs/get_op_billing_up.js"></script>
<!-- JS Script for Addition Function====================== --> 
<script>
    function addition()
    {
        var casepaper_amount = 0;
        var consultation_amount = 0;
        var treatment_amount = 0;
        var diet_amount = 0;
        var medicine_amount = 0;
        var other_amount = 0;
        var discount_amount = 0;
        //var tax_amount = 0;
        var payable_amount = 0;
        var amount_paid = 0;
        var balance_amount = 0;
        casepaper_amount = parseInt($("#casepaper_amount").val());
        consultation_amount = parseInt($("#consultation_amount").val());
        treatment_amount = parseInt($("#treatment_amount").val());
        diet_amount = parseInt($("#diet_amount").val());
        medicine_amount = parseInt($("#medicine_amount").val());
        other_amount = parseInt($("#other_amount").val());
        discount_amount = parseInt($("#discount_amount").val());
        //tax_amount = parseInt($("#tax_amount").val(Math.round));
        amount_paid = parseInt($("#amount_paid").val());

        payable_amount = casepaper_amount + consultation_amount + treatment_amount + diet_amount + medicine_amount + other_amount - discount_amount; 

        //alert ( payable_amount + "----" );
        $("#payable_amount").val(payable_amount);

        //tax_amount = payable_amount*18/100
        //$("#tax_amount").val(tax_amount);

        balance_amount = payable_amount - amount_paid;
        $("#balance_amount").val(balance_amount);

        var payment_status;
        if (payable_amount == 0) {
            payment_status = "Completed";
            $("#payment_status").val(payment_status);

        } else {
            payment_status = "Due";
            $("#payment_status").val(payment_status);
        }
    }

// JS script for print button=========>         
function printRepo()
{
    url ="";
   // url=document.URL;
    url += "../ak_common/reports/print/Op_bill_print.php?op_case_sheet_id=" + document.getElementById("op_case_sheet_id").value;
    //url=url.replace("Op_medicine_chart.php", "print/Op_medicine_chart_print.php");
    //alert (url)
    window.open(url);

    //alert("sadsad");
}
</script>
<!-- JS script for print button====================== -->
<script>    
    function printRepo_a()
    {
        url ="";
        url=document.URL;
        url=url.replace("op_billing_up.php", "reports/Op_billing_report.php");
        //alert (url)
        window.open(url);

        //alert("sadsad");
    }
</script>
   
    <form action="database/Op_billing_up.php" method="post">
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>Update - OP Billing</b></h4>
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
                                               id="op_case_sheet_id" name="op_case_sheet_id" readonly>
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
                                    <label>Mobile No.</label>
                                    <div class="form-group">
                                        <input type="number" class="form-control"
                                               id="mobile_no" name="mobile_no"
                                               placeholder="Mobile Number" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-10">
                                    <label>Final Diagnosis / Nature of Illness:</label>
                                    <textarea class="form-control" rows="1" id="final_diagnosis" name="final_diagnosis" readonly placeholder="Diseases to be treated / Objective of Treatment"></textarea>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>User ID:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?>readonly>
                                    </div>
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
                            <div class="form-group col-sm-3">
                                    <label>OP Billing ID:</label>
                                    <div class="form-group" >
                                        <input type="number" class="form-control"
                                           id="op_billing_id" name="op_billing_id">
                                    </div>
                                </div>
                           <!--<div class="form-group col-sm-3">
                                <label>Bill Date:</label>
                                <div class="form-group" >
                                    <input type="date" class="form-control"
                                       id="op_bill_date" name="op_bill_date">
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
                                </div>-->
                            <!--</div>-->
                            <div class="form-group col-sm-3">
                                <label> &nbsp;</label>
                                <div class="form-group" >
                                    <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                                </div>
                            </div>
				            </div>
                        </div>
                    </div>
                </div>
<!-- Fetched OP Billing Records Records Pannel Ends================================= -->
<!--Details of OP Charges Pannel starts-->
                    <div class="panel-group">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                           Details of OP Charges
                        </div>
                            <div class="panel-body">
                             <div class="form-group col-sm-3">
                                <label>Case-paper Fees:</label>
                                <div class="form-group">
                                    <input type="number" value="0.00" class="form-control" id="casepaper_amount" name="casepaper_amount" required onchange="addition()">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Consultation Charges:</label>
                                <div class="form-group">
                                    <input type="number" value="0.00" class="form-control" id="consultation_amount" name="consultation_amount" required onchange="addition()">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Treatment Charges:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control"        onchange="addition()" value="0.00" id="treatment_amount" name="treatment_amount"required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Diet Charges:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" onchange="addition()"
                                     id="diet_amount" name="diet_amount" value="0.00" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Medicines/Consumables:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" align="right"
                                        id="medicine_amount" name="medicine_amount" onchange="addition()" value="0.00" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Other Charges:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control"
                                        id="other_amount" name="other_amount"  value="0.00" onchange="addition()">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Discount:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" align="right"
                                        id="discount_amount" name="discount_amount" value="0.00" onchange="addition()" required>
                                </div>
                            </div>
                            <!--<div class="form-group col-sm-3">
                                <label>Tax (18%):</label>
                                <div class="form-group">
                                    <input type="float" class="form-control" align="right"
                                        id="tax_amount" name="tax_amount" value="0.00" onchange="addition()" required>
                                </div>
                            </div>-->
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
                                        id="payment_status" name="payment_status" onchange="addition()" readonly>
                                </div>
                            </div>
                            <!--<div class="form-group col-sm-6">
                                <label></label>
                                <div class="form-group">
                                    <a href="#" id="print_bill" class="btn btn-success pull-right btn-md"> <span class="glyphicon glyphicon-print">  </span>  Bill</a>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
<!--Details of OP Charges Pannel ends-->
               <div class="form-group col-sm-8">
                    <div class="form-group" >
                        <button type="submit" class="btn btn-primary">Update Bill</button>
                     </div>
                </div>
                <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Bill</button>
                        </div>
                    </div>
                <div class="form-group col-sm-2">
                    <div class="form-group" >
                        <a class="btn btn-info pull-right" href="op_billing.php">Add Bill</a>
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
