<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_op_header.php';?>

<title>OP Visit</title>

</head>
<body>

<script src="js/myjs/get_life_style_instructions.js"></script>
<script src="js/myjs/get_medicine_names.js"></script>
<script src="js/myjs/get_personal_details_pr.js"></script>
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
                    //var disease_name = $('#disease_name').val();
                    var medicine_names = $('#medicine_names').val();
                   // var dosage = $('#dosage').val();
                   // var quantity = $('#quantity').val();
                    var medicine_prescriptions = $('#medicine_prescriptions').val();

                    if(medicine_prescriptions =="")
                        medicine_prescriptions = medicine_names;
                        //medicine_prescriptions = disease_name + "~~" + medicine_names + "~~" + dosage + "~~" + quantity;
                    else
                        medicine_prescriptions = medicine_prescriptions + "\n" + medicine_names;
                        //medicine_prescriptions = medicine_prescriptions + "\n" + disease_name + "~~" + medicine_names + "~~" + dosage + "~~" + quantity;
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
            $('#add_life_style_prescriptions').click		// process to call on click in given field
            ( 
                function() 
                {	
                    var disease_name = $('#disease_namea').val();
                    var life_style_instructions = $('#life_style_instructions').val();   // read from control 
                    var life_style_prescriptions = $('#life_style_prescriptions').val();

                    if(life_style_prescriptions =="")
                        life_style_prescriptions = life_style_instructions;
                        //life_style_prescriptions = disease_name + "~~" + life_style_instructions;                
                    else
                        life_style_prescriptions = life_style_prescriptions + "\n" + life_style_instructions; 
                        //life_style_prescriptions = life_style_prescriptions + "\n" + disease_name + "~~" + life_style_instructions;  

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
        url=url.replace("op_visit.php", "reports/Op_medicine_chart.php");
        //alert (url)
        window.open(url);

        //alert("sadsad");
    }
     function printRepo_b()
    {
        url ="";
        url=document.URL;
        url=url.replace("op_visit.php", "reports/Op_ls_inst_chart.php");
        //alert (url)
        window.open(url);

        //alert("sadsad");
    }
</script>
    
    <form action="database/Op_visit.php" method="post">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>OP Visit</b></h4>
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
                                    <div class="form-group col-sm-12">
                                        <label>Final Diagnosis / Nature of Illness:</label>
                                        <textarea class="form-control" rows="1" id="final_diagnosis" name="final_diagnosis" readonly placeholder="Diseases to be treated / Objective of Treatment"></textarea>
                                    </div>
                                </div>
                            </div>
						</div>
                        <div class="form-group col-sm-4">
                            <label> Date:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                       id="visit_date" name="visit_date" required>
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
<!-- Fetched Personal Information Pannel end ============================================= --> 
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
                                id="complaints" name="complaints" placeholder=" c/o Headache since 2 days, c/o Fever since 3 days">
                        </div>
                     </div>
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
                    <div class="form-group col-sm-8">
                        <label>On Examination:</label>
                            <div class="form-group" >
                            <input type="text" class="form-control"
                                    id="oe" name="oe" placeholder="PR/RR/RBS/Girth">
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
                    Health Prescriptions
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
                        <div class="form-group col-sm-3">
                            <label>Select Disease Category:</label>
                                <div class="form-group">
                                    <input list="disease_categorys" class="form-control" id= "disease_category" name="disease_category">
                                      <datalist id="disease_categorys">
                                        <option value="">
                                      </datalist>
                                </div>
                        </div>
                        <div class="form-group col-sm-11">
                            <label>Select Medicine Name:</label>
                                <div class="form-group">
                                    <input list="medicine_name" class="form-control" id= "medicine_names" name="medicine_names">
                                      <datalist id="medicine_name">
                                        <option value="">
                                      </datalist>
                                </div>
                        </div> 
                        <div class="form-group col-sm-1">
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
<!--Tab Medicine Prescription ends-->
<!-- Life Style Prescription Pannel starts ================================================== -->
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
                               <!--<div class="form-group col-sm-4">
                                    <label>Select Disease Name:</label>
                                        <div class="form-group">
                                            <input list="disease_names" class="form-control" id= "disease_namea" name="disease_name">
                                              <datalist id="disease_names">
                                                <option value="">
                                              </datalist>
                                        </div>
                                </div>-->
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
<!-- Life Style Prescription Pannel ends================================================== -->
                            </div>
                          </div>
                        </div>
                    </div>
                </div>   	
 <!-- Nav Tab Bar Pannel end ================================================== -->	
                    <div class="form-group col-sm-6">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Add</button>
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
                            <a class="btn btn-info pull-right" href="op_visit_up.php">Edit Visit</a>
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
