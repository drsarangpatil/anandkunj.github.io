<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_op_header.php';?>
<title>Update - Medicine Prescription</title>

</head>
<body>
    <script src="js/myjs/get_medicine_names.js"></script>
    <script src="js/myjs/get_dir_medicine_prescription_up.js"></script>
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
<!-- JS script for print button====================== -->
<script>    
    function printRepo_a()
    {
        url ="";
        url=document.URL;
        url=url.replace("dir_medicine_prescription_up.php", "reports/Dir_medicine_prescription_report.php");
        //alert (url)
        window.open(url);

        //alert("sadsad");
    }
</script>
    

    <form action="database/Dir_medicine_prescription_up.php" method="post">
         <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>Update - Medicine Prescription</b></h4>
<!-- Fetched Personal Information ================================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                <div class="panel-heading">
                    Personal Information
                </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-3">
                            <label>Prescription Date:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                       id="prescription_date" name="prescription_date" required>
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
                                <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?>readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Prescri ID:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                   id="direct_visit_id" name="direct_visit_id"readonly>
                            </div>
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
                            <label>Age:</label>
                                <div class="form-group">
                                <input type="number" class="form-control"
                                   id="age" name="age"required>
                              </div>
                       </div>
                        <div class="form-group col-sm-2">
                            <label>Gender:</label>
                              <div class="form-group">
                                <select class="form-control" 
                                    id="gender" name="gender" required>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                              </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Mobile No.</label>
                            <div class="form-group">
                                <input type="number" class="form-control"
                                   id="mobile_no" name="mobile_no"
                                   placeholder="Mobile Number"required>
                            </div>
                        </div>
                    </div>
                </div></div>
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="form-group col-sm-12">
                                <label>Presenting Complaints:</label>
                                <div class="form-group" >
                                <input type="text" class="form-control"
                                    id="complaints" name="complaints" placeholder="headache, lower back pain, knee pain">
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
                            <div class="form-group col-sm-12">
                                <label>Diagnosis / Nature of Illness:</label>
                                    <textarea class="form-control" rows="1" id="final_diagnosis" name="final_diagnosis" placeholder="Diseases to be treated / Objective of Treatment"></textarea>
                                </div>
                            </div>
                    </div>
                </div>
            <!--</div>-->
<!-- Fetched Personal Information Pannel end ============================================= -->
<!--Tab Medicine Prescription starts-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Direct Medicine Prescription
                </div>
                    <div class="panel-body">
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
                </div>
<!--Tab Medicine Prescription ends-->	
                    <div class="form-group col-sm-6">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </div>
                     <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Med Rx</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="dir_medicine_prescription.php">Add Medicine Prescription</a>
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
