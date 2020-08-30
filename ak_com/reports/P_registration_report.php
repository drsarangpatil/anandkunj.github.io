<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_com_home_header.php';?>

<!--DataTables files-->           
<!--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<link rel="stylesheet "href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" /> -->

<!--<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "pageLength": 5,
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print',
            ]
        } );
        } );
</script>-->

<title>Person Registration Report</title>

</head>
<body>
    
<!-- JS script for display button====================== -->
        <script>
            function dispRepo()
            {
                url ="";
                url += "P_registration_report.php?nation_name=" + document.getElementById("nation_name").value;
                url += "&state_name=" + document.getElementById("state_name").value;
                url += "&at_post=" + document.getElementById("at_post").value ;
                url += "&reference=" + document.getElementById("reference").value;
                url += "&from_date=" + document.getElementById("from_date").value;
                url += "&to_date=" + document.getElementById("to_date").value;
               // url += "&person_category=" + document.getElementById("person_category").value;
                location.replace(url);
                
                /*location.replace('P_registration_report.php?nation_name=' + document.getElementById("nation_name").value +'&state_name='+ document.getElementById("state_name").value +'&at_post='+ document.getElementById("at_post").value +'&reference='+ document.getElementById("reference").value);*/
                
                //alert("sadsad");
            }
// JS script for print button //             
             function printRepo()
            {
                url ="";
                
                /*url += "Print_op_cs_report.php?at_post=" + document.getElementById("at_post").value;
                url += "&gender=" + document.getElementById("gender").value;
                url += "&from_date=" + document.getElementById("from_date").value ;
                url += "&to_date=" + document.getElementById("to_date").value;*/
               /* url += "&disease_name=" + document.getElementById("disease_name").value;*/
               /* location.replace(url);*/
                
                url=document.URL;
                url=url.replace("P_registration_report.php", "print/P_registration_report_print.php");
                //alert (url)
                window.open(url);
                
                //alert("sadsad");
            }
// JQ script for AJAX Call // 
            $(document).ready
            (
                function () 
                 {	
                    $.ajax
                    (
                        {
                            url: '../database/ajax/Get_place.php',		// call page for data to be retrived
                            type: 'GET',								// to get data in backgrouond
                            data: { process: "getPlace" },			   // what exactly required 

                            success: function (data) 
                            {
                                //alert("Success : " + data);
                                $("#at_posts").html(data);				// to set fetched data
                            },
                            error:function (data) 
                            {
                                alert("Error : " + data);				// if error alert message
                            },
                        }
                    );

                    $('#at_post').change			// process to call on change in  dropdown
                    ( 
                        function() 
                        {
                            var at_post = $('#at_post').val();	// read at_post from full_name dropdown
                            $('#at_post').val(at_post);

                            //alert(at_post);
                        }
                    );
                }
            );
            
            $(document).ready
            (
                function () 
                {	
                    $.ajax
                    (
                        {
                            url: '../database/ajax/Get_address.php',			// call page for data to be retrived
                            type: 'GET',								// to get data in backgrouond
                            data: { process: "getNations" },			// what exactly required 

                            success: function (data) 
                            {
                                //alert("Success : " + data);
                                $("#nation_name").html(data);					// to set fetched data
                            },
                            error:function (data) 
                            {
                                alert("Error : " + data);				// if error alert message
                            },
                        }
                    );

                    $('#nation_name').change			// process to call on change in nation dropdown
                    ( 
                        function() 
                        {
                            var nation = $('#nation_name').val();		// read nation from nation dropdown
                            //alert (nation);
                            $.ajax
                            (
                                {
                                    url: '../database/ajax/Get_address.php',			// call page for data to be retrived
                                    type: 'GET',									// to get data in backgrouond
                                    data: { process: "getstates", nation:nation},	// what exactly required 

                                    success: function (data) 
                                    {
                                        //alert("Success : " + data);
                                        $("#state_name").html(data);					// to set fetched data
                                    },
                                    error:function (data) 
                                    {
                                        alert("Error : " + data);				// if error alert message
                                    },
                                }
				            );
                        }
                    )
                }
            );
