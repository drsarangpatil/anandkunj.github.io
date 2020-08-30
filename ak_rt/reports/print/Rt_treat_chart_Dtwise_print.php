<html lang="en">
    <head>
        <title>Date-wise RT Treatment Chart</title>
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
    <page size="A4" layout="landscape">
        
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
                <h5><b>Date-wise RT Treatment Chart</b></h5>
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
                                <th>Time</th>
                                <th>Therapy Dept</th>
                                <th>Treatment Name</th>
                                <th>Therapist</th>
                                <th>Instructions</th>
                                <th>Illness</th>
                                <th>Date</th>
                                <!--<th>Schedule</th>-->
                            </tr>
                        </thead>
                        <tbody>
 <!-- Php code for OP Treatment Chart Starts =============================== --> 
        <?php 
            $retStr = "";
            try
            {
                {
                    $query="SELECT DISTINCT p.full_name, p.photo, p.gender, t.treatment_time,  t.therapy_dept,  t.treatment_name, t.therapist_name, t.treat_instructions, c.rt_case_sheet_id, t.daily_date, t.schedule FROM ak_p_registration p, ak_rt_daily_treatment_prescription t, ak_rt_case_sheet c WHERE c.ad_status='Admitted' and p.person_id= c.person_id";
                    $query=$query . " and c.rt_case_sheet_id = t.rt_case_sheet_id";
                    $query=$query . " and t.daily_date ='".  $_GET["daily_date"] . "'";
                    //echo $query;


                    /*if( isset($_GET["from_date"]))
                       if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                        {
                            $query = $query .   " and  (v.visit_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                        }*/

                    if( isset($_GET["gender"]))
                        if( $_GET["gender"]!=="")
                        {
                            $query = $query .   " and ( p.gender ='".  $_GET["gender"] . "')  "; 
                        }
                    if( isset($_GET["therapy_dept"]))
                        if( $_GET["therapy_dept"]!=="")
                        {
                            $query = $query .   " and ( t.therapy_dept ='".  $_GET["therapy_dept"] . "')  "; 
                        }
                    if( isset($_GET["therapist_name"]))
                        if( $_GET["therapist_name"]!=="")
                        {
                            $query = $query .   " and ( t.therapist_name ='".  $_GET["therapist_name"] . "')  "; 
                        }

                    if( isset($_GET["schedule"]))
                        if( $_GET["schedule"]!=="")
                        {
                            $query = $query .   " and ( t.schedule ='".  $_GET["schedule"] . "')  "; 
                        }

                    //echo $query;

                    $response = mysqli_query($con, $query);

                    $i =1;
                    while($record = mysqli_fetch_array($response))
                    {

                    echo '<tr class="odd gradeX" style="font-size:13px" >';
                            echo '<td align="left">' . $i . '</td>';
                            echo '<td align="left">' . $record[0] . '</td>';
                            echo '<td align="left"><img width="20" height="30" class="img-rounded" src="../../../ak_com/database/photos/'. $record[1] .'">  </td>';
                            echo '<td align="left">' . $record[2] . '</td>';

                            $qryRom="SELECT room_number FROM ak_rt_room_allocation WHERE rt_case_sheet_id ='" . $record[8] ."' ";

                                $resRom = mysqli_query($con, $qryRom);
                                $rom="";
                                while($recordRom = mysqli_fetch_array($resRom))
                                {
                                    $rom =  $rom.$recordRom[0] . "</br>";
                                }
                            echo '<td align="left">' . $rom . '</td>';

                            //echo '<td align="left">' . $record[9] . '</td>';
                            echo '<td align="left">' . $record[3] . '</td>';
                            echo '<td align="left">' . $record[4] . '</td>';
                            echo '<td align="left">' . $record[5] . '</td>';
                            echo '<td align="left">' . $record[6] . '</td>';
                            echo '<td align="left">' . $record[7] . '</td>';
                            $qryDis="SELECT disease_nick FROM ak_rt_case_sheet_fd WHERE rt_case_sheet_id ='" . $record[8] ."' ";

                            $resDis = mysqli_query($con, $qryDis);
                            $dis="";
                            while($recordDis = mysqli_fetch_array($resDis))
                            {
                                $dis =  $dis.$recordDis[0] . "</br>";
                            }

                            echo '<td align="left">' . $dis . '</td>';
                            echo '<td align="left">' . $record[9] . '</td>';
                            //echo '<td align="left">' . $record[10] . '</td>';
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
                   <!-- <td><a href="../Rt_treat_chart_Dtwise.php">Back</a></td>-->
                    </div>
                    </div>
            <div class="container col-sm-0">
            </div>
        </form>
    </page>
    </body>
</html>
