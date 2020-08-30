<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_st_header.php';?>

<title>Update - Course Application From</title>

</head>
<body>

<script src="js/myjs/get_st_course_application_from_up.js"></script>
<!-- JS Script for Course name ====================== -->    
<script src="js/myjs/get_st_course_name.js"></script>
<!-- JS script for print button====================== -->
<script>    
    function printRepo()
    {
        url ="";
        url=document.URL;
        url=url.replace("st_course_application_from_up.php", "reports/Rt_st_register.php");
        //alert (url)
        window.open(url);

        //alert("sadsad");
    }
</script>
<!-- JS Script for RT DOC Calculation====================== -->
<script>
 function calculateSTDur()
    {
        //alert("1111" );
      try{

        var firstDate = new Date($("#doa").val());
        firstDate.setDate(firstDate.getDate() + parseInt($("#course_duration").val()));
        var dd= firstDate.getDate()-1;//+ $("#course_duration") val();
        var mm= firstDate.getMonth()+1;
        var yy= firstDate.getFullYear();
        //alert(yy+"/"+mm+"/"+dd);
        if(mm<10)
            mm = "0"+mm;
        if(dd<10)
            dd = "0" +dd;
        document.getElementById("doc").value =  yy+"-"+mm+"-"+dd
      }
        catch(err){}
    }

function stDuration(){
    //alert("1111 - " + $("#course_duration").val() );

    if ($("#course_name").val()=="Divya Amroli Yoga (DAY)")
       $("#course_duration").val(365);


    if ($("#course_name").val()=="Promotion of Positive Health")
       $("#course_duration").val(7);

    if ($("#course_name").val()=="LGSP Detox Shivir")
       $("#course_duration").val(5);

    if ($("#course_name").val()=="Digestive Detox Shivir")
       $("#course_duration").val(3);

    if ($("#course_name").val()=="Customized Health Shivir")
       $("#course_duration").val(0);

    calculateSTDur();

}
</script>
    
        <form action="database/St_course_application_from_up.php" method="post">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h4><b>Update - Course Application From </b></h4>
                                   
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
                            </div>
						  </div>
						</div>
                     </div>
                  </div>
			</div>		
