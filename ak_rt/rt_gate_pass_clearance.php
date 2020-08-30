<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

    <script src="js/myjs/get_rt_gate_pass_clearance.js"></script>

<title>Gate-Pass Clearance</title>

</head>
<body>
    <!-- JS script for print button====================== -->
    <script>    
        function printRepo_a()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_gate_pass_clearance.php", "reports/Rt_gate_pass_clearance_register.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
    </script>

        <form action="database/Rt_gate_pass_clearance.php" method="post"  enctype="multipart/form-data">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h4><b>Gate-Pass Clearance</b></h4>
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
                                    <label>Participant Name :</label>
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
                                    <label>Room No:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" 
                                        id="room_number" name="room_number" readonly>
                                    </div>
                                </div>
                                <!--<div class="form-group col-sm-3">
                                    <label>Date of Birth:</label>-->
                                    <div class="form-group" >
                                        <input type="hidden"  class="form-control"
                                               id="dob" name="dob"
                                               readonly>
                                    </div>
                               <!-- </div>-->
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
                                    <label>Case Paper ID:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" 
                                               id="rt_case_sheet_id" name="rt_case_sheet_id" readonly>
                                    </div>
                                </div> 
                                <div class="form-group col-sm-3">
                                    <label>Date of Admission:</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" 
                                               id="doa" name="doa" readonly>
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
                                               placeholder="10" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Date of Completion:</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" 
                                        id="doc" name="doc" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-10">
                                        <label>Final Diagnosis / Nature of Illness:</label>
                                        <textarea class="form-control" rows="1" id="final_diagnosis" name="final_diagnosis" readonly placeholder="Diseases to be treated / Objective of Treatment"></textarea>
                                </div>
                                
                                <div class="form-group col-sm-2">
                                    <label>No Attendants:</label>
                                    <input type="text" class="form-control" 
                                    id="no_attendant" name="no_attendant" readonly>
                                </div>
                            </div>
				            </div>
						</div>
                        <div class="form-group col-sm-3">
                            <label>Gatepass No:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="rt_gatepass_id" name="rt_gatepass_id" readonly>
                            </div>
                        </div> 
                        <div class="form-group col-sm-3">
                            <label>Gatepass Date:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                       id="gatepass_date" name="gatepass_date" required>
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
                    </div>
                 </div>	
            </div>		
<!-- Fetched Personal Information Pannel end ================================================== -->
<!-- Attendant Information Start ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        Gate-Pass Clearance Check
                    </div>
                    <div class="panel-body">
                        <div class="media-body">
                                <div class="form-group col-sm-3">
                                    <label>Accounts Dept Clearance:</label>
                                    <div class="form-group">
                                        <select class="form-control" 
                                        id="acc_d_clear" name="acc_d_clear" required>
                                        <option>No</option>
                                        <option>Yes</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>HK Dept Clearance:</label>
                                    <div class="form-group">
                                        <select class="form-control" 
                                        id="hk_d_clear" name="hk_d_clear" required>
                                        <option>No</option>
                                        <option>Yes</option>
                                    </select>
                                    </div>
                                </div>
                                 <div class="form-group col-sm-3">
                                    <label>Shoppee Clearance:</label>
                                    <div class="form-group">
                                        <select class="form-control" 
                                        id="shop_clear" name="shop_clear" required>
                                        <option>No</option>
                                        <option>Yes</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Subscription Clearance:</label>
                                    <div class="form-group">
                                        <select class="form-control" 
                                        id="sub_clear" name="sub_clear" required>
                                        <option>No</option>
                                        <option>Yes</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Membership Clearance:</label>
                                    <div class="form-group">
                                        <select class="form-control" 
                                        id="mem_clear" name="mem_clear" required>
                                        <option>No</option>
                                        <option>Yes</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Library Clearance:</label>
                                    <div class="form-group">
                                        <select class="form-control" 
                                        id="lib_clear" name="lib_clear" required>
                                        <option>No</option>
                                        <option>Yes</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Video/Testimonial Clear:</label>
                                    <div class="form-group">
                                        <select class="form-control" 
                                        id="v_t_clear" name="v_t_clear" required>
                                        <option>No</option>
                                        <option>Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Office Clearance:</label>
                                    <div class="form-group">
                                            <select class="form-control" 
                                            id="off_clear" name="off_clear" required>
                                       <option>No</option>
                                        <option>Yes</option>
                                    </select>
                                    </div>
                                </div>
                               </div> 
                            </div>
						  </div>
                     </div>
<!-- Attendant Information end ================================================== -->
				        <div class="form-group col-sm-6">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Gate Pass</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="rt_gate_pass_clearance.php">Edit Gate Pass</a>
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
