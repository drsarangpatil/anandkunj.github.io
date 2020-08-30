<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

    <script src="js/myjs/get_treatment_details.js"></script>
    <script src="js/myjs/get_diet_name.js"></script>
    <script src="js/myjs/get_medicine_names.js"></script>
    <script src="js/myjs/get_rt_daily_health_record.js"></script>

<title>Daily Health Record</title>

</head>
<body>
        
<!-- JS Script for Treatment Prescription====================== -->         
    <script >
        $(document).ready
        (
            function () 
            {	
                $('#prescribe_treatments').click		// process to call on click in given field
                ( 
                    function() 
                    {		
                        var treatment_name = $('#treatment_name').val();
                        var therapy_dept = $('#therapy_dept').val();
                        var treatment_time = $('#treatment_time').val();
                        var staff_short_name = $('#staff_short_name').val();
                        var treat_instructions = $('#treat_instructions').val();
                        var treatment_prescriptions = $('#treatment_prescriptions').val();
                        
                        if(treatment_prescriptions =="")
                            treatment_prescriptions =  treatment_name + "~~" + therapy_dept + "~~" + treatment_time + "~~" + staff_short_name + "~~" + treat_instructions;
                        else
                            treatment_prescriptions = treatment_prescriptions + "\n" +treatment_name + "~~" + therapy_dept + "~~" + treatment_time + "~~" + staff_short_name + "~~" + treat_instructions;
                        $('#treatment_prescriptions').val(treatment_prescriptions);
                    }
                );
            }
        );
    </script>
<!-- JS Script for Diet Prescription====================== -->         
    <script >
        $(document).ready
        (
            function () 
            {	
                $('#prescribe_diet').click		// process to call on click in given field
                ( 
                    function() 
                    {		
                        var morning_diet = $('#morning_diet').val();
                        var noon_diet = $('#noon_diet').val();
                        var afternoon_diet = $('#afternoon_diet').val();
                        var evening_diet = $('#evening_diet').val();
                        var instruc = $('#instruc').val();
                        var diet_prescriptions = $('#diet_prescriptions').val();
                        
                        if(diet_prescriptions =="")
                            diet_prescriptions =  morning_diet + "~~" + noon_diet + "~~" + afternoon_diet + "~~" + evening_diet + "~~" + instruc;
                        else
                            diet_prescriptions = diet_prescriptions + "\n" + morning_diet + "~~" + noon_diet + "~~" + afternoon_diet + "~~" + evening_diet + "~~" + instruc;
                        $('#diet_prescriptions').val(diet_prescriptions);
                    }
                );
            }
        );
    </script> 
<!-- JS Script for RT Days Calculation====================== -->
    <script>
     function calculateRTdays(){
            var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            var firstDate = new Date($("#doa").val());
            var secondDate = new Date($("#daily_date").val());

            var retreat_day = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay))+1);
            //alert ( retreat_day + "----" );
            $("#retreat_day").val(retreat_day);

        }
    </script>
<!-- JS script for print button====================== -->
    <script>    
        function printRepo_a()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_daily_health_record.php", "reports/Rt_treat_chart.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
         function printRepo_b()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_daily_health_record.php", "reports/Rt_diet_chart.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
        
        function printRepo_c()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_daily_health_record.php", "reports/Rt_daily_health_record.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
    </script>

    <form action="database/Rt_daily_health_record.php" method="post">
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>Daily Health Record</b></h4>
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
                        <div class="form-group col-sm-3">
                            <label>Today's Date:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                       id="daily_date" name="daily_date" onchange= "calculateRTdays()" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Retreat Day:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                       id="retreat_day" name="retreat_day">
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
<!-- Fetched Personal Information Pannel end ============================================= --> 
<!-- Fetched All Daily Health Assessment Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        All Daily Health Assessment Records of above Participant 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Date</th>
                                    <th>SH</th>
                                    <th>WT</th>
                                    <th>BP</th>
                                    <th>Amroli</th>
                                    <th>Water</th>
                                    <th>VC</th>
                                    <th>BM</th>
                                    <th>Complaints</th>
                                    <th>O/E</th>
                                </tr>
                            </thead>
                            <tbody id="all_rt_daily_health_records">	
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched All Daily Health Assessment Records Pannel Ends================================= -->
<!-- Daily Health Assessment ================================================== -->
          <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Today's Health Assessment
                </div>
                <div class="panel-body">
                    <div class="form-group col-sm-2">
                        <label>Weight:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="weight" name="weight" placeholder="50.8">
                            </div>
                     </div>
                    <div class="form-group col-sm-2">
                        <label>Blood Pressure:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="bp" name="bp" placeholder="120/70">
                            </div>
                     </div>
                     <div class="form-group col-sm-2">
                        <label>Amroli Kriya:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="amroli" name="amroli" placeholder="200ml/4 times">
                            </div>
                     </div>
                     <div class="form-group col-sm-2">
                        <label>Water Intake:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="water" name="water" placeholder="1 lit">
                            </div>
                     </div>
                    <div class="form-group col-sm-2">
                        <label>Detox Drink:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="detox" name="detox" placeholder="2 tsp">
                            </div>
                     </div>
                     <div class="form-group col-sm-2">
                        <label>Bowel Motions:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="motions" name="motions" placeholder="2 times">
                            </div>
                     </div>
                    <!--<div class="form-group col-sm-3">
                        <label>Other:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="other" name="other" placeholder="Emesis/Sleep">
                            </div>
                     </div>-->
                    <div class="form-group col-sm-6">
                        <label>Today's Complaints:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="complaints" name="complaints" placeholder="headache, lower back pain, knee pain">
                            </div>
                     </div>
                     <div class="form-group col-sm-6">
                        <label>On Examination:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="oe" name="oe" placeholder="PR/RR/RBS/Girth">
                            </div>
                     </div>
                </div> 
            </div>
        </div>		
