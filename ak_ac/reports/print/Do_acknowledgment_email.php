<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Donation Acknowledgment Email</title>
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
                            
                            $qryPr="SELECT p.full_name, p.at_post, p.mobile_no, p.email, d.do_payment_date, d.donation_paid, d.donation_towards, d.payment_mode, d.payment_details, d.pan_number, d.do_donation_id FROM ak_p_registration p, ak_do_donation d WHERE p.person_id= d.person_id ";
                            $qryPr = $qryPr . " and do_donation_id = ". $_GET["doid"];
                            
                             //echo $qryPr;
                            
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

    <h4 align="center"><b> Donation Acknowledgment Email </b> </h4>
    <p align="center"><span>Full Name:</span> <span> <?php echo $recordPr[0];?></span>, <span>Email Id:</span> <span> <?php echo $recordPr[3];?></span>, <span>Donation ID:</span> <span> <?php echo $recordPr[9];?></span></p>
                    
<!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                         Donation Acknowledgment Email
                    </div>
<!-- Email Header Start =================================== -->   
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
<!-- Email Header End ================================================== --> 
                    <div class="panel-body">    
                        <div class="form-group col-sm-12">
                            <label>Subject for Email:</label>
                            <div class="form-group">
                                <textarea class="form-control" cols="90" rows="1" id="email_subject" name="email_subject"> Donation Acknowledgment Email </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">                        
                        <div class="form-group col-sm-12">
                            <label>Email to be Sent:</label>
                            <div class="form-group">
                                
<textarea class="form-control" cols="90" rows="25"  id="sb_email_template" name="sb_email_template">

Donation Acknowledgment Email 
                                
प्रति,
<?php echo $recordPr[0];?>, 
<?php echo $recordPr[1];?>,
फोन नंबर : <?php echo $recordPr[2];?>                                    
इ-मेल : <?php echo $recordPr[3];?>
    
                                    
सप्रेम नमस्कार,
    
आपने 'स्वास्थ्य दान' के लिए SHRI-आनंद्कुंज को चुना, इसलिए धन्यवाद् !

हमारे अनुरोध पर आपने, SHRI-आनंद्कुंज (<?php echo $recordPr[6];?>) के लिए, <?php echo $recordPr[7];?> (Details: <?php echo $recordPr[8];?>) द्वारा जो दान-राशी <?php echo "&#8377  ".  number_format("$recordPr[5]",2);?> (<?php echo "&#8377  ".$result;?> only) दी है वह हमें तारीख <?php echo $recordPr[4];?> को प्राप्त हुई है।
    
आपके जैसे स्वास्थ्यप्रेमियों के सहयोग से आनंदकुंज का निर्माण धीरे-धीरे गतिमान हो रहा है। इस दानराशी की रसीद इस पत्र के साथ संलग्न कर पोस्ट द्वारा भेज रहे है। हमें विश्वास है की, आपके द्वारा आनंदकुंज निर्माण में की जानेवाली मदद कई सारे जरुरतमंद पिडितों के आसु पोछने में काम आयेगी।
  
परिवार में सभी को सस्नेह नमस्कार। आगे भी इसी स्नेह और मदद की प्रार्थना।

शुभेच्छाओ के साथ !
                                    
आपका स्वास्थेच्छु,
    
- अध्यक्ष                   - सेक्रेटरी
                                    
============  
                                    
PS :

अधिक जानकारी के लिए कृपया 0231-2321565 इस फोन नंबर पर सुबह 10.00 से शाम 6.00 तक संपर्क करे।
    
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
$mail->Username = "drsarangpatil@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "ht@621565621766";

//Set who the message is to be sent from
$mail->setFrom('drsarangpatil@gmail.com', 'Sarang Patil');

//Set an alternative reply-to address
$mail->addReplyTo('drsarangpatil@gmail.com', 'Reply to me');

//Set who the message is to be sent to
$mail->addAddress($recordPr[3], $recordPr[0]);

//Set the subject line
$mail->Subject = 'Donation Acknowledgment Email';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
$mail->Body =" 
<h5 Style= color:orange align='left'><i>$recordOrg[1]</i></h5>
<h1 Style= color:slateBlue align='left'><b>$recordOrg[2]</b></h1>
<h5 Style= color:orange align='left'>$recordOrg[3],  Phone: $recordOrg[4], $recordOrg[5]</h5>
<hr>
<h3>Donation Acknowledgment</h3><br>

प्रति,<br>
$recordPr[0],<br>
$recordPr[1],<br>
फोन नंबर : $recordPr[2] <br>                                  
इ-मेल : $recordPr[3]<br><br>
    
                                    
सप्रेम नमस्कार,<br><br>
    
आपने <b>स्वास्थ्य दान</b> के लिए SHRI-आनंद्कुंज को चुना, इसलिए धन्यवाद् !<br><br>

हमारे अनुरोध पर आपने, SHRI-आनंद्कुंज ($recordPr[6]) के लिए, $recordPr[7] (Details: $recordPr[8]) द्वारा जो दान-राशी Rs $recordPr[5] (Ruppees $result only) दी है, वह हमें तारीख $recordPr[4] को प्राप्त हुई है।<br><br>
    
आपके जैसे स्वास्थ्यप्रेमियों के सहयोग से आनंदकुंज का निर्माण धीरे-धीरे गतिमान हो रहा है। इस दानराशी की रसीद इस पत्र के साथ संलग्न कर पोस्ट द्वारा भेज रहे है। हमें विश्वास है की, आपके द्वारा आनंदकुंज निर्माण में की जानेवाली मदद कई सारे जरुरतमंद पिडितों के आसु पोछने में काम आयेगी।<br><br>
  
परिवार में सभी को सस्नेह नमस्कार। आगे भी इसी स्नेह और मदद की प्रार्थना।<br><br>

शुभेच्छाओ के साथ !<br><br>
                                    
आपका स्वास्थेच्छु,<br><br>
    
अध्यक्ष / सेक्रेटरी (SHRI)<br>
                                    
<hr>
                                    
PS :<br>

अधिक जानकारी के लिए कृपया 0231-2321565 इस फोन नंबर पर सुबह 10.00 से शाम 6.00 तक संपर्क करे।";
                    
$mail->AltBody = "This is a Donation Acknowledgment Email";

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Donation Acknowledgment Email Sent to $recordPr[0] ! <br>" ;
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