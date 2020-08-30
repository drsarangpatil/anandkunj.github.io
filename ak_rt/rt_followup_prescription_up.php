<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

    <script src="js/myjs/get_life_style_instructions.js"></script>
    <script src="js/myjs/get_medicine_names.js"></script>
    <script src="js/myjs/get_rt_followup_prescription_up.js"></script>

<title>Update - RT Folllowup Prescription</title>

</head>
<body>
  
<!-- JS Script for Medicine Prescription====================== -->       
<script >
    $(document).ready
    (
        function () 
        {	
            $('#add_to_medicine_prescriptions').click		// process to call on click in given field
            ( 
                function() 
                {		
                    var disease_name = $('#disease_name').val();
                    var medicine_names = $('#medicine_names').val();
                    var dosage = $('#dosage').val();
                    var quantity = $('#quantity').val();
                    var medicine_prescriptions = $('#medicine_prescriptions').val();

                    if(medicine_prescriptions =="")
                        medicine_prescriptions = disease_name + "~~" + medicine_names + "~~" + dosage + "~~" + quantity;
                    else
                        medicine_prescriptions = medicine_prescriptions + "\n" + disease_name + "~~" + medicine_names + "~~" + dosage + "~~" + quantity;
                    $('#medicine_prescriptions').val(medicine_prescriptions);
                }
            );
        }
    );
