<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_op_header.php';?>

<title>OP Case Sheet</title>

</head>
<body>

<!-- JS Script for Disease name ====================== -->    
<script src="../ak_com/js/myjs/get_diseases.js"></script>
<script src="js/myjs/get_personal_details_cs.js"></script>
<!-- JS Script for Final Diagnosis====================== -->
<script >
    $(document).ready
    (
        function () 
        {	
            $('#add_to_diagnosis').click			// process to call on click in given field
            ( 
                function() 
                {		
                    var disease_name = $('#disease_name').val();
                    var disease_nick = $('#disease_nick').val();        // read from control 
                    var final_diagnosis = $('#final_diagnosis').val();

                    if (final_diagnosis =="")
                        final_diagnosis = disease_name + "~~" + disease_nick;   // add to current text 
                    else
                        final_diagnosis = final_diagnosis + "\n" + disease_name + "~~" + disease_nick;

                    $('#final_diagnosis').val(final_diagnosis);            // set to control
                }
            );
        }
    );

</script>
<!-- JS Script for BMI Calculation====================== -->
<script>
     function calculateBmi()
        {
            var weight = 0;
            var height = 0;
            var bmi = 0;
            weight = parseInt($("#weight").val());
            height = parseInt($("#height").val());

            bmi = weight/(height/100*height/100); 
            //alert ( bmi + "----" );
            //bmi = Math.round(bmi * 100) / 100;
            //$("#bmi").val(bmi);
            $("#bmi").val(Math.round(bmi* 100) / 100);
        }
</script>
<!-- JS script for print button====================== -->
<script>    
    function printRepo()
    {
        url ="";
        url=document.URL;
        url=url.replace("op_case_sheet.php", "reports/Op_cs_register.php");
        //alert (url)
        window.open(url);

        //alert("sadsad");
    }
</script>

        <form action="database/Op_case_sheet.php" method="post">
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h4><b>OP Case Sheet </b></h4>
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
                                <img id="photo" name="photo" class="img-rounded"  width="137" height="171" src="../ak_com/assets/images/1.jpg" alt="Image not uploded">
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
                            <!-- <div class="form-group col-sm-2">
                            <label>User ID:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?>>
                            </div>
                        </div> -->
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
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-3">
                    <label>Case Paper Date:</label>
                    <div class="form-group">
                        <input type="date" class="form-control" 
                        id="case_paper_date" name="case_paper_date" required>
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
<!-- Present Complaints ================================================== -->
            <div class="row">
                 <div class="col-xs-6">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        Presenting Complaints and its History
                    </div>
                    <div class="panel-body">
						<label>Present Complaints:</label>
  						<textarea class="form-control" rows="5" id="present_complaints" name="present_complaints" required placeholder="C/o Complaint...Location...Duration...its History" ></textarea>
						</div>                      
                   </div>
                </div>
<!-- Present Complaints Pannel end ================================================== -->	
<!-- Past History ================================================== -->
                <div class="col-xs-6">
                    <div class="panel panel-primary">
						<div class="panel-heading">
							Past History
						</div>
						<div class="panel-body">
							<label>Past Diseases:</label>
  						<textarea class="form-control" rows="5" id="past_history" name="past_history" required placeholder="P/h/o Illness...since...duration...its History"></textarea>
						</div> 
                    </div>
                </div>
            </div>
<!-- Past History Pannel end ================================================== -->	
<!-- Clinical Record ================================================== -->
               <div class="row">
                   <div class="col-xs-6">
                    <div class="panel panel-primary">
						<div class="panel-heading">
							Clinical Record
						</div>
						<div class="panel-body">
							<label>Clinical History:</label>
  						<textarea class="form-control" rows="5" id="clinical_history" name="clinical_history" required placeholder="Treatment History/ Family History/  Personal History/Clinical Examination/ Investigation Reports "></textarea>
						</div> 
                    </div>
                </div>
