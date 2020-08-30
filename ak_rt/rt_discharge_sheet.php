<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

<!-- JS Script for Retreat name ====================== -->    
    <script src="js/myjs/get_retreat_name.js"></script>
    <script src="js/myjs/get_rt_discharge_sheet.js"></script>

<title>Retreat Discharge Sheet</title>

</head>
<body>

<!-- JS Script for RT Duration Calculation====================== -->
    <script>
     function calculateRTDur(){
            var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            var firstDate = new Date($("#doc").val());
            var secondDate = new Date($("#doa").val());

            var retreat_duration = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay))+1);
            //alert ( retreat_day + "----" );
            $("#retreat_duration").val(retreat_duration);

        }
    </script>
<!-- JS script for print button====================== -->
    <script>    
        function printRepo_a()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_discharge_sheet.php", "reports/Rt_discharge_register.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
        
        function printRepo_b()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_discharge_sheet.php", "rt_followup_prescription.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
        
        function printRepo_c()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_discharge_sheet.php", "rt_gate_pass_clearance.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
    </script>

        <form action="database/Rt_discharge_sheet.php" method="post">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h4><b>Retreat Discharge Sheet</b></h4>
                                   
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
                                <div class="form-group col-sm-12">
                                    <label>Final Diagnosis / Nature of Illness:</label>
                                    <textarea class="form-control" rows="1" id="final_diagnosis" name="final_diagnosis" readonly placeholder="Diseases to be Treated / Objective of Treatment"></textarea>
                                </div>
                            </div>
						   </div>
                        </div>
                       <div class="form-group col-sm-4">
                            <label>Discharge Date:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                       id="discharge_date" name="discharge_date" required>
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
                                <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?> readonly>
                            </div>
                        </div>
                     </div>
                  </div>
			</div>		
<!-- Fetched Personal Information Pannel end ================================================== -->
<!-- Discharge Process Pannel starts ================================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Initiate Discharge Process 
                    </div>
                    <div class="panel-body">
                         <div class="form-group col-sm-6">
                            <label>Retreat Name:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="retreat_name" name="retreat_name" required>
                                <option></option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Room No.:</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       id="room_number" name="room_number" readonly>
                            </div>
                        </div>
                         <div class="form-group col-sm-3">
                            <label>Room Status:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="room_status" name="room_status" required>
                                <option>Vacant</option>
                                <!--<option>Occupied</option>-->
                                
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Date of Admission:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" onchange="calculateRTDur()" 
                                       id="doa" name="doa">
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Date of Completion :</label>
                            <div class="form-group">
                                <input type="date" class="form-control" onchange="calculateRTDur()" 
                                id="doc" name="doc" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>RT Duration:</label>
                            <div class="form-group">
                                <input type="number" class="form-control"
                                       id="retreat_duration" name="retreat_duration"
                                       placeholder="10" required>
                            </div>
                        </div>
                         <div class="form-group col-sm-3">
                            <label>Admission Status:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="ad_status" name="ad_status">
                                <option>Completed</option>
                                <option>Discontinued</option>
                                <!--<option>Admitted</option>-->
                                
                            </select>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
<!-- Discharge Process Pannel Ends ================================================== -->
				
                    <div class="form-group col-sm-3">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Add</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Discharge Sheet</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_b()"> <span></span> Followup Presc</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_c()"> <span></span> Gate Pass</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="rt_discharge_sheet_up.php">Edit Discharge Sheet</a>
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
