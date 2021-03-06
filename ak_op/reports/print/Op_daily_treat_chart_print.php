<html lang="en">
    <head>
        <title>OP Daily Treatment Chart</title>
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
                                <img id="logo" name="logo" class="img-rounded" width="100" height="100" src="../../../ak_com/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
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
                <h4 align="center"><b> OP Daily Treatment Chart - <span><?php echo date("d-m-Y");?></span></b></h4>
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
                $retStr = "";
                try
                {
                    {
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
                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../../ak_com/database/photos/'. $record[1] .'">  </td>';
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
                    <!--<td><a href="../Op_treat_chart.php">Back</a></td>-->
                    </div>
                    </div>
               <div class="container col-sm-0"></div>
            </form>
        </page>
    </body>
</html>
