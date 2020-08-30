<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Acknowledgement SMS</title>
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
                            
                             $qryPr="SELECT Distinct p.full_name, p.mobile_no, r.sb_subscription_id, s.magazine_name, s.subscription_type, s.dos, s.doc, r.amount_paid FROM ak_p_registration p, ak_sb_subscription_form s, ak_sb_payment r WHERE p.person_id= s.person_id";
                              $qryPr = $qryPr . " and s.sb_subscription_id  = r.sb_subscription_id";
                             $qryPr=$qryPr . " and r.sb_payment_id = ". $_GET["pyid"];
                            
                           
                            //echo $qryPr;
                            {
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                              
                            // date extraction
                                $time=strtotime($recordPr[5]);
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

    <h4 align="center"><b> Subscription Acknowledgement SMS </b> </h4>
    <p align="center"><span>Subscriber Name:</span> <span> <?php echo $recordPr[0];?></span>, <span>Mobile No.:</span> <span> <?php echo $recordPr[1];?></span>, <span>Receipt No.:</span> <span> <?php echo $year;?>/0<?php echo $recordPr[2];?>, </span><span>SB ID:</span> <span> <?php echo $recordPr[2];?></span></p>
<!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Subscription Acknowledgement SMS
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-12">
                            <label>SMS to be Sent:</label>
                            <div class="form-group">
                                <!--<textarea class="form-control" rows="3" id="sb_sms_template" name="sb_sms_template">Thank you for subscribing "<?php echo $recordPr[3];?>" from <?php echo $recordPr[5];?> to <?php echo $recordPr[6];?> for <?php echo $recordPr[4];?> duration. Amount Paid : <?php echo "&#8377 ".$recordPr[7];?>. manager.anandkunj@gmail.com, 9404135010.</textarea>-->
                                <textarea class="form-control" cols="100" rows="3" id="sb_sms_template" name="sb_sms_template">"<?php echo $recordPr[3];?>" का मेम्बर बनाने के लिये धन्यवाद. आपकी <?php echo $recordPr[4];?> मेम्बेर्शीप <?php echo $recordPr[5];?>  से <?php echo $recordPr[6];?> तक होगी. रकम अदा : <?php echo "&#8377 ".$recordPr[7];?>. संपर्क : 9404135010.</textarea>
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