<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'ak_com_header.php';?>
<title>Registration Form</title>
</head>
<body>
<!-- JS Script for Photo upload and Display====================== -->
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
            <form action="database/P_registration.php" method="post" enctype="multipart/form-data">
               <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h5><b>Registration Form </b></h5>
                    
<!-- Personal Information Pannel Start ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Personal Information
                    </div>
                    <div class="panel-body">
                             
                             <div class="form-group col-sm-3">
                                <label>Date of Reg:</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" 
                                           id="dor" name="dor" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-7">
                                        <label>Full Name:</label>
                                       <div class="form-group">
                                            <input list="full_names" class="form-control" id= "full_name" name="full_name">
                                              <datalist id="full_names">
                                                <option value="">
                                              </datalist>
                                            <input type="text" class="form-control" id= "full_namea" name="full_namea">
                                        </div>
                                </div>
                               <div class="form-group col-sm-2">
                                    <label>Person ID:</label>
                                    <div class="form-group" >
                                        <input type="number" class="form-control"
                                           id="person_id" name="person_id" readonly>
                                    </div>
                                </div>
                            <div class="form-group col-sm-4">
                                <label>Gender:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                            id="gender" name="gender" required>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Date of Birth:</label>
                                <div class="form-group" >
                                    <input type="date" class="form-control"
                                           id="dob" name="dob">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Place of Birth:</label>
                                <div class="form-group" >
                                    <input type="text" class="form-control"
                                           id="pob" name="pob" placeholder="Mumbai">
                                </div>
                            </div>
                             <div class="form-group col-sm-4">
                                <label>Marital Status:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                            id="marital_status" name="marital_status" required>
                                        <option>Married</option>
                                        <option>Unmarried</option>
                                        <option>Single</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Male Childern:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" 
                                           id="male_child" name="male_child"
                                           placeholder="No. of Male Issues">
                                </div>
                            </div>
                             <div class="form-group col-sm-4">
                                <label>Female Childern:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" 
                                           id="female_child" name="female_child"
                                           placeholder="No. of Female Issues">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Occupation:</label>
                                <div class="form-group" >
                                    <input type="text" class="form-control"
                                           id="occupation" name="occupation"
                                           required placeholder="Teacher">
                                </div>
                            </div>
                            <div class="form-group col-sm-8">
                                <label>Occupational Special Features:</label>
                                <div class="form-group" >
                                    <input type="text" class="form-control"
                                           id="occu_spl_fea" name="occu_spl_fea">
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
<!-- Personal Information Pannel End ================================================== -->
<!-- Photo upload Pannel Start================================================== -->
                    <div class="panel-group">
                        <div class="panel panel-primary">
                           <div class="panel-heading">
                                Photo upload
                            </div>
                             <div class="panel-body">
                                <div class="form-group col-sm-4">
                                <label> Uploaded Photo</label>
                                    <div class="form-group"> 
                                    <a class="pull-left" href="#">
									<img id="photo" class="img-rounded" width="137" height="171" src="images/a25.jpg" alt="Image not uploded">
								    </a>
                                    </div>
                                </div>
                               <div class="form-group col-sm-8">
                                <label>Photo size: 137x171 px (100 dpi)</label>
                                    <div class="form-group">
										<input type='file' class="form-control"
                                         name="photo"/>
                                        <a class="pull-right" href="#">
                                         <img class="card-img-top" id="myImg" name="photo" src="#" alt="Image not uploded" width="137" height="171"/>
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
<!-- Photo upload Pannel End================================================== -->
<!--  Address Details Pannel Start ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Address Details
                    </div>

                    <div class="panel-body">
                            
                            <div class="form-group col-sm-12">
                                <label>Postal Address:</label>
                                    <textarea class="form-control" rows="2" 
                                            id="address" name="address" placeholder="House/Plot/Flat No., Building Name, Area/Colony Name, Near-by Land mark, At Post & PIN/ZIP Code"></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Place:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="at_post" name="at_post"
                                           placeholder="Name of City / At Post">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>PIN/ZIP Code:</label>
                                <div class="form-group" >
                                    <input type="text" class="form-control"
                                           id="pin_code" name="pin_code"
                                           placeholder="Postal Code">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Nation:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                            id="nation_name" name="nation_name">
									</select>
                                    <input type="text" class="form-control" id= "nation_namea" name="nation_namea" readonly>
									
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>State Name:</label>
                                <div class="form-group">
                                 	<select class="form-control" 
                                            id="state_name" name="state_name">
                                    </select>
                                     <input type="text" class="form-control" id= "state_namea" name="state_namea" readonly>
                                </div>
                            </div>
							<div class="form-group col-sm-4">
                                <label>District Name:</label>
                                <div class="form-group">
                                 	<select class="form-control" 
                                            id="district_name" name="district_name">
                                    </select>
                                     <input type="text" class="form-control" id= "district_namea" name="district_namea" readonly>
                                    
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Tahsil Name:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                            id="tahsil_name" name="tahsil_name">
											<option></option>
									</select>
                                    <input type="text" class="form-control" id= "tahsil_namea" name="tahsil_namea" readonly>
                                    
								</div>
                            </div>                                               
                            <div class="form-group col-sm-4" id="tohide2">
                                <label>Passport No.:</label>
                                <div class="form-group" >
                                    <input type="text" class="form-control"
                                           id="passport_no" name="passport_no"
                                           placeholder="If not Indian">
                                </div>
                            </div>
                             <div class="form-group col-sm-4" id="tohide1">
									<label> Passport Document:</label>
									<div class="form-group" >
                                        <input type="file" class="form-control"
                                         id="passport_doc" name="passport_doc">
                                   </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label> Uploaded Document</label>
                                    <div class="form-group"> 
                                    <a class="pull-left" href="#">
									<img name="passport_doca" id="passport_doca"class="img-rounded"  width="30" height="40" src="images/a25.jpg" alt="Not uploded">
								    </a>
                                    </div>
                            </div>
                        </div>
                    </div>
                	</div>
