<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

    <script src="js/myjs/get_building_room.js"></script>
    <script src="js/myjs/get_rt_attendant_info.js"></script>

<title>Attendant Information</title>

</head>
<body>

<!-- JS Script for Display====================== -->
	  <script> 
		  $(function () {
			$(":file").change(function () {
				if (this.files && this.files[0]) {
					var reader = new FileReader();
					reader.onload = imageIsLoaded;
					reader.readAsDataURL(this.files[0]);
				}
				});
			});

			function imageIsLoaded(e) {
				$('#myImg').attr('src', e.target.result);
			};
	</script>
<!-- JS script for print button====================== -->
    <script>    
        function printRepo_a()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_attendant_info.php", "reports/Rt_attendant_register.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
    </script>
    
        <form action="database/Rt_attendant_info.php" method="post"  enctype="multipart/form-data">
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h4><b>Attendant Information </b></h4>
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
                                    <label>Attendant of :</label>
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
                        <div class="form-group col-sm-8">
                                <label>Final Diagnosis / Nature of Illness:</label>
                                <textarea class="form-control" rows="1" id="final_diagnosis" name="final_diagnosis" readonly placeholder="Diseases to be treated / Objective of Treatment"></textarea>
                        </div>
                         <div class="form-group col-sm-2">
                            <label>Attendant ID:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="rt_attendant_info_id" name="rt_attendant_info_id" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>No Attendants:</label>
                            <select class="form-control" 
                                    id="no_attendant" name="no_attendant" required>
                                <option></option>
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                        </div>
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
                        Attendant Information
                    </div>
                    <div class="panel-body">
				            <div class="media-body">
                                <div class="form-group col-sm-5">
                                    <label>1st Attendant Name:</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control" 
                                               id="attendant_name1" name="attendant_name1" required>
                                      </div>
                                </div>
                                 <div class="form-group col-sm-3">
                                    <label>1st Mobile No.:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                               id="mobile_no1" name="mobile_no1" 
                                               placeholder="Mobile Number" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Relation with Participant:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" 
                                               id="relation1" name="relation1" placeholder="Father / Brother" required>
                                    </div>
                                </div> 
                                <div class="form-group col-sm-5">
                                    <label>2nd Attendant Name:</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control" 
                                               id="attendant_name2" name="attendant_name2" required>
                                      </div>
                                </div>
                                 <div class="form-group col-sm-3">
                                    <label>2nd Mobile No.:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                               id="mobile_no2" name="mobile_no2"
                                               placeholder="Mobile Number" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Relation with Participant:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" 
                                               id="relation2" name="relation2" placeholder="Father / Brother" required>
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
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Attendant Card</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="rt_attendant_info.php">Edit Attendant Info</a>
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
