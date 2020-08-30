<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RT Gate Pass</title>
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
                            
                            $qryCs="SELECT room_number FROM ak_rt_room_allocation WHERE rt_case_sheet_id='" . $recordPr[0] ."' ";

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
                                $dis =  $dis.$recordDis[0] . ' (' . $recordDis[1]. ')' .', ';
                            }
                            $dis=str_replace("\n","",$dis);
                            $dis=str_replace("\r","",$dis);
                            $dis=substr( $dis,0,strlen($dis)-2);
                            //echo $dis;
                            
                            $qryAtn="SELECT attendant_name1, relation1, mobile_no1  FROM ak_rt_attendant_info WHERE rt_case_sheet_id ='" . $recordPr[0] ."' ";
                                            
                            $resAtn = mysqli_query($con, $qryAtn);
                            $atn1="";
                            while($recordAtn = mysqli_fetch_array($resAtn))
                            {
                                $atn1 =  $atn1.$recordAtn[0] . ' (' . $atn1.$recordAtn[1] . ') ' . $atn1.$recordAtn[2] . "</br>";
                            }
                            /*$atn1=substr( $atn1,0,strlen($atn1)-2);*/
                            
                            $qryAtn="SELECT attendant_name2, relation2, mobile_no2  FROM ak_rt_attendant_info WHERE rt_attendant_info_id ='" . $recordPr[0] ."' ";
                                            
                            $resAtn = mysqli_query($con, $qryAtn);
                            $atn2="";
                            while($recordAtn = mysqli_fetch_array($resAtn))
                            {
                                $atn2 =  $atn2.$recordAtn[0] . ' (' . $atn2.$recordAtn[1] . ') ' . $atn2.$recordAtn[2] . "</br>";
                            }
                            /*$atn1=substr( $atn1,0,strlen($atn1)-2);*/
                               
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
            <div class="container col-sm-0">
            </div>
                <div class="container col-sm-12">

        
<!-- CS Personal Information Panel Starts================================== -->
                    <h4 align="center"><b>Retreat Gate Pass</b> </h4>
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="cs_table">
                        <tr>
                            <td width="15%" align="left">
                                <a class="pull-left" href="#">
                                <img id="photo" name="photo" class="img-rounded"  width="117" height="151" src="../../../ak_com/database/photos/<?php echo $recordPr[1];?>"  alt="Image not uploded">
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
                                        <th >Room:</th> <td><?php echo $recordCs[0];?></td>
                                        <th >Mobile:</th> <td><?php echo $recordPr[11];?></td>
                                        <th >Place:</th> <td><?php echo $recordPr[12];?></td>
                                    </tr>
                                </table>
                             </td>
                        </tr>
                        <tr>
                            <th width="15%" align="left">Address:</th> <td><?php echo $recordPr[13];?></td>
                        </tr>
                        <tr>
                            <th width="15%" align="left">Illness:</th> <td><?php echo $dis;?></td>
                        </tr>
                        <tr>
                            <th width="15%" align="left">1st Attendant:</th> <td><?php echo $atn1;?></td>
                        </tr>
                        <tr>
                            <th width="15%" align="left">2nd Attendant:</th> <td><?php echo $atn2;?></td>
                        </tr>
                    </table>
                        <p align="right">Authorized Signature </p>
                </div> 
                
<!-- CS Personal Information Panel Ends============================= -->
<!-- CS Personal Information Panel Starts================================== -->
                    <h4 align="center"><b>Retreat Gate Pass</b> </h4>
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="cs_table">
                        <tr>
                            <td width="15%" align="left">
                                <a class="pull-left" href="#">
                                <img id="photo" name="photo" class="img-rounded"  width="117" height="151" src="../../../ak_com/database/photos/<?php echo $recordPr[1];?>"  alt="Image not uploded">
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
                                        <th >Room:</th> <td><?php echo $recordCs[0];?></td>
                                        <th >Mobile:</th> <td><?php echo $recordPr[11];?></td>
                                        <th >Place:</th> <td><?php echo $recordPr[12];?></td>
                                    </tr>
                                </table>
                             </td>
                        </tr>
                        <tr>
                            <th width="15%" align="left">Address:</th> <td><?php echo $recordPr[13];?></td>
                        </tr>
                        <tr>
                            <th width="15%" align="left">Illness:</th> <td><?php echo $dis;?></td>
                        </tr>
                        <tr>
                            <th width="15%" align="left">1st Attendant:</th> <td><?php echo $atn1;?></td>
                        </tr>
                        <tr>
                            <th width="15%" align="left">2nd Attendant:</th> <td><?php echo $atn2;?></td>
                        </tr>
                    </table>
                        <p align="right">Authorized Signature </p>
                </div> 
                
<!-- CS Personal Information Panel Ends============================= -->
				</div>
               <div class="container col-sm-0"></div>
        </form>
    </page>
    </body>
</html>