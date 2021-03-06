<!DOCTYPE html>
<html lang="en">
    <head>
        <title>OP Welcome SMS</title>
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
                            
                             $qryPr="SELECT p.full_name, p.dob, p.gender, c.rt_case_sheet_id, c.retreat_name, c.doa, c.doc, c.present_complaints, c.weight, c.bmi, c.retreat_duration, p.email, p.at_post, p.mobile_no FROM ak_p_registration p, ak_rt_case_sheet c WHERE p.person_id= c.person_id and c.rt_case_sheet_id= ". $_GET["csid"];
                            
                             //echo $qryPr;
                            {
                                
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                                
                                // age calculation      
                                $bday = new DateTime($recordPr[1]); 
                                $today = new Datetime(date('m.d.y'));
                                $diff = $today->diff($bday);
                            
                                // Followup date calculation  
                                /*$Date = "$recordPr[5]";
                                $followup_date= date('d-m-Y', strtotime($Date. ' + 30 days'));*/

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
            <div class="container col-sm-2">
            </div>
                <div class="container col-sm-8">
<!-- Document Header Start =================================== -->

    <h4 align="center"><b> RT Welcome SMS </b> </h4>
    <p align="center"><span>Full Name:</span> <span> <?php echo $recordPr[0];?></span>, <span>Mobile No:</span> <span> <?php echo $recordPr[13];?></span>, <span>RT ID:</span> <span> <?php echo $recordPr[3];?></span></p>
<!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        RT Welcome SMS
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-12">
                            <label>SMS to be Sent:</label>
                            <div class="form-group">
                                 <textarea class="form-control" cols="90" rows="3" id="op_sms_template" name="op_sms_template">You are WELCOME for <?php echo $recordPr[10];?> days Shivambu Retreat. Wish you, Happy and Healthy stay at ANANDKUNJ. Contact: 9404135011</textarea>
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
	$numbers = "91$recordPr[13]"; // A single number or a comma-seperated list of numbers
   // echo $recordPr[1];
    $message = "You are WELCOME for $recordPr[10] days Shivambu Retreat. Wish you, Happy and Healthy stay at ANANDKUNJ. Contact: 9404135011";
                    
	
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