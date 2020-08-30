<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RT Case Sheet</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../../ak_com/assets/css/bootstrap.3.4.1.min.css">
        <script src="../../../ak_com/assets/js/jquery.3.3.1.min.js"></script>
        <script src="../../../ak_com/assets/js/bootstrap.3.4.1.min.js"></script>
        <link rel="shortcut icon" type="image/png" href="../../../ak_com/assets/images/A_Logo_32x32.png">
        <link rel="stylesheet" href="../../../ak_com/assets/css/a4page.css.css">
        
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
                            $qryOrg="SELECT logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id='1'";

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
                            
                            $qryCs="SELECT present_complaints, past_history, treatment_history, family_history, appetite, bowel_motions, urination, sleep, food_habits, addictions, work_type, stress_type, clinical_examination, investigations FROM ak_rt_case_sheet WHERE rt_case_sheet_id='" . $recordPr[0] ."' ";

                           // echo $qryCs;
                            {
                                
                            $resCs = mysqli_query($con, $qryCs);
                            $recordCs = mysqli_fetch_array($resCs);
                            }
                            
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
                    mysqli_close ($con);
                ?>
<!-- Php code Ends ========================================= -->
        <form action="" method="POST" class="form-inline">
            <div class="container col-sm-1">
            </div>
                <div class="container col-sm-11">
<!-- Document Header Start =================================== -->   
                <table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" class="img-rounded"  width="100" height="100" src="../../../ak_com/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
                                </a>
                            </td>
                            <td width="85%" align="center">
                                <h6 style= "color:orange" align="center"><i> <?php echo $recordOrg[1];?></i></h6>
                                <h2 style= "color:slateBlue" align="center"><b> <?php echo $recordOrg[2];?></b></h2>
                                 <h6 style= "color:orange" align="center"> <?php echo $recordOrg[3];?>,  Phone: <?php echo $recordOrg[4];?>, <?php echo $recordOrg[5];?></h6>
                            </td>
                        </tr>
                    </table>
<!-- Document Header End ================================================== -->
    <h4 align="center"><b> Retreat Admission Sheet</b> </h4>
    <p align="center">CS ID: <span> <?php echo $recordPr[0];?>, </span> <span style="font-family:IDAutomationHC39S; font-size:7px;"> <?php echo $recordPr[2];?> </span></p>
        
<!-- CS Personal Information Panel Starts================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-body">
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="cs_table">
                        <tr>
                            <td width="15%" align="left">
                                <a class="pull-left" href="#">
                                <img id="photo" name="photo" class="img-rounded"  width="127" height="161" src="../../../ak_com/database/photos/<?php echo $recordPr[1];?>"  alt="Image not uploded">
                                </a>
                                
                            </td>
                            <td width="85%" align="left">
                                <table width="100%" class="table table-striped table-bordered table-        hover" id="cs_table">
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
                                    
                                    <tr>
                                        <th >Email ID.:</th> <td><?php echo $recordPr[10];?></td>
                                        <th >Mobile:</th> <td><?php echo $recordPr[11];?></td>
                                        <th >Place:</th> <td><?php echo $recordPr[12];?></td>
                                    </tr>
                                </table>
                             </td>
                        </tr>
                        <tr>
                            <th width="15%" align="left">Postal Address:</th> <td><?php echo $recordPr[13];?></td>
                        </tr>
                    </table>
                </div> 
                </div>
                </div>   
                </div>
<!-- CS Personal Information Panel Ends============================= -->
<!-- CS Clinical Info Panel Starts================================== -->
                <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-body">
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="cs_table">
                         <tr>
                            <th width="50%" align="left">Presenting Complaints and its History:</th> 
                            <th width="50%" align="left">Past History: </th>
                        </tr>
                        <tr>
                             <td><?php echo $recordCs[0];?></td>
                             <td><?php echo $recordCs[1];?></td>
                        </tr>
                          <tr>
                            <th>Past Treatments and Present Medications:</th> 
                            <th>Family History:</th>
                        </tr>
                        <tr>
                            <td><?php echo $recordCs[2];?></td>
                            <td><?php echo $recordCs[3];?></td>
                        </tr>
                    </table>
                    <table width="100%" class="table table-striped table-bordered table-hover"         id="cs_table">
                        <caption> <b> Personal History: </b></caption>
                        <tr>
                            <td width="15%" align="left">Appetite:</td> <td width="35%" align="left"> <?php echo $recordCs[4];?></td>
                            <td width="15%" align="left">Bowel Motions:</td> <td width="35%" align="left"><?php echo $recordCs[5];?></td>
                        </tr>
                        <tr>
                            <td width="15%" align="left">Mituration:</td> <td width="35%" align="left"><?php echo $recordCs[6];?></td>
                            <td width="15%" align="left">Sleep:</td> <td width="35%" align="left"><?php echo $recordCs[7];?></td>
                        </tr>
                        <tr>
                            <td width="15%" align="left">Food Habits:</td> <td width="35%" align="left"><?php echo $recordCs[8];?></td>
                            <td width="15%" align="left">Addictions:</td> <td width="35%" align="left"><?php echo $recordCs[9];?></td>
                        </tr>
                        <tr>
                            <td width="15%" align="left">Type of Work:</td> <td width="35%" align="left"><?php echo $recordCs[10];?></td>
                            <td width="15%" align="left">Type of Stress:</td><td width="35%" align="left"><?php echo $recordCs[11];?></td>
                        </tr>
                    </table>
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="cs_table">
                         <tr>
                            <th width="50%" align="left">General Physical and Systemic Examination:</th> 
                            <th width="50%" align="left">Investigation Reports: </th>
                        </tr>
                        <tr>
                             <td><?php echo $recordCs[12];?></td>
                             <td><?php echo $recordCs[13];?></td>
                        </tr>
                    </table>
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="cs_table">
                        <tr>
                            <th width="20%" align="left"> Nature of Illness</th> 
                            <td width="80%" align="left"><?php echo $dis;?></td>
                        </tr>
                    </table>
                     <p align="right">Authorized Signature </p>
                </div> 
                </div>
                </div>   
                </div>
<!-- CS Clinical Info Panel Ends================================== -->
				</div>
               <div class="container col-sm-0"></div>
        </form>
    </page>
    </body>
</html>