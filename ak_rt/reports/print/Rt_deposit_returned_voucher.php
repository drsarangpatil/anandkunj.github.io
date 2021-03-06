<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RT Deposit Returned Voucher</title>
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
                            
                            /*$qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=1";

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }*/
                            
                            $qryPr="SELECT p.full_name, p.dob, p.at_post, p.mobile_no, c.rt_case_sheet_id, y.rt_v_d_returned_id, y.rt_v_d_returned_date, y.deposit_amount, y.returned_amount, y.balance_amount, y.v_items, y.rt_v_d_received_id, c.retreat_name, c.doa, c.doc FROM ak_p_registration p, ak_rt_case_sheet c, ak_rt_valuables_deposit_returned y WHERE p.person_id= c.person_id and c.rt_case_sheet_id= y.rt_case_sheet_id";
                            $qryPr=$qryPr . " and y.rt_v_d_returned_id = ". $_GET["drid"];
                            
                            //echo $qryPr;
                            {
                                
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                                
                            // age calculation      
                                $bday = new DateTime($recordPr[1]); 
                                $today = new Datetime(date('m.d.y'));
                                $diff = $today->diff($bday);
                                
                            // date extraction
                                $time=strtotime($recordPr[6]);
                                //$month=date("F",$time);
                                $year=date("Y",$time);

                            // php code to convert number in to text words.
                               $number = $recordPr[8];
                               $no = round($number);
                               $point = round($number - $no, 2) * 100;
                               $hundred = null;
                               $digits_1 = strlen($no);
                               $i = 0;
                               $str = array();
                               $words = array('0' => '', '1' => 'one', '2' => 'two',
                                '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                                '7' => 'seven', '8' => 'eight', '9' => 'nine',
                                '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                                '13' => 'thirteen', '14' => 'fourteen',
                                '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                                '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                                '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                                '60' => 'sixty', '70' => 'seventy',
                                '80' => 'eighty', '90' => 'ninety');
                               $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
                               while ($i < $digits_1) {
                                 $divider = ($i == 2) ? 10 : 100;
                                 $number = floor($no % $divider);
                                 $no = floor($no / $divider);
                                 $i += ($divider == 10) ? 1 : 2;
                                 if ($number) {
                                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                    $str [] = ($number < 21) ? $words[$number] .
                                        " " . $digits[$counter] . $plural . " " . $hundred
                                        :
                                        $words[floor($number / 10) * 10]
                                        . " " . $words[$number % 10] . " "
                                        . $digits[$counter] . $plural . " " . $hundred;
                                 } else $str[] = null;
                              }
                              $str = array_reverse($str);
                              $result = implode('', $str);
                              $points = ($point) ?
                                "." . $words[$point / 10] . " " . 
                                      $words[$point = $point % 10] : '';
                              //echo $result . "Rupees  " . $points . " Paise";
                               
                            }
                            
                            $qryDis="SELECT disease_name FROM ak_rt_case_sheet_fd WHERE rt_case_sheet_id='" . $recordPr[4] ."'";
                            
                             //echo $qryDis;

                            $resDis = mysqli_query($con, $qryDis);
                            $dis="";
                            while($recordDis = mysqli_fetch_array($resDis))
                            {
                                $dis =  $dis.$recordDis[0] . ', ';
                               
                            }
                            $dis=substr($dis,0,strlen($dis)-2);
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
                <!--<table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" class="img-circle"  width="100" height="100" src="../../../ak_com/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
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
    <h4 align="center"><b>Deposit Returned Voucher</b> </h4>
    <p align="right"><span>Voucher No.:</span> <span> <?php echo $year;?>/0<?php echo $recordPr[5];?> </span>, <span>CS ID:</span> <span> <?php echo $recordPr[4];?></span>, <span style="font-family:IDAutomationHC39S; font-size:7px;"> <?php echo $recordPr[0];?> </span></p>
        <!--//-$month-$recordPr[5]-->
