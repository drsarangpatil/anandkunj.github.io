<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_st_header.php';?>

<title>ST Payment</title>

</head>
<body>

<script src="js/myjs/get_st_course_name.js"></script>
<script src="js/myjs/get_st_payment.js"></script>
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
        url=url.replace("st_payment.php", "reports/St_payment_report.php");
        //alert (url)
        window.open(url);

        //alert("sadsad");
    }
</script>
    
    <form action="database/St_payment.php" method="post">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>ST Payment</b></h4>
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
                                        <input type="text" class="form-control" 
                                               id="user_id" name="user_id" required>
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
                                <label>Payment Date:</label>
                                <div class="form-group" >
                                    <input type="date" class="form-control"
                                       id="st_payment_date" name="st_payment_date" required>
                                </div>
                            </div>
				            </div>
                        </div>
                    </div>
                </div>
<!-- Fetched OP Billing Records Records Pannel Ends================================= -->
<!--ST Payment Details Pannel starts-->  
                        <div class="panel-group">
                        <div class="panel panel-primary">
                        <div class="panel-heading">
                           ST Payment Details
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
                                           onchange="addition()" required>
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
<!--ST Payment Details  Pannel ends-->   
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
                            <a class="btn btn-info pull-right" href="st_payment_ad.php">Add Payment</a>
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
