<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RT Consent Form</title>
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
                            $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id='1'";

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }
                            
                            $qryPr="SELECT c.rt_case_sheet_id, p.photo, p.full_name, c.doa, p.occupation, p.dob, p.gender, p.marital_status, p.male_child, p.female_child, p.email, p.mobile_no, p.at_post,  p.address, c.doc, c.retreat_name FROM ak_p_registration p, ak_rt_case_sheet c WHERE p.person_id= c.person_id ";
                            $qryPr=$qryPr . " and c.rt_case_sheet_id = ". $_GET["csid"];
                             //echo $qryPr;
                            {
                                
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                                
                                // age calculation      
                                $bday = new DateTime($recordPr[5]); 
                                $today = new Datetime(date('m.d.y'));
                                $diff = $today->diff($bday);
                               
                            }
                            
                            $qryCs="SELECT present_complaints, past_history, treatment_history, family_history, appetite, bowel_motions, urination, sleep, food_habits, addictions, work_type, stress_type, clinical_examination, investigations FROM ak_rt_case_sheet WHERE rt_case_sheet_id='" . $recordPr[0] ."' ";

                           // echo $qryCs;
                            {
                                
                            $resCs = mysqli_query($con, $qryCs);
                            $recordCs = mysqli_fetch_array($resCs);
                            }
                            
                            $qryDis="SELECT disease_name, disease_nick FROM ak_rt_case_sheet_fd WHERE rt_case_sheet_id='" . $recordPr[0] ."' ";
                            
                             //echo $qryDis;

                            $resDis = mysqli_query($con, $qryDis);
                            $dis="";
                            while($recordDis = mysqli_fetch_array($resDis))
                            {
                                $dis =  $dis.$recordDis[0] . ' (' . $recordDis[1]. ')' ."</br>";
                            }
                               
                        }
                    }
                   
                    catch(Exception $ex)
                    {
                        echo "<script language='javascript'>alert('Error in Reading data')</script>";
                    }
                    mysqli_close ($con);
                ?>
<!-- Php code Ends ========================================= -->
       
        
        <form action="" method="POST" class="form-inline">
            <div class="container col-sm-0">
            </div>
                <div class="container col-sm-12">
<!-- Document Header Start =================================== -->   
                <table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" class="img-rounded" width="100" height="100" src="../../../ak_com/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
                                </a>
                            </td>
                            <td width="85%" align="center">
                                <h6 style= "color:orange" align="center"><i> <?php echo $recordOrg[1];?></i></h6>
                                <h2 style= "color:slateBlue" align="center"><b> <?php echo $recordOrg[2];?></b></h2>
                                 <h6 style= "color:orange" align="center"> <?php echo $recordOrg[3];?>,  Phone: <?php echo $recordOrg[4];?>, <?php echo $recordOrg[5];?></h6>
                            </td>
                        </tr>
                    </table>
<!-- Document Header End ================================================== -->
    <h4 align="center"><b> Retreat Consent Sheet</b> </h4>
    <p align="center">CS ID: <span> <?php echo $recordPr[0];?>, </span><span style="font-family:IDAutomationHC39S; font-size:7px;"> <?php echo $recordPr[2];?> </span></p>
