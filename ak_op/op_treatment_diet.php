<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_op_header.php';?>

<title>OP Treatment and Diet Prescription</title>

</head>
<body>

<script src="js/myjs/get_treatment_details.js"></script>
<script src="js/myjs/get_diet_name.js"></script>
<script src="js/myjs/get_op_treatment_diet.js"></script>
<!-- JS Script for OP Treatment Prescription====================== -->         
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
<!-- JS Script for OP Diet Prescription====================== -->         
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
<!-- JS script for print button====================== -->
<script>    
    function printRepo_a()
    {
        url ="";
        url=document.URL;
        url=url.replace("op_treatment_diet.php", "reports/Op_treat_chart.php");
        //alert (url)
        window.open(url);

        //alert("sadsad");
    }
     function printRepo_b()
    {
        url ="";
        url=document.URL;
        url=url.replace("op_treatment_diet.php", "reports/Op_diet_chart.php");
        //alert (url)
        window.open(url);

        //alert("sadsad");
    }
</script>
     
    <form action="database/Op_treatment_diet.php" method="post">
         <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>OP Treatment and Diet Prescription</b></h4>
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
                                 <!-- <div class="form-group col-sm-3">
                                    <label>User ID:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?>readonly>
                                    </div>
                                </div>-->
                                </div>
                            </div>
						</div>
                     </div>
                  </div>
			</div>		
<!-- Fetched Personal Information Pannel end ============================================= --> 
<!-- Fetched OP Visit Records Pannel starts ================================== -->
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            All OP Visit Records 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-        hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>OP Visit ID</th>
                                        <th>OP Visit Date</th>
                                        <th>Schedule</th>
                                        <th>OP Case Sheet ID</th>
                                        <th>User ID</th>  
                                    </tr>
                                </thead>
                                <tbody id="old_op_visit_records_list">	
                                </tbody>
                            </table>
                            <div class="form-group col-sm-2">
                                <label>OP Visit ID:</label>
                                <div class="form-group" >
                                    <input type="number" class="form-control"
                                       id="op_visit_id" name="op_visit_id">
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label> &nbsp;</label>
                                <div class="form-group" >
                                    <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                                </div>
                            </div>
                             <div class="form-group col-sm-3">
                                <label>OP Visit Date:</label>
                                <div class="form-group" >
                                    <input type="date" class="form-control"
                                       id="visit_date" name="visit_date" readonly>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Schedule:</label>
                                <div class="form-group">
                                        <select class="form-control" 
                                        id="schedule" name="schedule" readonly>
                                    <option>Morning</option>
                                    <option>Afternoon</option>
                                    <option>Evening</option>
                                </select>
                                </div>
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
<!-- Fetched OP Visit Records Pannel Ends================================= -->
<!-- Today's Health Assessment ================================================== -->
          <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Today's Health Assessment
                </div>
                <div class="panel-body">
                    <div class="form-group col-sm-12">
                        <label>Today's Complaints:</label>
                        <div class="form-group" >
                        <input type="text" class="form-control"
                                id="complaints" name="complaints" readonly>
                        </div>
                     </div>
                    <div class="form-group col-sm-2">
                        <label>Weight:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="weight" name="weight"  readonly>
                            </div>
                     </div>
                    <div class="form-group col-sm-2">
                        <label>Blood Pressure:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="bp" name="bp" readonly>
                            </div>
                     </div>
                    <div class="form-group col-sm-8">
                        <label>On Examination:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="oe" name="oe" readonly>
                            </div>
                     </div>
                </div> 
            </div>
        </div>		
<!-- Today's Health Assessment Pannel end ================================================== -->
<!-- Nav Tab Bar Pannel ================================================== -->
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Treatment and Diet Prescription
                </div>
                <div class="panel with-nav-tabs">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab"> Treatment Prescription</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Diet Prescription</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                    <div class="tab-content">  
<!--Tab Treatment Prescription starts-->
                            <div class="tab-pane fade in active" id="tab1default">
                                    <div class="form-group col-sm-3">
                                        <label>Therapy Department:</label>
                                            <div class="form-group">
                                                <input list="therapy_depts" class="form-control" id= "therapy_dept" name="therapy_dept">
                                              <datalist id="therapy_depts">
                                                <option value="">
                                              </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-5">
                                        <label>Treatment Name:</label>
                                            <div class="form-group">
                                                <input list="treatment_names" class="form-control" id= "treatment_name" name="treatment_name">
                                              <datalist id="treatment_names">
                                                <option value="">
                                              </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label>Treatment Time:</label>
                                            <div class="form-group">
                                                <input list="treatment_times" class="form-control" id= "treatment_time" name="treatment_time">
                                              <datalist id="treatment_times">
                                                <option value="">
                                              </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label>Therapist Name:</label>
                                            <div class="form-group">
                                                <input list="staff_short_names" class="form-control" id= "staff_short_name" name="staff_short_name">
                                              <datalist id="staff_short_names">
                                                <option value="">
                                              </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-8">
                                        <label> Treatment Instructions:</label>
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
                                                <textarea class="form-control" rows="3" id="treatment_prescriptions" name="treatment_prescriptions" placeholder="Treatment Prescriptions" required></textarea>
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
<!--Tab OP Treatment Prescription ends-->
<!--Tab OP Diet Prescription Pannel starts ================================================== -->
                           <div class="tab-pane fade" id="tab2default">
                                    <div class="form-group col-sm-3">
                                        <label>Morning Diet (8:30 AM):</label>
                                            <div class="form-group">
                                                <input list="morning_diets" class="form-control" id= "morning_diet" name="morning_diet">
                                              <datalist id="morning_diets">
                                                <option value="">
                                              </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label>Noon Diet (12:30 PM):</label>
                                            <div class="form-group">
                                                <input list="noon_diets" class="form-control" id= "noon_diet" name="noon_diet">
                                              <datalist id="noon_diets">
                                                <option value="">
                                              </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label>Afternoon Diet (3:30 PM):</label>
                                            <div class="form-group">
                                                <input list="afternoon_diets" class="form-control" id= "afternoon_diet" name="afternoon_diet">
                                              <datalist id="afternoon_diets">
                                                <option value="">
                                              </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label>Evening Diet (6:30 PM):</label>
                                            <div class="form-group">
                                                <input list="evening_diets" class="form-control" id= "evening_diet" name="evening_diet">
                                              <datalist id="evening_diets">
                                                <option value="">
                                              </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label> Instructions</label>
                                            <div class="form-group">
                                            <input type="text" class="form-control" value="0"
                                                   id="instruc" name="instruc">
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
                                                <textarea class="form-control" rows="3" id="diet_prescriptions" name="diet_prescriptions" placeholder="Diet Prescriptions" required></textarea>
                                            </div>
                                    </div>
                                    <div class="form-group col-sm-2 pull-right">
                                        <a href="../ak_com/diet_name.php">Add Diet Menu </a>
                                    </div>
                                </div>
                                
<!-- Tab OP Diet Prescription Pannel ends================================================== -->
                            </div>
                          </div>
                        </div>
                    </div>
                </div>   	
 <!-- Nav Tab Bar Pannel end ================================================== -->	
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Add</button>
                         </div>
                    </div>
                     <div class="form-group col-sm-3">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Treatment Chart</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_b()"> <span class="glyphicon glyphicon-print"></span> Diet Chart</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="op_treatment_diet_up.php">Edit Treatment and Diet</a>
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
