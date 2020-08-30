<html lang="en">
    <head>
        <title> Print RT Daily Health Records</title>
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
        
<!-- Php code Starts =============================== -->
                <?php 
                    include( "../../database/Config.php");
                    $data = new myConfig();

                    $retStr = "";
                    try
                    {
                        $con = mysqli_connect($data->host, $data->user, $data->password,$data->db);
                        if (!$con)
                            echo(' Could not connect: ' . mysql_error());
                        else
                        {
                            mysqli_set_charset( $con, 'utf8' );
                            $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id='1'";

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }
                            
                            $qryPr="SELECT c.rt_case_sheet_id, p.photo, p.full_name, c.doa, p.occupation, p.dob, p.gender, p.marital_status, p.male_child, p.female_child, p.email, p.mobile_no, p.at_post,  p.address, c.doc, c.retreat_name FROM ak_p_registration p, ak_rt_case_sheet c WHERE p.person_id= c.person_id ";
                            $qryPr=$qryPr . " and c.rt_case_sheet_id = ". $_GET["csid"];
                             //echo $qryPr;
                            {
                                
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                                
                                // age calculation      
                                $bday = new DateTime($recordPr[5]); 
                                $today = new Datetime(date('m.d.y'));
                                $diff = $today->diff($bday);
                               
                            }
                            
                            /*$qryCs="SELECT present_complaints, past_history, treatment_history, family_history, appetite, bowel_motions, urination, sleep, food_habits, addictions, work_type, stress_type, clinical_examination, investigations FROM ak_rt_case_sheet WHERE rt_case_sheet_id='" . $recordPr[0] ."' ";

                           // echo $qryCs;
                            {
                                
                            $resCs = mysqli_query($con, $qryCs);
                            $recordCs = mysqli_fetch_array($resCs);
                            }
                            */
                            $qryDis="SELECT disease_name, disease_nick FROM ak_rt_case_sheet_fd WHERE rt_case_sheet_id='" . $recordPr[0] ."' ";
                            
                             //echo $qryDis;

                            $resDis = mysqli_query($con, $qryDis);
                            $dis="";
                            while($recordDis = mysqli_fetch_array($resDis))
                            {
                                $dis =  $dis.$recordDis[0] . ' (' . $recordDis[1]. ')' .", ";
                            }
                            $dis=substr( $dis,0,strlen($dis)-2);
                               
                        }
                    }
                   
                    catch(Exception $ex)
                    {
                        echo "<script language='javascript'>alert('Error in Reading data')</script>";
                    }
                    
                ?>
<!-- Php code Ends ========================================= -->
        <form action="" method="POST" class="form-inline" >
            <div class="container col-sm-0">
            </div>
                <div class="container col-sm-12">
<!-- Document Header Start ================================================== -->
                <!--<table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" class="img-circle"  width="100" height="100" src="../../../ak_set/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
                                </a>
                            </td>
                            <td width="85%" align="center">
                                <h6 Style= color:orange align="center"><i> <?php echo $recordOrg[1];?></i></h6>
                                <h2 Style= color:slateBlue align="center"><b> <?php echo $recordOrg[2];?></b></h2>
                                 <h6 Style= color:orange align="center"> <?php echo $recordOrg[3];?>,  Phone: <?php echo $recordOrg[4];?>, <?php echo $recordOrg[5];?></h6>
                            </td>
                        </tr>
                </table>-->
<!-- Document Header End ================================================== --> 
 <h4 align="center"><b> Daily Health Record Sheet</b> </h4>
    <!--<p align="right">CS ID: <span> <?php echo $recordPr[0];?> </span><span> Bar Code: </span> <span> ///////////////// </span></p>-->
        
<!-- CS Personal Information Panel Starts================================== -->
                    <!--<div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-body">-->
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="cs_table" style="font-size:13px">
                        <tr>
                            <td width="5%" align="center">
                                <a class="pull-center" href="#">
                                <img id="photo" name="photo" class="img-rounded"  width="77" height="111" src="../../../ak_com/database/photos/<?php echo $recordPr[1];?>"  alt="Image not uploded">
                                </a>
                                
                            </td>
                            <td width="95%" align="left">
                                <table width="100%" class="table table-striped table-bordered table-        hover" id="cs_table" style="font-size:13px">
                                    <tr>
                                        <th>Full Name:</th> <td><b><?php echo $recordPr[2];?></b></td>
                                        <th>DOA:</th> <td><?php echo $recordPr[3];?></td>
                                        <th>DOC:</th> <td><?php echo $recordPr[14];?></td>
                                    </tr>
                                    <tr>
                                        <th >M Status:</th> <td><?php echo $recordPr[7];?></td>
                                        <th >Retreat:</th> <td colspan="3"><?php echo $recordPr[15];?></td>
                                    </tr>
                                    <tr>
                                        <th>Occupation:</th> <td><?php echo $recordPr[4];?></td>
                                        <th>Age:</th> <td><?php echo $diff->y;?> yrs</td>
                                        <th>Gender:</th> <td><?php echo $recordPr[6];?></td>
                                    </tr>
                                    <!--<tr>
                                        <th >Email ID.:</th> <td><?php echo $recordPr[10];?></td>
                                        <th >Mobile:</th> <td><?php echo $recordPr[11];?></td>
                                        <th >Place:</th> <td><?php echo $recordPr[12];?></td>
                                    </tr>-->
                                </table>
                             </td>
                        </tr>
                        <!--<tr>
                            <th width="15%" align="left">Postal Address:</th> <td><?php echo $recordPr[13];?></td>
                        </tr>-->
                        <tr>
                            <th width="5%" align="left">Diagnosis:</th> <td><?php echo $dis;?></td>
                        </tr>
                    </table>
                </div> 
                <!--</div>
                </div>   
                </div>-->