// JQ script for AJAX Call Ends =========> 
    </script>

        <form action="" method="post" class="form-inline" >
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Person Registration Register</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                    Date-wise / Reference-wise / Nation-State-wise / Place-wise Registration Register
                    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <!--<div class="form-group col-sm-3">
                            <label>Person Category :</label> 
                            <div class="form-group" >
                                <select class="form-control" 
                                id="person_category" name="person_category">
                                <option></option>
                                <option>Participent</option>
                                <option>Patient</option>
                                <option>Student</option>
                                <option>Employee</option>
                                <option>Subscriber</option>
                                <option>Member</option>
                                <option>Donner</option>
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group col-sm-4">
                            <label>From Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="from_date" name="from_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>To Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="to_date" name="to_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Place:</label>
                            <div class="form-group">
                                <input list="at_posts" class="form-control" id= "at_post" name="at_post">
                                <datalist id="at_posts">
                                <option value="">
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="form-group col-sm-3">
                                <label>Nation:</label>
                                <div class="form-group" >
                                    <select class="form-control" 
                                    id="nation_name" name="nation_name">
                                    <option></option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>State:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="state_name" name="state_name">
                                <option></option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group col-sm-3">
                            <label>Ref:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="reference" name="reference">
                                <option></option>
                                <option>Internet</option>
                                <option>Book, Magazine</option>
                                <option>Friend, Relative</option>
                                <option>Seminar, Workshop</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label></label>
                            <div class="form-group" >
                                <button type="button"class="btn btn-primary" onclick="dispRepo()"> Display</button>
                                <button type="button"class="btn btn-primary" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Print </button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                    <h5><b>Person Registration Register</b></h5>
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" class="display">
                        <thead>
                            <tr style="font-size:13px"> 
                            <th>#</th>
                            <!--<th>Category</th>-->
                            <th>Photo</th>
                            <!--<th>P ID</th>-->
                            <th>DOR</th>
                            <th>Full Name</th> 
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Marital Status</th>
                            <th>Occupation</th>
                            <th>Address</th>
                            <th>At Post</th>
                            <th>Nation</th>
                            <th>State</th>
                            <th>District</th>
                            <th>Tahsil</th>
                            <th>Mobile No.</th>
                            <th>Whatsapp No.</th>
                            <th>Email Address</th>
                            <th>Reference</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for P Registration Table Starts =============================== -->
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
                                
                                $query = "SELECT pin_code, photo, person_id, dor, full_name, gender, dob, marital_status, occupation, address, at_post, nation_name, state_name, district_name, tahsil_name, mobile_no, whatsapp_no, email, reference FROM ak_p_registration WHERE 1";


                                if( isset($_GET["from_date"]))
                                    if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                    {
                                    $query = $query .   " and  (dor between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                    }

                                if( isset($_GET["nation_name"]))
                                    if( $_GET["nation_name"]!=="")
                                    {
                                    $query = $query .   " and ( nation_name ='".  $_GET["nation_name"] . "')  "; 
                                    }
                                if( isset($_GET["state_name"]))
                                    if( $_GET["state_name"]!=="")
                                    {
                                    $query = $query .   " and ( state_name ='".  $_GET["state_name"] . "')  "; 
                                    }
                                if( isset($_GET["at_post"]))
                                    if( $_GET["at_post"]!=="")
                                    {
                                    $query = $query .   " and ( at_post ='".  $_GET["at_post"] . "')  "; 
                                    }
                                if( isset($_GET["reference"]))
                                    if( $_GET["reference"]!=="")
                                    {
                                    $query = $query .   " and ( reference ='".  $_GET["reference"] . "')  "; 
                                    }
                               /* if( isset($_GET["person_category"]))
                                    if( $_GET["person_category"]!=="")
                                    {
                                    $query = $query .   " and ( person_category ='".  $_GET["person_category"] . "')  "; 
                                    }*/
                                //echo $query;

                                $response = mysqli_query($con, $query); 
                                $i =1;
                                while($record = mysqli_fetch_array($response))
                                    {

                                    echo '<tr class="odd gradeX" style="font-size:13px">';
                                    echo '<td align="left">' . $i . '</td>';
                                   //echo '<td align="left">' . $record[0] . '</td>';
                                    echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../database/photos/'. $record[1] .'">  </td>';
                                    //echo '<td align="left">' . $record[2] . '</td>';
                                    echo '<td align="left">' . $record[3] . '</td>';
                                    echo '<td align="left">' . $record[4] . '</td>';
                                    echo '<td align="left">' . $record[5] . '</td>';
                                    
                                    $bday = new DateTime($record[6]); // Your date of birth
                                    $today = new Datetime(date('m.d.y'));
                                    $diff = $today->diff($bday);
                                    echo '<td align="left">' . $diff->y . '</td>';

                                    echo '<td align="left">' . $record[7] . '</td>';
                                    echo '<td align="left">' . $record[8] . '</td>';
                                    echo '<td style="font-size:12px" align="left">' . $record[9] . '</td>';
                                    echo '<td align="left">' . $record[10] . '</td>';
                                    echo '<td align="left">' . $record[11] . '</td>';
                                    echo '<td align="left">' . $record[12] . '</td>';
                                    echo '<td align="left">' . $record[13] . '</td>';
                                    echo '<td align="left">' . $record[14] . '</td>';
                                    echo '<td align="left">' . $record[15] . '</td>';
                                    echo '<td align="left">' . $record[16] . '</td>';
                                    echo '<td align="left">' . $record[17] . '</td>';
                                    echo '<td align="left">' . $record[18] . '</td>';
                                    echo "</tr>";
                                    $i = $i+1;
                                    }
                                }
                            }
                            catch(Exception $ex)
                            {
                            echo "<script language='javascript'>alert('Error inReading data')</script>";
                            }
                        ?>
<!-- Php code for P Registration Table Starts =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../p_registration.php">Go to Menu</a></td>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php include'../../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html> 
