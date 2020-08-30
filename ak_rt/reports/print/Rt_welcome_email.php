<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RT Welcome Email</title>
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
                            
                            $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=1";

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }
                            
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
                               /* $Date = "$recordPr[5]";
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
            <div class="container col-sm-0">
            </div>
                <div class="container col-sm-12">
<!-- Document Header Start =================================== -->

    <h4 align="center"><b> RT Welcome Email </b> </h4>
    <p align="center"><span>Full Name:</span> <span> <?php echo $recordPr[0];?></span>, <span>Email Id:</span> <span> <?php echo $recordPr[11];?></span>, <span>RT ID:</span> <span> <?php echo $recordPr[3];?></span></p>
<!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        RT Welcome Email
                    </div>
<!-- Email Header Start =================================== -->   
                <table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" class="img-rounded" width="100" height="100" src="../../../ak_com/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
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
                                <textarea class="form-control" cols="90" rows="1" id="email_subject" name="email_subject"> Retreat Welcome </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">                        
                        <div class="form-group col-sm-12">
                            <label>Email to be Sent:</label>
                            <div class="form-group">
                                
<textarea class="form-control" cols="90" rows="25"  id="sb_email_template" name="sb_email_template">
आनंद्कुंज में स्वास्थ्य की राह पर आपका हार्दिक स्वागत 
                                
प्रति,
<?php echo $recordPr[0];?>, 
<?php echo $recordPr[12];?>,
फोन नंबर : <?php echo $recordPr[13];?>                                    
इ-मेल : <?php echo $recordPr[11];?>
                                    
सप्रेम नमस्कार,
    
आपने 'स्वास्थ्य के लिए प्राकृतिक जीवन पद्धति' को चुना, इसलिए धन्यवाद!

आपका <?php echo $recordPr[4];?> स्वस्थ्य शिविर में स्वागत है। आपका यह <?php echo $recordPr[10];?> दिवसीय शिविर, तारीख <?php echo $recordPr[5];?> से <?php echo $recordPr[6];?> तक चलेगा। 
    
कृपया ध्यान दें कि, आपका स्वास्थ्य आपके हाथों में है। यहां पर निर्धरित सभी नियम, आपको इस शिविर से बहतरीन से बहतरीन लाभ हो, इसलिए बनाये गए हैं। 
    
आपको दी गयी 'शिविर मार्गदर्शिका' पुस्तिका में यहाँ के सभी कार्यक्रमों की विस्तार से जानकारी दी गई है।

हम आपसे अनुरोध करते हैं की, आप ख़ुशी और निष्ठा से सभी नियमों का पालन करें तथा यहाँ की दैनदिनी के अनुसार सभी उपचार कार्यक्रमों में सहभागी हों। 
    
किसी भी प्रश्न के लिए, 9404135011 इस नंबर पर कार्यालयीन समय के दौरान संपर्क करने में संकोच न करें (सुबह 10.00 से शाम 6.00 बजे तक)। आशा है, आपका आनंद्कुंज में निवास सुखद और स्वस्थ्यादायी हो।
    

हमें आपकी सेवा करने का मौका देने के लिए धन्यवाद।
    
शुभेच्छाओ के साथ, धन्यवाद!
                                    
आपका स्वास्थेच्छु,
    
- मनेजर
                                    
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
$mail->addAddress($recordPr[11], $recordPr[0]);

//Set the subject line
$mail->Subject = 'स्वास्थ्य की राह पर स्वागत Welcome for Retreat at Anandkunj';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
$mail->Body ="
<h5 Style= color:orange align='left'><i>$recordOrg[1]</i></h5>
<h1 Style= color:slateBlue align='left'><b>$recordOrg[2]</b></h1>
<h5 Style= color:orange align='left'>$recordOrg[3],  Phone: $recordOrg[4], $recordOrg[5]</h5>
<hr>

<h2>आनंद्कुंज में स्वास्थ्य की राह पर आपका हार्दिक स्वागत !</h2><br><br>
    
प्रति,
$recordPr[0],<br> 
$recordPr[12], <br>
फोन नंबर : $recordPr[13]<br>                                    
इ-मेल : $recordPr[11]<br>
                                    
सप्रेम नमस्कार,<br><br>
    
आपने 'स्वास्थ्य के लिए प्राकृतिक जीवन पद्धति' को चुना, इसलिए धन्यवाद! <br><br>

आपका $recordPr[4] स्वस्थ्य शिविर में स्वागत है। आपका यह  $recordPr[10] दिवसीय शिविर, तारीख $recordPr[5] से $recordPr[6] तक चलेगा। <br><br> 
    
कृपया ध्यान दें कि, आपका स्वास्थ्य आपके हाथों में है। यहां पर निर्धरित सभी नियम, आपको इस शिविर से बहतरीन से बहतरीन लाभ हो, इसलिए बनाये गए हैं। <br><br>  
    
आपको दी गयी <b>शिविर मार्गदर्शिका<b> पुस्तिका में यहाँ के सभी कार्यक्रमों की विस्तार से जानकारी दी गई है। <br><br>  

हम आपसे अनुरोध करते हैं की, आप ख़ुशी और निष्ठा से सभी नियमों का पालन करें तथा यहाँ की दैनदिनी के अनुसार सभी उपचार कार्यक्रमों में सहभागी हों। <br><br> 
    
किसी भी प्रश्न के लिए, 9404135011 इस नंबर पर कार्यालयीन समय के दौरान संपर्क करने में संकोच न करें (सुबह 10.00 से शाम 6.00 बजे तक)। आशा है, आपका आनंद्कुंज में निवास सुखद और स्वस्थ्यादायी हो। <br><br> 

हमें आपकी सेवा करने का मौका देने के लिए धन्यवाद। <br><br>
    
शुभेच्छाओ के साथ, धन्यवाद!<br><br>
                                    
आपका स्वास्थेच्छु,<br><br>
    
- मनेजर<br><br>
                                    
============  <br><br>";
                    
$mail->AltBody = "This is a Retreat Welcome Email";

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Retreat Welcome Email Sent to $recordPr[0] ! <br>" ;
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