<!-- CS Personal Information Panel Ends============================= -->
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px">
                                <th>Day</th>
                                <th>Date</th>
                                <th>Wt</th>
                                <th>BP</th>
                                <th>OE</th>
                                <th>Amroli</th>
                                <th>Water</th>
                                <th>Detox</th>
                                <th>BM</th>
                                <th>Compalints</th>
                                <th>Treatments</th>
                                <th>Diet</th>
                                <th>Medicines</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for OP Case Sheet Table Starts =============================== -->
                            <?php 
                                $retStr = "";
                                try
                                {
                                    {
                                         $query="SELECT d.rt_daily_assessment_record_id, d.daily_date, d.retreat_day, d.weight, d.bp, d.oe, d.amroli, d.water, d.detox, d.motions, d.complaints, c.rt_case_sheet_id, d.diet_status, d.daily_medicine FROM ak_rt_daily_assessment_record d, ak_rt_case_sheet c WHERE c.rt_case_sheet_id= d.rt_case_sheet_id ";
                                        $query = $query . " and d.rt_case_sheet_id ='" . $recordPr[0] ."' ";
                                        
                                        //echo $query;
                                        $response = mysqli_query($con, $query);

                                       /*$i =1;*/
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                /*echo '<td align="left">' . $i . '</td>';*/
                                                /*echo '<td align="left">' . $record[0] . '</td>';*/
                                                echo '<td align="left">' . $record[2] . '</td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left">' . $record[4] . '</td>';
                                                echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                echo '<td align="left">' . $record[7] . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
                                                echo '<td align="left">' . $record[9] . '</td>';
                                                echo '<td align="left">' . $record[10] . '</td>';
                                                /*echo '<td align="left">' . $record[11] . '</td>';*/
                                            
                                                $qryTrNm="SELECT treatment_name FROM ak_rt_daily_treatment_prescription WHERE rt_case_sheet_id= '" . $recordPr[0] ."' and daily_date= '" . $record[1] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resTrNm = mysqli_query($con, $qryTrNm);
                                                $TrNm="";
                                                while($recordTrNm = mysqli_fetch_array($resTrNm))
                                                {
                                                    $TrNm =  $TrNm.$recordTrNm[0] . "</br>";
                                                    
                                                }
                                                echo '<td align="left">' . $TrNm . '</td>';
                                            
                                                $qrymDiet="SELECT morning_diet, noon_diet, afternoon_diet, evening_diet FROM ak_rt_daily_diet_prescription WHERE rt_case_sheet_id= '" . $recordPr[0] ."' and daily_date= '" . $record[1] ."' ";
                                            
                                                //echo $qrymDiet;
                                            
                                                $resmDiet = mysqli_query($con, $qrymDiet);
                                                $mdiet="";
                                                while($recordmDiet = mysqli_fetch_array($resmDiet))
                                                {
                                                    $mdiet =  $mdiet . $recordmDiet[0] . "</br>" . $recordmDiet[1] . "</br>" . $recordmDiet[2] . "</br>" . $recordmDiet[3] . "</br>";
                                                    
                                                } 
                                                //echo '<td align="left">' . $mdiet . '</td>';
                                            
                                                echo '<td align="left">' . $record[12] . '</td>';
                                            
                                                 $qryMdNm="SELECT medicine_names FROM  ak_rt_daily_medicine_prescription WHERE rt_case_sheet_id= '" . $recordPr[0] ."' and daily_date= '" . $record[1] ."' ";
                                            
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
<!-- Php code for OP Case Sheet Table ends =============================== -->
                        </tbody>
                    </table>
                     <!--<td><a href="../Rt_cs_register.php">Back</a></td> -->
                    </div>
                    </div>
                <div class="container col-sm-0">
            </div>
        </form>
    </page>
    </body>
</html>