<!-- Payment Panel Starts================================== -->
                <div class="table-responsive" style="font-size:16px">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="cs_table">
                        <tr>
                            <th>Full Name:</th> <td><b><?php echo $recordPr[0];?></b></td>
                            <th>Age:</th> <td><?php echo $diff->y;?> yrs</td>
                            <th>Date:</th> <td><?php echo $recordPr[6];?></td>
                        </tr>
                        <tr>
                            <th>Illness:</th> <td><?php echo $dis;?></td>
                            <th>Place:</th> <td><?php echo $recordPr[2];?></td>
                            <th>Mobile:</th> <td><?php echo $recordPr[3];?></td>
                        </tr>
                        <tr>
                            <th>Retreat:</th> <td><?php echo $recordPr[12];?>
                            <th>DOA:</th> <td><?php echo $recordPr[13];?></td>
                            <th>DOC:</th> <td><?php echo $recordPr[14];?></td>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table style="font-size:16px" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <tr> 
                                <th> <li>Valuables:</li></th> 
                                <td align="right"><?php echo $recordPr[10];?></td>
                            </tr>
                            <tr>                                 
                                <th> <li>Deposit Amount:</li></th> 
                                <td align="right"><?php echo number_format("$recordPr[7]",2)."<br>";?></td>
                            </tr>
                            <tr> 
                                <th><li> Deposit Returned: </li></th>
                                <td align="right"><?php echo number_format("$recordPr[8]",2)."<br>";?></td>
                            </tr>
                            <tr> 
                                <th><li>Balance:</li></th> 
                                  <td align="right"><?php echo number_format("$recordPr[9]",2)."<br>";?>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
    <p style="font-size:16px" align="left"><span>Deposit Returned: <?php echo "&#8377  ".$result;?> only. </span></p>
                    <br>
     <p style="font-size:15px" align="right"><span>Depositors Signature</span></p>
    <p style="font-size:15px" align="left"><span>Authorized Signature</span></p>
                    <br><br>
 <!-- Payment Panel Ends================================== -->
    <h4 align="center"><b>Deposit Returned Voucher</b> </h4>
    <p align="right"><span>Voucher No.:</span> <span> <?php echo $year;?>/0<?php echo $recordPr[5];?> </span>, <span>CS ID:</span> <span> <?php echo $recordPr[4];?></span>, <span style="font-family:IDAutomationHC39S; font-size:7px;"> <?php echo $recordPr[0];?> </span></p>
        <!--//-$month-$recordPr[5]-->
<!-- Payment Panel Starts================================== -->
                <div class="table-responsive" style="font-size:16px">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="cs_table">
                        <tr>
                            <th>Full Name:</th> <td><b><?php echo $recordPr[0];?></b></td>
                            <th>Age:</th> <td><?php echo $diff->y;?> yrs</td>
                            <th>Date:</th> <td><?php echo $recordPr[6];?></td>
                        </tr>
                        <tr>
                            <th>Illness:</th> <td><?php echo $dis;?></td>
                            <th>Place:</th> <td><?php echo $recordPr[2];?></td>
                            <th>Mobile:</th> <td><?php echo $recordPr[3];?></td>
                        </tr>
                        <tr>
                            <th>Retreat:</th> <td><?php echo $recordPr[12];?>
                            <th>DOA:</th> <td><?php echo $recordPr[13];?></td>
                            <th>DOC:</th> <td><?php echo $recordPr[14];?></td>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table style="font-size:16px" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <tr> 
                                <th> <li>Valuables:</li></th> 
                                <td align="right"><?php echo $recordPr[10];?></td>
                            </tr>
                            <tr>                                 
                                <th> <li>Deposit Amount:</li></th> 
                                <td align="right"><?php echo number_format("$recordPr[7]",2)."<br>";?></td>
                            </tr>
                            <tr> 
                                <th><li> Deposit Returned: </li></th>
                                <td align="right"><?php echo number_format("$recordPr[8]",2)."<br>";?></td>
                            </tr>
                            <tr> 
                                <th><li>Balance:</li></th> 
                                  <td align="right"><?php echo number_format("$recordPr[9]",2)."<br>";?>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
    <p style="font-size:16px" align="left"><span>Deposit Returned: <?php echo "&#8377  ".$result;?> only. </span></p>
                    <br>
     <p style="font-size:15px" align="right"><span>Depositors Signature</span></p>
    <p style="font-size:15px" align="left"><span>Authorized Signature</span></p>
 <!-- Payment Panel Ends================================== -->
                </div>
               <div class="container col-sm-0"></div>
        </form>
    </page>
    </body>
</html>