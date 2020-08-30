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
<script src="./assets/js/myjs/get_organization_info.js"></script>
        
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
        

<title>Organization Information</title>
</head>

<body>
<form action="database/Organization_info.php" method="post" enctype="multipart/form-data">
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4><b>Organization Information </b></h4>

<!-- Company Information Pannel Start ================================================== -->
            <div class="panel-group">
            <div class="panel panel-primary">

            <div class="panel-heading">
                Organization Information
            </div>
            <div class="panel-body">

                     <div class="form-group col-sm-3">
                        <label>Date :</label>
                        <div class="form-group">
                            <input type="date" class="form-control" 
                                id="doo" name="doo" required>
                        </div>
                    </div>
                    <div class="form-group col-sm-7">
                            <label>Main Title:</label>
                           <div class="form-group">
                                <input list="main_names" class="form-control" id= "main_name" name="main_name">
                                  <datalist id="main_names">
                                    <option value="">
                                  </datalist>
                                <input type="text" class="form-control" id= "main_namea" name="main_namea">
                            </div>
                    </div>
                   <div class="form-group col-sm-2">
                        <label>Org ID:</label>
                        <div class="form-group" >
                            <input type="number" class="form-control"
                               id="org_id" name="org_id" readonly>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Organization Slogan:</label>
                       <div class="form-group" >
                                <input type="text" class="form-control"
                                   id="org_slogan" name="org_slogan">
                            </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Parent Organization:</label>
                       <div class="form-group" >
                                <input type="text" class="form-control"
                                   id="parent_org" name="parent_org">
                            </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>Other Title:</label>
                       <div class="form-group" >
                                <input type="text" class="form-control"
                                   id="other_title" name="other_title">
                            </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Company Information Pannel End ================================================== -->
<!-- Company Logo upload Pannel Start================================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                   <div class="panel-heading">
                        Logo upload
                    </div>
                     <div class="panel-body">
                        <div class="form-group col-sm-4">
                        <label> Uploaded Logo</label>
                            <div class="form-group"> 
                            <a class="pull-left" href="#">
                            <img id="logo" class="img-rounded"  width="150" height="150" src="./assets/images/logo16x16.png" alt="Logo not uploded">
                            </a>
                            </div>
                        </div>
                       <div class="form-group col-sm-8">
                        <label>Logo size: 150x150 px (100 dpi)</label>
                            <div class="form-group">
                                <input type='file' class="form-control"
                                 name="logo"/>
                                <a class="pull-right" href="#">
                                 <img class="card-img-top" id="myImg" name="logo" src="#" alt="logo not uploded" width="150" height="150"/>
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
                        <label>Address:</label>
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
<!--                            <div class="form-group col-sm-4">
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
                    <div class="form-group col-sm-4">
                        <label> Uploaded Document</label>
                            <div class="form-group"> 
                            <a class="pull-left" href="#">
                            <img id="passport_doc"  class="media-object"  width="30" height="40" src="images/1.jpg" alt="Not uploded">
                            </a>
                            </div>
                    </div>
                    <div class="form-group col-sm-4" id="tohide1">
                            <label> Passport Document:</label>
                            <div class="form-group" >
                                <input type="file" class="form-control"
                                 name="passport_doc">
                           </div>
                    </div>-->
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
                        <label>Laneline Phone No.(1):</label>
                        <div class="form-group" >
                            <input type="number" class="form-control"
                                   id="residence_phone1" name="residence_phone1"
                                   placeholder="0231-2321565">
                        </div>
                    </div>

                    <div class="form-group col-sm-4">
                        <label>Laneline Phone No.(2):</label>
                        <div class="form-group">
                            <input type="number" class="form-control"
                                   id="residence_phone2" name="residence_phone2"
                                   placeholder="0231-2321766">
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Official Mobile No.</label>
                        <div class="form-group">
                            <input type="number" class="form-control"
                                   id="mobile_no" name="mobile_no"
                                   placeholder="Official Mobile No.">
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Official Whatsapp No.</label>
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
                        <label for="email">Website Address:</label>
                        <input type="text" class="form-control" 
                               id="website" name="website"
                                placeholder="Website Address">
                    </div>
                    </div>
            </div>
        </div>
<!--  Contact Details Pannel End================================================== -->
<!-- Official Information Pannel Start================================================== -->
        <div class="panel-group">
            <div class="panel panel-primary">

            <div class="panel-heading">
                Official Information
            </div>
            <div class="panel-body">
            <div class="form-group col-sm-5">
                <label>Bank Name:</label>
                <div class="form-group" >
                    <input type="text" class="form-control"
                           id="bank_name" name="bank_name"
                           placeholder="Name of the Bank with Branch">
                </div>
                </div>
                   <div class="form-group col-sm-3">
                    <label>Bank IFSC Code:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" 
                               id="ifsc_code" name="ifsc_code"
                               placeholder="Bank IFSC Code">
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label>Saving Account No.:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" 
                               id="account_no" name="account_no"
                               placeholder="Account No.">
                    </div>
                </div>
                <div class="form-group col-sm-5">
                    <label>Registering Authority:</label>
                    <div class="form-group">
                            <input type="text" class="form-control" 
                           id="reg_autho" name="reg_autho">
                    </div>
                </div>
                <div class="form-group col-sm-3">
                        <label>Date of Inception:</label>
                        <div class="form-group">
                            <input type="date" class="form-control"
                                   id="doi" name="doi">
                        </div>
                    </div>    
                <div class="form-group col-sm-4">
                    <label>Organization Registration No:</label>
                   <div class="form-group">
                            <input type="text" class="form-control" 
                           id="org_reg_no" name="org_reg_no">
                    </div>
                </div>

                <div class="form-group col-sm-5">
                    <label>GST Registration No:</label>
                   <div class="form-group">
                            <input type="text" class="form-control" 
                           id="gst_reg_no" name="gst_reg_no">
                    </div>
                </div>
                <div class="form-group col-sm-3">
                    <label>User ID:</label>
                    <div class="form-group">
                            <input type="text" class="form-control" id="user_id" name="user_id" <?php echo " value='". $_SESSION['user_id'] ."'";?> readonly>
                    </div>
                </div>
                </div>
            </div>
        </div>
<!--  Official Information Pannel End================================================== --> 
            <div class="form-group col-sm-12">
                    <div class="form-group" >
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    </div>
            </div>
        <?php include'../ak_com/assets/index_footer.php'; ?>
        <div class="container col-sm-0">
    </div>
</form>
</div>
</body>
</html>
