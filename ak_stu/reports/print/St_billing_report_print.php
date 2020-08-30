<html lang="en">
    <head>
        <title>Print - ST Billing Report</title>
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

                $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=5";

                //echo $qryOrg;

                $resOrg = mysqli_query($con, $qryOrg);
                $recordOrg = mysqli_fetch_array($resOrg); 
            }
        ?>
<!-- Php code for Header Ends =============================== -->
        <form action="" method="POST" class="form-inline" >
            <div class="container col-sm-1">
            </div>
                <div class="container col-sm-10">
<!-- Document Header Start ================================================== -->
                <table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" class="img-rounded"  height="100" src="../../../ak_com/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
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
                <h5><b>ST Billing Report</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>Bill Date</th>
                                <th>Photo</th>
                                <th>Full Name</th> 
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>Course</th>
                                <th>Adm Fees</th>
                                <th>Course Fees</th>
                                <th>Study Material Charges</th>
                                <th>Ex Fees</th>
                                <th>Pr Fees</th>
                                <th>Other Charges</th>
                                <th>Dis-count</th>
                                <th>Total Bill</th>
                                <th>P Status</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for RT Case Sheet Table Starts =============================== -->
                           <?php 
                                $retStr = "";
                                try
                                {
                                    {
                                        $query="SELECT y.st_billing_id, y.st_bill_date, p.photo, p.full_name, p.at_post, p.mobile_no, c.course_name, y.admission_amount, y.course_amount, y.study_m_amount, y.examination_amount, y.practical_amount, y.other_amount, y.discount_amount, y.payable_amount, y.payment_status FROM ak_p_registration p, ak_st_course_application c, ak_st_billing y WHERE p.person_id= c.person_id  and c.st_course_application_id= y.st_course_application_id";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (y.st_bill_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["payment_status"]))
                                            if( $_GET["payment_status"]!=="")
                                            {
                                                $query = $query .   " and ( payment_status ='".  $_GET["payment_status"] . "')  "; 
                                            }
                                         if( isset($_GET["full_name"]))
                                            if( $_GET["full_name"]!=="")
                                            {
                                                $query = $query .   " and ( p.full_name ='".  $_GET["full_name"] . "')  "; 
                                            }

                                       //echo $query;

                                        $response = mysqli_query($con, $query);

                                        //$i =1;
                                        $rdfe_amt =0; 
                                        $rdfee_amt =0; 
                                        $adfee_amt =0; 
                                        $acdfee_amt =0; 
                                        $fdfee_amt =0; 
                                        $odfee_amt =0; 
                                        $disfee_amt =0;
                                        $totalBill_amt =0;
                                        while($record = mysqli_fetch_array($response))
                                        {
                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                /*echo '<td align="left">' . $i . '</td>';*/
                                                echo '<td align="left">' . $record[0] . '</td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="center"><img width="30" height="40" class="img-rounded" src="../../../ak_com/database/photos/'. $record[2] .'">  </td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left">' . $record[4] . '</td>';
                                                echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                echo '<td align="right">' . $record[7] . '</td>';
                                                echo '<td align="right">' . $record[8] . '</td>';
                                                echo '<td align="right">' . $record[9] . '</td>';
                                                echo '<td align="right">' . $record[10] . '</td>';
                                                echo '<td align="right">' . $record[11] . '</td>';
                                                echo '<td align="right">' . $record[12] . '</td>';
                                                echo '<td align="right">' . $record[13] . '</td>';
                                                echo '<td align="right">' . $record[14] . '</td>';
                                                echo '<td align="right">' . $record[15] . '</td>';
                                            echo "</tr>";
                                           // $i = $i+1;
                                            $rdfe_amt = $rdfe_amt + $record[7]; 
                                            $rdfee_amt = $rdfee_amt + $record[8]; 
                                            $adfee_amt =$adfee_amt + $record[9]; 
                                            $acdfee_amt =$acdfee_amt + $record[10]; 
                                            $fdfee_amt =$fdfee_amt + $record[11]; 
                                            $odfee_amt =$odfee_amt + $record[12];
                                            $disfee_amt =$disfee_amt + $record[13];
                                            $totalBill_amt =$totalBill_amt + $record[14];
                                        }
                                            echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td colspan="7" style="font-weight: bold" align="right">Total</td>';
                                                /*echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';*/
                                                echo '<td style="font-weight: bold" align="right">' . $rdfe_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $rdfee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $adfee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $acdfee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $fdfee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $odfee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $disfee_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $totalBill_amt . '</td>';
                                               /* echo '<td align="right">' . $record[15] . '</td>';*/
                                                echo '<td align="right"></td>';
                                            echo "</tr>";                                     
                                                                               
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
                    </div>
                    </div>
               <div class="container col-sm-0"></div>
            </form>
        </page>
    </body>
</html>
