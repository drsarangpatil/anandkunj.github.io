<?php
if(session_id() == '') 
    session_start();
?>
<?php include 'Ak_op_header.php';?>

<title>Op Medicine Chart</title>

</head>
<body>

        <script>
// JS script for display button=========>
        function dispRepo()
        {
            url ="";

            url += "Op_medicine_chart.php?gender=" + document.getElementById("gender").value;
            url += "&from_date=" + document.getElementById("from_date").value;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&full_name=" + document.getElementById("full_name").value;
            location.replace(url);

            //alert("sadsad");
        }

// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Op_medicine_chart.php", "print/Op_medicine_chart_print.php");
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
    
        <form action="" method="POST" class="form-inline" >
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b> Op Medicine Chart</b></h4> 
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
				    Op Medicine Chart
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
                            <label>From Visit Dt:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="from_date" name="from_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>To Visit Dt:</label>
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
                <h5><b> Op Medicine Chart</b></h5><p style= "color:slateBlue"> For OP Welcome SMS Ctrl+Click Date; For Medicine Prescription Ctrl+Click Full Name; For OP Welcome Email Ctrl+Click Gender</p>
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
                                <th>Diagnosis</th>
                                <th>Present Complaints</th>
                                <th>Medicine Names</th>
                                <!--<th>Dosage</th>
                                <th>Quantity</th>-->
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for OP Medicine Starts =============================== -->
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

                                        $query="SELECT DISTINCT p.full_name, p.photo, p.gender, v.op_visit_id, v.visit_date, v.schedule, v.complaints,   c.op_case_sheet_id  FROM ak_p_registration p, ak_op_visit v, ak_op_case_sheet c WHERE p.person_id= c.person_id and c.op_case_sheet_id= v.op_case_sheet_id";


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
                                                echo '<td align="left"><a href= "print/Op_acknowledgement_sms.php?vsid=' .$record[3] . '">' . $record[4] . '</a></td>';
                                                //echo '<td align="left">' . $record[4] . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[1] .'">  </td>';
                                                echo '<td align="left"><a href= "print/Op_medicine_prescription_print.php?vsid=' .$record[3] . '">' . $record[0] . '</a></td>';
                                            
                                                echo '<td align="left"><a href= "print/Op_acknowledgement_email.php?vsid=' .$record[3] . '">' . $record[2] . '</a></td>';
                                                //echo '<td align="left">' . $record[2] . '</td>';
                                                /*echo '<td align="left">' . $record[3] . '</td>';*/
                                                /*echo '<td align="left">' . $record[5] . '</td>';*/
                                               /*echo '<td align="left">' . $record[7] . '</td>';*/
                                                
                                                $qryDis="SELECT final_diagnosis FROM ak_op_case_sheet WHERE op_case_sheet_id ='" . $record[7] ."' ";
                                            
                                                $resDis = mysqli_query($con, $qryDis);
                                                $dis="";
                                                while($recordDis = mysqli_fetch_array($resDis))
                                                {
                                                    $dis =  $dis.$recordDis[0] . "</br>";
                                                }
                                               
                                                echo '<td align="left">' . $dis . '</td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                            
                                                $qryMdNm="SELECT medicine_names FROM  ak_op_medicine_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qryMdNm;
                                            
                                                $resMdNm = mysqli_query($con, $qryMdNm);
                                                $MdNm="";
                                                while($recordMdNm = mysqli_fetch_array($resMdNm))
                                                {
                                                    $MdNm =  $MdNm.$recordMdNm[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $MdNm . '</td>';
                                            
                                               /*$qryDosa="SELECT dosage FROM  ak_op_medicine_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resDosa = mysqli_query($con, $qryDosa);
                                                $Dosa="";
                                                while($recordDosa = mysqli_fetch_array($resDosa))
                                                {
                                                    $Dosa =  $Dosa.$recordDosa[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $Dosa . '</td>';*/
                                            
                                                /*$qryQty="SELECT quantity FROM  ak_op_medicine_prescription WHERE op_visit_id ='" . $record[3] ."' and visit_date= '" . $record[4] ."' and schedule= '" . $record[5] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resQty = mysqli_query($con, $qryQty);
                                                $Qty="";
                                                while($recordQty = mysqli_fetch_array($resQty))
                                                {
                                                    $Qty =  $Qty.$recordQty[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $Qty . '</td>';*/
                                                
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
<!-- Php code for OP Medicine Ends =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../op_visit.php">Go to Menu</a></td>
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
