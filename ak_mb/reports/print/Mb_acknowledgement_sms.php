<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Acknowledgement SMS</title>
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
                            
                             $qryPr="SELECT Distinct p.full_name, p.mobile_no, r.mb_membership_id, s.association_name, s.membership_type, s.dos, s.doc, r.amount_paid FROM ak_p_registration p, ak_mb_membership_form s, ak_mb_payment r WHERE p.person_id= s.person_id";
                              $qryPr = $qryPr . " and s.mb_membership_id  = r.mb_membership_id";
                             $qryPr=$qryPr . " and r.mb_payment_id = ". $_GET["pyid"];
                            
                            //echo $qryPr;
                            {
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                              
                            // date extraction
                                $time=strtotime($recordPr[5]);
                                //$month=date("F",$time);
                                $year=date("Y",$time);

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

    <h4 align="center"><b> Membership Acknowledgement SMS </b> </h4>
    <p align="center"><span>Members Name:</span> <span> <?php echo $recordPr[0];?></span>, <span>Mobile No.:</span> <span> <?php echo $recordPr[1];?></span>, <span>Receipt No.:</span> <span> <?php echo $year;?>/0<?php echo $recordPr[2];?>, </span><span>MB ID:</span> <span> <?php echo $recordPr[2];?></span></p>
<!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Membership Acknowledgement SMS
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-12">
                            <label>SMS to be Sent:</label>
                            <div class="form-group">
                                <!--<textarea class="form-control" rows="3" id="sb_sms_template" name="sb_sms_template">Thank you for subscribing "<?php echo $recordPr[3];?>" from <?php echo $recordPr[5];?> to <?php echo $recordPr[6];?> for <?php echo $recordPr[4];?> duration. Amount Paid : <?php echo "&#8377 ".$recordPr[7];?>. manager.anandkunj@gmail.com, 9404135010.</textarea>-->
                                <textarea class="form-control" cols="90" rows="3" id="sb_sms_template" name="sb_sms_template">"<?php echo $recordPr[3];?>" का मेम्बर बनाने के लिये धन्यवाद. आपकी <?php echo $recordPr[4];?> मेम्बेर्शीप <?php echo $recordPr[5];?>  से <?php echo $recordPr[6];?> तक होगी. रकम अदा : <?php echo "&#8377 ".$recordPr[7];?>. संपर्क : 9404135010.</textarea>
                            </div>
                        </div>
				    </div>
                </div>
            </div>                    
<!-- Form Information Ends ================================================== -->
<!-- PHP code for sms Starts================================================== -->
<?php
	// Authorisation details.
	$username = "smruti.anandkunj@gmail.com";
	$hash = "dc4bcae4f885ed29ed3058bcefdb878925a121c512c7901269b5ed4b970c6630";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = "91$recordPr[1]"; // A single number or a comma-seperated list of numbers
   // echo $recordPr[1];
    $message = "Thank you for becoming member of $recordPr[3]. Your $recordPr[4] membership will be from $recordPr[5] to $recordPr[6]. Amt Paid: Rs. $recordPr[7], Contact: 9404135010";
                    
	//$message = "$recordPr[3] का मेम्बर बनाने के लिये धन्यवाद. आपकी $recordPr[4] मेम्बेर्शीप $recordPr[5]  से $recordPr[6] तक होगी. रकम अदा : Rs. $recordPr[7], संपर्क : 9404135010";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
    //echo $message;
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
    
    echo $result;
                    
    /*if($result==true){
        echo "Message has been Sent";
        }*/
	curl_close($ch);
?>
<!-- PHP code for sms Starts================================================== -->
                <div class="panel-body">
                <div class="form-group col-sm-12">
                    <div class="form-group">
                        <button type="submit" 
                                class="btn btn-primary">Re-Send 
                        </button>
                    </div>
                </div>                
            </div> 
                </div>
               <div class="container col-sm-0"></div>
        </form>
    </page>
    </body>
</html>