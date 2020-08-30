<html lang="en">
    <head>
        <title>All Magazines Email Communication System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.3.3.7.min.css">
        <script src="../js/jquery331.min.js"></script>
        <script src="../js/bootstrap.3.3.7.min.js"></script>
        <!--<script src="../js/myjs/get_sb_sms_templates_up.js"></script>-->
       
    <script>
// JS script for display button========>       
        function dispRepo()
        {
            url ="";
            url += "Sb_all_email_communication.php?at_post=" + document.getElementById("at_post").value;
            url += "&sub_status=" + document.getElementById("sub_status").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&magazine_name=" + document.getElementById("magazine_name").value;
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Sb_all_email_communication.php", "print/Sb_all_email_communication_email.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }

// JQ script for AJAX Call ===========-> 			
        $(document).ready
        (
            function () 
            {	
                $.ajax
                (
                    {
                        url: '../../ak_com/database/ajax/Get_place.php',		// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getPlace" },			   // what exactly required 

                        success: function (data) 
                        {
                            //alert("Success : " + data);
                            $("#at_post").html(data);				// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }
                );
                
                $.ajax
                (
                    {
                        url: '../database/ajax/Get_magazine_subscription.php',			// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getMagazine_names" },			// what exactly required 

                        success: function (data) 
                        {
                            //alert("Success : " + data);
                            $("#magazine_name").html(data);					// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }

                );
            }
        ); 
// JQ script for AJAX Call for SMS templates ===========-> 
    $(document).ready
    (
	function () 
	{	
		$.ajax
		(
			{
				url: '../database/ajax/Get_sb_email_templates_up.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getSb_email_tempalte_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_sb_email_records").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
	   }
    );
		
 function myshow()
    {
        var sb_email_id = $('#sb_email_id').val();

        //alert(sb_email_id);
        $.ajax
        (
            {
                url: '../database/ajax/Get_sb_email_templates_up.php',
                type: 'GET',							
                data: { process: "getSelected_email_data", sb_email_id:sb_email_id },

                success: function (data) 
                {
                    var res = data.split("~~"); // to split the fetched data 

                   // alert("Success : " + data); 

                    $("#sb_email_name").val(res[0]);
                    $("#sb_email_subject").val(res[1]);
                    $("#sb_email_template").val(res[2]);

                },
                error:function (data) 
                {
                    alert("Error : " + data);				// if error alert message
                },
            }

        );

    }
// JQ script for AJAX Call Ends =========> 
    </script>
    <link rel="shortcut icon" type="image/png" href="../../ak_com/images/A_Logo_blue_32x32.png">
    <style>
    .vertical-menu {
    width: 150px;
    background-color: #2c2c2c;
    /*color: black;*/
    display: block;
    padding: 4px;
    text-decoration: none;
    border-top-left-radius:4px;
    border-bottom-left-radius:4px;
    border-top-right-radius:4px;
    border-bottom-right-radius:4px;
    font-size: 16px;
    }

    .vertical-menu a {
    background-color: #2c2c2c;
    color: black;
    display: block;
    padding: 12px;
    text-decoration: none;
    color: white;

    }

    .vertical-menu a:hover {
    background-color: #ccc;

    }

    .vertical-menu a.active {
    background-color: #2c2c2c;
    color: white;
    }

    .dropdown-submenu {
    position: relative;
    }

    .dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
    }
</style>
    <script>
    $(document).ready(function(){
    $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
    });
    });
</script>
</head>
<body>
<!-- Top NavBar Start ================================================== -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../index.php"> ANANDKUNJ - Settings</a>
        </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
                <li>
                    <img class="img-circle" width="40" height="50" src="../../ak_com/images/a25.jpg">
                </li>  
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="../../index.php"><span class="glyphicon glyphicon-home"></span></a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">User Info<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../user_name.php">Add User</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../user_name_up.php">Edit User</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../reports/User_register.php">User Register</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Organization Info<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../organization_info.php">Add Organization</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../organization_info.php">Edit Organization</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../reports/Organization_register.php">Organization Register</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Staff Info<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../staff_other_info.php">Add Staff</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../staff_other_info.php">Edit Staff</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../reports/Staff_register.php">Staff Register</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> All Masters <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../disease_category.php">Disease Category</a></li>
                        <li><a href="../disease_name.php">Disease Name</a></li>
                        <li><a href="../disease_nick.php">Disease Nick</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../medicine_names.php">Medicine Name</a></li>
                        <li><a href="../life_style_instructions.php">LS Instructions</a></li>
                        <li><a href="../treatment_name.php">Treatment Name</a></li>
                        <li><a href="../therapy_dept.php">Therapy Department</a></li>
                        <li><a href="../treatment_time.php">Treatment Time</a></li>
                        <li><a href="../staff_other_info.php">Therapist Name</a></li>
                        <li><a href="../diet_name.php">Diet Menu</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../building_name.php">Building Name</a></li>
                        <li><a href="../room_number.php">Room No</a></li>
                        <li><a href="../bed_number.php">Bed No</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../retreat_name.php">Retreat Name</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Edit-Masters<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="../disease_category_up.php">Disease Category</a></li>
                        <li><a href="../disease_name_up.php">Disease Name</a></li>
                        <li><a href="../disease_nick_up.php">Disease Nick</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../medicine_names_up.php">Medicine Name</a></li>
                        <li><a href="../life_style_instructions_up.php">LS Instructions</a></li>
                        <li><a href="../treatment_name_up.php">Treatment Name</a></li>
                        <li><a href="../therapy_dept_up.php">Therapy Department</a></li>
                        <li><a href="../treatment_time_up.php">Treatment Time</a></li>
                        <li><a href="../staff_other_info.php">Therapist Name</a></li>
                        <li><a href="../diet_name_up.php">Diet Menu</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../building_name_up.php">Building Name</a></li>
                        <li><a href="../room_number_up.php">Room No</a></li>
                        <li><a href="../bed_number_up.php">Bed No</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../retreat_name_up.php">Retreat Name</a></li>
                    </ul>
                </li>
            </ul>
      </div>
    </nav>
<!-- Top NavBar End ================================================== -->
<!-- Side NavBar Start================================================== --> 
            <div class="container col-sm-2">
                  <div class="vertical-menu">  
                   <a href="../../ak_op/index.php"><span class="glyphicon glyphicon-tint" style="font-size:13px"></span> OPD</a>
                    <a href="../../ak_rt/index.php"><span class="glyphicon glyphicon-leaf" style="font-size:13px"></span> Retreat</a>
                    <a href="../../ak_stu/index.php"><span class="glyphicon glyphicon-education" style="font-size:13px"></span> Student</a>
                    <a href="../../ak_sb/index.php"><span class="glyphicon glyphicon-book" style="font-size:13px"></span> Subscription</a>
                    <a href="../../ak_mb/index.php"><span class="glyphicon glyphicon-user" style="font-size:13px"></span> Membership</a>
                    <a href="../../ak_cu/index.php"><span class="glyphicon glyphicon-bullhorn" style="font-size:13px"></span> Commune</a>
                    <a href="../../ak_li/index.php"><span class="glyphicon glyphicon-duplicate" style="font-size:13px"></span> Library</a>
                    <a href="../../ak_re/index.php"><span class="glyphicon glyphicon-filter" style="font-size:13px" ></span> Research</a>
                    <a href="../../ak_sto/index.php"><span class="glyphicon glyphicon-th" style="font-size:13px"></span>   Store</a>
                    <a href="../../ak_ac/index.php"><span class="glyphicon glyphicon-save" style="font-size:13px"></span> Accounts</a>
                    <a href="../../ak_com/index.php"><span class="glyphicon glyphicon-cog" style="font-size:13px"></span> Settings</a>
                </div>
            </div>
<!-- Side NavBar End================================================== -->
        <form action="" method="POST" class="form-inline" >
                <div class="container col-sm-10">
                   <h4><b> All Magazines Email Communication System</b></h4>

<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    All Subscribers Register
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>Magazine:</label>
                                <div class="form-group" >
                                    <select class="form-control" 
                                    id="magazine_name" name="magazine_name">
                                    <option></option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Sub Status:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="sub_status" name="sub_status">
                                <option></option>
                                <option>Activate</option>
                                <option>Deactivate</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                                <label>Place:</label>
                                <div class="form-group" >
                                    <select class="form-control" 
                                    id="at_post" name="at_post">
                                    <option></option>
                                    </select>
                                </div>
                        </div>
                    </div>
                        <div class="media">
                        <div class="form-group col-sm-4">
                            <label>From End Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="from_date" name="from_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>To End Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="to_date" name="to_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label></label>
                            <div class="form-group" >
                                <button type="button"class="btn btn-primary pull-center" onclick="dispRepo()"> Display</button>
                                <button type="button"class="btn btn-primary pull-center" onclick="printRepo()"> <span class="glyphicon glyphicon-envelope"> </span> Email</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> All Magazines Subscribers Register</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>ID</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Sub Status</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>Magazine</th>
                                <th>Sub Type</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for Subscribers Register Table Starts =============================== -->
                            <?php 
                                include( "../database/Config.php");
                                $data = new myConfig();

                                $retStr = "";
                                try
                                {
                                    $con = mysqli_connect($data->host, $data->user, $data->password,$data->db);
                                    if (!$con)
                                        echo('Could not connect: ' . mysql_error());
                                    else
                                    {
                                        mysqli_set_charset( $con, 'utf8' );

                                        $query="SELECT s.sb_subscription_id, s.dos, s.doc, s.sub_status, p.photo, p.full_name, p.email, p.at_post, p.mobile_no,  s.magazine_name, s.subscription_type FROM ak_p_registration p, ak_sb_subscription_form s WHERE p.person_id= s.person_id ";

                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (s.doc between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["sub_status"]))
                                            if( $_GET["sub_status"]!=="")
                                            {
                                                $query = $query .   " and ( sub_status ='".  $_GET["sub_status"] . "')  "; 
                                            }
                                        if( isset($_GET["magazine_name"]))
                                            if( $_GET["magazine_name"]!=="")
                                            {
                                                $query = $query .   " and ( s.magazine_name ='".  $_GET["magazine_name"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       //$i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {
                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="center">' . $record[0] . '</td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="left">' . $record[2] . '</td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[4] .'">  </td>';
                                                echo '<td align="left">' . $record[5] . '</td>';
                                                //echo '<td align="left"><a href= "print/Sb_all_subscribers_report_print.php?csid=' .$record[7] . '">' . $record[5] . '</a></td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                echo '<td align="left">' . $record[7] . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
                                                echo '<td align="left">' . $record[9] . '</td>';
                                                echo '<td align="left">' . $record[10] . '</td>';
                                            echo "</tr>";
                                           // $i = $i+1;
                                        }
                                    }
                                }
                                catch(Exception $ex)
                                {
                                    echo "<script language='javascript'>alert('Error in Reading data')</script>";
                                }
                                mysqli_close ($con);
                            ?>
<!-- Php code for Subscribers Register Table Ends =============================== -->

                        </tbody>
                    </table>
                    <td><a href="../sb_subscription_form.php">Go to Menu</a></td>
                    </div>
                    </div>

                </div>
                </div>
<!-- Fetched All Room Allocation Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All Email Template Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email Name</th>
                                    <th>Email Subject</th>
                                    <th>Email Template</th>
                                </tr>
                            </thead>
                            <tbody id="all_sb_email_records">	
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched All Daily Health Assessment Records Pannel Ends================================= -->
<!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Email Templates for Subscribers
                    </div>
                    <div class="panel-body">
                         <div class="form-group col-sm-4">
                            <label>Email ID:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                   id="sb_email_id" name="sb_email_id">
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label> &nbsp;</label>
                            <div class="form-group" >
                             <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Email Name:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                    id="sb_email_name" name="sb_email_name" placeholder="Template Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-12">
                            <label>Email Subject:</label>
                            <div class="form-group">
                                <textarea class="form-control" cols="100" rows="1" id="sb_email_subject" name="sb_email_subject" placeholder="Subject of Email to be Sent"></textarea>
                            </div>
                        </div>
				    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-12">
                            <label>Email Template:</label>
                            <div class="form-group">
                                <textarea class="form-control" cols="100" rows="10" id="sb_email_template" name="sb_email_template" placeholder="Formt of Email to be Sent"></textarea>
                            </div>
                        </div>
				    </div>
                    
                </div>
            </div>
            <div class="form-group col-sm-10">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </div>
<!-- Form Information Ends ================================================== -->

            <div class="container col-sm-1">
            </div></div>
        </form>
	</body>
</html>
