<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CM Dispatch Alert Email</title>
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
                            
                             $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=5";

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }
                                                        
                            // $qryPr="SELECT p.full_name, p.dob, p.gender, c.st_course_application_id, c.course_name, c.doa, c.doc, c.course_language, p.email, p.at_post, p.mobile_no FROM ak_p_registration p, ak_st_course_application c WHERE p.person_id= c.person_id and c.st_course_application_id= ". $_GET["stid"];
                            
                            $qryPr="SELECT s.st_course_material_id, c.doa, c.doc, c.course_name, s.material_language, s.mode_dispatch, s.dod, p.photo, p.full_name, p.at_post, p.mobile_no, p.email, c.ad_status, s.st_course_application_id, s.course_material FROM ak_p_registration p, ak_st_course_application c, ak_st_course_material_dispatch s WHERE p.person_id= c.person_id and c.st_course_application_id = s.st_course_application_id";
                            $qryPr = $qryPr .   " and ( s.st_course_application_id ='".  $_GET["stid"] . "')  "; 
                            
                           
                            //echo $qryPr;
                            {
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                              
                            // date extraction
                                $time=strtotime($recordPr[6]);
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
            <div class="container col-sm-2">
            </div>
                <div class="container col-sm-8">
<!-- Document Header Start =================================== -->

    <h4 align="center"><b> CM Dispatch Alert Email </b> </h4>
    <p align="center"><span>Student Name:</span> <span> <?php echo $recordPr[8];?></span>, <span>Email Id:</span> <span> <?php echo $recordPr[11];?></span>, <span>ST ID:</span> <span> <?php echo $recordPr[13];?></span></p>
<!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        CM Dispatch Alert Email
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
                                <textarea class="form-control" cols="90" rows="1" id="email_subject" name="email_subject"> <?php echo $recordPr[3];?> : Course Material Dispatch Alert </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">                        
                        <div class="form-group col-sm-12">
                            <label>Email to be Sent:</label>
                            <div class="form-group">
                                                            
<textarea class="form-control" cols="90" rows="25"  id="sb_email_template" name="sb_email_template">
Course Material Dispatch Alert 

प्रति,
<?php echo $recordPr[8];?>, 
<?php echo $recordPr[9];?>,
फोन नंबर : <?php echo $recordPr[10];?>                                    
इ-मेल : <?php echo $recordPr[11];?>
    
                                    
सप्रेम नमस्कार,

आप <?php echo $recordPr[3];?> इस कोर्स के विद्यार्थी है, और आपका स्टूडेंट क्रमांक <?php echo $year;?>/<?php echo $recordPr[13];?> यह है.

<?php echo $recordPr[6];?> तारीख को <?php echo $recordPr[3];?> इस कोर्स का स्टडी मटेरियल (आभ्यास सामग्री) <?php echo $recordPr[5];?> द्वारा आपके पत्ते पर भेज दिया गया है. 
    
स्टडी मटेरियल (आभ्यास सामग्री) का विवरण इस प्रकार है:
<?php echo $recordPr[14];?>
    

आपका स्वास्थेच्छु,
    
- कोर्स कोऑर्डिनेटर
                                    
============  
                                    
सूचना :
  
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
$mail->addAddress($recordPr[11], $recordPr[8]);

//Set the subject line
$mail->Subject = $recordPr[3] . ' - Course Material Dispatch Alert';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
$mail->Body ="

<h5 Style= color:orange align='left'><i>$recordOrg[1]</i></h5>
<h1 Style= color:slateBlue align='left'><b>$recordOrg[2]</b></h1>
<h5 Style= color:orange align='left'>$recordOrg[3],  Phone: $recordOrg[4], $recordOrg[5]</h5>
<hr>
    <h2><b>$recordPr[3] - Course Material Dispatch Alert </b></h2><br><br>
    
    प्रति,
    नाम : $recordPr[8] <br>
    पता : $recordPr[9]<br><br>
    फोन नंबर : $recordPr[10]<br>
    इ-मेल : $recordPr[11]<br><br>

    सप्रेम नमस्कार,<br>

    आप $recordPr[3] इस कोर्स के विद्यार्थी है, और आपका स्टूडेंट क्रमांक $year/ $recordPr[13] यह है. <br>

    $recordPr[6] तारीख को  $recordPr[3] इस कोर्स का स्टडी मटेरियल (आभ्यास सामग्री) $recordPr[5] द्वारा आपके पत्ते पर भेज दिया गया है. <br><br>
    
    स्टडी मटेरियल (आभ्यास सामग्री) का विवरण इस प्रकार है:<br>
    $recordPr[14]

    आपका स्वास्थेच्छु,<br>

    - कोर्स कोऑर्डिनेटर<br><br>

    ============ <br><br> 

    सूचना :<br>

    
    अधिक जानकारी के लिये कृपया 0231-2321565 इस फोन नंबर पर सुबह 10.00 से शाम 6.00 तक संपर्क करे.";
                    
$mail->AltBody = "This is a $recordPr[3] Course Material Dispatch Alert";

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Course Material Dispatch Alert Email Sent $recordPr[8] ! <br>";
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