<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_rt_header.php';?>

<!--<script src="./assets/js/myjs/get_address.js"></script>-->

<title>RT Daily Diet Chart</title>

</head>
<body>
        
    <script>
// JS script for display button========>  
         
        function dispRepo()
        {
            url ="";

            url += "Rt_daily_diet_chart.php?gender=" + document.getElementById("gender").value;
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";

            url=document.URL;
            url=url.replace("Rt_daily_diet_chart.php", "print/Rt_daily_diet_chart_print.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
        
        function printRepo_e()
        {
            url ="";

            url=document.URL;
            url=url.replace("Rt_daily_diet_chart.php", "print/Rt_diet_chart_empty_print.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
                 
    </script>
    
        <form action="" method="POST" class="form-inline" >
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b> Daily Diet Chart - <span><?php echo date("d-m-Y");?></span></b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
				    Daily Diet Chart
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
                         <div class="form-group col-sm-6 pull-right">
                            <label></label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary" onclick="dispRepo()"> Display </button>
                                <button type="button" class="btn btn-primary" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span>  Diet Chart</button>
                                <button type="button" class="btn btn-primary" onclick="printRepo_e()"> <span class="glyphicon glyphicon-print"></span> Empty Dt Chart</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> Daily Diet Chart - <span><?php echo date("d-m-Y");?></span></b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Photo</th>
                                <th>Gender</th>
                                <th>Room</th>
                                <!--<th>Day</th>-->
                                <th>Illness</th>
                                
                                <th>Morning Diet</th>
                                <th>Noon Diet</th>
                                <th>Afternoon Diet</th>
                                <th>Evening Diet</th>
                                <th>Inst</th>
                                <!--<th>Date</th>-->
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
                                        
                                        $to_date = date("Y-m-d");
                                        
                                        /*$query="SELECT DISTINCT p.full_name, p.photo, p.gender, d.retreat_day, d.daily_date, d.schedule, d.rt_daily_health_record_id, c.rt_case_sheet_id FROM ak_p_registration p, ak_rt_daily_health_record d, ak_rt_case_sheet c WHERE c.ad_status='Admitted' and  p.person_id= c.person_id";
                                        $query=$query . " and c.rt_case_sheet_id = d.rt_case_sheet_id";
                                        $query = $query . " and  ( d.daily_date ='". $to_date . "')";*/
                                        
                                        $query="SELECT DISTINCT p.full_name, p.photo, p.gender, d.daily_date, d.schedule, d.rt_diet_prescription_id, c.rt_case_sheet_id FROM ak_p_registration p, ak_rt_daily_diet_prescription d, ak_rt_case_sheet c WHERE c.ad_status='Admitted' and  p.person_id= c.person_id";
                                        $query=$query . " and c.rt_case_sheet_id = d.rt_case_sheet_id";
                                        $query = $query . " and  ( d.daily_date ='". $to_date . "')";
                                        
                                        if( isset($_GET["gender"]))
                                            if( $_GET["gender"]!=="")
                                            {
                                                $query = $query .   " and ( p.gender ='".  $_GET["gender"] . "')  "; 
                                            }
                                       
                                       // echo $query;
                                        $response = mysqli_query($con, $query);
                                        //echo $response;
                                        $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left">' . $record[0] . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[1] .'">  </td>';
                                                echo '<td align="center">' . $record[2] . '</td>';
                                            
                                                $qryRom="SELECT room_number FROM ak_rt_room_allocation WHERE rt_case_sheet_id ='" . $record[6] ."' ";
                                                $resRom = mysqli_query($con, $qryRom);
                                                $rom="";
                                                while($recordRom = mysqli_fetch_array($resRom))
                                                {
                                                    $rom =  $rom.$recordRom[0] . "</br>";
                                                }
                                                echo '<td align="left">' . $rom . '</td>';
                                            
                                                //echo '<td align="center">' . $record[3] . '</td>'; 
                                                /*echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="center">' . $record[6] . '</td>';*/
                                                
                                                $qryDis="SELECT disease_nick FROM ak_rt_case_sheet_fd WHERE rt_case_sheet_id ='" . $record[6] ."' ";
                                            
                                                $resDis = mysqli_query($con, $qryDis);
                                                $dis="";
                                                while($recordDis = mysqli_fetch_array($resDis))
                                                {
                                                    $dis =  $dis.$recordDis[0] . "</br>";
                                                }
                                                echo '<td align="left">' . $dis . '</td>';
                                            
                                                $qrymDiet="SELECT morning_diet FROM ak_rt_daily_diet_prescription WHERE rt_diet_prescription_id ='" . $record[5] ."' and daily_date= '" . $record[3] ."' and schedule= '" . $record[4] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resmDiet = mysqli_query($con, $qrymDiet);
                                                $mdiet="";
                                                while($recordmDiet = mysqli_fetch_array($resmDiet))
                                                {
                                                    $mdiet =  $mdiet.$recordmDiet[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $mdiet . '</td>';
                                            
                                                $qrynDiet="SELECT noon_diet FROM ak_rt_daily_diet_prescription WHERE rt_diet_prescription_id ='" . $record[5] ."' and daily_date= '" . $record[3] ."' and schedule= '" . $record[4] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resnDiet = mysqli_query($con, $qrynDiet);
                                                $ndiet="";
                                                while($recordnDiet = mysqli_fetch_array($resnDiet))
                                                {
                                                    $ndiet =  $ndiet.$recordnDiet[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $ndiet . '</td>';
                                            
                                                $qryanDiet="SELECT afternoon_diet FROM ak_rt_daily_diet_prescription WHERE rt_diet_prescription_id ='" . $record[5] ."' and daily_date= '" . $record[3] ."' and schedule= '" . $record[4] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resanDiet = mysqli_query($con, $qryanDiet);
                                                $andiet="";
                                                while($recordanDiet = mysqli_fetch_array($resanDiet))
                                                {
                                                    $andiet =  $andiet.$recordanDiet[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $andiet . '</td>';
                                            
                                                $qryeDiet="SELECT evening_diet FROM ak_rt_daily_diet_prescription WHERE rt_diet_prescription_id ='" . $record[5] ."' and daily_date= '" . $record[3] ."' and schedule= '" . $record[4] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $reseDiet = mysqli_query($con, $qryeDiet);
                                                $ediet="";
                                                while($recordeDiet = mysqli_fetch_array($reseDiet))
                                                {
                                                    $ediet =  $ediet.$recordeDiet[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $ediet . '</td>';
                                            
                                                $qryInstr="SELECT instruc FROM ak_rt_daily_diet_prescription WHERE rt_diet_prescription_id ='" . $record[5] ."' and daily_date= '" . $record[3] ."' and schedule= '" . $record[4] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resInstr = mysqli_query($con, $qryInstr);
                                                $Instr="";
                                                while($recordInstr = mysqli_fetch_array($resInstr))
                                                {
                                                    $Instr =  $Instr.$recordInstr[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $Instr . '</td>';
                                               // echo '<td align="center">' . $record[3] . '</td>';
                                            
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
                    <td><a href="../rt_daily_health_record.php">Go to Menu</a></td>
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
