<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>
    <script src="js/myjs/get_building_room.js"></script>
    <script src="js/myjs/get_rt_room_allocation.js"></script>

    <title>Participant Room Allocation</title>

</head>
<body>

<!-- JS script for print button====================== -->
    <script>    
        function printRepo_a()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_room_allocation.php", "reports/Rt_room_allocation_chart.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
    </script>

        <form action="database/Rt_room_allocation.php" method="post"  enctype="multipart/form-data">
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h4><b>Participant Room Allocation </b></h4>
<!-- Fetched All Room Allocation Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All Room Allocation Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Building</th>
                                    <th>Room</th>
                                    <th>Status</th>
                                    <th>P. Name</th>
                                    <th>Bed</th>
                                    <th>DOA</th>
                                    <th>DOC</th>
                                    <th>RT-DU</th>
                                    <th>A1 Name</th>
                                    <th>Bed</th>
                                    <th>A2 Name</th>
                                    <th>Bed</th> 
                                </tr>
                            </thead>
                            <tbody id="all_rt_room_allocation_records">	
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched All Daily Health Assessment Records Pannel Ends================================= -->
<!-- Fetched Personal Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Retreat Participant's Information
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
                                    <label>Participant's Name :</label>
                                        <div class="form-group">
                                            <input list="full_names" class="form-control" id= "full_name" name="person_name">
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
                                    <label>User ID:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?> readonly>
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
                        <div class="form-group col-sm-9">
                                <label>Final Diagnosis / Nature of Illness:</label>
                                <textarea class="form-control" rows="1" id="final_diagnosis" name="final_diagnosis" readonly placeholder="Diseases to be treated / Objective of Treatment"></textarea>
                        </div>
                        <!--<div class="form-group col-sm-2">
                            <label>ID:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="rt_room_allocation_id" name="rt_room_allocation_id" readonly>
                            </div>
                        </div>-->
                        <div class="form-group col-sm-3">
                            <label>P Type:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="p_type" name="p_type" required>
                                <option>Participant</option>
                                <!--<option>Attendant</option>-->
                            </select>
                            </div>
                        </div>
                        </div>
				        </div>
						</div>
                     </div>
                  </div>
			</div>		
<!-- Fetched Personal Information Pannel end ================================================== -->
<!-- Room Allocation Pannel Start ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Room Allocation System
                    </div>
                    <div class="panel-body">
				            <div class="media-body">
                                <div class="form-group col-sm-3">
                                <label>Building Name:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                            id="building_name" name="building_name">
                                    </select>
                                </div>
                            </div>
                            <!--<div class="form-group col-sm-2">
                                <label>Old Room No:</label>
                                 <div class="form-group">
                                     <input type="text" class="form-control" id= "room_numbera" name="room_numbera" readonly>
                                    <select class="form-control" 
                                        id="room_number" name="room_number">
                                    </select>
                                </div>
                            </div>-->
                            <div class="form-group col-sm-2">
                                <label>Room Number:</label>
                                 <div class="form-group">
                                    <select class="form-control" 
                                        id="room_number" name="room_number">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label>Bed Number:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                            id="bed_number" name="bed_number">
                                        <option></option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Room Status:</label>
                                <div class="form-group">
                                     <select class="form-control" 
                                        id="room_status" name="room_status" required>
                                    <option>Occupied</option>
                                    <option>Vacant</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label>No. Attendants:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="no_attendant" name="no_attendant" readonly>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>1st Attendent:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="attendant_name1" name="attendant_name1" readonly>
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label>Bed Number:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                        id="bed_number1" name="bed_number1">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>2nd Attendent:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="attendant_name2" name="attendant_name2" readonly>
                                </div>
                            </div>
                             <div class="form-group col-sm-2">
                                <label>Bed Number:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                        id="bed_number2" name="bed_number2">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                        <div class="form-group col-sm-3 pull-left">
                            <a href="building_name.php">Add Building Names</a>
                        </div>
                        <div class="form-group col-sm-3 pull-left">
                            <a href="room_number_up.php">Edit Room Status</a>
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
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Room Allocation Chart</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="rt_room_allocation_up.php">Edit Room Info</a>
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
