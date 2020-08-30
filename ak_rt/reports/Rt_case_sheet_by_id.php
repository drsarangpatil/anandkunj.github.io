<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_rt_header.php';?>

<!--<script src="./assets/js/myjs/get_address.js"></script>-->

<title>RT Case Sheet By ID</title>

</head>
<body>
    
    <script>
// JS script for display button========> 
        function dispRepo()
        {
            url ="";

            url += "Rt_case_sheet_by_id.php?rt_case_sheet_id=" + document.getElementById("rt_case_sheet_id").value;
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button=========> 
        function printRepo()
        {
            url ="";

            url=document.URL;
            url=url.replace("Rt_case_sheet_by_id.php", "print/Rt_case_sheet_by_id_print.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }       
    </script>
    
        <form action="" method="POST" class="form-inline" >
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    RT Case Sheet 
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <!--<div class="form-group col-sm-4">
                            <label>Or ID:</label>
                            <div class="form-group" >
                                <input type="text" class="form-control"
                                id="org_id" name="org_id" required>
                            </div>
                        </div>-->
                        <div class="form-group col-sm-4">
                            <label>CS ID:</label>
                            <div class="form-group" >
                                <input type="text" class="form-control"
                                id="rt_case_sheet_id" name="rt_case_sheet_id" required>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                         <div class="form-group col-sm-5 pull-left">
                            <label></label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary pull-center" onclick="dispRepo()"> Display</button>
                                <button type="button" class="btn btn-primary pull-center"  onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Case Sheet</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ======================================= -->
                <?php 
                    include( "../database/Config.php");
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
                            
                            $qryOrg=("SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id='1'");
                            
                            /*'".  $_GET["org_id"] . "'");*/

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }
                            
                            $qryPr="SELECT c.rt_case_sheet_id, p.photo, p.full_name, c.doa, p.occupation, p.dob, p.gender, p.marital_status, p.male_child, p.female_child, p.email, p.mobile_no, p.at_post,  p.address, c.doc, c.retreat_name FROM ak_p_registration p, ak_rt_case_sheet c WHERE p.person_id= c.person_id ";
                            $qryPr=$qryPr . " and c.rt_case_sheet_id ='".  $_GET["rt_case_sheet_id"] . "'";
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
                ?>     
                        
<!-- Document Header Start ================================================== -->
                <table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" class="img-circle"  width="100" height="100" src="../../ak_com/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
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
                                <img id="photo" name="photo" class="img-rounded"  width="127" height="161" src="../../ak_com/database/photos/<?php echo $recordPr[1];?>"  alt="Image not uploded">
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
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="cs_table">
                         <tr>
                            <th width="50%" align="left">Presenting Complaints and its History:</th> 
                            <th width="50%" align="left">Past History: </th>
                        </tr>
                        <tr>
                             <td><?php echo $recordCs[0];?></td>
                             <td><?php echo $recordCs[1];?></td>
                        </tr>
                          <tr>
                            <th>Past Treatments and Present Medications:</th> 
                            <th>Family History:</th>
                        </tr>
                        <tr>
                            <td><?php echo $recordCs[2];?></td>
                            <td><?php echo $recordCs[3];?></td>
                        </tr>
                    </table>
                    <table width="100%" class="table table-striped table-bordered table-hover"         id="cs_table">
                        <caption> <b> Personal History: </b></caption>
                        <tr>
                            <td width="15%" align="left">Appetite:</td> <td width="35%" align="left"> <?php echo $recordCs[4];?></td>
                            <td width="15%" align="left">Bowel Motions:</td> <td width="35%" align="left"><?php echo $recordCs[5];?></td>
                        </tr>
                        <tr>
                            <td width="15%" align="left">Mituration:</td> <td width="35%" align="left"><?php echo $recordCs[6];?></td>
                            <td width="15%" align="left">Sleep:</td> <td width="35%" align="left"><?php echo $recordCs[7];?></td>
                        </tr>
                        <tr>
                            <td width="15%" align="left">Food Habits:</td> <td width="35%" align="left"><?php echo $recordCs[8];?></td>
                            <td width="15%" align="left">Addictions:</td> <td width="35%" align="left"><?php echo $recordCs[9];?></td>
                        </tr>
                        <tr>
                            <td width="15%" align="left">Type of Work:</td> <td width="35%" align="left"><?php echo $recordCs[10];?></td>
                            <td width="15%" align="left">Type of Stress:</td><td width="35%" align="left"><?php echo $recordCs[11];?></td>
                        </tr>
                    </table>
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="cs_table">
                         <tr>
                            <th width="50%" align="left">General Physical and Systemic Examination:</th> 
                            <th width="50%" align="left">Investigation Reports: </th>
                        </tr>
                        <tr>
                             <td><?php echo $recordCs[12];?></td>
                             <td><?php echo $recordCs[13];?></td>
                        </tr>
                        </table>
                        <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="cs_table">
                        <tr>
                            <th width="25%" align="left"> Final Diagnosis:</th> 
                            <th width="75%" align="left">Consent / Declearation:</th>
                        </tr>
                        <tr>
                            <td><?php echo $dis;?></td>
                            <td style="font-size:12px"> हमने शिवाम्बू, योग, एवं प्राकृतिक चिकित्सा जैसी प्राचीन भारतीय उपचार प्रणालीयो का अभ्यास किया है. मुझे मेरी बिमारी की अवस्था के बारे में पूर्ण जानकारी है. हमे यंहा के सभी उपचार एवं नियम मान्य है. सभी उपचारो के लिये हमारी सहमती है, तथा इन उपचारो से होने वाले सभी साधक-बाधक परीनामो की पुरी जानकारी दी गायी है, जिनके प्रती हम खुद जिम्मेदार रहेंगे. - Guardian Signature </td>
                        </tr>
                    </table>
                </div> 
            </div>
        </div>   
    </div>
<!-- CS Clinical Info Panel Ends================================== -->                        
                    </div>
                </div>
            </div>
    </div>
<?php include'../../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>