<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Membership Receipt</title>
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
                            
                            $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=3";

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }
                            
                             $qryPr="SELECT Distinct p.full_name, p.dob, p.at_post, p.mobile_no, p.address, r.mb_membership_id, r.mb_payment_id, r.mb_payment_date, s.membership_amount, r.amount_paid, r.balance_amount, r.payment_mode, r.payment_details, s.association_name, s.membership_type FROM ak_p_registration p, ak_mb_membership_form s, ak_mb_payment r WHERE p.person_id= s.person_id";
                             $qryPr = $qryPr . " and s.person_id  = r.person_id";
                             $qryPr=$qryPr . " and r.mb_payment_id = ". $_GET["pyid"];
                          
                            
                            //echo $qryPr;
                            {
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                                
                            // age calculation      
                                $bday = new DateTime($recordPr[1]); 
                                $today = new Datetime(date('m.d.y'));
                                $diff = $today->diff($bday);
                                
                            // date extraction
                                $time=strtotime($recordPr[7]);
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
                                <h2 Style= color:slateBlue align="center"><b> <?php echo $recordOrg[2];?></b></h2>
                                 <h6 Style= color:orange align="center"> <?php echo $recordOrg[3];?>,  Phone: <?php echo $recordOrg[4];?>, <?php echo $recordOrg[5];?></h6>
                            </td>
                        </tr>
                    </table>
<!-- Document Header End ================================================== -->
    <h4 align="center"><b> R E C E I P T</b> </h4>
    <p align="right"><span>Receipt No.:</span> <span> <?php echo $year;?>/0<?php echo $recordPr[6];?> </span>, <span>SB ID:</span> <span> <?php echo $recordPr[5];?></span>, <span> Bar Code: </span> <span> ///////////////// </span></p>
        <!--//-$month-$recordPr[5]-->
<!-- Payment Panel Starts================================== -->
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="cs_table">
                        <tr>
                            <th>Full Name:</th> <td><b><?php echo $recordPr[0];?></b></td>
                            <th>Age:</th> <td><?php echo $diff->y;?> yrs</td>
                            <th>Date:</th> <td><?php echo $recordPr[7];?></td>
                        </tr>
                        <tr>
                            <th>Association:</th> <td><?php echo $recordPr[13]?></td>
                            <th>Place:</th> <td><?php echo $recordPr[2];?></td>
                            <th>Mobile:</th> <td><?php echo $recordPr[3];?></td>
                        </tr>
                         <tr>
                            <th>Address:</th> <td colspan="5"><?php echo $recordPr[4]?></td>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table style="font-size:15px" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <tr>                                 
                                <th width="50%"> <li>Membership Amount:</li></th> 
                                <td align="right"><?php echo number_format("$recordPr[8]",2)."<br>";?></td>
                            </tr>
                            <tr> 
                                <th><li> Amount Paid: </li></th>
                                <td align="right"><?php echo number_format("$recordPr[9]",2)."<br>";?></td>
                            </tr>
                              <tr> 
                                 <th><li>Balance:</li></th> 
                                  <td align="right"><?php echo number_format("$recordPr[10]",2)."<br>";?></td>
                            </tr>
                        </table>
                    </div>
    <p style="font-size:15px" align="left"><span>Received with thanks <?php echo "&#8377  ".$result;?> only, towards <?php echo $recordPr[14];?> subscription by <?php echo $recordPr[11];?>. </span></p>
    <p style="font-size:15px" align="left"><span> Payment Details: <?php echo $recordPr[12];?></span></p>
                    <br>
    <p style="font-size:13px" align="right"><span>Authorized Signatory</span></p>
 <!-- Payment Panel Ends================================== -->
    <!--<p align="left"><i>ANANDKUNJ : FIRST CHOICE OR LAST RESORT </i></p>-->
                </div>
               <div class="container col-sm-0"></div>
            </form>
        </page>
    </body>
</html>