</script>
<!-- JS Script for Life Style Prescription====================== -->         
<script >
    $(document).ready
    (
        function () 
        {	
            $('#add_life_style_prescriptions').click			// process to call on click in given field
            ( 
                function() 
                {	
                    var disease_name = $('#disease_namea').val();
                    var life_style_instructions = $('#life_style_instructions').val();   // read from control 
                    var life_style_prescriptions = $('#life_style_prescriptions').val();

                    if(life_style_prescriptions =="")
                        life_style_prescriptions = disease_name + "~~" + life_style_instructions;                 // add to current text 
                    else
                        life_style_prescriptions = life_style_prescriptions + "\n" + disease_name + "~~" + life_style_instructions;  

                    $('#life_style_prescriptions').val(life_style_prescriptions);  // set to control
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
            url=url.replace("rt_followup_prescription_up.php", "reports/Rt_followup_medicine_chart.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
         function printRepo_b()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_followup_prescription_up.php", "reports/Rt_followup_ls_inst_chart.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
    </script>
<!-- JS Script for FW Days Calculation====================== -->
<script>
 function calculateRTdays(){
        var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
        var firstDate = new Date($("#doa").val());
        var secondDate = new Date($("#followup_date").val());

        var followup_day = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay))+1);
        //alert ( retreat_day + "----" );
        $("#followup_day").val(followup_day);

    }
</script>
<!-- JS Script for BMI Calculation====================== -->
<script>
     function calculateBmi(){
            var weight = 0;
            var height = 0;
            var bmi = 0;
            weight = parseInt($("#weight").val());
            height = parseInt($("#height").val());

            bmi = weight/(height/100*height/100);
            bmi = Math.round(bmi * 100) / 100;
            //alert ( bmi + "----" );
            $("#bmi").val(bmi);

        }
</script>

    <form action="database/Rt_followup_prescription_up.php" method="post">
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>Update - RT Folllowup Prescription</b></h4>
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
                        <!--<div class="form-group col-sm-3">
                            <label>Today's Date:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                       id="followup_date" name="followup_date" onchange= "calculateRTdays()" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Followup Day:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                       id="followup_day" name="followup_day">
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
                                <input type="text" class="form-control" 
                                   id="user_id" name="user_id" required>
                        </div>
                        </div>-->
                     </div>
                  </div>
			</div>		
<!-- Fetched Personal Information Pannel end ============================================= -->
<!-- Fetched RT visit Records Pannel starts ================================== -->
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            All RT Followup Records 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-        hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Fw ID</th>
                                        <th>Fw Date</th>
                                        <th>Presenting Complaints</th>
                                        <th>WT</th>
                                        <th>BMI</th>
                                        <th>BP</th>
                                        <th>O/E</th>
                                        <th>Investigations</th>
                                        <th>User ID</th>  
                                    </tr>
                                </thead>
                                <tbody id="old_rt_followup_records_list">	
                                </tbody>
                            </table>
                            <div class="form-group col-sm-2">
                                <label>RT Followup ID:</label>
                                <div class="form-group" >
                                    <input type="number" class="form-control"
                                       id="rt_followup_id" name="rt_followup_id">
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label> &nbsp;</label>
                                <div class="form-group" >
                                    <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                                </div>
                            </div>
                             <div class="form-group col-sm-3">
                                <label>RT Followup Date:</label>
                                <div class="form-group" >
                                    <input type="date" class="form-control"
                                       id="followup_date" name="followup_date">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Schedule:</label>
                                <div class="form-group">
                                        <select class="form-control" 
                                        id="schedule" name="schedule">
                                    <option>Morning</option>
                                    <option>Afternoon</option>
                                    <option>Evening</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label>User ID:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?> readonly>
                                </div>
                            </div>
				            </div>
                        </div>
                    </div>
                </div>
<!-- Fetched RT Followup Records Pannel Ends================================= -->
<!-- Today's Health Assessment ================================================== -->
          <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Today's Health Assessment
                </div>
                <div class="panel-body">
                    <div class="form-group col-sm-8">
                        <label>Present Complaints:</label>
                        <div class="form-group" >
                        <input type="text" class="form-control"
                                id="complaints" name="complaints" placeholder=" c/o Headache since 2 days, c/o Fever since 3 days">
                        </div>
                     </div>
                    <div class="form-group col-sm-2">
                        <label>Weight (kg):</label>
                            <div class="form-group">
                            <input type="number" class="form-control"
                               onchange="calculateBmi()" id="weight" name="weight" size="10">
                            </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label>Height (cm):</label>
                            <div class="form-group">
                            <input type="number" class="form-control"
                                onchange="calculateBmi()" id="height" name="height" size="10">
                            </div>
                    </div>
                    <div class="form-group col-sm-8">
                        <label>On Examination:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="oe" name="oe" placeholder="PR/RR/RBS/Girth">
                            </div>
                     </div>
                    <div class="form-group col-sm-2">
                        <label>BMI:</label>
                            <div class="form-group">
                            <input type="number" class="form-control"
                               id="bmi" name="bmi" size="10" readonly>
                            </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label>Blood Pressure:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="bp" name="bp" placeholder="120/70">
                            </div>
                     </div>
                     <div class="form-group col-sm-12">
                        <label>Investigations:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="investigations" name="investigations" placeholder="USG/CT-Scan/PET-Scan/Blood Reports">
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
                    Followup Prescriptions
                </div>
                <div class="panel with-nav-tabs">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab"> Natual Medicines</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Life Style Prescription</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                    <div class="tab-content">  
<!--Tab Medicine Prescription starts-->
                    <div class="tab-pane fade in active" id="tab1default">
                        <div class="form-group col-sm-4">
                            <label>Select Disease Category:</label>
                                <div class="form-group">
                                    <input list="disease_categorys" class="form-control" id= "disease_category" name="disease_category">
                                      <datalist id="disease_categorys">
                                        <option value="">
                                      </datalist>
                                </div>
                        </div>
                        <!--<div class="form-group col-sm-6">
                            <label> Select Disease Category:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                        id="disease_category" name="disease_category">
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group col-sm-4">
                            <label>Select Disease Name:</label>
                                <div class="form-group">
                                    <input list="disease_names" class="form-control" id= "disease_name" name="disease_name">
                                      <datalist id="disease_names">
                                        <option value="">
                                      </datalist>
                                </div>
                        </div>
                         <!--<div class="form-group col-sm-6">
                            <label>Select Disease Name:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                        id="disease_name" name="disease_name">
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group col-sm-4">
                            <label>Select Medicine Name:</label>
                                <div class="form-group">
                                    <input list="medicine_name" class="form-control" id= "medicine_names" name="medicine_names">
                                      <datalist id="medicine_name">
                                        <option value="">
                                      </datalist>
                                </div>
                        </div> 
                      <!--<div class="form-group col-sm-5">
                            <label>Select Medicine Name:</label>
                            <div class="form-group">
                                <select class="form-control" 
                                        id="medicine_names" name="medicine_names">
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group col-sm-8">
                            <label>Select Dosage:</label>
                                <div class="form-group">
                                    <input list="dosages" class="form-control" id= "dosage" name="dosage">
                                      <datalist id="dosages">
                                        <option value="">
                                      </datalist>
                                </div>
                        </div>
                        <!--<div class="form-group col-sm-5">
                            <label>Dosage:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                            id="dosage" name="dosage">
                                    </select>
                                </div>
                        </div>-->
                        <div class="form-group col-sm-2">
                            <label>Quantity:</label>
                                <div class="form-group">
                                <input type="text" class="form-control" value="1"
                                       id="quantity" name="quantity"
                                       placeholder="10 Nos">
                                </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>&nbsp;</label>
                            <div class="form-group">
                                <a id="add_to_medicine_prescriptions" class="btn btn-success pull-right">Prescribe</a>
                            </div>
                        </div>
                        <!--<div>
                           <a id="add_to_medicine_prescriptions" class="btn btn-success pull-right">Prescribe</a>
                         </div> -->    
                         <div class="form-group col-sm-12">
                            <label>Medicine Prescriptions:</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="10" id="medicine_prescriptions" name="medicine_prescriptions" placeholder=" Medicine Prescriptions" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-sm-3 pull-right">
                            <a href="../ak_com/medicine_names.php">Add Medicine Names</a>
                        </div>
                                </div>
<!--Tab RT Medicine Prescription ends-->
<!-- RT Life Style Prescription Pannel starts ================================================== -->
                           <div class="tab-pane fade" id="tab2default">
                               <div class="form-group col-sm-5">
                                    <label>Select Disease Category:</label>
                                        <div class="form-group">
                                            <input list="disease_categorys" class="form-control" id= "disease_categorya" name="disease_category">
                                              <datalist id="disease_categorys">
                                                <option value="">
                                              </datalist>
                                        </div>
                                </div>
                              <!-- <div class="form-group col-sm-5">
                                    <label> Select Disease Category:</label>
                                    <div class="form-group">
                                        <select class="form-control" 
                                                id="disease_categorya" name="disease_category">
                                        </select>
                                    </div>
                                </div>-->
                               <div class="form-group col-sm-4">
                                    <label>Select Disease Name:</label>
                                        <div class="form-group">
                                            <input list="disease_names" class="form-control" id= "disease_namea" name="disease_name">
                                              <datalist id="disease_names">
                                                <option value="">
                                              </datalist>
                                        </div>
                                </div>
                                <!-- <div class="form-group col-sm-4">
                                    <label>Select Disease Name:</label>
                                    <div class="form-group">
                                        <select class="form-control" 
                                                id="disease_namea" name="disease_name">
                                        </select>
                                    </div>
                                </div>-->
                               <div class="form-group col-sm-3">
                                    <label>Select Language:</label>
                                        <div class="form-group">
                                            <input list="languages" class="form-control" id= "language" name="language">
                                              <datalist id="languages">
                                                <option value="">
                                              </datalist>
                                        </div>
                                </div>
                                <!--<div class="form-group col-sm-3">
                                    <label> Select Language:</label>
                                    <div class="form-group">
                                        <select class="form-control" 
                                                id="language" name="language">
                                        </select>
                                    </div>
                                </div>-->
                               <div class="form-group col-sm-10">
                                    <label for="life_style_instructions">Select Life Style Instructions:</label>
                                        <div class="form-group">
                                            <!--<select multiple class="form-control" id="life_style_instruction" name="life_style_instructions"></select>-->
                                            <input list="life_style_instruction" class="form-control" id= "life_style_instructions" name="life_style_instructions">
                                              <datalist id="life_style_instruction">
                                                <option value="">
                                              </datalist>
                                        </div>
                                </div>
                               <!-- <div class="form-group col-sm-10">
                                     <label for="life_style_instructions">Select Life Style Instructions:</label>
                                      <select multiple class="form-control" id="life_style_instructions" name="life_style_instructions">
                                        <option></option>
                                      </select>                      
                                </div>-->
                               <div class="form-group col-sm-2">
                                    <label>&nbsp;</label>
                                    <div class="form-group">
                                        <a id="add_life_style_prescriptions" class="btn btn-success pull-right">Prescribe</a>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Life Style Prescriptions:</label>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="20" id="life_style_prescriptions" name="life_style_prescriptions" placeholder=" Life Style Prescriptions" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3 pull-right">
                                    <a href="../ak_com/life_style_instructions.php">Add LS Instructions </a>
                                </div>
                            </div>
<!-- RT Life Style Prescription Pannel ends================================================== -->
                            </div>
                          </div>
                        </div>
                    </div>
                </div>   	
 <!-- Nav Tab Bar Pannel end ================================================== -->	
                    <div class="form-group col-sm-6">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Update</button>
                         </div>
                    </div>
                     <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Med Presc</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_b()"> <span class="glyphicon glyphicon-print"></span> LS Instr</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="rt_followup_prescription.php">Add Fw Prescription</a>
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
