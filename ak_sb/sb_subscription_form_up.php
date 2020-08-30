<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_sb_header.php';?>

<title>Edit - Subscription Form</title>

</head>
<body>

<script src="js/myjs/get_magazine_subscription.js"></script>
<script src="js/myjs/get_sb_subscription_form_up.js"></script>
<!-- JS Script for SB Duration Calculation====================== -->
<!--    <script>
 function calculateSBDur(){
        var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
        var firstDate = new Date($("#doc").val());
        var secondDate = new Date($("#dos").val());

        var subscription_duration = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay))+1);
        //alert ( subscription_duration + "----" );
        $("#subscription_duration").val(subscription_duration);

    }
</script>-->
<script>
 function calculateSBDur()
    {
        //alert("1111" );
      try{

        var firstDate = new Date($("#dos").val());
        firstDate.setDate(firstDate.getDate() + parseInt($("#subscription_duration").val()));
        var dd= firstDate.getDate();//+ $("#subscription_duration") val();
        var mm= firstDate.getMonth()+1;
        var yy= firstDate.getFullYear();
        //alert(yy+"/"+mm+"/"+dd);
        if(mm<10)
            mm = "0"+mm;
        if(dd<10)
            dd = "0" +dd;
        document.getElementById("doc").value =  yy+"-"+mm+"-"+dd
      }
        catch(err){}
    }

function subDuration(){
    //alert("1111 - " + $("#subscription_type").val() );

    if ($("#subscription_type").val()=="Yearly")
       $("#subscription_duration").val(365);
    
    if ($("#subscription_type").val()=="Bi-Yearly")
       $("#subscription_duration").val(730);

    if ($("#subscription_type").val()=="Tri-Yearly")
       $("#subscription_duration").val(1095);
    
    if ($("#subscription_type").val()=="Four-Yearly")
       $("#subscription_duration").val(1460);

    if ($("#subscription_type").val()=="Five-Yearly")
       $("#subscription_duration").val(1825);
    
    if ($("#subscription_type").val()=="Complimentary")
       $("#subscription_duration").val(9125);              // 25x360 = 9125 days

    if ($("#subscription_type").val()=="Life")
       $("#subscription_duration").val(36500);

    if ($("#subscription_type").val()=="1 Yearly")
       $("#subscription_duration").val(365);

    if ($("#subscription_type").val()=="3 Yearly")
       $("#subscription_duration").val(1095);

    if ($("#subscription_type").val()=="100 Yearly")
       $("#subscription_duration").val(36500);

    if ($("#subscription_type").val()=="Life Subscription")
       $("#subscription_duration").val(36500);

    calculateSBDur();

}
</script>
    
        <form action="database/Sb_subscription_form_up.php" method="post">
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h4><b>Edit - Subscription Form </b></h4>
                                   
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
                                               id="person_id" name="person_id"readonly>
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
                                    id="magazine_name" name="magazine_name" required>
                                    <option></option>
                                </select>
                              </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Old Type:</label>
                              <div class="form-group">
                               <input type="text" class="form-control"
                                   id="subscription_typea" name="subscription_typea" readonly >
                              </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Sub Type:</label>
                              <div class="form-group">
                                <select class="form-control" 
                                    id="subscription_type" name="subscription_type"  onchange="subDuration()" required>
                                    <option></option>
                                </select>
                              </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Sub Amount:</label>
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
                        <div class="form-group col-sm-2">
                            <label>Sub Status:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="sub_status" name="sub_status" required>
                                    <option>Activate </option>
                                </select>
                            </div>
                        </div> 
                         <div class="form-group col-sm-3">
                            <label>Subscription From (Date):</label>
                            <div class="form-group" >
                                <input type="date" class="form-control" onchange="calculateSBDur()" 
                                    id="dos" name="dos">
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Sub Duration:</label>
                            <div class="form-group">
                                <input type="number" class="form-control"                                  id="subscription_duration" name="subscription_duration" value="0"
                                   placeholder="365 days" readonly >
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Subscription To (Date):</label>
                            <div class="form-group" >
                                <input type="date" class="form-control" 
                                    id="doc" name="doc">
                            </div>
                        </div>
                         <div class="form-group col-sm-3">
                            <label>Mode of Postage:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                    id="postage" name="postage" required>
                                    <option>Book-Post</option>
                                    <option>Courrier</option>
                                    <option>Registered</option>
                                    <option>Online</option>
                                </select>
                            </div>
                        </div> 
				    </div>                      
                   </div>
                 </div>
<!-- Subscription Information  Pannel end ================================================== -->
                    <div class="form-group col-sm-10">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="sb_subscription_form.php">New Subscription Form</a>
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
