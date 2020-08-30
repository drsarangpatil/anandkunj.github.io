<?php
if(session_id() == '') 
    session_start();
?>
<?php include 'Ak_op_header.php';?>

<title>Op Daily Treatment Chart</title>

</head>
<body>

    <script>
// JS script for display button========> 
        function dispRepo()
        {
            url ="";
            url += "Op_daily_treat_chart.php?gender=" + document.getElementById("gender").value;
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Op_daily_treat_chart.php", "print/Op_daily_treat_chart_print.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
             
    </script>
  
        <form action="" method="POST" class="form-inline" >
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b> OP Daily Treatment Chart - <span><?php echo date("d-m-Y");?></span></b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
				    OP Daily Treatment Chart
				    </div>
                    <div class="panel-body">
                    <div class="well">
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
                <h5><b> OP Treatment Chart - <span><?php echo date("d-m-Y");?></span></b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <!--<th>Date</th>-->
                                <th>Photo</th>
                                <th>Full Name</th> 
                                <th>Gender</th>
                                <th>Illness</th>
                                <th>Therapy Dept</th>
                                <th>Treatment Name</th>
                                <th>Treatment Time</th>
                                <th>Therapist</th>
                                <th>Instructions</th>
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
                                        
                                        $to_date = date("Y-m-d");
                                        
                                         $query="SELECT DISTINCT p.full_name, p.photo, p.gender, v.op_visit_id, v.visit_date, v.schedule, c.op_case_sheet_id  FROM ak_p_registration p, ak_op_visit v, ak_op_case_sheet c WHERE p.person_id= c.person_id and c.op_case_sheet_id= v.op_case_sheet_id";
                                         $query = $query . " and  ( v.visit_date ='". $to_date . "')";


                                        if( isset($_GET["gender"]))
                                            if( $_GET["gender"]!=="")
                                            {
                                                $query = $query .   " and ( p.gender ='".  $_GET["gender"] . "')  "; 
                                            }
                                       
                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                        $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="left">' . $i . '</td>';
                                                //echo '<td align="left">' . $record[4] . '</td>';
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
                                            
                                                $qryTrDp="SELECT therapy_dept FROM ak_op_treatment_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $$qryTrDp;
                                            
                                                $resTrDp = mysqli_query($con, $qryTrDp);
                                                $TrDp="";
                                                while($recordTrDp = mysqli_fetch_array($resTrDp))
                                                {
                                                    $TrDp =  $TrDp.$recordTrDp[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $TrDp . '</td>';
                                            
                                               $qryTrNm="SELECT treatment_name FROM ak_op_treatment_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resTrNm = mysqli_query($con, $qryTrNm);
                                                $TrNm="";
                                                while($recordTrNm = mysqli_fetch_array($resTrNm))
                                                {
                                                    $TrNm =  $TrNm.$recordTrNm[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $TrNm . '</td>';
                                            
                                                $qryTrTi="SELECT treatment_time FROM ak_op_treatment_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resTrTi = mysqli_query($con, $qryTrTi);
                                                $TrTi="";
                                                while($recordTrTi = mysqli_fetch_array($resTrTi))
                                                {
                                                    $TrTi =  $TrTi.$recordTrTi[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $TrTi . '</td>';
                                            
                                                $qryThNm="SELECT therapist_name FROM ak_op_treatment_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resThNm = mysqli_query($con, $qryThNm);
                                                $ThNm="";
                                                while($recordThNm = mysqli_fetch_array($resThNm))
                                                {
                                                    $ThNm =  $ThNm.$recordThNm[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $ThNm . '</td>';
                                            
                                                $qryTrIn="SELECT treat_instructions FROM ak_op_treatment_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resTrIn = mysqli_query($con, $qryTrIn);
                                                $TrIn="";
                                                while($recordTrIn = mysqli_fetch_array($resTrIn))
                                                {
                                                    $TrIn =  $TrIn.$recordTrIn[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $TrIn . '</td>';
                                            
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
