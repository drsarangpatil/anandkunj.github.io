<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dir Medicine Prescription</title>
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
                            
                            $qryOrg="SELECT logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=1";

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }
                            
                            $qryPr="SELECT d.full_name, d.age, d.gender, d.prescription_date, d.schedule, d.complaints, d.weight, d.bp, d.oe, d.final_diagnosis, d.direct_visit_id FROM ak_direct_visit d WHERE d.direct_visit_id= ". $_GET["vsid"];
                            
                            
                             //echo $qryPr;
                            {
                                
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                                
                                // Case_sheet no. padding 
                                 $num = $recordPr[10];
                                $vs_no = ''.str_pad($num, 8, '0', STR_PAD_LEFT);
                                //$str = "1";
                                //echo $cs_no;
                               
                            }
                           
                        }
                    }
                    catch(Exception $ex)
                    {
                        echo "<script language='javascript'>alert('Error in Reading data')</script>";
                    }
                ?>
<!-- Php code Ends ========================================= -->
        <form action="" method="POST" class="form-inline">
            <div class="container col-sm-0">
            </div>
                <div class="container col-sm-12">
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
                                <h6 Style= color:orange align="center"><i> <?php echo $recordOrg[1];?></i></h6>
                                <h3 Style= color:slateBlue align="center"><b> <?php echo $recordOrg[2];?></b></h3>
                                 <h6 Style= color:orange align="center"> <?php echo $recordOrg[3];?>,  Phone: <?php echo $recordOrg[4];?>, <?php echo $recordOrg[5];?></h6>
                            </td>
                        </tr>
                    </table>
<!-- Document Header End ================================================== -->
    <h4 align="center"><b> Prescription</b> </h4>
    <p align="center"><span style="font-family:IDAutomationHC39S; font-size:8px;"> <?php echo $recordPr[0];?> </span> VS ID: <span style="font-family:IDAutomationHC39S; font-size:8px;"> <?php echo $vs_no;?> </span></p>
        
<!-- Prescription Panel Starts================================== -->
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover"                      id="cs_table">
                        <tr>
                            <th>Full Name:</th> <td><b><?php echo $recordPr[0];?></b></td>
                            <th>Date:</th> <td><?php echo $recordPr[3];?></td>
                            <th>Weight:</th> <td><?php echo $recordPr[6];?> kg</td>
                        </tr>
                        <tr>
                            <th>Diagnosis:</th> <td><?php echo $recordPr[9];?></td>
                            <th>Age:</th> <td><?php echo $recordPr[1];?> yrs</td>
                            <th>Gender:</th> <td><?php echo $recordPr[2];?></td>
                        </tr>
                        <tr>
                            <th>Complaints:</th>
                            <td colspan="5"><?php echo $recordPr[5];?></td>
                        </tr>
                        <tr>
                            <th colspan="1">O/E:</th> 
                            <td colspan="2"><?php echo $recordPr[8];?></td>
                            <th colspan="1">BP:</th> 
                            <td colspan="2"><?php echo $recordPr[7];?> mmHg</td>
                        </tr>
                </table>
                <!--<table width="100%" class="table table-striped table-bordered table-hover"                      id="cs_table">
                        <tr>
                            <th width="25%">Present Complaints:</th> <td width="75%"><?php echo $recordPr[5];?></td>
                        </tr>
                </table>
                <table width="100%" class="table table-striped table-bordered table-hover"                      id="cs_table">
                        <tr>
                            <th width="5%">O/E:</th> <td width="70%"><?php echo $recordPr[8];?></td>
                            <th width="5%">BP:</th> <td width="20%"><?php echo $recordPr[7];?> mmHg</td>
                        </tr>
                </table>-->
            </div>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:14px"> 
                                <!--<th>#</th>-->
                                <th>Medicine Names</th>
                                <!--<th>Dosage</th>
                                <th>Qty</th>-->
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for OP Medicine Starts =============================== -->
                         <?php 
                                $retStr = "";
                                try
                                {
                                    {
                                        $query="SELECT medicine_names FROM  ak_dir_medicine_prescription WHERE direct_visit_id ='" . $recordPr[10] ."'";
                                        
                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                        $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                            echo '<tr class="odd gradeX" style="font-size:16px" >';
                                                //echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left">' . nl2br($record[0]) . '</td>';
                                                //echo '<td align="left">' . $record[1] . '</td>';
                                                //echo '<td align="left">' . $record[2] . '</td>';
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
                    <br>
                     <p align="left"><i>Nature Heals, Not Physician </i></p>
                </div> 
<!-- CS Personal Information Panel Ends============================= -->
				</div>
               <div class="container col-sm-0"></div>
            </form>
        </page>
    </body>
</html>