<!-- Fetched Personal Information Pannel end ================================================== -->
<!-- Fetched Records Pannel starts ================================================== -->
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">
                All Course Records 
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>  
                                    <th>Course Ad ID</th>
                                    <th>Course Name</th>
                                    <th>Date of Admission</th>
                                    <th>Date of Completion</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>User ID</th>  
                                </tr>
                            </thead>
                            <tbody id="course_admission_records">	
                            </tbody>
                        </table>
                         <div class="form-group col-sm-2">
                            <label>Course Ad ID:</label>
                            <div class="form-group" >
                                <input type="number" class="form-control"
                                   id="st_course_application_id" name="st_course_application_id">
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label> &nbsp;</label>
                            <div class="form-group" >
                             <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                            </div>
                        </div>
                         <div class="form-group col-sm-5">
                            <label>Course Name:</label>
                            <div class="form-group">
                                 <select class="form-control" onchange="stDuration()"
                                    id="course_name" name="course_name" required>
                                <option></option>
                            </select>
                            </div>
                        </div>
                         <div class="form-group col-sm-3">
                            <label>Admission Status:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="ad_status" name="ad_status" required>
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
                                    id="course_language" name="course_language" required>
                                <option></option>
                                <option>Marathi</option>
                                <option>Hindi</option>
                                <option>English</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Date of Admission:</label>
                            <div class="form-group">
                                <input type="date" class="form-control" onchange="calculateSTDur()" 
                                       id="doa" name="doa" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Date of Completion :</label>
                            <div class="form-group">
                                <input type="date" class="form-control" 
                                id="doc" name="doc" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Course Duration:</label>
                            <div class="form-group">
                                <input type="number" class="form-control" onchange="calculateSTDur()"
                                       id="course_duration" name="course_duration" >
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Mother Tongue:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="mother_tongue" name="mother_tongue" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched Records Pannel Ends ================================================== -->
<!-- Other Information Pannel Start================================================== -->
                    
					<div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Other Information
                    </div>	
                    <div class="panel-body">
						
					        <div class="form-group col-sm-6">
                                <label>Gardian Name:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="g_name" name="g_name"
                                           required pattern="[A-Za-z]{1,10}"
                                           placeholder="Ramesh Tendulkar">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Gardian Relationship:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="g_relation" name="g_relation"
                                           required pattern="[A-Za-z]{1,10}"
                                           placeholder="Father/Husband">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Gardian Mobile No.</label>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="g_mobile" name="g_mobile"
                                           required pattern="[A-Za-z]{1,10}"
                                           placeholder="Mobile Number">
                                </div>
                            </div>
                        
                            <div class="form-group col-sm-4">
                                <label for="email"> Gardian Email:</label>
                                <input type="email" class="form-control" 
                                       id="g_email" name="g_email"
                                        placeholder="Email Address">
                            </div>
                            <div class="form-group col-sm-2">
                                <label>Notify Via:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                            id="notify_via" name="notify_via">
                                        <option>Both</option>
                                        <option>Email</option>
                                        <option>SMS</option>
                                    </select>
                                </div>
                            </div>	
                            <div class="form-group col-sm-3">
                                <label>Adhar Card No.:</label>
                                <div class="form-group" >
                                    <input type="text" class="form-control"
                                           id="adhar_no" name="adhar_no">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>PAN Card No.:</label>
                                <div class="form-group" >
                                    <input type="text" class="form-control"
                                           id="pan_no" name="pan_no">
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
                                           placeholder="10th/12th class">
                                </div>
                            </div>
                             <div class="form-group col-sm-6">
                                <label>College/Institute:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="institute1" name="institute1"
                                           placeholder="Name of College, Place">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Class/Grade:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="grade1" name="grade1"
                                           placeholder="Class obtained">
                                </div>
                            </div>
                        <div class="form-group col-sm-3">
                                <label>Qualification:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="qualifcation2" name="qualifcation2"
                                           placeholder="Graduation">
                                </div>
                            </div>
                             <div class="form-group col-sm-6">
                                <label>College/Institute:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="institut2e" name="institute2"
                                           placeholder="Name of College, Place">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Class/Grade:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="grade2" name="grade2"
                                           placeholder="Class obtained">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Qualification:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="qualifcation3" name="qualifcation3"
                                           placeholder="Post-graduation">
                                </div>
                            </div>
                             <div class="form-group col-sm-6">
                                <label>College/Institute:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="institute3" name="institute3"
                                           placeholder="Name of College, Place">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Class/Grade:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="grade3" name="grade3"
                                           placeholder="Class obtained">
                                </div>
                            </div>
                            </div>
                            </div>
                         <br>
   <!-- Other Course/Retreat Details ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Other Course / Qualification Details
                    </div>
                    <div class="panel-body">
                           <div class="form-group col-sm-3">
                                <label>Course Name:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="course1" name="course1"
                                           placeholder="Course Name">
                                </div>
                            </div>
                             <div class="form-group col-sm-6">
                                <label>Organization/Institute:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="org1" name="org1"
                                           placeholder="Name of Institute, Place">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Out-come:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="outcome1" name="outcome1"
                                           placeholder="Results obtained">
                                </div>
                            </div>
                        <div class="form-group col-sm-3">
                                <label>Retreat Name:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="course2" name="course2"
                                           placeholder="Shivir Name">
                                </div>
                            </div>
                             <div class="form-group col-sm-6">
                                <label>Organization/Institute:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="org2" name="org2"
                                           placeholder="Name of Institute, Place">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Out-come:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="outcome2" name="outcome2"
                                           placeholder="Results obtained">
                                </div>
                            </div>
                                </div>
                            </div> <br> 
<!-- Pannel end ================================================== -->
<!-- Occupational Background ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Occupational / Work Information
                    </div>
                    <div class="panel-body">
						<label>Occupational Exprience:</label>
  						<textarea class="form-control" rows="3" id="work_exprience" name="work_exprience" required placeholder="Past Work Exprience" ></textarea>
				    </div>                      
                   </div>
                 </div>
<!-- Occupational Background Pannel end================================================ -->
				    <div class="form-group col-sm-6">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Update</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Print</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="st_course_application_from.php">Add Application From</a>
                         </div>
                    </div>
				</div></div></div>
<?php include'../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>