<!--  Address Details Pannel End ================================================== -->
<!--  Contact Details Pannel Start================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Contact Details
                    </div>

                    <div class="panel-body">
                            
                               <div class="form-group col-sm-4">
                                <label>Laneline Phone No. (R):</label>
                                <div class="form-group" >
                                    <input type="number" class="form-control"
                                           id="residence_phone" name="residence_phone"
                                           placeholder="0231-2321565">
                                </div>
                            </div>
                        
                            <div class="form-group col-sm-4">
                                <label>Mobile No.</label>
                                <div class="form-group">
                                    <input type="number" class="form-control"
                                           id="mobile_no" name="mobile_no"
                                           placeholder="Mobile Number">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Emergency No.:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control"
                                           id="emergency_no" name="emergency_no"
                                           placeholder="Emergency Contact No.">
                                </div>
                            </div>
							<div class="form-group col-sm-4">
                                <label>Whatsapp No.</label>
                                <div class="form-group">
                                    <input type="number" class="form-control"
                                           id="whatsapp_no" name="whatsapp_no"
                                           placeholder="Mobile Number">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="email">Email Address:</label>
                                <input type="email" class="form-control" 
                                       id="email" name="email"
                                        placeholder="Email Address">
                            </div>
                       		<div class="form-group col-sm-4">
									<label>How you came to know about us?</label>
									<div class="form-group">
										<select class="form-control" 
												id="reference" name="reference">
											<option>Internet</option>
											<option>Book, Magazine</option>
											<option>Friend, Relative</option>
											<option>Seminar, Workshop</option>
										</select>
									</div>
								</div>
				            </div>
                    </div>
                </div>
<!--  Contact Details Pannel End================================================== -->
 <!-- For Office Use Only Pannel Start================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        For Office Use Only
                    </div>
                    <div class="panel-body">
                             <div class="form-group col-sm-6">
                                    <label>Register this Person as:</label>
                                    <div class="form-group">
                                    <select class="form-control" 
                                            id="person_category" name="person_category">
                                        <option>Participant</option>
                                        <option>Patient</option>
                                        <option>Student</option>
                                        <option>Employee</option>
                                        <option>Subscriber</option>
                                        <option>Member</option>
                                        <option>Donner</option>
                                    </select>
                                    </div>
                                </div>
                                 <div class="form-group col-sm-3">
                                <label>User ID:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="user_id" name="user_id" <?php echo " value='". $_SESSION['user_id'] ."'";?>>
                            </div>
                            </div>
				        </div>
                    </div>
                </div>
<!--  For Office Use Only Pannel End================================================== --> 
 
						<div class="form-group col-sm-12">
								<div class="form-group" >
								<button type="submit" class="btn btn-primary">Submit</button>
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
