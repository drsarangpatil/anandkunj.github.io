<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_rt_header.php';?>

<!--<script src="./assets/js/myjs/get_address.js"></script>-->

<title>RT Daily Health Record</title>

</head>
<body>
    
    <script>
// JS script for display button========>       
        function dispRepo()
        {
            url ="";

            url += "Rt_daily_health_record.php?full_name=" + document.getElementById("full_name").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&retreat_day=" + document.getElementById("retreat_day").value;
            location.replace(url);
            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Rt_daily_health_record.php", "print/Rt_dhr_print.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }
        
        function printRepo_m()
        {
            url ="";
            url=document.URL;
            url=url.replace("Rt_daily_health_record.php", "print/Rt_dhr_empty_m_print.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }
        function printRepo_f()
        {
            url ="";
            url=document.URL;
            url=url.replace("Rt_daily_health_record.php", "print/Rt_dhr_empty_f_print.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }
// JQ script for AJAX Call of Get Place ===========-> 			
       /* $(document).ready
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
        ); */
// JQ script for AJAX Call Ends =========>
// JQ script for AJAX Call of full name ===========-> 			
        $(document).ready
        (   
            function () 
            {	
                $.ajax
                (
                    {
                        url: '../database/ajax/Get_rt_personal_details_cs.php', // call page for data to be retrived
                        type: 'GET',							// to get data in backgrouond
                        data: { process: "getFullnames", isCasepaper:"1"},	// what exactly required 

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
                        var full_name = $('#full_name').val();	// read full_name from full_name dropdown
                        full_name=  full_name.split("-")[0];
                        $('#full_name').val(full_name);
                        
                        //alert(full_name);
                    }
                );
            }
        ); 
// JQ script for AJAX Call Ends =========>
// JQ script for AJAX Call of RT Name ===========-> 			
/*        $(document).ready
        (
            function () 
            {	
                $.ajax
                (
                    {
                        url: '../database/ajax/Get_retreat_name.php',	// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getRetreat_name" },			// what exactly required 

                        success: function (data) 
                        {
                            //alert("Success : " + data);
                            $("#retreat_names").html(data);					// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }

                );
                
                $('#retreat_name').change			// process to call on change in  dropdown
                ( 
                    function() 
                    {
                        var at_post = $('#retreat_name').val();	// read at_post from full_name dropdown
                        $('#retreat_name').val(at_post);
                        
                        //alert(at_post);
                    }
                );
            }
        ); */
// JQ script for AJAX Call Ends =========>
    </script>

        <form action="" method="POST" class="form-inline" >
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>RT Daily Health Record</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    RT Daily Health Record
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
                            <label>RT Day:</label>
                                <div class="form-group">
                                <input type="number" class="form-control"
                                   id="retreat_day" name="retreat_day">
                              </div>
                       </div>
                        <div class="form-group col-sm-4">
                        <button type="button" class="btn btn-primary" onclick="printRepo_m()"> <span class="glyphicon glyphicon-print"></span> Empty-MChart</button>
                        <button type="button" class="btn btn-primary" onclick="printRepo_f()"> <span class="glyphicon glyphicon-print"></span> Empty-FChart</button>
                       </div>
                    </div>
                    <div class="media">
                        <div class="form-group col-sm-3">
                            <label>From Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="from_date" name="from_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>To Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="to_date" name="to_date" required>
                            </div>
                        </div>
                      <div class="form-group col-sm-6 pull-right">
                            <label></label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary pull-center" onclick="dispRepo()"> Display</button>
                                <button type="button" class="btn btn-primary pull-center"  onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> DHR </button>
                                
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b>RT Daily Health Record</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px">
                                <th>ID</th>
                                <th>Date</th>
                                <th>Full Name</th>
                                <th>Day</th>
                                <th>Wt</th>
                                <th>BP</th>
                                <th>OE</th>
                                <th>Amroli</th>
                                <th>Water</th>
                                <th>Detox</th>
                                <th>BM</th>
                                <th>Illness</th>
                                <th>Compalints</th>
                                <th>Treatments</th>
                                <th>Diet</th>
                                <th>Medicines</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for RT Case Sheet Table Starts =============================== -->
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

                        $query="SELECT d.rt_daily_assessment_record_id, d.daily_date, p.full_name, d.retreat_day, d.weight, d.bp,  d.oe, d.amroli, d.water, d.detox, d.motions, d.complaints, c.rt_case_sheet_id FROM ak_p_registration p, ak_rt_daily_assessment_record d, ak_rt_case_sheet c WHERE c.ad_status='Admitted' and p.person_id= c.person_id ";
                        $query = $query . " and c.rt_case_sheet_id =d.rt_case_sheet_id";


                        if( isset($_GET["from_date"]))
                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                            {
                                $query = $query .   " and  (d.daily_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                            }

                        if( isset($_GET["full_name"]))
                            if( $_GET["full_name"]!=="")
                            {
                                $query = $query .   " and ( p.full_name ='".  $_GET["full_name"] . "')  "; 
                            }
                        if( isset($_GET["retreat_day"]))
                            if( $_GET["retreat_day"]!=="")
                            {
                                $query = $query .   " and ( d.retreat_day ='".  $_GET["retreat_day"] . "')  "; 
                            }

                        //echo $query;

                        $response = mysqli_query($con, $query);

                       /*$i =1;*/
                        while($record = mysqli_fetch_array($response))
                        {

                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                /*echo '<td align="left">' . $i . '</td>';*/
                                echo '<td align="left">' . $record[0] . '</td>';
                                echo '<td align="left">' . $record[1] . '</td>';
                                echo '<td align="left">
                                <a href= "print/Rt_daily_health_record_print.php?csid=' .$record[12] . '">' . $record[2] . '</a> </td>';
                                /*echo '<td align="left">' . $record[2] . '</td>';*/
                                echo '<td align="left">' . $record[3] . '</td>';
                                echo '<td align="left">' . $record[4] . '</td>';
                                echo '<td align="left">' . $record[5] . '</td>';
                                echo '<td align="left">' . $record[6] . '</td>';
                                echo '<td align="left">' . $record[7] . '</td>';
                                echo '<td align="left">' . $record[8] . '</td>';
                                echo '<td align="left">' . $record[9] . '</td>';
                                echo '<td align="left">' . $record[10] . '</td>';

                                $qryDis="SELECT disease_nick FROM ak_rt_case_sheet_fd WHERE rt_case_sheet_id ='" . $record[12] ."' ";

                                $resDis = mysqli_query($con, $qryDis);
                                $dis="";
                                while($recordDis = mysqli_fetch_array($resDis))
                                {
                                    $dis =  $dis.$recordDis[0] . "</br>";
                                }
                                /*$dis=substr( $dis,0,strlen($dis)-2);*/
                                echo '<td align="left">' . $dis . '</td>';

                                echo '<td align="left">' . $record[11] . '</td>';

                                $qryTrNm="SELECT treatment_name FROM ak_rt_daily_treatment_prescription WHERE rt_case_sheet_id= '" . $record[12] ."' and daily_date= '" . $record[1] ."' ";

                                //echo $qrymDiet;

                                $resTrNm = mysqli_query($con, $qryTrNm);
                                $TrNm="";
                                while($recordTrNm = mysqli_fetch_array($resTrNm))
                                {
                                    $TrNm =  $TrNm.$recordTrNm[0] . "</br>";

                                }
                                echo '<td align="left">' . $TrNm . '</td>';

                                $qrymDiet="SELECT morning_diet, noon_diet, afternoon_diet, evening_diet FROM ak_rt_daily_diet_prescription WHERE rt_case_sheet_id= '" . $record[12] ."' and daily_date= '" . $record[1] ."' ";

                                //echo $qrymDiet;

                                $resmDiet = mysqli_query($con, $qrymDiet);
                                $mdiet="";
                                while($recordmDiet = mysqli_fetch_array($resmDiet))
                                {
                                    $mdiet =  $mdiet . $recordmDiet[0] . "</br>" . $recordmDiet[1] . "</br>" . $recordmDiet[2] . "</br>" . $recordmDiet[3] . "</br>";

                                } 
                                echo '<td align="left">' . $mdiet . '</td>';

                                 $qryMdNm="SELECT medicine_names FROM  ak_rt_daily_medicine_prescription WHERE rt_case_sheet_id= '" . $record[12] ."' and daily_date= '" . $record[1] ."' ";

                                //echo $qryMdNm;

                                $resMdNm = mysqli_query($con, $qryMdNm);
                                $MdNm="";
                                while($recordMdNm = mysqli_fetch_array($resMdNm))
                                {
                                    $MdNm =  $MdNm.$recordMdNm[0] . "</br>";

                                }
                                echo '<td align="left">' . $MdNm . '</td>';
                            echo "</tr>";
                            /*$i = $i+1;*/
                        }
                    }
                }
                catch(Exception $ex)
                {
                    echo "<script language='javascript'>alert('Error in Reading data')</script>";
                }
                mysqli_close ($con);
            ?>
<!-- Php code for RT Case Sheet Table Ends =============================== -->
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
