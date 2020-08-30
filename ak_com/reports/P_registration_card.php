<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_com_home_header.php';?>

<!--<script src="./assets/js/myjs/get_address.js"></script>-->

<title>Registration Card</title>

</head>
<body>
<!-- JS script for display button====================== -->
       <!-- <script>
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
                                $("#at_post").html(data);				// to set fetched data
                            },
                            error:function (data) 
                            {
                                alert("Error : " + data);				// if error alert message
                            },
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
    </script>-->
        <!--<script>
            function dispRepo()
            {
                url ="";
                
                url += "P_registration_report.php?nation_name=" + document.getElementById("nation_name").value;
                url += "&state_name=" + document.getElementById("state_name").value;
                url += "&at_post=" + document.getElementById("at_post").value ;
                url += "&reference=" + document.getElementById("reference").value;
                url += "&from_date=" + document.getElementById("from_date").value;
                url += "&to_date=" + document.getElementById("to_date").value;
                location.replace(url);
                
                /*location.replace('P_registration_report.php?nation_name=' + document.getElementById("nation_name").value +'&state_name='+ document.getElementById("state_name").value +'&at_post='+ document.getElementById("at_post").value +'&reference='+ document.getElementById("reference").value);
                //alert("sadsad");*/
            }
			
            $(document).ready
            (
                function () 
                {	
                    $.ajax
                    (
                        {
                            url: '../database/ajax/get_place.php',		// call page for data to be retrived
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

                }
            );
            
            $(document).ready
            (
                function () 
                {	
                    $.ajax
                    (
                        {
                            url: '../database/ajax/My_address.php',			// call page for data to be retrived
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
                                    url: '../database/ajax/My_address.php',			// call page for data to be retrived
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
            
            /*$(document).ready
            (
                function () 
                {		
                    $.ajax
                    (
                        {
                            url: '../database/ajax/My_address.php',
                            type: 'GET',
                            data: { process: "getNations" },
                            success: function (data) 
                            {
                                //alert("Success : " + data);
                                $('#nation_name').html(data)
                            },
                            error:function (data) 
                            {
                                alert("Error : " + data);
                            },
                        }

                    );
                }
            );*/
           
        </script>-->
        
 
        <form action="" method="post" class="form-inline" >
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Registration Card</b></h4>
                    
					
<!-- Filters ================================================== -->
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Registration Card 
                </div>
                <div class="panel-body">
                    <div class="col-xs-10 col-sm-10 placeholder">
                      <img src="../images/page_under_construction_coming.jpg" width="1000" height="400" class="img-responsive" alt="Generic placeholder thumbnail">
                      <!--<h4>Label</h4>
                      <span class="text-muted">Something else</span>-->
                    </div>   
                   <!-- <div class="form-group col-sm-3">
                        <label>From Date:</label>
                        <div class="form-group" >
                            <input type="date" class="form-control"
                                   id="from_date" name="from_date"
                                   required>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>To Date:</label>
                        <div class="form-group" >
                            <input type="date" class="form-control"
                                   id="to_date" name="to_date"
                                   required>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Referance:</label>
                        <select class="form-control" 
                                    id="reference" name="reference">
                                <option></option>
                                <option>Internet</option>
                                <option>Book/Magazine</option>
                                <option>Friend/Relative</option>
                                <option>Seminar/Workshop</option>
                            </select>
                    </div>-->
                </div>
                <div class="panel-body">
                   <!-- <div class="form-group col-sm-3">
                        <label>Nation:</label>
                        <div class="form-group">
                            <select class="form-control" 
                                    id="nation_name" name="nation_name">
                                    <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <label >State:</label>
                        <select class="form-control" 
                                id="state_name" name="state_name" >
                                <option></option>
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                        <label >Place:</label>
                        <select class="form-control" 
                                id="at_post" name="at_post" >
                                <option></option>
                        </select>
                    </div>-->
                    <!--<div class="panel-body">
                        <button type="button" 
                                class="btn btn-primary" onclick="dispRepo()">Display
                        </button>
                    </div>	--> 
                </div>
            </div>
<!--Registration Card Desgin-->
            <!--<div class="panel-group">
                <div class="panel panel-primary">
                <div class="panel-body">
                    <h2 align = center><b>Anandkunj Holistic Health Home</b></h2>
                    <p align = center> <i>Center for Health and Happiness</i></p>
                    <br>
                        <div class="form-group col-sm-3">
                            <figure class="figure">
                                        <img width="150" height="150" src="../images/1.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                                        <figcaption class="figure-caption text-left">A caption for the above image.</figcaption>
                            </figure>
                        </div>
                                <div class="form-group col-sm-9">
                                            <label>Full Name:</label>
                                            <div class="form-group">
                                            <input type="text" class="form-control" 
                                                   id="full_name" name="full_name"
                                                   placeholder="First Name    Middle Name    Last Name">
                                            </div>
                                        </div>

                    </div>
                    
					         <div class="table-responsive">
									<table width="100%" class="table table-striped table-bordered table-hover" 
										id="dataTables-example">
										<thead>
                                            <tr>                                       
                                               
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>P_ID</th>
                                                <th>Date of Reg.</th>
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

														$query = "SELECT photo, p_id, dor, full_name, gender, age, marital_status, occupation, address, at_post, nation_name, state_name, district_name, tahsil_name, mobile_no, whatsapp_no, email, reference  FROM ak_p_registration WHERE 1 ";
                                                        
                                                        
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
														//echo $query;
                                                        
														$response = mysqli_query($con, $query); 
                                                        $i =1;
														while($record = mysqli_fetch_array($response))
														{

															 echo '<tr class="odd gradeX" >';
																echo '<td align="center">' . $i . '</td>';
                                                                echo '<td align="center"><img width="60" height="60" src="images/1.jpg">' . $record[0] . '</td>';
																echo '<td align="center">' . $record[1] . '</td>';
																echo '<td align="center">' . $record[2] . '</td>';
																echo '<td align="center">' . $record[3] . '</td>';
																echo '<td align="center">' . $record[4] . '</td>';
                                                                echo '<td align="center">' . $record[5] . '</td>';
																echo '<td align="center">' . $record[6] . '</td>';
																echo '<td align="center">' . $record[7] . '</td>';
																echo '<td align="center">' . $record[8] . '</td>';
																echo '<td align="center">' . $record[9] . '</td>';
                                                            	echo '<td align="center">' . $record[10] . '</td>';
																echo '<td align="center">' . $record[11] . '</td>';
																echo '<td align="center">' . $record[12] . '</td>';
																echo '<td align="center">' . $record[13] . '</td>';
																echo '<td align="center">' . $record[14] . '</td>';
                                                            	echo '<td align="center">' . $record[15] . '</td>';
																echo '<td align="center">' . $record[16] . '</td>';
                                                                echo '<td align="center">' . $record[17] . '</td>';
                                                            
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
											</tbody>
									</table>
									<td><a href="../p_registration.php">Go to Menu</a></td>
							</div>
                        </div>
                        </div>-->
                   </div>
            
        </div>
<?php include'../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html> 
