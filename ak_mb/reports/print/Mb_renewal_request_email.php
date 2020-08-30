<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Membership Renewal Request Email</title>
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

                            $resOrg = mysqli_query($con, $qryOrg);
                            $recordOrg = mysqli_fetch_array($resOrg);
                            
                             $qryPr="SELECT Distinct p.full_name, p.address, p.at_post, p.pin_code, p.state_name, p.mobile_no, p.email, r.mb_membership_id, s.association_name, s.membership_type, s.dos, s.doc, r.amount_paid FROM ak_p_registration p, ak_mb_membership_form s, ak_mb_payment r WHERE p.person_id= s.person_id";
                              $qryPr = $qryPr . " and s.mb_membership_id  = r.mb_membership_id";
                             $qryPr=$qryPr . " and r.mb_membership_id = ". $_GET["sbid"];
                            
                           
                            //echo $qryPr;
                            {
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                              
                            // date extraction
                                $time=strtotime($recordPr[10]);
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

    <h4 align="center"><b> Membership Renewal Request Email </b> </h4>
    <p align="center"><span>Member Name:</span> <span> <?php echo $recordPr[0];?></span>, <span>Email Id:</span> <span> <?php echo $recordPr[6];?></span>, <span>Receipt No.:</span> <span> <?php echo $year;?>/0<?php echo $recordPr[7];?>, </span><span>MB ID:</span> <span> <?php echo $recordPr[7];?></span></p>
<!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Membership Renewal Request Email
                    </div>
                    <div class="panel-body">    
                        <div class="form-group col-sm-12">
                            <label>Subject for Email:</label>
                            <div class="form-group">
                                <textarea class="form-control" cols="90" rows="1" id="email_subject" name="email_subject"> <?php echo $recordPr[8];?> : स्मरणपत्र    </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">                        
                        <div class="form-group col-sm-12">
                            <label>Email to be Sent:</label>
                            <div class="form-group">
                                                            
<textarea class="form-control" cols="90" rows="25"  id="mb_email_template" name="mb_email_template">
स्मरणपत्र

प्रति,
<?php echo $recordPr[0];?>, <?php echo $recordPr[2];?>,
                                    
सप्रेम नमस्कार,

आप, दवाई-बिना आरोग्य - इस विचारधारा को समर्पित <?php echo $recordPr[8];?> इस एसोसिएशन के सदस्य है.
    
आपका सदस्यता विवरण:
सद्स्यता क्रमांक : <?php echo $recordPr[7];?> (<?php echo $recordPr[8];?>)                                   
सद्स्यता कालावधी : <?php echo $recordPr[9];?>, <?php echo $recordPr[10];?> से  <?php echo $recordPr[11];?>

आपकी सदस्यता <?php echo $recordPr[11];?> तारीख को समाप्त होती है, कृपया अगला शुल्क आप मिनिऑर्डर अथवा Paytm व्दारा 9309979990 इस मोबाईल नंबर पर भेजकर, यह अमृतप्रवाह अखंड रखने में, कृपया हमे सहकार्य करे.
धन्यवाद!
    
आपका स्वास्थेच्छु,
    
- समन्वयक
                                    
============  
         
एसोसिएशन सदस्यता शुल्क
    
आजीवन सदस्य रु 100/-
    
सदस्यता शुल्क शुल्क आप मिनिऑर्डर अथवा Paytm व्दारा 9309979990 इस मोबाईल नंबर पर भेजे.
    
टीप:
अगर यह पत्र पहुचाने से पहले आपने सदस्यता शुल्क भेजी हो तो आप इस पत्र को नजरअंदाज करे.
अधिक जानकारी के लिये कृपया 0231-2321565 इस फोन नंबर पर सुबह 10.00 से शाम 6.00 तक संपर्क करे.
                                    
</textarea>
                            </div>
                        </div>
				    </div>
                </div>
            </div>
<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "anandkunj.shri@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "Ht621565621766";

//Set who the message is to be sent from
$mail->setFrom('anandkunj.shri@gmail.com', 'ANANDKUNJ-ADMIN');

//Set an alternative reply-to address
$mail->addReplyTo('anandkunj.shri@gmail.com', 'Reply to me');

//Set who the message is to be sent to
$mail->addAddress($recordPr[6], $recordPr[0]);

//Set the subject line
$mail->Subject = $recordPr[8] . ' - Membership Renwal Request';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
$mail->Body ="
<h5 Style= color:orange align='left'><i>$recordOrg[1]</i></h5>
<h1 Style= color:slateBlue align='left'><b>$recordOrg[2]</b></h1>
<h5 Style= color:orange align='left'>$recordOrg[3],  Phone: $recordOrg[4], $recordOrg[5]</h5>
<hr>
    <h2><b>$recordPr[8] - स्मरणपत्र </b></h2><br><br>
    
    प्रति,<br>
    $recordPr[0],<br> 
    $recordPr[2]<br><br>
    सप्रेम नमस्कार,<br>
    आप, दवाई-बिना आरोग्य - इस विचारधारा को समर्पित $recordPr[8] इस एसोसिएशन के सदस्य है.<br>
    
    आपका सदस्यता विवरण:<br>
    सद्स्यता क्रमांक : 0$recordPr[7] : $recordPr[8]<br>
    सद्स्यता कालावधी : $recordPr[9], $recordPr[10] से $recordPr[11]<br>
    
    आपकी $recordPr[8] की $recordPr[9] सदस्यता $recordPr[11] तारीख को समाप्त होती है, कृपया अगला शुल्क आप मिनिऑर्डर, अथवा Paytm व्दारा 9309979990 इस मोबाईल नंबर पर भेजकर, यह अमृतप्रवाह अखंड रखने में, कृपया हमे सहकार्य करे.<br>
    धन्यवाद!<br>

    आपका स्वास्थेच्छु,<br>

    - समन्वयक<br><br>

    ============<br>  

    $recordPr[8] सदस्यता शुल्क विवरण:<<br>

    आजीवन सदस्य रु 100/-<br><br>

    सदस्यता शुल्क आप मिनिऑर्डर अथवा Paytm व्दारा 9309979990 इस मोबाईल नंबर पर भेजे दे.

    टीप:<br>
    अगर यह पत्र पहुचाने से पहले आपने सदस्यता शुल्क भेजी हो तो आप इस पत्र को नजरअंदाज करे.<br>
    अधिक जानकारी के लिये कृपया 0231-2321565 इस फोन नंबर पर सुबह 10.00 से शाम 6.00 तक संपर्क करे.";
                    
$mail->AltBody = "This is a $recordPr[8] Membership Renwal Request";

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Membership Renwal Request Email Sent to $recordPr[0] ! <br>";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}

?>
<!-- Form Information Ends ================================================== -->
                <div class="panel-body">
                <div class="form-group col-sm-12" >
                    <div class="form-group" >
                        <button type="submit" 
                                class="btn btn-primary">Re-Send
                        </button>
                    </div>
                </div>                
            </div> 
                </div>
               <div class="container col-sm-0"></div>
        </form>
    </body>
</html>