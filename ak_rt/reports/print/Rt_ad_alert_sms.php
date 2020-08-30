<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Retreat Admisssion Booking Alert SMS</title>
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
                            
                             $qryPr="SELECT ar_date, ar_session, ar_time, ad_type, rm_expected, ad_purpose, ad_status, full_name, age, gender, at_post, mobile_no, email, rt_ap_id FROM ak_rt_appointment WHERE rt_ap_id = ". $_GET["apid"];
                             //echo $qryPr;
                            {
                                
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                                
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
    <h4 align="center"><b> Retreat Admisssion Booking Alert SMS </b> </h4>
    <p align="center"><span>Full Name:</span> <span> <?php echo $recordPr[7];?></span>, <span>Mobile:</span> <span> <?php echo $recordPr[11];?></span>, <span>Booking ID:</span> <span> <?php echo $recordPr[13];?></span></p>
<!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        Retreat Admisssion Booking Alert SMS
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-12">
                            <label>SMS to be Sent:</label>
                            <div class="form-group">
                                <!--<textarea class="form-control" cols="100" rows="3" id="op_sms_template" name="op_sms_template">शिवाम्बु स्वास्थ्य राह पर आपका स्वागत! आपकी अगली भेंट <?php echo $followup_date;?> पर निर्धारित की गयी है. संपर्क : 9404135010.</textarea>-->
                                 <textarea class="form-control" cols="90" rows="3" id="rt_sms_template" name="rt_sms_template"><?php echo $recordPr[7];?>ji, your admission for Health-Retreat is confirmed on <?php echo $recordPr[0];?> at <?php echo $recordPr[2];?>. ANANDKUNJ: 9404135011</textarea>
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
                    
	$numbers = "91$recordPr[11]"; // A single number or a comma-seperated list of numbers
   // echo $recordPr[11];
                    
    $message = "$recordPr[7]ji, your admission for Health-Retreat is confirmed on $recordPr[0] at $recordPr[2]. ANANDKUNJ: 9404135011";
                    
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