<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_rt_header.php';?>

<!--<script src="./assets/js/myjs/get_address.js"></script>-->

<title>RT Treatment Chart</title>

</head>
<body>
    
    <script>
// JS script for display button========> 
        function dispRepo()
        {
            url ="";
            url += "Rt_treat_chart.php?gender=" + document.getElementById("gender").value;
            url += "&from_date=" + document.getElementById("from_date").value;
            url += "&to_date=" + document.getElementById("to_date").value ;
            url += "&full_name=" + document.getElementById("full_name").value;
            /*url += "&retreat_day=" + document.getElementById("retreat_day").value;*/
            url += "&schedule=" + document.getElementById("schedule").value;
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Rt_treat_chart.php", "print/Rt_treat_chart_print.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
        
        function printRepo_m()
        {
            url ="";
            url=document.URL;
            url=url.replace("Rt_treat_chart.php", "print/Rt_treat_chart_empty_m_print.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
        function printRepo_f()
        {
            url ="";
            url=document.URL;
            url=url.replace("Rt_treat_chart.php", "print/Rt_treat_chart_empty_f_print.php");
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
                        url: '../database/ajax/Get_rt_daily_health_record_up.php',	// call page for data to be retrived
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

        <form action="" method="POST" class="form-inline" >
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>RT Treatment Chart</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
				    RT Treatment Chart
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
                        <div class="form-group col-sm-2">
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
                        <div class="form-group col-sm-2">
                            <label>Schedule:</label>
                            <div class="form-group">
                                    <select class="form-control" 
                                    id="schedule" name="schedule" required>
                                <option></option>
                                <option>Morning</option>
                                <option>Afternoon</option>
                                <!--<option>Evening</option>-->
                            </select>
                            </div>
                        </div> 
                        <div class="form-group col-sm-8 pull-right">
                            <label></label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary" onclick="dispRepo()"> Display </button>
                                <button type="button" class="btn btn-primary" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span>  Treatment Chart</button>
                                <button type="button" class="btn btn-primary" onclick="printRepo_m()"> <span class="glyphicon glyphicon-print"></span> Empty M Chart</button>
                                <button type="button" class="btn btn-primary" onclick="printRepo_f()"> <span class="glyphicon glyphicon-print"></span> Empty F Chart</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b>RT Treatment Chart</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                               <th>#</th>
                                <th>Full Name</th>
                                <th>Photo</th>
                                <th>Illness</th>
                                <th>Gender</th>
                                <th>Room</th>
                                <!--<th>Day</th>-->
                                <th>Time</th>
                                <th>Treatment</th>
                                <th>Therapist</th>
                                <th>Inst</th>
                                <th>Dept</th>
                                <th>Date</th>
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
                                        
                                        /*$query="SELECT DISTINCT p.full_name, p.photo, p.gender, d.retreat_day, t.daily_date, t.schedule, t.rt_treatment_prescription_id, c.rt_case_sheet_id FROM ak_p_registration p, ak_rt_daily_assessment_record d, ak_rt_case_sheet c, ak_rt_daily_treatment_prescription t WHERE c.ad_status='Admitted' and  p.person_id= c.person_id";
                                        $query=$query . " and c.rt_case_sheet_id = d.rt_case_sheet_id";
                                        $query=$query . " and d.daily_date = t.daily_date";*/
                                        
                                        $query="SELECT DISTINCT p.full_name, p.photo, p.gender, t.daily_date, t.schedule, t.rt_treatment_prescription_id, c.rt_case_sheet_id FROM ak_p_registration p, ak_rt_case_sheet c, ak_rt_daily_treatment_prescription t WHERE c.ad_status='Admitted' and  p.person_id= c.person_id";
                                        $query=$query . " and c.rt_case_sheet_id = t.rt_case_sheet_id";

                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (t.daily_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
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

                                        /*if( isset($_GET["retreat_day"]))
                                            if( $_GET["retreat_day"]!=="")
                                            {
                                                $query = $query .   " and ( d.retreat_day ='".  $_GET["retreat_day"] . "')  "; 
                                            }*/
                                        if( isset($_GET["schedule"]))
                                            if( $_GET["schedule"]!=="")
                                            {
                                                $query = $query .   " and ( t.schedule ='".  $_GET["schedule"] . "')  "; 
                                            }

                                        //echo $query;
                                        $response = mysqli_query($con, $query);
                                        //echo $response;
                                        $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left">' . $record[0] . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[1] .'">  </td>';
                                                
                                                $qryDis="SELECT disease_nick FROM ak_rt_case_sheet_fd WHERE rt_case_sheet_id ='" . $record[6] ."' ";

                                                $resDis = mysqli_query($con, $qryDis);
                                                $dis="";
                                                while($recordDis = mysqli_fetch_array($resDis))
                                                {
                                                    $dis =  $dis.$recordDis[0] . "</br>";
                                                }
                                                echo '<td align="left">' . $dis . '</td>';
                                            
                                                echo '<td align="center">' . $record[2] . '</td>';
                                            
                                                $qryRom="SELECT room_number FROM ak_rt_room_allocation WHERE rt_case_sheet_id ='" . $record[6] ."' ";
                                                $resRom = mysqli_query($con, $qryRom);
                                                $rom="";
                                                while($recordRom = mysqli_fetch_array($resRom))
                                                {
                                                    $rom =  $rom.$recordRom[0] . "</br>";
                                                }
                                                echo '<td align="left">' . $rom . '</td>';
                                            
                                                /*echo '<td align="center">' . $record[3] . '</td>'; */
                                                /*echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="center">' . $record[6] . '</td>';*/
                                            
                                                $qryTrTi="SELECT treatment_time FROM ak_rt_daily_treatment_prescription WHERE rt_treatment_prescription_id ='" . $record[5] ."' and daily_date= '" . $record[3] ."' and schedule= '" . $record[4] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resTrTi = mysqli_query($con, $qryTrTi);
                                                $TrTi="";
                                                while($recordTrTi = mysqli_fetch_array($resTrTi))
                                                {
                                                    $TrTi =  $TrTi.$recordTrTi[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $TrTi . '</td>';
                                            
                                                $qryTrNm="SELECT treatment_name FROM ak_rt_daily_treatment_prescription WHERE rt_treatment_prescription_id ='" . $record[5] ."' and daily_date= '" . $record[3] ."' and schedule= '" . $record[4] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resTrNm = mysqli_query($con, $qryTrNm);
                                                $TrNm="";
                                                while($recordTrNm = mysqli_fetch_array($resTrNm))
                                                {
                                                    $TrNm =  $TrNm.$recordTrNm[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $TrNm . '</td>';
                                            
                                                $qryThNm="SELECT therapist_name FROM ak_rt_daily_treatment_prescription WHERE rt_treatment_prescription_id ='" . $record[5] ."' and daily_date= '" . $record[3] ."' and schedule= '" . $record[4] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resThNm = mysqli_query($con, $qryThNm);
                                                $ThNm="";
                                                while($recordThNm = mysqli_fetch_array($resThNm))
                                                {
                                                    $ThNm =  $ThNm.$recordThNm[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $ThNm . '</td>';
                                            
                                                $qryTrIn="SELECT treat_instructions FROM ak_rt_daily_treatment_prescription WHERE rt_treatment_prescription_id ='" . $record[5] ."' and daily_date= '" . $record[3] ."' and schedule= '" . $record[4] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resTrIn = mysqli_query($con, $qryTrIn);
                                                $TrIn="";
                                                while($recordTrIn = mysqli_fetch_array($resTrIn))
                                                {
                                                    $TrIn =  $TrIn.$recordTrIn[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $TrIn . '</td>';
                                            
                                                $qryTrDp="SELECT therapy_dept FROM ak_rt_daily_treatment_prescription WHERE rt_treatment_prescription_id ='" . $record[5] ."' and daily_date= '" . $record[3] ."' and schedule= '" . $record[4] ."' ";
                                            
                                                //echo $$qryTrDp;
                                            
                                                $resTrDp = mysqli_query($con, $qryTrDp);
                                                $TrDp="";
                                                while($recordTrDp = mysqli_fetch_array($resTrDp))
                                                {
                                                    $TrDp =  $TrDp.$recordTrDp[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $TrDp . '</td>';
                                                
                                                echo '<td align="center">' . $record[3] . '</td>';
                                            
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
