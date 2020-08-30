<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Print - 1st Attendant I Card</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../../ak_com/assets/css/bootstrap.3.4.1.min.css">
        <script src="../../../ak_com/assets/js/jquery.3.3.1.min.js"></script>
        <script src="../../../ak_com/assets/js/bootstrap.3.4.1.min.js"></script>
        <link rel="shortcut icon" type="image/png" href="../../../ak_com/assets/images/A_Logo_32x32.png">
        <link href="labels.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../../../ak_com/assets/css/a4page.css.css">

        <style>
        body {
            width: 8.5in;
            margin: 0in .1875in;
            }
        .layout{
            /* Avery 5160 labels -- CSS and HTML */
            width: 3.025in; /* plus .6 inches from padding */
            height: 1.875in; /* plus .125 inches from padding */
            padding: .125in .3in 0;
            margin-right: .125in; /* the gutter */

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
                            /*$qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=1";

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }
                            */
                            $qryPr="SELECT c.rt_case_sheet_id, p.photo, p.full_name, c.doa, p.occupation, p.dob, p.gender, p.marital_status, p.male_child, p.female_child, p.email, p.mobile_no, p.at_post,  p.address, c.doc, c.retreat_name, a.rt_attendant_info_id FROM ak_p_registration p, ak_rt_case_sheet c, ak_rt_attendant_info a WHERE p.person_id= c.person_id and c.rt_case_sheet_id= a.rt_case_sheet_id";
                            $qryPr=$qryPr . " and a.rt_case_sheet_id = ". $_GET["csid"];
                             //echo $qryPr;
                            {
                                
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                                
                                // age calculation      
                                $bday = new DateTime($recordPr[5]); 
                                $today = new Datetime(date('m.d.y'));
                                $diff = $today->diff($bday);
                               
                            }
                            
                            $qryCs="SELECT room_number FROM ak_rt_room_allocation WHERE rt_case_sheet_id='" . $recordPr[0] ."' ";

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
                                $dis =  $dis.$recordDis[0] . ' (' . $recordDis[1]. ')' .', ';
                            }
                            $dis=str_replace("\n","",$dis);
                            $dis=str_replace("\r","",$dis);
                            $dis=substr( $dis,0,strlen($dis)-2);
                            //echo $dis;
                            
                            $qryAtn="SELECT attendant_name1, relation1, mobile_no1  FROM ak_rt_attendant_info WHERE rt_attendant_info_id ='" . $recordPr[16] ."' ";
                                            
                            $resAtn = mysqli_query($con, $qryAtn);
                            $atn1="";
                            while($recordAtn = mysqli_fetch_array($resAtn))
                            {
                                $atn1 =  $atn1.$recordAtn[0] . ' (' . $recordAtn[1] . ') ' . $recordAtn[2] . "</br>";
                            }
                            /*$atn1=substr( $atn1,0,strlen($atn1)-2);*/
                               
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
<!-- Fetched Personal Information ================================================== -->
                <div class="container col-sm-12">
                    <div class="panel-group">
				    <div class="media">
				        <div class="media-body">
                            <div class="layout" style= "color:Black">
								<img id="photo" name="photo" class="img-rounded"  width="40" height="50" src="../../../ak_com/database/photos/<?php echo $recordPr[1];?>"  alt="Image not uploded">
								    
                                <p align="center"> <span> <b><?php echo $recordPr[2];?></b></span><br> <span> <?php echo $atn1;?> </span></p>
                                <p align="center"> <span>DOA:</span> <span><?php echo $recordPr[3];?></span>, <span>DOC:</span> <span><?php echo $recordPr[14];?></span> <br>
                                <span>Room:</span> <span><?php echo $recordCs[0];?></span>, <span>Mobile:</span> <span><?php echo $recordPr[11];?></span></p>
                            </div>
                            <div class="layout" style= "color:Black">
								<img id="photo" name="photo" class="img-rounded"  width="40" height="50" src="../../../ak_com/database/photos/<?php echo $recordPr[1];?>"  alt="Image not uploded">
								    
                                <p align="center"> <span> <b><?php echo $recordPr[2];?></b></span><br> <span> <?php echo $atn1;?> </span></p>
                                <p align="center"> <span>DOA:</span> <span><?php echo $recordPr[3];?></span>, <span>DOC:</span> <span><?php echo $recordPr[14];?></span> <br>
                                <span>Room:</span> <span><?php echo $recordCs[0];?></span>, <span>Mobile:</span> <span><?php echo $recordPr[11];?></span> </p>
                            </div>
                            <!--<div class="layout" style= "color:Black">
								<img id="photo" name="photo" class="img-rounded"  width="40" height="50" src="../../../ak_com/database/photos/<?php echo $recordPr[1];?>"  alt="Image not uploded">
								    
                                <p align="center"> <span> <b><?php echo $recordPr[2];?></b></span><br> <span> <?php echo $atn1;?> </span></p>
                                <p align="center"> <span>DOA:</span> <span><?php echo $recordPr[3];?></span>, <span>DOC:</span> <span><?php echo $recordPr[14];?></span> <br>
                                <span>Room:</span> <span><?php echo $recordCs[0];?></span>, <span>Mobile:</span> <span><?php echo $recordPr[11];?></span> </p>
                            </div>
                            <div class="layout" style= "color:Black">
								<img id="photo" name="photo" class="img-rounded"  width="40" height="50" src="../../../ak_com/database/photos/<?php echo $recordPr[1];?>"  alt="Image not uploded">
								    
                                <p align="center"> <span> <b><?php echo $recordPr[2];?></b></span><br> <span> <?php echo $atn1;?> </span></p>
                                <p align="center"> <span>DOA:</span> <span><?php echo $recordPr[3];?></span>, <span>DOC:</span> <span><?php echo $recordPr[14];?></span> <br>
                                <span>Room:</span> <span><?php echo $recordCs[0];?></span>, <span>Mobile:</span> <span><?php echo $recordPr[11];?></span> </p>
                            </div>-->
                            <div class="page-break"></div>
                            </div>
						  </div>
						</div>
                     </div>
            
<!-- Fetched Personal Information Pannel end ================================================== -->
            <div class="container col-sm-0">
            </div>
           
        </form>
    </page>
    </body>
</html>