<!-- CS Personal Information Panel Starts================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-body">
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="cs_table">
                        <tr>
                            <td width="15%" align="left">
                                <a class="pull-left" href="#">
                                <img id="photo" name="photo" class="img-rounded"  width="127" height="161" src="../../../ak_com/database/photos/<?php echo $recordPr[1];?>"  alt="Image not uploded">
                                </a>
                                
                            </td>
                            <td width="85%" align="left">
                                <table width="100%" class="table table-striped table-bordered table-        hover" id="cs_table">
                                    <tr>
                                        <th>Full Name:</th> <td><b><?php echo $recordPr[2];?></b></td>
                                        <th>DOA:</th> <td><?php echo $recordPr[3];?></td>
                                        <th>DOC:</th> <td><?php echo $recordPr[14];?></td>
                                    </tr>
                                    <tr>
                                        <th >M Status:</th> <td><?php echo $recordPr[7];?></td>
                                        <th >Retreat:</th> <td colspan="3"><?php echo $recordPr[15];?></td>
                                    </tr>
                                    <tr>
                                        <th>Occupation:</th> <td><?php echo $recordPr[4];?></td>
                                        <th>Age:</th> <td><?php echo $diff->y;?> yrs</td>
                                        <th>Gender:</th> <td><?php echo $recordPr[6];?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th >Email ID.:</th> <td><?php echo $recordPr[10];?></td>
                                        <th >Mobile:</th> <td><?php echo $recordPr[11];?></td>
                                        <th >Place:</th> <td><?php echo $recordPr[12];?></td>
                                    </tr>
                                </table>
                             </td>
                        </tr>
                        <tr>
                            <th width="15%" align="left">Postal Address:</th> <td><?php echo $recordPr[13];?></td>
                        </tr>
                        <tr>
                            <th width="15%" align="left">Illness:</th> <td><?php echo $dis;?></td>
                        </tr>
                    </table>
                </div> 
                </div>
                </div>   
                </div>
<!-- CS Personal Information Panel Ends============================= -->
<!-- CS Clinical Info Panel Starts================================== -->
                <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-body">
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="cs_table">
                        <tr>
                            <td style="font-size:14px"> आम्ही शिवाम्बु, योग व निर्गोपचार या सारख्या प्रचीन भारतीय उपचार पध्दतींचा अभ्यास केला आहे. तसेच येथील व्यवस्थापकानी, डॉक्टरांनी या विषयी पूरी माहीती आम्हाला दिली आहे, आणि ती आम्हाला व्यवथित समजली आहे. माझ्या रोगाची, माझ्या शारिरीक अवस्थेची, क्षमतेची पूर्ण जाणीव मला आहे. येथील, शिवाम्बु लंघन सह, सर्व उपचार व नियम आम्हाला मान्य आहेत, सर्व उपचारांमुळे  होणाऱ्या परिणामस मी स्वतः जबाबदार असेन. मी हे स्पष्ट करतो की वरील सर्व महिती योग्य व सत्य आहे.</td>
                        </tr>
                        <tr>
                            <td style="font-size:14px"> हमने शिवाम्बु, योग एवं प्राकृतिक चिकित्सा जैसी प्रचीन भारतीय उपचार प्रणालियों का अभ्यास किया हैं। तथा यहाँ के व्यवस्थापकोंद्वारा, डॉक्टरोंद्वारा इस विषय की पूरी जानकारी हमें मिली हैं, और हमने उसे ठीक-ठीक समझा है। मुझे मेरे बीमारी की, मेरे शारिरीक अवस्था की, क्षमता की पूर्ण जानकारी है और यहाँ के, शिवाम्बु लंघन सह, सभी उपचार एवं नियम हमे मान्य हैं, सभी उपचारों के लिए हम खुद जिम्मेदार रहेंगे। मैं यह स्पष्ट करता हूँ की, उपरोक्त जानकारी सही और सच हैं। </td>
                        </tr>
                        <tr>
                            <td align="justify" style="font-size:14px"> We, the undersigned, have studied about the Indian Systems of Medicine like Yoga and Naturopathy. The Office and doctors here, have given all necessary information to us about this system and we have understood the same without any doubt. I very clearly know about the status of my illness, my physical condition and my present abilities. We voluntarily accept and give consent to undergo all prescribed treatments including therapeutic fasting. We shall abide by all the rules and regulations of this hospital. No guarantee has been given to us by the doctors with promise of cure or freedom from risk. We have been explained about the possible effects and consequences of this treatment to our satisfaction and we shall be responsible for the same. Thus, we in full understanding, in our own vernacular give our consent. </td>
                        </tr>
                    </table>
                    <h5 align="right"><span>Guardian Signature &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Participant Signature</span></h5>  
                </div> 
                </div>
                </div>   
                </div>
<!-- CS Clinical Info Panel Ends================================== -->
				</div>
               <div class="container col-sm-0"></div>
        </form>
    </page>
</body>
</html>