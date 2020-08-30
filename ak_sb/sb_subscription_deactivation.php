<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_sb_header.php';?>

<title>Subscription Deactivation</title>

</head>
<body>

<script src="js/myjs/get_magazine_subscription.js"></script>
<script src="js/myjs/get_sb_subscription_deactivation.js"></script>
<!-- JS Script for SB Duration Calculation====================== -->
<script>
 function calculateSBDur(){
        var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
        var firstDate = new Date($("#doc").val());
        var secondDate = new Date($("#dos").val());

        var subscription_duration = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay))+1);
        //alert ( subscription_duration + "----" );
        $("#subscription_duration").val(subscription_duration);

    }
</script>
    
        <form action="database/Sb_subscription_deactivation.php" method="post">
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h4><b>Subscription Deactivation </b></h4>
                                   
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
                                    <label>Other No.:</label>
                                    <div class="form-group">
                                    <input type="number" class="form-control"
                                        id="emergency_no" name="emergency_no"
                                        placeholder="Other Number" readonly>
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
<!-- Fetched Subscription Records Pannel starts ========================================= -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All Subscription Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>  
                                    <th>Sub ID</th>
                                    <th>Magazine Name</th>
                                    <th>Subscription Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>User ID</th>  
                                </tr>
                            </thead>
                            <tbody id="old_subscription_records_list">	
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-sm-2">
                        <label>Sub ID:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" 
                               id="sb_subscription_id" name="sb_subscription_id">
                        </div>
                    </div>
                     <div class="form-group col-sm-4">
                        <label> &nbsp;</label>
                        <div class="form-group" >
                         <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Date of Deactivation:</label>
                        <div class="form-group" >
                            <input type="date" class="form-control"
                                id="sb_deactivation_date" name="sb_deactivation_date" required>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>User ID:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?> readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched Subscription Records Pannel Ends ==================================== -->
<!-- Subscription Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Update - Subscription Information
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-3">
                            <label>Magazine Name:</label>
                              <div class="form-group">
                                  <select class="form-control" 
                                    id="magazine_name" name="magazine_name" readonly>
                                    <option></option>
                                </select>
                                  <!--<input type="number" class="form-control"
                                   id="magazine_name" name="magazine_name" readonly >-->
                              </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Subscription Type:</label>
                              <div class="form-group">
                               <input type="text" class="form-control"
                                   id="subscription_typea" name="subscription_typea" readonly >
                              </div>
                        </div>
                        <!--<div class="form-group col-sm-2">
                            <label>Sub Type:</label>
                              <div class="form-group">
                                <select class="form-control" 
                                    id="subscription_type" name="subscription_type" required>
                                    <option></option>
                                </select>
                              </div>
                        </div>-->
                        <div class="form-group col-sm-3">
                            <label>Subscription Amount:</label>
                            <div class="form-group">
                                <!--<select class="form-control" 
                                    id="subscription_amount" name="subscription_amount" required>
                                    <option></option>
                                </select>-->
                                <input type="number" class="form-control"
                                   id="subscription_amount" name="subscription_amount"
                                   placeholder="Subscription Amount" readonly >
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Mode of Postage:</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                   id="postage" name="postage" readonly >
                               <!-- <select class="form-control" 
                                    id="postage" name="postage" readonly >
                                    <option></option>
                                </select>-->
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Subscription From (Date):</label>
                            <div class="form-group" >
                                <input type="date" class="form-control" onchange=" calculateSBDur()" 
                                    id="dos" name="dos" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Subscription To (Date):</label>
                            <div class="form-group" >
                                <input type="date" class="form-control" onchange=" calculateSBDur()"
                                    id="doc" name="doc" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Subscription Duration:</label>
                            <div class="form-group">
                                <input type="number" class="form-control"                                  id="subscription_duration" name="subscription_duration"
                                   placeholder="365 days" readonly>
                            </div>
                        </div>
                         <div class="form-group col-sm-3">
                            <label>Sub Status:</label>
                            <div class="form-group">
                                <select class="btn btn-danger"
                                    id="sub_status" name="sub_status" required>
                                    <option>Deactivate </option>
                                    <!--<option>Activate </option>-->
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </div>
				</div>                      
            </div>
        </div>
<!-- Subscription Information  Pannel end ================================================== -->
<!-- Fetched Deactivated Subscription Records Pannel starts ================================ -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All Deactivated Subscription Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>  
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>DOS</th>
                                    <th>DOC</th>
                                    <th>Status</th>
                                    <th>Address</th> 
                                    <th>Place</th>
                                    <th>Mobile</th>
                                    <th>Magazine</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody id="old_deactivated_subscription_records_list">	
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched Deactivated Subscription Records Pannel Ends ==================================== -->
				</div>
<?php include'../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>
