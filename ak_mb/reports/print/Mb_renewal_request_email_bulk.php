<html lang="en">
    <head>
        <title> Bulk Email - Membership Renewal Request Email</title>
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
    <style>
        body {
            width: 8.5in;
            margin: 0in .1875in;
            }
        .layout{
            /* Avery 5160 labels -- CSS and HTML */
            width: 3.25in; /* plus .6 inches from padding */
            /*height: 1.875in;*/ /* plus .125 inches from padding */
            height: 1.575in;
            padding: .100in .1in 0;
            margin-right: .100in; /* the gutter */

            float: left;

            text-align: center;
            overflow: hidden;

            outline: 1px dotted; /* outline doesn't occupy space like border does */
            }
        .page-break  {
            clear: left;
            display:block;
            page-break-after:always;
            }
      </style>
   
<!-- Php code for Header Starts =============================== -->
        <?php
            //create connection
            include_once('../../database/Config.php');
            $data = new myConfig();

            $con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
            //confirm connection
            if ($con)
            {
                //echo "1";
                mysqli_set_charset( $con, 'utf8' );

                $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=1";

                //echo $qryOrg;

                $resOrg = mysqli_query($con, $qryOrg);
                $recordOrg = mysqli_fetch_array($resOrg); 
            }
        ?>
<!-- Php code for Header Ends =============================== -->
        <form action="" method="POST" class="form-inline" >
            <div class="container col-sm-0">
            </div>
                <div class="container col-sm-12">
<!-- Document Header Start ================================================== -->
                <!--<table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" class="img-circle"  width="100" height="100" src="../../../ak_set/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
                                </a>
                            </td>
                            <td width="85%" align="center">
                                <h6 Style= color:orange align="center"><i> <?php echo $recordOrg[1];?></i></h6>
                                <h2 Style= color:slateBlue align="center"><b> <?php echo $recordOrg[2];?></b></h2>
                                 <h6 Style= color:orange align="center"> <?php echo $recordOrg[3];?>,  Phone: <?php echo $recordOrg[4];?>, <?php echo $recordOrg[5];?></h6>
                            </td>
                        </tr>
                </table>-->
<!-- Document Header End ================================================== --> 
                <!--<h5 align="center"><b> RT Case Sheet Register</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>ID</th>
                                <th>DOA</th>
                                <th>DOC</th>
                                <th>R Name</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>Illness</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>-->
<!-- Php code for OP Case Sheet Table Starts =============================== -->
                            <?php 
                                //Import PHPMailer classes into the global namespace
                                use PHPMailer\PHPMailer\PHPMailer;
                                require 'vendor/autoload.php';
                    
                                $retStr = "";
                                try
                                {
                                    {
                                        $query="SELECT s.mb_membership_id, s.dos, s.doc, s.mem_status, p.photo, p.full_name, p.address, p.at_post, p.pin_code, p.state_name, p.mobile_no, s.association_name, s.membership_type, p.email FROM ak_p_registration p, ak_mb_membership_form s WHERE p.person_id= s.person_id ";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  ( s.doc between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["mem_status"]))
                                            if( $_GET["mem_status"]!=="")
                                            {
                                                $query = $query .   " and ( s.mem_status ='".  $_GET["mem_status"] . "')  "; 
                                            }
                                        if( isset($_GET["association_name"]))
                                            if( $_GET["association_name"]!=="")
                                            {
                                                $query = $query .   " and ( s.association_name ='".  $_GET["association_name"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       /*$i =1;*/
                                        while($record = mysqli_fetch_array($response))
                                        {
                                         

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
$mail->addAddress($record[13], $record[5]);

//Set the subject line
$mail->Subject = $record[11] . ' - Membership Renwal Request';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
$mail->Body ="
<h5 Style= color:orange align='left'><i>$recordOrg[1]</i></h5>
<h1 Style= color:slateBlue align='left'><b>$recordOrg[2]</b></h1>
<h5 Style= color:orange align='left'>$recordOrg[3],  Phone: $recordOrg[4], $recordOrg[5]</h5>
<hr>

    <h2><b>$record[11] - स्मरणपत्र </b></h2><br><br>
    
    प्रति,
    नाम : $record[5] <br>
    पता : $record[6], $record[7], $record[8], $record[9]<br><br>
    फोन नंबर : $record[10]<br>
    इ-मेल : $record[13]<br><br>

    सप्रेम नमस्कार,<br>

    आप, दवाई-बिना आरोग्य - इस विचारधारा को समर्पित $record[11] इस एसोसिएशन के सदस्य है.<br> <br>
    
    आपका सदस्यता विवरण:<br>
    सद्स्यता क्रमांक : 0$record[0] : $record[11]<br>
    सद्स्यता कालावधी : $record[12], $record[1] से $record[2]<br>
    
    आपकी $record[11] की $record[12] सदस्यता $record[2] तारीख को समाप्त होती है, कृपया अगला शुल्क आप मिनिऑर्डर अथवा Paytm व्दारा 9309979990 इस मोबाईल नंबर पर भेजकर, यह अमृतप्रवाह अखंड रखने में, कृपया हमे सहकार्य करे.<br>
    धन्यवाद!<br>

    आपका स्वास्थेच्छु,<br>

    - मनेजर<br><br>

    ============<br>  

    $record[11] सदस्यता शुल्क विवरण:<<br>
    
    आजीवन सदस्य रु 100/-<br><br>

    सदस्यता शुल्क आप मिनिऑर्डर अथवा Paytm व्दारा 9309979990 इस मोबाईल नंबर पर भेजे दे.<br><br>

    टीप:<br>
    अगर यह पत्र पहुचाने से पहले आपने सदस्यता शुल्क भेजी हो तो आप इस पत्र को नजरअंदाज करे.<br>
    अधिक जानकारी के लिये कृपया 0231-2321565 इस फोन नंबर पर सुबह 10.00 से शाम 6.00 तक संपर्क करे.";
                    
$mail->AltBody = "This is a $record[11] Membership Renwal Request";

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Membership Renwal Request Email Sent to $record[5] ! <br>";
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
/*function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}*/
                                            /*$i = $i+1;*/
                                        }
                                    }
                                }
                                catch(Exception $ex)
                                {
                                    echo "<script language='javascript'>alert('Error in Reading data')</script>";
                                }
                            mysqli_close ($con);
                        ?>
<!-- Php code for OP Case Sheet Table ends =============================== -->
                       <!-- </tbody>
                    </table>-->
                     <!--<td><a href="../Rt_cs_register.php">Back</a></td> -->
                    <!--</div>-->
                    </div>
               <div class="container col-sm-0"></div>
            </form>
        </page>
    </body>
</html>
