<html lang="en">
    <head>
        <title>Print Direct Medicine Chart</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../../ak_com/assets/css/bootstrap.3.4.1.min.css">
        <script src="../../../ak_com/assets/js/jquery.3.3.1.min.js"></script>
        <script src="../../../ak_com/assets/js/bootstrap.3.4.1.min.js"></script>
        <link rel="shortcut icon" type="image/png" href="../../../ak_com/assets/images/A_Logo_32x32.png">
        
    <link rel="stylesheet" href="../../../ak_com/assets/css/page_setup.css">
    </head>
    <body>
    <!--JS for print button-->
    <script>
        function myprint() {
          window.print();
        }
    </script>
        
    <button id="printPageButton" onClick="window.print();">Print</button>
    <page size="A4">
<!-- Php code for Header Starts =============================== -->
        <?php
            //create connection
            include_once('../../database/Config.php');
            $data = new myConfig();

            $con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
            //confirm connection
            if ($con)
            {
                //echo "1";
                mysqli_set_charset( $con, 'utf8' );

                $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=1";

                //echo $qryOrg;

                $resOrg = mysqli_query($con, $qryOrg);
                $recordOrg = mysqli_fetch_array($resOrg); 
            }
        ?>
<!-- Php code for Header Ends =============================== -->
        <form action="" method="POST" class="form-inline" >
            <div class="container col-sm-0">
            </div>
                <div class="container col-sm-12">
<!-- Document Header Start ================================================== -->
                <table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" class="img-rounded"  width="100" height="100" src="../../../ak_com/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
                                </a>
                            </td>
                            <td width="85%" align="center">
                                <h6 Style= color:orange align="center"><i> <?php echo $recordOrg[1];?></i></h6>
                                <h2 Style= color:slateBlue align="center"><b> <?php echo $recordOrg[2];?></b></h2>
                                 <h6 Style= color:orange align="center"> <?php echo $recordOrg[3];?>,  Phone: <?php echo $recordOrg[4];?>, <?php echo $recordOrg[5];?></h6>
                            </td>
                        </tr>
                </table>
<!-- Document Header End ================================================== --> 
                <h5 align="center"><b> Direct Medicine Prescription Chart</b></h5>
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
                                $retStr = "";
                                try
                                {
                                    {
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
                                                echo '<td align="left">' . $record[0] . '</td>'; 
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
                    <!--<td><a href="../Op_medicine_chart.php">Back</a></td>-->
                    </div>
                    </div>
               <div class="container col-sm-0"></div>
            </form>
        </page>
    </body>
</html>
