<html lang="en">
    <head>
        <title> Send - All Magazines Emails</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/bootstrap.3.3.7.min.css">
        <script src="../../js/jquery331.min.js"></script>
        <script src="../../js/bootstrap.3.3.7.min.js"></script>
    </head>
    <body>
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

                $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=2";

                //echo $qryOrg;

                $resOrg = mysqli_query($con, $qryOrg);
                $recordOrg = mysqli_fetch_array($resOrg); 
            }
        ?>
<!-- Php code for Header Ends =============================== -->
        <form action="" method="POST" class="form-inline" >
            <div class="container col-sm-1">
            </div>
                <div class="container col-sm-10">
<!-- Document Header Start ================================================== -->
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
<!-- Document Header End ================================================== --> 
                <h4 align="center"><b> All Magazines Subscribers Register</b></h4>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                           <tr style="font-size:13px"> 
                                <th>ID</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Sub Status</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>Magazine</th>
                                <th>Sub Type</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for OP Case Sheet Table Starts =============================== -->
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
                            
                                $retStr = "";
                                try
                                {
                                    {
                                       $query="SELECT s.sb_subscription_id, s.dos, s.doc, s.sub_status, p.photo, p.full_name, p.email, p.at_post, p.mobile_no,  s.magazine_name, s.subscription_type, p.address, p.pin_code, p.state_name FROM ak_p_registration p, ak_sb_subscription_form s WHERE p.person_id= s.person_id ";

                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (s.doc between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["sub_status"]))
                                            if( $_GET["sub_status"]!=="")
                                            {
                                                $query = $query .   " and ( sub_status ='".  $_GET["sub_status"] . "')  "; 
                                            }
                                        if( isset($_GET["magazine_name"]))
                                            if( $_GET["magazine_name"]!=="")
                                            {
                                                $query = $query .   " and ( s.magazine_name ='".  $_GET["magazine_name"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       //$i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {
                                            // date extraction
                                            $time=strtotime($record[1]);
                                            //$month=date("F",$time);
                                            $year=date("Y",$time);
                                            
                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="center">' . $record[0] . '</td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="left">' . $record[2] . '</td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../../ak_com/database/photos/'. $record[4] .'">  </td>';
                                                echo '<td align="left">' . $record[5] . '</td>';
                                                //echo '<td align="left"><a href= "print/Sb_all_subscribers_report_print.php?csid=' .$record[7] . '">' . $record[5] . '</a></td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                echo '<td align="left">' . $record[7] . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
                                                echo '<td align="left">' . $record[9] . '</td>';
                                                echo '<td align="left">' . $record[10] . '</td>';
                                            echo "</tr>";
                                           // $i = $i+1;

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
                                            $mail->addAddress($record[6], $record[5]);

                                            //Set the subject line
                                            $mail->Subject = $record[9] . ' - Subscription Acknowledgement';

                                            //Read an HTML message body from an external file, convert referenced images to embedded,
                                            //convert HTML into a basic plain-text alternative body
                                            //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
                                            
                                            //Replace the plain text body with one created manually
                                            $mail->Body ="
                                            <table width='100%' class='table table-striped table-bordered table-hover' id='cs_table' >
                                                <tr align='center'>
                                                    <td width='15%' align='center'>
                                                        <a class='pull-center' href='#'>
                                                        <img id='logo' name='logo' class='img-circle'  width='100' height='100' src='../../../ak_com/database/logos/$recordOrg[0]' alt='logo not found>'>
                                                        </a>
                                                    </td>
                                                    <td width='85%' align='left'>
                                                        <h5 Style= color:orange align='left'><i> $recordOrg[1]</i></h5>
                                                        <h1 Style= color:slateBlue align='left'><b> $recordOrg[2]</b></h1>
                                                         <h5 Style= color:orange align='left'> $recordOrg[3],  Phone: $recordOrg[4], $recordOrg[5]</h5>
                                                    </td>
                                                </tr>
                                            </table>
                                                <h2>$record[9] - सदस्यता प्रमाणपत्र</h2><br><br><b>
                                                नाम : $record[5] <br>
                                                पता : $record[11], $record[7], $record[12], $record[13]<br><br>
                                                फोन नंबर : $record[8]<br>
                                                इ-मेल : $record[6]<br><br>
                                                सद्स्यता क्रमांक : 0$record[0] : $record[9]<br>
                                                सद्स्यता कालावधी : $record[9], $record[1] से $record[2]<br>
                                                रिसीट नंबर : $year/0$record[0]<br><br> 
                                                -------------<br><br>
                                                प्रति,<br>
                                                $record[5],<br> 
                                                $record[7]<br><br>
                                                सप्रेम नमस्कार,<br>
                                                आप $record[9] इस पत्रिका के सदस्य हुए है, आपका अभिनंदन !<br>
                                                आपने सदस्यता शुल्क भेजकर यह स्वास्थ्य-प्रवाह जारी रखने के लिये सहायता की उसके लिये हम आपके आभारी है.<br>
                                                आपसे अनुरोध है की, उपरोक्त सदस्यता क्रमांक आप नोट (दर्ज) करके रखे.<br>
                                                कृपया उपरोक्त नाम, पता, फोन नंबर, ई-मेल और सदस्यता कालावधी जांच ले; उसमें अगर कोई बदलाव हो तो तुरंत हमें सूचित करे.<br> <br>
                                                धन्यवाद !<br>
                                                आपका स्वास्थेच्छु,<br><br>
                                                - संपादक<br><br>               
                                                ============<br><br>           
                                                सूचना :<br>                                    
                                                * हर महिने के दस तारीख को यह पत्रिका कोल्हापूर से पोस्ट होती है; आपको उसी महिने के बीस तारीख तक यह पत्रिका मिल जानी   
                                                  चहिये,<br>अगर पत्रिका नहीं मिलती है तो आप पोस्ट ऑफीस में पुछ्ताछ करे.<br>
                                                * अगर पत्रिका डाकघर की गलतियो से नही मिलती हो, तो उसके लिये 'संदेश प्रकाशन' जिम्मेदार नहीं होगा.<br>
                                                * अधिक जानकारी के लिये कृपया 0231-2321565 इस फोन नंबर पर सुबह 10.00 से शाम 5.00 तक संपर्क करे. </b>";

                                            $mail->AltBody = "This is a $record[9] Subscription Acknowledgement";

                                            //Attach an image file
                                            //$mail->addAttachment('images/phpmailer_mini.png');

                                            //send the message, check for errors
                                            if (!$mail->send()) {
                                                echo "Mailer Error: " . $mail->ErrorInfo;
                                            } else {
                                                echo "Message sent!";
                                                //Section 2: IMAP
                                                //Uncomment these to save your message in the 'Sent Mail' folder.
                                                #if (save_mail($mail)) {
                                                #    echo "Message saved!";
                                                #}
                                            }
                            
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
                        </tbody>
                    </table>
                     <!--<td><a href="../Op_cs_report.php">Back</a></td> -->
                    </div>
                    </div>
                <div class="container col-sm-1">
            </div>
        </form>
	</body>
</html>
