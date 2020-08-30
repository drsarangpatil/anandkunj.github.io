<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Donation Receipt</title>
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
                            
                            $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=4";

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }
                            
                            $qryPr="SELECT p.full_name, p.at_post, p.address, p.mobile_no, d.do_payment_date, d.donation_paid, d.donation_towards, d.payment_mode, d.pan_number, d.pan_name, d.do_donation_id FROM ak_p_registration p, ak_do_donation d WHERE p.person_id= d.person_id and d.do_donation_id = ". $_GET["doid"];
                            
                           // echo $qryPr;
                            {
                                
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                                
                            // date extraction
                                $time=strtotime($recordPr[4]);
                                //$month=date("F",$time);
                                $year=date("Y",$time);

                            // php code to convert number in to text words.
                               $number = $recordPr[5];
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
                            
                        }
                    }
                    catch(Exception $ex)
                    {
                        echo "<script language='javascript'>alert('Error in Reading data')</script>";
                    }
                ?>
<!-- Php code Ends ========================================= -->
        <form action="" method="POST" class="form-inline">
                <div class="container col-sm-12">
<!-- Document Header Start =================================== -->   
                <table width="100%" class="table table-striped table-bordered table-hover" 
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
                    </table>
<!-- Document Header End ================================================== -->
    <h4 align="center"><b>R E C E I P T</b> </h4>
    <!--<p align="right"><span>Receipt No.:</span> <span> <?php echo $year;?>/0<?php echo $recordPr[10];?> </span></p>-->
        <!--//-$month-$recordPr[5]-->
<!-- Payment Panel Starts================================== -->
                <div class="table-responsive" style="font-size:16px">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="cs_table">
                        <tr>
                            <th>Receipt No:</th> <td><?php echo $year;?>/0<?php echo $recordPr[10];?></td>
                            <th>Date:</th> <td><?php echo $recordPr[4];?></td>
                        </tr>
                        <tr>
                            <th>Full Name:</th> <td><b><?php echo $recordPr[0];?></b></td>
                            <!--<th>Place:</th> <td><?php echo $recordPr[1];?></td>-->
                            <th>Mobile:</th> <td><?php echo $recordPr[3];?></td>
                        </tr>
                        <tr>
                            <th>Address:</th> <td colspan="3"><?php echo $recordPr[2];?>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table style="font-size:16px" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <tr>                                 
                                <th> <li>Donation Received:</li></th> 
                                <td align="right"><?php echo "&#8377  ".  number_format("$recordPr[5]",2)."<br>";?></td>
                            </tr>
                        </table>
                    </div>
    <p style="font-size:15px" align="left"><span>Received with thanks <?php echo "&#8377  ".$result;?> only, by <?php echo $recordPr[7];?> towards <?php echo $recordPr[6];?>. </span></p>
                    
    <p style="font-size:15px" align="left"><span> Payment Details: <?php echo $recordPr[7];?>.</span><span> PAN Name: <?php echo $recordPr[9];?>, PAN No.: <?php echo $recordPr[8];?></span></p> 
                    
    <p style="font-size:15px" align="right"><span>Authorized Signatory</span></p> <hr>
    <p style="font-size:13px" align="left"><span>ALL PAYMENTS BY CHEQUE / DD / TRANSFER ARE SUBJECT TO REALIZATION. DONATIONS QUALIFY FOR INCOME TAX EXAMPTION UNDER 80-G: KOP/C-1/Tech/158/DATED 5.4.2010; PAN No. AADTS 2442 P </span></p>
 <!-- Payment Panel Ends================================== -->
    <!--<p align="left"><i>ANANDKUNJ : FIRST CHOICE OR LAST RESORT </i></p>-->

                    
<br>
<!-- Document Header Start =================================== -->   
                <table width="100%" class="table table-striped table-bordered table-hover" 
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
                    </table>
<!-- Document Header End ================================================== -->
                    
<h4 align="center"><b>R E C E I P T</b> </h4>
    <!--<p align="right"><span>Receipt No.:</span> <span> <?php echo $year;?>/0<?php echo $recordPr[10];?> </span></p>-->
        <!--//-$month-$recordPr[5]-->
<!-- Payment Panel Starts================================== -->
                <div class="table-responsive" style="font-size:16px">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="cs_table">
                        <tr>
                            <th>Receipt No:</th> <td><?php echo $year;?>/0<?php echo $recordPr[10];?></td>
                            <th>Date:</th> <td><?php echo $recordPr[4];?></td>
                        </tr>
                        <tr>
                            <th>Full Name:</th> <td><b><?php echo $recordPr[0];?></b></td>
                            <!--<th>Place:</th> <td><?php echo $recordPr[1];?></td>-->
                            <th>Mobile:</th> <td><?php echo $recordPr[3];?></td>
                        </tr>
                        <tr>
                            <th>Address:</th> <td colspan="3"><?php echo $recordPr[2];?>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table style="font-size:16px" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <tr>                                 
                                <th> <li>Donation Received:</li></th> 
                                <td align="right"><?php echo "&#8377  ".  number_format("$recordPr[5]",2)."<br>";?></td>
                            </tr>
                        </table>
                    </div>
    <p style="font-size:15px" align="left"><span>Received with thanks <?php echo "&#8377  ".$result;?> only, by <?php echo $recordPr[7];?> towards <?php echo $recordPr[6];?>. </span></p>
                    
    <p style="font-size:15px" align="left"><span> Payment Details: <?php echo $recordPr[7];?>.</span><span> PAN Name: <?php echo $recordPr[9];?>, PAN No.: <?php echo $recordPr[8];?></span></p> 
                    
    <p style="font-size:15px" align="right"><span>Authorized Signatory</span></p> <hr>
    <p style="font-size:13px" align="left"><span>ALL PAYMENTS BY CHEQUE / DD / TRANSFER ARE SUBJECT TO REALIZATION. DONATIONS QUALIFY FOR INCOME TAX EXAMPTION UNDER 80-G: KOP/C-1/Tech/158/DATED 5.4.2010; PAN No. AADTS 2442 P </span></p>
 <!-- Payment Panel Ends================================== -->
    <!--<p align="left"><i>ANANDKUNJ : FIRST CHOICE OR LAST RESORT </i></p>-->
                </div>
               <div class="container col-sm-0"></div>
        </form>
    </page>
    </body>
</html>