<!-- Daily Health Assessment Pannel end ================================================== -->
<!-- Fetched All Daily Treatment Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        All Daily Treatment Records of above Participant 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>SH</th>
                                    <th>Treatment Name</th>
                                    <th>Therapy Dept</th>
                                    <th>Treatment Time</th>
                                    <th>Therapist Name</th>
                                    <th>Instructions</th>
                                </tr>
                            </thead>
                            <tbody id="all_rt_treatment_records">	
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched All Daily Treatment Records Pannel Ends================================= -->
<!-- Treatment Prescription Pannel ================================================== -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Daily Treatment Prescription
                </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-6">
                            <label>Treatment Name:</label>
                                <div class="form-group">
                                    <input list="treatment_names" class="form-control" id= "treatment_name" name="treatment_name">
                                    <datalist id="treatment_names">
                                    <option value="">
                                </datalist>
                            </div>
                        </div>
                           <!--<div class="form-group col-sm-6">
                                    <label>Treatment Name:</label>
                                    <div class="form-group">
                                        <select class="form-control" 
                                                id="treatment_name" name="treatment_name">
                                                <option></option>
                                        </select>
                                    </div>
                                </div>-->
                        <div class="form-group col-sm-4">
                            <label>Therapy Department:</label>
                                <div class="form-group">
                                    <input list="therapy_depts" class="form-control" id= "therapy_dept" name="therapy_dept">
                                    <datalist id="therapy_depts">
                                    <option value="">
                                </datalist>
                            </div>
                        </div>
                        <!--<div class="form-group col-sm-4">
                                    <label>Therapy Department:</label>
                                    <div class="form-group">
                                        <select class="form-control" 
                                                id="therapy_dept" name="therapy_dept">
                                                <option></option>
                                        </select>
                                    </div>
                                </div>-->
                         <div class="form-group col-sm-2">
                            <label>Therapy Time:</label>
                                <div class="form-group">
                                    <input list="treatment_times" class="form-control" id= "treatment_time" name="treatment_time">
                                    <datalist id="treatment_times">
                                    <option value="">
                                </datalist>
                            </div>
                        </div>
                      <!--<div class="form-group col-sm-2">
                            <label>Treatment Time:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                        id="treatment_time" name="treatment_time">
                                        <option></option>
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group col-sm-6">
                            <label>Therapist Name:</label>
                                <div class="form-group">
                                    <input list="staff_short_names" class="form-control" id= "staff_short_name" name="staff_short_name">
                                    <datalist id="staff_short_names">
                                    <option value="">
                                </datalist>
                            </div>
                        </div>
                        <!--<div class="form-group col-sm-6">
                            <label>Therapist Name:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                        id="staff_short_name" name="staff_short_name">
                                        <option></option>
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group col-sm-4">
                        <label> Treatment Instructions</label>
                            <div class="form-group">
                            <input type="text" class="form-control" value="0"
                                   id="treat_instructions" name="treat_instructions">
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label></label>
                                <div class="form-group">
                                <a id="prescribe_treatments" class="btn btn-success pull-right">Prescribe</a>
                                </div>
                        </div>
                         <div class="form-group col-sm-12">
                            <label>Treatment Prescriptions:</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="2" id="treatment_prescriptions" name="treatment_prescriptions" placeholder="Treatment Prescriptions" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <a href="../ak_com/treatment_name.php">Add Treatment Name </a>
                        </div>
                        <div class="form-group col-sm-3">
                            <a href="../ak_com/therapy_dept.php">Add Therapy Department</a>
                        </div>
                        <div class="form-group col-sm-3">
                            <a href="../ak_com/treatment_time.php">Add Treatment Time </a>
                        </div>
                        <div class="form-group col-sm-3">
                            <a href="../ak_com/p_registration.php">Add Therapist Name </a>
                        </div>
                    </div>
                </div>
