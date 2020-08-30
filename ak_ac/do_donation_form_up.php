<?php
	if(session_id() == '') 
		session_start();
	
	if($_SESSION['role']!=="Director" && $_SESSION['role']!=="Account Staff")
	{
        echo "<script language='javascript'>alert('You do not have rights to use this page')</script>";
        header("location:../index.php");
	}
		
?>
<?php include 'ak_ac_header.php';?>

<!--<script src="./js/myjs/get_building_name_up.js"> </script>-->

<title>Update - Donation Form</title>

</head>
<body>
        <form action="database/Do_donation_form_up.php" method="post">
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h4><b>Update - Donation Form </b></h4>                                   
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
                                            <input list="full_names" class="form-control" id= "full_name" name="full_name" required>
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
                                        <input type="text" class="form-control" id="user_id" name="user_id" <?php echo " value='". $_SESSION['user_id'] ."'";?>readonly>
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
                                 <div class="form-group col-sm-12">
                                    <label>Address:</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control" 
                                            id="address" name="address" readonly>
                                      </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>City:</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control" 
                                            id="at_post" name="at_post" readonly>
                                      </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>PIN Code:</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control" 
                                            id="pin_code" name="pin_code" readonly>
                                      </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>District:</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control" 
                                            id="district_name" name="district_name" readonly>
                                      </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>State:</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control" 
                                            id="state_name" name="state_name" readonly>
                                      </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Occupation:</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control" 
                                            id="occupation" name="occupation" readonly>
                                      </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Occupation Feature:</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control" 
                                            id="occu_spl_fea" name="occu_spl_fea" readonly>
                                      </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Whatapp No.:</label>
                                    <div class="form-group">
                                    <input type="number" class="form-control"
                                        id="whatsapp_no" name="whatsapp_no"
                                        placeholder="Whatapp Number" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Email:</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control" 
                                            id="email" name="email" readonly>
                                      </div>
                                </div>
                            </div>
						  </div>
						</div>
                     </div>
                  </div>
			</div>		
<!-- Fetched Personal Information Pannel end ================================================== -->
<!-- Fetched Donation Records Pannel starts ================================== -->
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            All Donation Records of above Person
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-        hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Donation ID</th>
                                        <th>Amt Donated</th>
                                        <th>Donation Date</th>
                                        <th>Donation For</th>
                                        <th>Mode</th>
                                        <th>User ID</th>
                                    </tr>
                                </thead>
                                <tbody id="old_donation_records_list">	
                                </tbody>
                            </table>
                            <div class="form-group col-sm-3">
                                <label>Donation ID</label>
                                <div class="form-group" >
                                    <input type="number" class="form-control"
                                       id="do_donation_id" name="do_donation_id">
                                </div>
                            </div>
                            <div class="form-group col-sm-9">
                                <label> &nbsp;</label>
                                <div class="form-group" >
                                    <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- Fetched Donation Records Pannel Ends================================= -->
<!--Donation Payment Details Pannel starts-->  
                        <div class="panel-group">
                        <div class="panel panel-primary">
                        <div class="panel-heading">
                           Donation Payment Details
                        </div>
                            <div class="panel-body">
                                <div class="form-group col-sm-4">
                                    <label>Payment Date:</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" 
                                               id="do_payment_date" name="do_payment_date" required>
                                    </div>
                                </div>
                               <div class="form-group col-sm-4">
                                    <label>Donation Amount Paid:</label>
                                    <div class="form-group">
                                        <input type="number" class="form-control" value="0.00" id="donation_paid" name="donation_paid" required>                       
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Donation Paid Towards:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                               id="donation_towards" name="donation_towards" required>
                                    </div>
                                </div>
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
                                <div class="form-group col-sm-8">
                                    <label>Payment Details:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                           id="payment_details" name="payment_details"
                                           placeholder="Transction Details" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>PAN Card No:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                           id="pan_number" name="pan_number"
                                           placeholder="PAN Number" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-8">
                                    <label>Name of PAN-Card Holder:</label>
                                     <div class="form-group">
                                        <input type="text" class="form-control"
                                           id="pan_name" name="pan_name"
                                           placeholder="Name of PAN-Card Holder" required>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>            
<!--Donation Payment Details  Pannel ends-->   
                    <div class="form-group col-sm-10">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Update</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="do_donation_form.php">New Donation Form</a>
                         </div>
                    </div>
<?php include'../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>
