<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

    <script src="js/myjs/get_medicine_names.js"></script>
    <script src="js/myjs/get_rt_daily_medicine_prescription_up.js"></script>

<title>Update Daily RT Medicine Prescription</title>

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
            url=url.replace("rt_daily_medicine_prescription_up.php", "reports/Rt_medicine_chart.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
    </script>

    <form action="database/Rt_daily_medicine_prescription_up.php" method="post">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>Update Daily RT Medicine Prescription</b></h4>
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
                                    <textarea class="form-control" rows="1" id="final_diagnosis" name="final_diagnosis" readonly placeholder="Diseases to be treated / Objective of Treatment"></textarea>
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
                     </div>
                  </div>
			</div>		
<!-- Fetched Personal Information Pannel end ============================================= --> 
<!-- Fetched All Daily Medicine Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        All Daily Medicine Records of above Participant 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>SH</th>
                                    <th>Medicine Name</th>
                                    <th>Dosage</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody id="all_rt_medicine_records">	
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Date:</label>
                        <div class="form-group">
                        <input type="date" class="form-control" 
                        id="daily_date" name="daily_date" required>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label> &nbsp;</label>
                        <div class="form-group" >
                        <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
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
                    <!--<div class="form-group col-sm-2">
                        <label>Retreat Day:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                   id="retreat_day" name="retreat_day" readonly>
                        </div>
                    </div>-->
                    <div class="form-group col-sm-3">
                        <label>User ID:</label>
                        <div class="form-group">
                        <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?> readonly>
                    </div>
                </div>
                </div>
            </div>
        </div>
<!-- Fetched All Daily Medicine Records Pannel Ends================================= -->
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

                <div class="form-group col-sm-8">
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
                            <a class="btn btn-info pull-right" href="rt_daily_medicine_prescription.php">Add RT Med Presc</a>
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
