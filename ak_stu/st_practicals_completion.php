<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_st_header.php';?>

<title>Course Practicals Completion</title>

</head>
<body>

<script src="js/myjs/get_st_practicals_completion.js"></script>
<!-- JS Script for Course name ====================== -->    
<script src="js/myjs/get_st_course_name.js"></script>
<!-- JS script for print button====================== -->
<script>    
    function printRepo()
    {
        url ="";
        url=document.URL;
        url=url.replace("st_practicals_completion.php", "reports/Rt_st_register.php");
        //alert (url)
        window.open(url);

        //alert("sadsad");
    }
</script>
    
        <form action="database/St_practicals_completion.php" method="post">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h4><b>Course Practicals Completion</b></h4>
                                   
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
									<img id="photo" name="photo" class="img-rounded" width="137" height="171" src="../ak_com/assets/images/a25.jpg" alt="Image not uploded">
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
                                    <label>User ID:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?> readonly>
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
                                 <div class="form-group col-sm-4">
                                    <label>Email:</label>
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                        id="email" name="email"
                                        placeholder="Email" readonly>
                                    </div>
                                </div>
                                 <div class="form-group col-sm-4">
                                    <label>Place:</label>
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                        id="at_post" name="at_post"
                                        placeholder="City" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Occupation:</label>
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                        id="occupation" name="occupation"
                                        placeholder="Occupation" readonly>
                                    </div>
                                </div>
                                 <div class="form-group col-sm-12">
                                    <label>Address:</label>
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                        id="address" name="address"
                                        placeholder="Address" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                            <label>Course Name:</label>
                            <div class="form-group">
                                 <select class="form-control" onchange="stDuration()"
                                    id="course_name" name="course_name" readonly>
                                <option></option>
                            </select>
                            </div>
                        </div>
                         <div class="form-group col-sm-2">
                            <label>A Status:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="ad_status" name="ad_status" readonly>
                                <option></option>
                                <option>Admitted</option>
                                <!--<option>Completed</option>
                                <option>Discontinued</option>-->
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Language:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="course_language" name="course_language" readonly>
                                <option></option>
                                <option>Marathi</option>
                                <option>Hindi</option>
                                <option>English</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Admission ID:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="st_course_application_id" name="st_course_application_id" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Date of Admission:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" onchange="calculateSTDur()" 
                                       id="doa" name="doa" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Date of Completion :</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                id="doc" name="doc" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Course Duration:</label>
                            <div class="form-group">
                                <input type="number" class="form-control" onchange="calculateSTDur()"
                                       id="course_duration" name="course_duration" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Mother Tongue:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="mother_tongue" name="mother_tongue" readonly>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
             </div>
          </div>
    </div>		
<!-- Fetched Personal Information Pannel end ======================================= -->
<!-- Fetched Records Pannel starts ================================================== -->
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">
                All Practicals Allocation Records 
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>  
                                    <th>CPA ID</th>
                                    <th>Allocation Date</th>
                                    <th>Mode</th>
                                    <th>Name of Practical</th>
                                    <th>Practical Details</th>
                                    <th>User ID</th>  
                                </tr>
                            </thead>
                            <tbody id="course_practicals_records">	
                            </tbody>
                        </table>
                         <div class="form-group col-sm-2">
                            <label>CPA ID:</label>
                            <div class="form-group" >
                                <input type="number" class="form-control"
                                   id="st_practicals_allocation_id" name="st_practicals_allocation_id">
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label> &nbsp;</label>
                            <div class="form-group" >
                             <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched Records Pannel Ends ================================================== -->
<!-- Course Assignment Submission Pannel Start================================================== -->
                    
					<div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Course Practicals Completion Details
                    </div>	
                    <div class="panel-body">
                        <div class="form-group col-sm-3">
                            <label>Date of Start:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                id="d_allo_pra" name="d_o_s" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Date of Completion:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                id="d_o_c" name="d_o_c" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Mode of Practicals:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="mode_practice" name="mode_practice" required>
                                <option></option>
                                <option>Residential</option>
                                <option>Non-residential</option>
                                <option>Retreat</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Incharge:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Faculty"
                                id="incharge" name="incharge" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-9">
                            <label>Name of Practical Training:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                id="practical_name" name="practical_name"  required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Grade Secured:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="grade_secu" name="grade_secu" required>
                                <option></option>
                                <option>Grade - I</option>
                                <option>Grade - II</option>
                                <option>Grade - III</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Details of Practical Training Completed:</label>
                            <textarea class="form-control" rows="3" id="course_practicals" name="practicals_completed" required placeholder="Completed Practicals" ></textarea>
                        </div>
                    </div>
                </div>
            </div>
 <!-- Other Information Pannel End================================================== -->
				    <div class="form-group col-sm-6">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Print</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="st_practicals_completion_up.php">Edit Practicals Completion</a>
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
