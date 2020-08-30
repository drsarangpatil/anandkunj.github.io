<?php
if(session_id() == '') 
    session_start();
?>
<?php include 'Ak_op_header.php';?>

<title>Th-wise Op Treatment Chart</title>

</head>
<body>

        <script>
// JS script for display button========> 
        function dispRepo()
        {
            url ="";
            url += "Op_treat_chart_Thwise.php?gender=" + document.getElementById("gender").value;
            url += "&from_date=" + document.getElementById("from_date").value;
            url += "&to_date=" + document.getElementById("to_date").value ;
            url += "&therapy_dept=" + document.getElementById("therapy_dept").value;
            url += "&therapist_name=" + document.getElementById("therapist_name").value;
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Op_treat_chart_Thwise.php", "print/Op_treat_chart_Thwise_print.php");
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
                            url: '../../ak_com/database/ajax/Get_treatment_details.php',			// call page for data to be retrived
                            type: 'GET',								// to get data in backgrouond
                            data: { process: "getTherapy_dept" },			// what exactly required 

                            success: function (data) 
                            {
                                //alert("Success : " + data);
                                $("#therapy_dept").html(data);					// to set fetched data
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
                            url: '../../ak_com/database/ajax/Get_treatment_details.php',			// call page for data to be retrived
                            type: 'GET',								// to get data in backgrouond
                            data: { process: "getTherapist_name" },			// what exactly required 

                            success: function (data) 
                            {
                                //alert("Success : " + data);
                                $("#therapist_name").html(data);					// to set fetched data
                            },
                            error:function (data) 
                            {
                                alert("Error : " + data);				// if error alert message
                            },
                        }
                    );
                }
            );
// JQ script for AJAX Call Ends =========>                    
    </script>

        <form action="" method="POST" class="form-inline" >
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b> Dept and Thrapist-wise Op Treatment Chart</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
				    Dept and Thrapist-wise Op Treatment Chart
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
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
                            <label>Gender:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="gender" name="gender">
                                <option></option>
                                <option>Male</option>
                                <option>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="media">
                          <div class="form-group col-sm-4">
                            <label>Therapy Dept:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="therapy_dept" name="therapy_dept">
                                <option></option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group col-sm-4">
                            <label>Therapist:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="therapist_name" name="therapist_name">
                                <option></option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group col-sm-4 pull-right" >
                            <label></label>
                            <div class="form-group" >
                                <button type="button"class="btn btn-primary" onclick="dispRepo()"> Display
								</button>
                                <button type="button"class="btn btn-primary" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Print
								</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> Dept and Thrapist-wise Op Treatment Chart</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Photo</th>
                                <th>Full Name</th> 
                                <th>Gender</th>
                                <th>Therapy Dept</th>
                                <th>Treatment Name</th>
                                
                                <th>Therapist</th>
                                <th>Instructions</th>
                                <th>Illness</th>
                            </tr>
                        </thead>
                        <tbody>
 <!-- Php code for OP Treatment Chart Starts =============================== --> 
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
                                        
                                        $query="SELECT DISTINCT p.full_name, v.visit_date, p.photo, p.gender, t.therapy_dept, t.treatment_name, t.treatment_time, t.therapist_name, t.treat_instructions,  v.op_visit_id, v.schedule, c.op_case_sheet_id  FROM ak_p_registration p, ak_op_treatment_prescription t, ak_op_visit v, ak_op_case_sheet c WHERE p.person_id= c.person_id and c.op_case_sheet_id= v.op_case_sheet_id ";
                                        $query=$query . " and v.op_visit_id = t.op_visit_id";
                                        
                                        //echo $query;


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (v.visit_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["gender"]))
                                            if( $_GET["gender"]!=="")
                                            {
                                                $query = $query .   " and ( p.gender ='".  $_GET["gender"] . "')  "; 
                                            }
                                        if( isset($_GET["therapy_dept"]))
                                            if( $_GET["therapy_dept"]!=="")
                                            {
                                                $query = $query .   " and ( t.therapy_dept ='".  $_GET["therapy_dept"] . "')  "; 
                                            }
                                        if( isset($_GET["therapist_name"]))
                                            if( $_GET["therapist_name"]!=="")
                                            {
                                                $query = $query .   " and ( t.therapist_name ='".  $_GET["therapist_name"] . "')  "; 
                                            }
                                        

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                        $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                        echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                echo '<td align="left"><img width="20" height="30" class="img-rounded" src="../../ak_com/database/photos/'. $record[2] .'">  </td>';
                                                echo '<td align="left">' . $record[0] . '</td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left">' . $record[4] . '</td>';
                                                echo '<td align="left">' . $record[5] . '</td>'; 
                                                
                                                echo '<td align="left">' . $record[7] . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
                                                /*echo '<td align="left">' . $record[9] . '</td>';*/
                                               /* echo '<td align="left">' . $record[10] . '</td>'*/;
                                                /*echo '<td align="left">' . $record[11] . '</td>';*/
                                            
                                                $qryDis="SELECT final_diagnosis FROM ak_op_case_sheet WHERE op_case_sheet_id ='" . $record[11] ."' ";
                                            
                                                $resDis = mysqli_query($con, $qryDis);
                                                $dis="";
                                                while($recordDis = mysqli_fetch_array($resDis))
                                                {
                                                    $dis =  $dis.$recordDis[0] . "</br>";
                                                }
                                               
                                                echo '<td align="left">' . $dis . '</td>';
                                            
                                        echo "</tr>";
                                        $i = $i+1;
                                        }
                                    }
                                }
                                catch(Exception $ex)
                                {
                                    echo "<script language='javascript'>alert('Error in Reading data')</script>";
                                }
                                mysqli_close ($con);
                            ?>
 <!-- Php code for OP Treatment Chart ends =============================== --> 
                        </tbody>
                    </table>
                    <!--<td><a href="../op_treatment_diet.php">Go to Menu</a></td>-->
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
