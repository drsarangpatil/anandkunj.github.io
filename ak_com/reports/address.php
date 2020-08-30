<?php
	if(session_id() == '') 
		session_start();
?>
<html lang="en">
    <head>
        <title>Address Book</title>
		<link rel="stylesheet" href="../css/bootstrap.3.3.7.min.css">
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">
        <!-- DataTables CSS -->
        <link href="../css/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables.responsive.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>
        <!-- DataTables JavaScript -->

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            function dispRepo()
            {
                location.replace('address.php?nation=' + document.getElementById("nname").value);
                //alert("sadsad");
            }
			
            $(document).ready
            (
                function () 
                {		
                    $.ajax
                    (
                        {
                            url: '../database/ajax/myLibrary.php',
                            type: 'GET',
                            data: { process: "getNations" },
                            success: function (data) 
                            {
                                //alert("Success : " + data);
                                $('#nname').html(data)
                            },
                            error:function (data) 
                            {
                                alert("Error : " + data);
                            },
                        }

                    );
                }
            );
        </script>
    </head>
    <body>
        <form action="" method="post" class="form-inline" >
            <div class="container col-sm-1">
               
            </div>
                <div class="container col-sm-10">
                   <h2><b>Address Book </b></h2>
                    <br>
					
    <!-- Form Information ================================================== -->
                    <div class="panel-group">
                    	<div class="panel panel-primary">

							<div class="panel-heading">
								Nation 
							</div>
							
							<div class="panel-body">
								<div class="form-group">
									<label class="col-sm-1">Nation :</label>
									<select class="form-control col-sm-3" 
											id="nname" name="nname" >
											<option></option>
									</select>
									<button type="button" 
											class="btn btn-primary col-sm-1" onclick="dispRepo()">Display
									</button>
								</div>	 
							</div>
							<div class="panel-body">
									<table width="100%" class="table table-striped table-bordered table-hover" 
										id="dataTables-example">
										<thead>
											<tr>
												<th>Addrss</th>
												<th>Addrss</th>
												<th>A/P</th>
												<th>Taluka</th>
												<th>District</th>										
											</tr>
										</thead>
										<tbody>
											<?php 
												include( "../database/config.php");
												$data = new myConfig();

												$retStr = "";
												try
												{
													$con = mysqli_connect($data->host, $data->user, $data->password,$data->db);
													if (!$con)
														echo('Could not connect: ' . mysql_error());
													else
													{

														$query = "SELECT fline,sline,atpost,tname,dname FROM addressdetails WHERE 1 ";

														if( isset($_GET["nation"]))
															if( $_GET["nation"]!=="")
															{
																$query = $query .   " and ( nname ='".  $_GET["nation"] . "')  "; 
															}
														//echo $query;
														$response = mysqli_query($con, $query); 

														while($record = mysqli_fetch_array($response))
														{

															 echo '<tr class="odd gradeX" >';
																echo '<td align="center">' . $record[0] . '</td>';
																echo '<td align="center">' . $record[1] . '</td>';
																echo '<td align="center">' . $record[2] . '</td>';
																echo '<td align="center">' . $record[3] . '</td>';
																echo '<td align="center">' . $record[4] . '</td>';
															echo "</tr>";

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
									<td><a href="../nation.html">Go to Menu</a></td>
							</div>
                        </div>
                   </div>
            </div>
            <div class="container col-sm-1">
                
            </div>
        </form>
	</body>
</html>
