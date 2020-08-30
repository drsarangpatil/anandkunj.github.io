<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_rt_header.php';?>

<!--<script src="./assets/js/myjs/get_address.js"></script>-->

<title>RT Followup Medicine Chart</title>

</head>
<body>
    
    <script>
// JS script for display button=========>
        function dispRepo()
        {
            url ="";

            url += "Rt_followup_medicine_chart.php?gender=" + document.getElementById("gender").value;
            url += "&from_date=" + document.getElementById("from_date").value;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&full_name=" + document.getElementById("full_name").value;
            url += "&followup_day=" + document.getElementById("followup_day").value;
            location.replace(url);

            //alert("sadsad");
        }

// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Rt_followup_medicine_chart.php", "print/Rt_followup_medicine_chart_print.php");
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
                        url: '../database/ajax/Get_rt_followup_prescription_up.php', // call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getFullnames", isCasepaper:"1"},	// what exactly required 

                        success: function (data) 
                        {
                           // alert("Success : " + data);

                            $("#full_names").html(data); // to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);		// if error alert message
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
                   <h4><b> RT Followup Medicine Chart</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
				    RT Followup Medicine Chart
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
                        <div class="form-group col-sm-4">
                            <label>FL Day:</label>
                                <div class="form-group">
                                <input type="number" class="form-control"
                                   id="followup_day" name="followup_day">
                              </div>
                       </div>
                         <div class="form-group col-sm-3 pull-right">
                            <label></label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary" onclick="dispRepo()"> Display </button>
                                <button type="button" class="btn btn-primary" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span>  Rx Chart</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> RT Followup Medicine Chart</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Photo</th>
                                <!--<th>Gender</th>
                                <th>Room</th>
                                <th>Day</th>-->
                                <th>Diagnosis</th>
                                <th>Complaints</th>
                                <th>Medicines</th>
                                <!--<th>Dosage</th>
                                <th>Qty</th>-->
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for RT Medicine Starts =============================== -->
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

                                        $query="SELECT DISTINCT p.full_name, p.photo, p.gender, f.followup_day, f.followup_date, f.schedule, f.rt_followup_id, c.rt_case_sheet_id, f.complaints FROM ak_p_registration p, ak_rt_followup f, ak_rt_case_sheet c WHERE p.person_id= c.person_id and c.rt_case_sheet_id = f.rt_case_sheet_id";
                                        
                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (f.followup_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
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
                                        
                                        if( isset($_GET["followup_day"]))
                                            if( $_GET["followup_day"]!=="")
                                            {
                                                $query = $query .   " and ( f.followup_day ='".  $_GET["followup_day"] . "')  "; 
                                            }


                                        //echo $query;
                                        $response = mysqli_query($con, $query);
                                        //echo $response;
                                        $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left">
                                                <a href= "print/Rt_followup_med_prescription_print.php?fuid=' .$record[6] . '">' . $record[0] . '</a> </td>';
                                                /*echo '<td align="left">' . $record[0] . '</td>';*/
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[1] .'">  </td>';
                                               // echo '<td align="center">' . $record[2] . '</td>';
                                            
                                                $qryRom="SELECT room_number FROM ak_rt_room_allocation WHERE rt_case_sheet_id ='" . $record[7] ."' ";
                                                $resRom = mysqli_query($con, $qryRom);
                                                $rom="";
                                                while($recordRom = mysqli_fetch_array($resRom))
                                                {
                                                    $rom =  $rom.$recordRom[0] . "</br>";
                                                }
                                               // echo '<td align="left">' . $rom . '</td>';
                                            
                                               // echo '<td align="center">' . $record[3] . '</td>'; 
                                                /*echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="center">' . $record[6] . '</td>';*/
                                                
                                                $qryDis="SELECT disease_nick FROM ak_rt_case_sheet_fd WHERE rt_case_sheet_id ='" . $record[7] ."' ";
                                            
                                                $resDis = mysqli_query($con, $qryDis);
                                                $dis="";
                                                while($recordDis = mysqli_fetch_array($resDis))
                                                {
                                                    $dis =  $dis.$recordDis[0] . "</br>";
                                                }
                                                echo '<td align="left">' . $dis . '</td>';
                                            
                                                 echo '<td align="left">' . $record[8] . '</td>';
                                                
                                            
                                                $qryMdNm="SELECT medicine_names FROM  ak_rt_followup_medicine WHERE rt_followup_id ='" . $record[6] ."' and followup_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qryMdNm;
                                            
                                                $resMdNm = mysqli_query($con, $qryMdNm);
                                                $MdNm="";
                                                while($recordMdNm = mysqli_fetch_array($resMdNm))
                                                {
                                                    $MdNm =  $MdNm.$recordMdNm[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $MdNm . '</td>';
                                            
                                               /*$qryDosa="SELECT dosage FROM  ak_rt_followup_medicine WHERE rt_followup_id ='" . $record[6] ."' and followup_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resDosa = mysqli_query($con, $qryDosa);
                                                $Dosa="";
                                                while($recordDosa = mysqli_fetch_array($resDosa))
                                                {
                                                    $Dosa =  $Dosa.$recordDosa[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $Dosa . '</td>';*/
                                            
                                                /*$qryQty="SELECT quantity FROM  ak_rt_followup_medicine WHERE rt_followup_id ='" . $record[6] ."' and followup_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resQty = mysqli_query($con, $qryQty);
                                                $Qty="";
                                                while($recordQty = mysqli_fetch_array($resQty))
                                                {
                                                    $Qty =  $Qty.$recordQty[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $Qty . '</td>';*/
                                            
                                                echo '<td align="left">' . $record[4] . '</td>';
                                                
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
<!-- Php code for RT Medicine Ends =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../rt_followup_prescription.php">Go to Menu</a></td>
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