<!-- Clinical Record Pannel end ================================================== -->
<!-- Final Diagnosis ================================================== -->
                <div class="col-xs-6">
                    <div class="panel panel-primary">
						<div class="panel-heading">
							Final Diagnosis
						</div>
						<div class="panel-body">
						<label>Final Diagnosis / Nature of Illness:</label>
                        <textarea class="form-control" rows="5" id="final_diagnosis" name="final_diagnosis" required placeholder="Hypertension, Obesity, Constipation "></textarea> 
                    </div>
                </div>
            </div>
        </div>
<!-- Final Diagnosis Pannel end ================================================== -->	
<!-- Nav Tab Bar Pannel ================================================== -->
                    <!--<div class="panel-group">
                    <div class="panel panel-primary">
						<div class="panel-heading">
							Clinical Record
						</div>
						<div class="panel with-nav-tabs">
							<div class="panel-heading">
									<ul class="nav nav-tabs">
									<li class="active"><a href="#tab1default" data-toggle="tab">Medication History</a></li>
										<li><a href="#tab2default" data-toggle="tab">Family History</a></li>
										<li><a href="#tab3default" data-toggle="tab">Personal History</a></li>
										<li><a href="#tab4default" data-toggle="tab">Clinical Examination</a></li>
										<li><a href="#tab5default" data-toggle="tab">Investigations</a></li>
									</ul>
								</div>
								<div class="panel-body">
									<div class="tab-content">-->
<!-- Treatment History ================================================== -->
										<!--<div class="tab-pane fade in active" id="tab1default">
											<label>Past Treatments and Present Medications:</label>
											<textarea class="form-control" rows="5" id="treatment_history" name="treatment_history" required placeholder="Name and dosage of present on-going medicines"></textarea>
										</div>-->
<!-- Treatment History Pannel end ================================================== -->
										
<!-- Family History ================================================== -->
										<!--<div class="tab-pane fade" id="tab2default">
											<label>Familial Hereditary:</label>
												<textarea class="form-control" rows="5" id="family_history" name= "family_history" required placeholder="Familial disease tendencies of father, mother, brothers, sisters etc."></textarea>
									   </div>-->
 <!-- Family History Pannel end ================================================== -->
										
<!-- Personal History ================================================== -->
							<!--<div class="tab-pane fade" id="tab3default">
                                <div class="form-group col-sm-6">
								    <label>Appetite:</label>
										<div class="form-group" >
										<input type="text" class="form-control"
												id="appetite" name="appetite" required
												placeholder="Aneroxia/ More/ Normal/ Malaise">
										</div>
							     </div>
                                <div class="form-group col-sm-6">
								    <label>Bowel Motions:</label>
										<div class="form-group" >
										<input type="text" class="form-control"
												id="bowel_motions" name="bowel_motions" required placeholder="Constipation/ Flatulence/ Mucoid/ Sticky/ Regular">
										</div>
							     </div>
                                <div class="form-group col-sm-6">
								    <label>Mituration:</label>
										<div class="form-group" >
										<input type="text" class="form-control"
												id="urination" name="urination" required placeholder="Frequent/ Burning/ Slow/ Incomplete/ Normal">
										</div>
							     </div>
                                 <div class="form-group col-sm-6">
								    <label>Sleep:</label>
										<div class="form-group" >
										<input type="text" class="form-control"
												id="sleep" name="sleep" placeholder="Late/ Disturbed/ Less/  Normal">
										</div>
							     </div>
                                 <div class="form-group col-sm-6">
								    <label>Food Habits:</label>
										<div class="form-group" >
										<input type="text" class="form-control"
												id="food_habits" name="food_habits" required placeholder="Non-vegetarian/ Vegetarian/ Hoteling/ Spicy/ Satvik">
										</div>
							     </div>
                                <div class="form-group col-sm-6">
								    <label>Addictions:</label>
										<div class="form-group" >
										<input type="text" class="form-control"
												id="addictions" name="addictions" required placeholder="Tea/Coffee/ Tobacco/ Smoking/ Alcohol/ TV/Mobile">
										</div>
							     </div>
                                 <div class="form-group col-sm-6">
								    <label>Type of Work:</label>
										<div class="form-group" >
										<input type="text" class="form-control"
												id="work_type" name="work_type" required placeholder="Physical/ Sedentary/ Traveling/ Time-bound/ Retired">
										</div>
							     </div>
                                <div class="form-group col-sm-6">
								    <label>Type of Stress:</label>
										<div class="form-group" >
										<input type="text" class="form-control"
												id="stress_type" name="stress_type" required placeholder="Ocupational/ Financial/ Domestic/ Relationship">
										</div>
							     </div>
                           	</div>-->		
 <!-- Personal History Pannel end ================================================== -->
