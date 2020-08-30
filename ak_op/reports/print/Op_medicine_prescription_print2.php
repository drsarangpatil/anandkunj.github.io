<!DOCTYPE html>
<html lang="en">
    <head>
        <title>OP Medicine Prescription</title>
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
                            
                            $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=1";

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }
                            
                            $qryPr="SELECT p.full_name, p.dob, p.gender, c.op_case_sheet_id, v.op_visit_id, v.visit_date, v.schedule, v.complaints, v.weight, v.bp, v.oe FROM ak_p_registration p, ak_op_case_sheet c, ak_op_visit v WHERE p.person_id= c.person_id and c.op_case_sheet_id=2"; 
                            
                            
                            
                            /*v.op_case_sheet_id";
                            $qryPr=$qryPr . " and c.op_case_sheet_id = ". $_GET["csid"];*/
                            
                             //echo $qryPr;
                            {
                                
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                                
                                // age calculation      
                                $bday = new DateTime($recordPr[1]); 
                                $today = new Datetime(date('m.d.y'));
                                $diff = $today->diff($bday);
                                
                                // Case_sheet no. padding 
                                $num = $recordPr[3];
                                $cs_no = ''.str_pad($num, 8, '0', STR_PAD_LEFT);
                                //$str = "1";
                                //echo $cs_no;
                               
                            }
                            
                            $qryDis="SELECT disease_name FROM ak_op_case_sheet_fd WHERE op_case_sheet_id='" . $recordPr[3] ."' ";
                            
                             //echo $qryDis;

                            $resDis = mysqli_query($con, $qryDis);
                            $dis="";
                            while($recordDis = mysqli_fetch_array($resDis))
                            {
                                $dis =  $dis.$recordDis[0] . ' , ';
                               
                            }
                            
                            $qryMdNm="SELECT medicine_names, dosage, quantity  FROM  ak_op_medicine_prescription WHERE op_visit_id ='" . $recordPr[4] ."' and visit_date= '" . $recordPr[5] ."' and schedule= '" . $recordPr[6] ."' ";
                            //echo $qryMdNm;

                            $resMdNm = mysqli_query($con, $qryMdNm);
                            $MdNm="";
                            while($recordMdNm = mysqli_fetch_array($resMdNm))
                            {
                                $MdNm = $MdNm.$recordMdNm[0]  . '~~' . $recordMdNm[1] . '~~' . $recordMdNm[2] . ' <br>';

                            }
                            //echo $MdNm;
                            
                            $lines = explode("\n",$MdNm); // explode the fetched lines
                            for($i = 0; $i < count($lines); $i++)
                            {
                                $exploded_data=explode("~~",$lines[$i]); 
                    
                                $exploded_data[1] = str_replace("\n",'', $exploded_data[1]);
                                $exploded_data[1] = str_replace("\r",'', $exploded_data[1]);
                            }
                            
                            
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
            <div class="container col-sm-2">
            </div>
                <div class="container col-sm-8">
<!-- Document Header Start =================================== -->   
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
                                <h3 Style= color:slateBlue align="center"><b> <?php echo $recordOrg[2];?></b></h3>
                                 <h6 Style= color:orange align="center"> <?php echo $recordOrg[3];?>,  Phone: <?php echo $recordOrg[4];?>, <?php echo $recordOrg[5];?></h6>
                            </td>
                        </tr>
                    </table>
<!-- Document Header End ================================================== -->
    <h4 align="center"><b> Prescription</b> </h4>
    <p align="center"><span style="font-family:IDAutomationHC39S; font-size:8px;"> <?php echo $recordPr[0];?> </span> CS ID: <span style="font-family:IDAutomationHC39S; font-size:8px;"> <?php echo $cs_no;?> </span></p>
        
<!-- Prescription Panel Starts================================== -->
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover"                      id="cs_table">
                        <tr>
                            <th>Full Name:</th> <td><b><?php echo $recordPr[0];?></b></td>
                            <th>Date:</th> <td><?php echo $recordPr[5];?></td>
                            <th>Weight:</th> <td><?php echo $recordPr[8];?> kg</td>
                        </tr>
                        <tr>
                            <th>Diagnosis:</th> <td><?php echo $dis;?></td>
                            <th>Age:</th> <td><?php echo $diff->y;?> yrs</td>
                            <th>Gender:</th> <td><?php echo $recordPr[2];?></td>
                        </tr>
                </table>
                <table width="100%" class="table table-striped table-bordered table-hover"                      id="cs_table">
                        <tr>
                            <th width="20%">Present Complaints:</th> <td><?php echo $recordPr[7];?></td>
                        </tr>
                </table>
                <table width="100%" class="table table-striped table-bordered table-hover"                      id="cs_table">
                        <tr>
                            <th width="5%">O/E:</th> <td><?php echo $recordPr[10];?></td>
                            <th width="5%">BP:</th> <td><?php echo $recordPr[9];?> mmHg</td>
                        </tr>
                </table>
            </div>
            <div>
                <h4> Rx</h4>
                <table width="100%" class="table table-striped table-bordered table-hover"                      id="cs_table">
                    <tr>
                        <td style="font-size:16px">
                        <?php echo $exploded_data[0];?>
                        </td>
                        <td style="font-size:16px">
                        <?php echo $exploded_data[1];?>
                        </td>
                        <td style="font-size:16px">
                        <?php echo $exploded_data[2];?>
                        </td>
                    </tr>
                </table>
                <table width="100%" class="table table-striped table-bordered table-hover"                      id="cs_table">
                    <tr>
                        <td style="font-size:16px">
                        <?php echo $MdNm;?>
                        </td>
                    </tr>
                </table>
            </div>
            <td><a href="../Op_medicine_chart.php">Back</a></td>
<!-- CS Personal Information Panel Ends============================= -->
				</div>
               <div class="container col-sm-0"></div>
            </form>
        </page>
    </body>
</html>