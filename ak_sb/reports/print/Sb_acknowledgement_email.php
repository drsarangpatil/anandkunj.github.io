<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Acknowledgement Email</title>
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
                            
                            $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=2";

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }
                            
                             $qryPr="SELECT Distinct p.full_name, p.address, p.at_post, p.pin_code, p.state_name, p.mobile_no, p.email, r.sb_subscription_id, s.magazine_name, s.subscription_type, s.dos, s.doc, r.amount_paid FROM ak_p_registration p, ak_sb_subscription_form s, ak_sb_payment r WHERE p.person_id= s.person_id";
                              $qryPr = $qryPr . " and s.sb_subscription_id  = r.sb_subscription_id";
                             $qryPr=$qryPr . " and r.sb_payment_id = ". $_GET["pyid"];
                            
                           
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

    <h4 align="center"><b> Subscription Acknowledgement Email </b> </h4>
    <p align="center"><span>Subscriber Name:</span> <span> <?php echo $recordPr[0];?></span>, <span>Email Id:</span> <span> <?php echo $recordPr[6];?></span>, <span>Receipt No.:</span> <span> <?php echo $year;?>/0<?php echo $recordPr[7];?>, </span><span>SB ID:</span> <span> <?php echo $recordPr[7];?></span></p>
<!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Subscription Acknowledgement Email
                    </div>
<!-- Email Header Start =================================== -->   
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
<!-- Email Header End ================================================== --> 
                    <div class="panel-body">    
                        <div class="form-group col-sm-12">
                            <label>Subject for Email:</label>
                            <div class="form-group">
                                <textarea class="form-control" cols="90" rows="1" id="email_subject" name="email_subject"> <?php echo $recordPr[8];?> : सदस्यता प्रमाणपर    </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">                        
                        <div class="form-group col-sm-12">
                            <label>Email to be Sent:</label>
                            <div class="form-group">
                                
<textarea class="form-control" cols="90" rows="25"  id="sb_email_template" name="sb_email_template">
सदस्यता प्रमाणपत्र  

नाम :  <?php echo $recordPr[0];?>
                                    
पता :  <?php echo $recordPr[1];?>, <?php echo $recordPr[2];?>, <?php echo $recordPr[3];?>, <?php echo $recordPr[4];?>

फोन नंबर : <?php echo $recordPr[5];?>
                                    
इ-मेल : <?php echo $recordPr[6];?>
                                    
सद्स्यता क्रमांक : <?php echo $recordPr[7];?> (<?php echo $recordPr[8];?>)
                                    
सद्स्यता कालावधी : <?php echo $recordPr[9];?>, <?php echo $recordPr[10];?> से  <?php echo $recordPr[11];?>
                                    
रिसीट नंबर : <?php echo $year;?>/0<?php echo $recordPr[7];?>                        
                       
                                    
प्रति,
<?php echo $recordPr[0];?>, <?php echo $recordPr[2];?>,
                                    
सप्रेम नमस्कार,
                                    
आप "<?php echo $recordPr[8];?>" इस पत्रिका के सदस्य हुए है, आपका अभिनंदन ! 
आपने सदस्यता शुल्क भेजकर यह स्वास्थ्य-प्रवाह जारी रखने के लिये सहायता की उसके लिये हम आपके आभारी है.
आपसे अनुरोध है की, उपरोक्त सदस्यता क्रमांक आप नोट (दर्ज) करके रखे.
कृपया उपरोक्त नाम, पता, फोन नंबर, ई-मेल और सदस्यता कालावधी जांच ले; उसमें अगर कोई बदलाव हो तो तुरंत हमें सूचित करे. धन्यवाद!
                                    
आपका स्वास्थेच्छु,
- मनेजर
                                    
============  
                                    
सूचना :
                                    
हर महिने के दस तारीख को यह पत्रिका कोल्हापूर से पोस्ट होती है; आपको उसी महिने के बीस तारीख तक यह पत्रिका मिल जानी चहिये, अगर पत्रिका नहीं मिलती है तो आप पोस्ट ऑफीस में पुछ्ताछ करे.

अगर पत्रिका डाकघर की गलतियो से नही मिलती हो, तो उसके लिये संदेश प्रकाशन जिम्मेदार नहीं होगा.

अधिक जानकारी के लिये कृपया 0231-2321565 इस फोन नंबर पर सुबह 10.00 से शाम 6.00 तक संपर्क करे.
    
============                                 
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
$mail->Subject = $recordPr[8] . ' - Subscription Acknowledgement';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
$mail->Body ="
<h5 Style= color:orange align='left'><i>$recordOrg[1]</i></h5>
<h1 Style= color:slateBlue align='left'><b>$recordOrg[2]</b></h1>
<h5 Style= color:orange align='left'>$recordOrg[3],  Phone: $recordOrg[4], $recordOrg[5]</h5>
<hr>

    <h3>$recordPr[8] - सदस्यता प्रमाणपत्र</h3><br><br>
    नाम : $recordPr[0] <br>
    पता : $recordPr[1], $recordPr[2], $recordPr[3], $recordPr[4]<br><br>
    फोन नंबर : $recordPr[5]<br>
    इ-मेल : $recordPr[6]<br><br>
    सद्स्यता क्रमांक : 0$recordPr[7] : $recordPr[8]<br>
    सद्स्यता कालावधी : $recordPr[9], $recordPr[10] से $recordPr[11]<br>
    रिसीट नंबर : $year/0$recordPr[7]<br><br> 
    -------------<br><br>
    प्रति,<br>
    $recordPr[0],<br> 
    $recordPr[2]<br><br>
    सप्रेम नमस्कार,<br>
    आप $recordPr[8] इस पत्रिका के सदस्य हुए है, आपका अभिनंदन !<br>
    आपने सदस्यता शुल्क भेजकर यह स्वास्थ्य-प्रवाह जारी रखने के लिये सहायता की उसके लिये हम आपके आभारी है.<br>
    आपसे अनुरोध है की, उपरोक्त सदस्यता क्रमांक आप नोट (दर्ज) करके रखे.<br>
    कृपया उपरोक्त नाम, पता, फोन नंबर, ई-मेल और सदस्यता कालावधी जांच ले; उसमें अगर कोई बदलाव हो तो तुरंत हमें सूचित करे.<br> <br>
    धन्यवाद!<br>
    आपका स्वास्थेच्छु,<br><br>
    - मनेजर<br><br>               
    <hr>           
    सूचना :<br>                                    
    * हर महिने के दस तारीख को यह पत्रिका कोल्हापूर से पोस्ट होती है; आपको उसी महिने के बीस तारीख तक यह पत्रिका मिल जानी   
      चहिये,<br>अगर पत्रिका नहीं मिलती है तो आप पोस्ट ऑफीस में पुछ्ताछ करे.<br>
    * अगर पत्रिका डाकघर की गलतियो से नही मिलती हो, तो उसके लिये 'संदेश प्रकाशन' जिम्मेदार नहीं होगा.<br>
    * अधिक जानकारी के लिये कृपया 0231-2321565 इस फोन नंबर पर सुबह 10.00 से शाम 5.00 तक संपर्क करे. </b>";
                    
$mail->AltBody = "This is a $recordPr[8] Subscription Acknowledgement";

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Subscription Acknowledgement Email Sent $recordPr[0] ! <br>" ;
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
        </page>
    </body>
</html>