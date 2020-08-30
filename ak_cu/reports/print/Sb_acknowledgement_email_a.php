<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Acknowledgement Email</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/bootstrap.3.3.7.min.css">
        <script src="../../js/jquery331.min.js"></script>
        <script src="../../js/bootstrap.3.3.7.min.js"></script>
    </head>
    <body>
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
                            
                             $qryPr="SELECT Distinct p.full_name, p.address, P.at_post, p.pin_code, p.state_name, p.mobile_no, p.email, r.sb_subscription_id, s.magazine_name, s.subscription_type, s.dos, s.doc, r.amount_paid FROM ak_p_registration p, ak_sb_subscription_form s, ak_sb_payment r WHERE p.person_id= s.person_id";
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
            <div class="container col-sm-2">
            </div>
                <div class="container col-sm-8">
<!-- Document Header Start =================================== -->

    <h4 align="center"><b> Subscription Acknowledgement Email </b> </h4>
    <p align="center"><span>Subscriber Name:</span> <span> <?php echo $recordPr[0];?></span>, <span>Email Id:</span> <span> <?php echo $recordPr[6];?></span>, <span>Receipt No.:</span> <span> <?php echo $year;?>/0<?php echo $recordPr[7];?>, </span><span>SB ID:</span> <span> <?php echo $recordPr[7];?></span></p>
<!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Subscription Acknowledgement Email
                    </div>
                    <div class="panel-body">    
                        <div class="form-group col-sm-12">
                            <label>Subject for Email:</label>
                            <div class="form-group">
                                <textarea class="form-control" cols="100" rows="1" id="email_subject" name="email_subject"> <?php echo $recordPr[8];?> : सदस्यता प्रमाणपत्र    </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">                        
                        <div class="form-group col-sm-12">
                            <label>Email to be Sent:</label>
                            <div class="form-group">
                                
<textarea class="form-control" cols="100" rows="25"  id="sb_email_template" name="sb_email_template">
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
- संपादक
                                    
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
<!-- Form Information Ends ================================================== -->
                </div>
               <div class="container col-sm-2"></div>
        </form>
    </body>
</html>