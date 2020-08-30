<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_st_header.php';?>

<title>Update-Course Billing</title>

</head>
<body>

<script src="js/myjs/get_st_course_name.js"></script>
<script src="js/myjs/get_st_billing_up.js"></script>
<script>
function addition()
{
var admission_amount = 0;
var course_amount = 0;
var study_m_amount = 0;
var examination_amount = 0;
var practical_amount = 0;
var other_amount = 0;
var discount_amount = 0;
var payable_amount = 0;
var amount_paid = 0;
var balance_amount = 0;


admission_amount = parseInt($("#admission_amount").val());
course_amount = parseInt($("#course_amount").val());
study_m_amount = parseInt($("#study_m_amount").val());
examination_amount = parseInt($("#examination_amount").val());
practical_amount = parseInt($("#practical_amount").val());
other_amount = parseInt($("#other_amount").val());
discount_amount = parseInt($("#discount_amount").val());
amount_paid = parseInt($("#amount_paid").val());

payable_amount = admission_amount + course_amount + study_m_amount + examination_amount + practical_amount + other_amount - discount_amount; 

//alert ( payable_amount + "----" );
$("#payable_amount").val(payable_amount);

/*tax_amount = payable_amount*18/100
$("#tax_amount").val(tax_amount);*/

/*balance_amount = payable_amount - amount_paid;
$("#balance_amount").val(balance_amount);*/

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

    <form action="database/St_billing_up.php" method="post">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>Update - Course Billing</b></h4>
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
                                    <label>User ID:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?> readonly>
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
                                 <div class="form-group col-sm-4">
                                    <label>Email:</label>
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                        id="email" name="email"
                                        placeholder="Email" readonly>
                                    </div>
                                </div>
                                 <div class="form-group col-sm-4">
                                    <label>Place:</label>
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                        id="at_post" name="at_post"
                                        placeholder="City" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Occupation:</label>
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                        id="occupation" name="occupation"
                                        placeholder="Occupation" readonly>
                                    </div>
                                </div>
                                 <div class="form-group col-sm-12">
                                    <label>Address:</label>
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                        id="address" name="address"
                                        placeholder="Address" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                            <label>Course Name:</label>
                            <div class="form-group">
                                 <select class="form-control" onchange="stDuration()"
                                    id="course_name" name="course_name" readonly>
                                <option></option>
                            </select>
                            </div>
                        </div>
                         <div class="form-group col-sm-2">
                            <label>A Status:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="ad_status" name="ad_status" readonly>
                                <option></option>
                                <option>Admitted</option>
                                <!--<option>Completed</option>
                                <option>Discontinued</option>-->
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Language:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="course_language" name="course_language" readonly>
                                <option></option>
                                <option>Marathi</option>
                                <option>Hindi</option>
                                <option>English</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Admission ID:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="st_course_application_id" name="st_course_application_id" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Date of Admission:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" onchange="calculateSTDur()" 
                                       id="doa" name="doa" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Date of Completion :</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                id="doc" name="doc" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Course Duration:</label>
                            <div class="form-group">
                                <input type="number" class="form-control" onchange="calculateSTDur()"
                                       id="course_duration" name="course_duration" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Mother Tongue:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="mother_tongue" name="mother_tongue" readonly>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
             </div>
          </div>
    </div>		
<!-- Fetched Personal Information Pannel end ======================================= -->
<!-- Fetched ST Billing Records Pannel starts ================================== -->
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            All ST Billing Records Records 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-        hover" id="dataTables-example">
                                <thead>
                                   <tr>
                                        <th>ST Bill ID</th>
                                        <th>Amt Payable</th>
                                        <th>Admission ID</th>
                                        <th>Bill Date</th>
                                        <th>User ID</th>
                                    </tr>
                                </thead>
                                <tbody id="old_billing_records_list">	
                                </tbody>
                            </table>
                            <div class="form-group col-sm-3">
                                    <label>ST Billing ID:</label>
                                    <div class="form-group" >
                                        <input type="number" class="form-control"
                                           id="st_billing_id" name="st_billing_id">
                                    </div>
                                </div>
                            <!--</div>-->
                            <div class="form-group col-sm-3">
                                <label> &nbsp;</label>
                                <div class="form-group" >
                                    <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Bill Date:</label>
                                <div class="form-group" >
                                    <input type="date" class="form-control"
                                       id="st_bill_date" name="st_bill_date" readonly>
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
                           Details of Course Fees
                        </div>
                            <div class="panel-body"> 
                               <div class="form-group col-sm-4">
                                   <label id="admission_fees" name="admission_fees"> Admission Fees:</label>
                                </div>
                            <div class="form-group col-sm-2">
                                <label><input type="number" value="0.00" class="form-control" id="admission_amount" name="admission_amount" required onchange="addition()"></label>
                            </div>
                            <div class="form-group col-sm-4">
                                <label id="course_fees" name="course_fees">Course Fees:</label>
                            </div>
                            <div class="form-group col-sm-2">
                                <label><input type="number" class="form-control"        onchange="addition()" value="0.00"
                                           id="course_amount" name="course_amount"required></label>
                            </div>
                            <div class="form-group col-sm-4">
                                <label id="study_m_charges" name="study_m_charges">Study Material Charges:</label>
                            </div>
                            <div class="form-group col-sm-2">
                                <label><input type="number" class="form-control" onchange="addition()"
                                           id="study_m_amount" name="study_m_amount" value="0.00" required></label>
                            </div>
                            <div class="form-group col-sm-4">
                                <label id="examination_fees" name="examination_fees">Examination Fees:</label>
                            </div>
                            <div class="form-group col-sm-2">
                                <label><input type="number" class="form-control" align="right"
                                           id="examination_amount" name="examination_amount" onchange="addition()" value="0.00" required></label>
                            </div>
                            <div class="form-group col-sm-4">
                                <label id="practicals_fees" name="practicals_fees">Practicals Fees:</label>
                            </div>
                            <div class="form-group col-sm-2">
                                <label><input type="number" class="form-control" align="right"
                                           id="practical_amount" name="practical_amount" value="0.00" onchange="addition()" required></label>
                            </div>
                            <div class="form-group col-sm-4">
                                <label id="other_charges" name="other_charges">Other Charges:</label>
                            </div>
                            <div class="form-group col-sm-2">
                                <label><input type="number" class="form-control"
                                           id="other_amount" name="other_amount"  value="0.00" onchange="addition()"></label>
                            </div>
                            <div class="form-group col-sm-4">
                                <label id="discount" name="discount">Discount:</label>
                            </div>
                            <div class="form-group col-sm-2">
                                <label><input type="number" class="form-control" align="right"
                                           id="discount_amount" name="discount_amount" value="0.00" onchange="addition()" required></label>
                            </div>
                            <div class="form-group col-sm-4">
                                <label id="total_payable" name="total_payable">Total Amount Payable:</label>
                            </div>
                            <div class="form-group col-sm-2">
                                <label><input type="number" class="form-control" align="right"
                                           id="payable_amount" name="payable_amount" value="0.00" required></label>
                            </div>
                            <div class="form-group col-sm-4">
                                <label id="payment_status1" name="payment_status1">Payment Status:</label>
                            </div>
                            <div class="form-group col-sm-2">
                                <label><input type="text" class="form-control" align="right"
                                           id="payment_status" name="payment_status" onchange="addition()" required></label>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="form-group">
                                    <a href="#" id="print_bill" class="btn btn-success pull-right btn-md"> <span class="glyphicon glyphicon-print">  </span>  Bill</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--Details of OP Charges Pannel ends-->
               <div class="form-group col-sm-8">
                    <div class="form-group" >
                        <button type="submit" class="btn btn-primary">Update</button>
                     </div>
                </div>
                <div class="form-group col-sm-4">
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
