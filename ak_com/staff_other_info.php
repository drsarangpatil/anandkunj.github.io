<?php
	if(session_id() == '') 
		session_start();
	
	if($_SESSION['role']!=="Director")
	{
        echo "<script language='javascript'>alert('You do not have rights to use this page')</script>";
        header("location:../index.php");
	}
		
?>
<?php include 'ak_com_header.php';?>
 <script src="./assets/js/myjs/get_staff_other_info.js"></script>
<title>Staff Other Information</title>
</head>
<body>
    <form action="database/Staff_other_info.php" method="post">
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h4><b>Staff Other Information </b></h4> 
<!-- Fetched Personal Information ================================================== -->
                <div class="panel-group">
                <div class="panel panel-primary">
                <div class="panel-heading">
                    Personal Information 
                </div>
                <div class="panel-body">
                    <div class="well">
                         <div class="media">
                            <div class="form-group col-sm-6">
                                <label>Staff Full Name:</label>
                                <div class="form-group">
                                    <input list="full_names" class="form-control" id= "full_name" name="full_name">
                                      <datalist id="full_names">
                                        <option value="">
                                      </datalist>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Staff Status:</label>
                                <div class="form-group" >
                                    <select class="form-control" 
                                            id="staff_status" name="staff_status" required>
                                        <option>Active</option>
                                        <option>Not Working</option>
                                        <option>On Leave</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group col-sm-3">
                                <label>Person ID: </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="person_id" name="person_id" readonly>
                                </div>
                            </div>
                            <div class="media-body">
                            <div> 
                                <a class="pull-left" href="#">
                                <img id="photo" name="photo" class="img-rounded" width="137" height="171" src="./assets/images/a25.jpg" alt="Image not uploded">
                                </a>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Date:</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" 
                                           id="other_info_date" name="other_info_date" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Passowrd:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label>Staff Info ID:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="staff_other_info_id" name="staff_other_info_id" readonly>
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label>User ID:</label>
                                <div class="form-group">
                                <input type="text" class="form-control" id="user_id" name="user_id" <?php echo " value='". $_SESSION['user_id'] ."'";?> readonly>
                            </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Date of Birth:</label>
                                <div class="form-group" >
                                    <input type="date" class="form-control"
                                           id="dob" name="dob" readonly>
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
             </div>
          </div>
    </div>		
<!-- Fetched Personal Information Pannel end ================================================== -->
<!-- Other Information Pannel Start================================================== -->

            <div class="panel-group">
                <div class="panel panel-primary">

                <div class="panel-heading">
                    Other Information
                </div>	
                <div class="panel-body">

                    <div class="form-group col-sm-4">
                            <label>Short Name:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="staff_short_name" name="staff_short_name"
                                       placeholder="Nick Name" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Mother Tongue:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="mother_tongue" name="mother_tongue"
                                       placeholder="Marathi" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Religion:</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       id="religion" name="religion"
                                       placeholder="Hindu"required>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Guardian Name:</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       id="guardian_name" name="guardian_name"
                                       placeholder="Ramesh Tendulkar" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Guardian Relationship:</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       id="guardian_relation" name="guardian_relation"
                                       placeholder="Father/Husband" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Guardian Mobile No.</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       id="guardian_mobile_no" name="guardian_mobile_no"
                                       placeholder="Mobile Number" required>
                            </div>
                        </div>

                       <div class="form-group col-sm-6">
                            <label>Adhar Card No.:</label>
                            <div class="form-group" >
                                <input type="text" class="form-control"
                                       id="adhar_no" name="adhar_no" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>PAN Card No.:</label>
                            <div class="form-group" >
                                <input type="text" class="form-control"
                                       id="pan_no" name="pan_no" required>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="text">Referred by:</label>
                            <input type="text" class="form-control" 
                                   id="referred_by" name="referred_by"
                                    placeholder="Name of person who referred" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Referrer Mobile No.</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       id="referrer_m_no" name="referrer_m_no"
                                       placeholder="Mobile number of referrer" required>
                            </div>
                        </div>

                     <div class="form-group col-sm-12">
                            <label>Past Wrok Exprience:</label>
                            <div class="form-group" >
                                <textarea class="form-control" rows="3" id="past_work_exp" name="past_work_exp" placeholder="1. Role....at.......Company Name" required></textarea>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
<!-- Other Information Pannel End================================================== -->
<!-- Educational Details ================================================== -->
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Educational Details
                </div>
                    <div class="panel-body">
                       <div class="form-group col-sm-3">
                            <label>Qualification:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="qualifcation1" name="qualifcation1"
                                       placeholder="10th/12th class" required>
                            </div>
                        </div>
                         <div class="form-group col-sm-6">
                            <label>College/Institute:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="institute1" name="institute1"
                                       placeholder="Name of College, Place" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Class/Grade:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="grade1" name="grade1"
                                       placeholder="Class obtained" required>
                            </div>
                        </div>
                    <div class="form-group col-sm-3">
                            <label>Qualification:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="qualifcation2" name="qualifcation2"
                                       placeholder="Graduation" required>
                            </div>
                        </div>
                         <div class="form-group col-sm-6">
                            <label>College/Institute:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="institute2" name="institute2"
                                       placeholder="Name of College, Place" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Class/Grade:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="grade2" name="grade2"
                                       placeholder="Class obtained" required>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
<!-- Official Info ================================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">

                <div class="panel-heading">
                    Official Information
                </div>
                <div class="panel-body">
                       <div class="form-group col-sm-3">
                            <label>Date of Joining:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                       id="doj" name="doj"
                                       required>
                            </div>
                        </div>
                         <div class="form-group col-sm-5">
                            <label>Name of Department:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="name_of_dept" name="name_of_dept"
                                       placeholder="Department Name" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Designation:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="designation" name="designation"
                                       placeholder="Designation" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Role:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                        id="role" name="role" required>
                                    <option>Doctor</option>
                                    <option>Office Staff</option>
                                    <option>Account Staff</option>
                                    <option>Therapist</option>
                                    <option>Kitchen Staff</option>
                                    <option>HK Staff</option>
                                    <option>Director</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group col-sm-5">
                            <label>Specialization:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="specialization" name="specialization"
                                       placeholder="Yoga/Naturopathy/Acupuncture" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Working Type:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="working_type" name="working_type"
                                       placeholder="Regular/Visiting/On Call" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-5">
                            <label>Bank Name:</label>
                            <div class="form-group" >
                                <input type="text" class="form-control"
                                       id="bank_name" name="bank_name"
                                       placeholder="Name of the Bank with Branch" required>
                            </div>
                        </div>
                           <div class="form-group col-sm-3">
                            <label>Bank IFSC Code:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="ifsc_code" name="ifsc_code"
                                       placeholder="Bank IFSC Code" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Saving Account No.:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="account_no" name="account_no"
                                       placeholder="Account No." required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <br> 
<!-- Pannel end ================================================== -->
            <div class="form-group col-sm-12">
                <div class="form-group" >
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
                </div>
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