<!--Treatment Prescription ends-->
<!-- Fetched All Daily Diet Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        All Daily Diet Records of above Participant 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>SH</th>
                                    <th>Morning (8:30 AM)</th>
                                    <th>Noon (12:30 PM)</th>
                                    <th>Afternoon (3:30 PM)</th>
                                    <th>Evening (6:30 PM)</th>
                                    <th>Instructions</th>
                                </tr>
                            </thead>
                            <tbody id="all_rt_diet_records">	
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched All Daily Diet Records Pannel Ends================================= -->
<!-- Diet Prescription Pannel ================================================== -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Daily Diet Prescription
                </div>
                   <div class="panel-body">
                        <div class="form-group col-sm-3">
                            <label>Morning Diet (8:30 AM):</label>
                                <div class="form-group">
                                    <input list="morning_diets" class="form-control" id= "morning_diet" name="morning_diet">
                                    <datalist id="morning_diets">
                                    <option value="">
                                </datalist>
                            </div>
                        </div>
                       <!--<div class="form-group col-sm-3">
                            <label>Morning Diet (8:30 AM):</label>
                            <div class="form-group">
                                <select class="form-control" 
                                        id="morning_diet" name="morning_diet">
                                        <option></option>
                                </select>
                            </div>
                        </div>-->
                       <div class="form-group col-sm-3">
                            <label>Noon Diet (12:30 PM):</label>
                                <div class="form-group">
                                    <input list="noon_diets" class="form-control" id= "noon_diet" name="noon_diet">
                                    <datalist id="noon_diets">
                                    <option value="">
                                </datalist>
                            </div>
                        </div>
                        <!-- <div class="form-group col-sm-3">
                            <label>Noon Diet (12:30 PM):</label>
                            <div class="form-group">
                                <select class="form-control" 
                                        id="noon_diet" name="noon_diet">
                                        <option></option>
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group col-sm-3">
                            <label>Afternoon Diet (3:30 PM):</label>
                                <div class="form-group">
                                    <input list="afternoon_diets" class="form-control" id= "afternoon_diet" name="afternoon_diet">
                                    <datalist id="afternoon_diets">
                                    <option value="">
                                </datalist>
                            </div>
                        </div>
                       <!-- <div class="form-group col-sm-3">
                            <label>Afternoon Diet (3:30 PM):</label>
                            <div class="form-group">
                                <select class="form-control" 
                                        id="afternoon_diet" name="afternoon_diet">
                                        <option></option>
                                </select>
                            </div>
                        </div>-->
                       <div class="form-group col-sm-3">
                            <label>Evening Diet (6:30 PM):</label>
                                <div class="form-group">
                                    <input list="evening_diets" class="form-control" id= "evening_diet" name="evening_diet">
                                    <datalist id="evening_diets">
                                    <option value="">
                                </datalist>
                            </div>
                        </div>
                       <!-- <div class="form-group col-sm-3">
                            <label>Evening Diet (6:30 PM):</label>
                            <div class="form-group">
                                <select class="form-control" 
                                        id="evening_diet" name="evening_diet">
                                        <option></option>
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group col-sm-10">
                            <label> Instructions</label>
                                <div class="form-group">
                                <input type="text" class="form-control" value="0"
                                       id="instruc" name="instruc" required>
                                </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label></label>
                                <div class="form-group">
                                <a id="prescribe_diet" class="btn btn-success pull-right">Prescribe</a>
                                </div> 
                        </div>     
                        <div class="form-group col-sm-12">
                            <label>Diet Prescriptions:</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="2" id="diet_prescriptions" name="diet_prescriptions" placeholder="Diet Prescriptions" required></textarea>
                            </div>
                        </div>
                       <div class="form-group col-sm-2 pull-right">
                            <a href="../ak_com/diet_name.php">Add Diet Menu </a>
                        </div>
                    </div>
                </div>
<!--Tab Diet Prescription ends-->

                <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="rt_daily_medicine_prescription.php">Daily Medicines</a>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Treatment Chart</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_b()"> <span class="glyphicon glyphicon-print"></span> Diet Chart</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_c()"> <span class="glyphicon glyphicon-print"></span> DHR Chart</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="rt_daily_health_record_up.php">Update DH Record</a>
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
