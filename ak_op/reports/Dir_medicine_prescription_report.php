<?php
if(session_id() == '') 
    session_start();
?>
<?php include 'Ak_op_header.php';?>

<title>Direct Medicine Prescription Report</title

</head>
<body>

        
<!-- // JS script for display button========= -->
        <script>
        function dispRepo()
        {
            url ="";

            url += "Dir_medicine_prescription_report.php?gender=" + document.getElementById("gender").value;
            url += "&from_date=" + document.getElementById("from_date").value;
            url += "&to_date=" + document.getElementById("to_date").value;
            location.replace(url);

            //alert("sadsad");
        }

// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Dir_medicine_prescription_report.php", "print/Dir_medicine_prescription_report_print.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
             
    </script>
     
        <form action="" method="POST" class="form-inline" >
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b> Direct Medicine Prescription Report</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
				    Direct Medicine Prescription Chart
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
                <h5><b> Direct Medicine Prescription Chart</b></h5><p style= "color:slateBlue"> For OP Prescription Print Ctrl+Click Full Name </p>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>Date</th>
                                <th>Full Name</th> 
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Diagnosis</th>
                                <th>Present Complaints</th>
                                <th>Wt</th>
                                <th>BP</th>
                                <th>OE</th>
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

                                        $query="SELECT DISTINCT full_name, prescription_date, age, gender, final_diagnosis, complaints, weight, bp, oe, direct_visit_id FROM  ak_direct_visit WHERE 1";

                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (prescription_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["gender"]))
                                            if( $_GET["gender"]!=="")
                                            {
                                                $query = $query .   " and ( gender ='".  $_GET["gender"] . "')  "; 
                                            }
                                        
                                         if( isset($_GET["full_name"]))
                                            if( $_GET["full_name"]!=="")
                                            {
                                                $query = $query .   " and ( full_name ='".  $_GET["full_name"] . "')  "; 
                                            }
                                        
                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                        $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="left"><a href= "print/Dir_medicine_prescription_print.php?vsid=' .$record[9] . '">' . $record[0] . '</a></td>'; 
                                                echo '<td align="left">' . $record[2] . '</td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left">' . $record[4] . '</td>';
                                                echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                echo '<td align="left">' . $record[7] . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
                                                /*echo '<td align="left">' . $record[9] . '</td>';
                                                echo '<td align="left">' . $record[10] . '</td>';
                                                echo '<td align="left">' . $record[11] . '</td>';*/
                                                /*echo '<td align="left">' . $record[12] . '</td>';*/
                                            
                                                $qryMdNm="SELECT medicine_names FROM  ak_dir_medicine_prescription WHERE direct_visit_id ='" . $record[9] ."'";
                                            
                                                //echo $qryMdNm;
                                            
                                                $resMdNm = mysqli_query($con, $qryMdNm);
                                                $MdNm="";
                                                while($recordMdNm = mysqli_fetch_array($resMdNm))
                                                {
                                                    $MdNm =  $MdNm.$recordMdNm[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $MdNm . '</td>';
                                            
                                               /*$qryDosa="SELECT dosage FROM  ak_dir_medicine_prescription WHERE direct_visit_id ='" . $record[9] ."'";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resDosa = mysqli_query($con, $qryDosa);
                                                $Dosa="";
                                                while($recordDosa = mysqli_fetch_array($resDosa))
                                                {
                                                    $Dosa =  $Dosa.$recordDosa[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $Dosa . '</td>';*/
                                            
                                                /*$qryQty="SELECT quantity FROM  ak_dir_medicine_prescription WHERE direct_visit_id ='" . $record[9] ."'";
                                            
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
                    <td><a href="../dir_medicine_prescription.php">Go to Menu</a></td>
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
