<?php
if(session_id() == '') 
    session_start();
?>
<?php include 'Ak_op_header.php';?>

<title>OP Diet Chart</title>

</head>
<body>

        <script>
// JS script for display button========>  
         
        function dispRepo()
        {
            url ="";

            url += "Op_diet_chart.php?gender=" + document.getElementById("gender").value;
            url += "&from_date=" + document.getElementById("from_date").value;
            url += "&to_date=" + document.getElementById("to_date").value ;
            url += "&full_name=" + document.getElementById("full_name").value;
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";

            url=document.URL;
            url=url.replace("Op_diet_chart.php", "print/Op_diet_chart_print.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }

// JQ script for AJAX Call of full name ===========-> 			
        $(document).ready
        (
            function () 
            {	
                 $.ajax
                (
                    {
                        url: '../database/ajax/Get_op_visit_up.php',	// call page for data to be retrived
                        type: 'GET',								            // to get data in backgrouond
                        data: { process: "getFullnames", isPrescription:"1"}, // what exactly required 

                        success: function (data) 
                        {
                           //alert("Success : " + data);

                            $("#full_names").html(data);			// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }

                );

                $('#full_name').change			// process to call on change in  dropdown
                ( 
                    function() 
                    {
                        var full_name = $('#full_name').val();	// read full_name from dropdown
                        full_name=  full_name.split("-")[0];
                        $('#full_name').val(full_name);

                        //alert(full_name);
                    }
                );
            }
        );
// JQ script for AJAX Call Ends =========>                   
    </script>
 
        <form action="" method="POST" class="form-inline">            
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b> OP Diet Chart</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
				    OP Diet Chart
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>Name:</label>
                            <div class="form-group">
                                <input list="full_names" class="form-control" id= "full_name" name="full_name">
                                <datalist id="full_names">
                                <option value="">
                                </datalist>
                            </div>
                        </div>
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
                    </div>
                    <div class="media">
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
                         <div class="form-group col-sm-3 pull-right">
                            <label></label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary" onclick="dispRepo()"> Display </button>
                                <button type="button" class="btn btn-primary" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span>  Print</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> OP Diet Chart</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>Date</th>
                                <th>Photo</th>
                                <th>Full Name</th> 
                                <th>Gender</th>
                                <th>Illness</th>
                                
                                <th>Morning Diet</th>
                                <th>Noon Diet</th>
                                <th>Afternoon Diet</th>
                                <th>Evening Diet</th>
                                <th>Instructions</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for OP Diet Chart Table Starts =============================== -->
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
                                        
                                        $query="SELECT DISTINCT p.full_name, p.photo, p.gender, v.op_visit_id, v.visit_date, v.schedule, c.op_case_sheet_id  FROM ak_p_registration p, ak_op_visit v, ak_op_case_sheet c WHERE p.person_id= c.person_id and c.op_case_sheet_id= v.op_case_sheet_id";


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
                                         if( isset($_GET["full_name"]))
                                            if( $_GET["full_name"]!=="")
                                            {
                                                $query = $query .   " and ( p.full_name ='".  $_GET["full_name"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                        $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {
                                              echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left">' . $record[4] . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[1] .'">  </td>';
                                                echo '<td align="left">' . $record[0] . '</td>';
                                                echo '<td align="left">' . $record[2] . '</td>';
                                               /* echo '<td align="center">' . $record[3] . '</td>';*/
                                               /* echo '<td align="center">' . $record[5] . '</td>';*/ 
                                               /* echo '<td align="center">' . $record[6] . '</td>';*/
                                                
                                                $qryDis="SELECT final_diagnosis FROM ak_op_case_sheet WHERE op_case_sheet_id ='" . $record[6] ."' ";
                                            
                                                $resDis = mysqli_query($con, $qryDis);
                                                $dis="";
                                                while($recordDis = mysqli_fetch_array($resDis))
                                                {
                                                    $dis =  $dis.$recordDis[0] . "</br>";
                                                }
                                               
                                                echo '<td align="left">' . $dis . '</td>';
                                            
                                                $qrymDiet="SELECT morning_diet FROM ak_op_diet_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resmDiet = mysqli_query($con, $qrymDiet);
                                                $mdiet="";
                                                while($recordmDiet = mysqli_fetch_array($resmDiet))
                                                {
                                                    $mdiet =  $mdiet.$recordmDiet[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $mdiet . '</td>';
                                            
                                                $qrynDiet="SELECT noon_diet FROM ak_op_diet_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resnDiet = mysqli_query($con, $qrynDiet);
                                                $ndiet="";
                                                while($recordnDiet = mysqli_fetch_array($resnDiet))
                                                {
                                                    $ndiet =  $ndiet.$recordnDiet[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $ndiet . '</td>';
                                            
                                                $qryanDiet="SELECT afternoon_diet FROM ak_op_diet_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resanDiet = mysqli_query($con, $qryanDiet);
                                                $andiet="";
                                                while($recordanDiet = mysqli_fetch_array($resanDiet))
                                                {
                                                    $andiet =  $andiet.$recordanDiet[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $andiet . '</td>';
                                            
                                                $qryeDiet="SELECT evening_diet FROM ak_op_diet_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $reseDiet = mysqli_query($con, $qryeDiet);
                                                $ediet="";
                                                while($recordeDiet = mysqli_fetch_array($reseDiet))
                                                {
                                                    $ediet =  $ediet.$recordeDiet[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $ediet . '</td>';
                                            
                                                $qryInstr="SELECT instruc FROM ak_op_diet_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resInstr = mysqli_query($con, $qryInstr);
                                                $Instr="";
                                                while($recordInstr = mysqli_fetch_array($resInstr))
                                                {
                                                    $Instr =  $Instr.$recordInstr[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $Instr . '</td>';
                                            
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
<!-- Php code for OP Diet Chart Table ends =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../op_treatment_diet.php">Go to Menu</a></td>
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