<!-- Clinical Examination ================================================== -->
										<!--<div class="tab-pane fade" id="tab4default">
											<label>General Physical and Systemic Examination:</label>
												<textarea class="form-control" rows="5" id="clinical_examination" name="clinical_examination" required placeholder="S/o Examination/Assessments...Signs...Findings"></textarea>
											</div>-->
<!--Clinical Examination Pannel end ================================================== -->
										
<!-- Investigation Reports ================================================== -->
                   				<!--<div class="tab-pane fade" id="tab5default">
                                    <div class="form-group col-sm-4">
                                        <label>Weight (kg):</label>
                                            <div class="form-group">
                                            <input type="number" class="form-control"
                                               onchange="calculateBmi()" id="weight" name="weight" size="10">
                                            </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>Height (cm):</label>
                                            <div class="form-group">
                                            <input type="number" class="form-control"
                                                onchange="calculateBmi()" id="height" name="height" size="10">
                                            </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>BMI:</label>
                                            <div class="form-group">
                                            <input type="number" class="form-control"
                                               id="bmi" name="bmi" size="10" readonly>
                                            </div>
                                    </div>
                                <div> <label>Investigation Reports:</label>
									<textarea class="form-control" rows="5" id="investigations" name="investigations" required placeholder="Date...Test...Findings"></textarea>
                                </div>
								<div class="form-group col-sm-12">
                                	<label>Attach Reports:</label>
                                    <div class="form-group" >
                                    <input type="file" 
                                        id="reports" name="reports">
                                    </div>
                                </div>		
				            </div>  -->
<!--  Investigation Reports Pannel end ================================================== -->
							<!--	</div>
                              </div>
						</div>
                        </div>
					</div>
                              -->  	
 <!-- Nav Tab Bar Pannel end ================================================== -->					
	
<!-- Final Diagnosis ================================================== -->
    <!--<div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Final Diagnosis
            </div>
            <div class="panel-body">     
                <div class="form-group col-sm-5">
                    <label>Disease Category:</label>
                    <div class="form-group">
                        <select class="form-control" 
                        id="disease_category" name="disease_category">
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                <label>Disease Name:</label>
                    <div class="form-group">
                        <select class="form-control" 
                        id="disease_name" name="disease_name">
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-3">
                    <label>Disease Nick Name:</label>
                    <div class="form-group">
                        <select class="form-control" 
                        id="disease_nick" name="disease_nick">
                        </select>
                    </div>
                </div>
                <div>
                    <a id="add_to_diagnosis" class="btn btn-success pull-right">Add to Diagnosis </a>
                </div>     
                <div class="form-group col-sm-12">
                    <label>Final Diagnosis / Nature of Illness:</label>
                    <textarea class="form-control" rows="5" id="final_diagnosis" name="final_diagnosis" required placeholder="Hypertension, Obesity, Constipation "></textarea>
                </div>
                <div class="form-group col-sm-5">
                    <a href="../ak_com/disease_category.php">Add Disease Category </a>
                </div>
                <div class="form-group col-sm-4">
                    <a href="../ak_com/disease_name.php">Add Disease Name</a>
                </div>
                <div class="form-group col-sm-3">
                    <a href="../ak_com/disease_nick.php">Add Disease Nick </a>
                </div>
            </div>   
        </div>   
    </div>-->
                 
<!-- Final Diagnosis Pannel end ================================================== -->					
                    <div class="form-group col-sm-8">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Add</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Print</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="op_case_sheet_up.php">Edit OP Case-Sheet</a>
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
