<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MB Membership Certificate</title>
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
                            $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=3";

                            //echo $qryOrg;
                            {
                                
                                $resOrg = mysqli_query($con, $qryOrg);
                                $recordOrg = mysqli_fetch_array($resOrg);  
                                
                            }
                            
                            $qryPr="SELECT s.mb_membership_id, p.photo, p.full_name, s.dos, p.occupation, p.dob, p.gender, p.marital_status, p.male_child, p.female_child, p.email, p.mobile_no, p.at_post,  p.address, s.doc, s.association_name FROM ak_p_registration p, ak_mb_membership_form s WHERE p.person_id= s.person_id ";
                            $qryPr=$qryPr . " and s.mb_membership_id = ". $_GET["sbid"];
                             //echo $qryPr;
                            {
                                
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                                
                                // age calculation      
                                $bday = new DateTime($recordPr[5]); 
                                $today = new Datetime(date('m.d.y'));
                                $diff = $today->diff($bday);
                               
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
                                <img id="logo" name="logo" class="img-rounded"  width="100" height="100" src="../../../ak_com/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
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
    <!--<p align="right">CS ID: <span> <?php echo $recordPr[0];?> </span><span> Bar Code: </span> <span> ///////////////// </span></p>-->
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
                                <img id="photo" name="photo" class="img-rounded"  width="97" height="131" src="../../../ak_com/database/photos/<?php echo $recordPr[1];?>"  alt="Image not uploded">
                                </a>
                                
                            </td>
                            <td width="85%" align="left">
                                <table width="100%" class="table table-striped table-bordered table-        hover" id="cs_table">
                                    <tr>
                                        <th>Full Name:</th> <td><b><?php echo $recordPr[2];?></b></td>
                                        <th>DOS:</th> <td><?php echo $recordPr[3];?></td>
                                        <th>DOC:</th> <td><?php echo $recordPr[14];?></td>
                                    </tr>
                                    <tr>
                                        <th >M Status:</th> <td><?php echo $recordPr[7];?></td>
                                        <th >Association:</th> <td colspan="3"><?php echo $recordPr[15];?></td>
                                    </tr>
                                    <tr>
                                        <th>Occupation:</th> <td><?php echo $recordPr[4];?></td>
                                        <th>Age:</th> <td><?php echo $diff->y;?> yrs</td>
                                        <th>Gender:</th> <td><?php echo $recordPr[6];?></td>
                                    </tr>
                                </table>
                             </td>
                        </tr>
                        <tr>
                            <th>Email ID.:</th> <td  ><?php echo $recordPr[10];?></td>
                        </tr>
                         <tr>
                            <th>Mobile:</th> <td><?php echo $recordPr[11];?></td>
                            <!--<th colspan="3">Place:</th> <td colspan="0"><?php echo $recordPr[12];?></td>-->
                        </tr>
                        <tr>
                            <th align="left">Postal Address:</th> <td><?php echo $recordPr[13];?></td>
                        </tr>
                    </table>
                </div> 
                </div>
                </div>   
                </div>
<!-- CS Personal Information Panel Ends============================= -->
<h4 align="center"><b> MEMBERSHIP CERTIFICATE</b> </h4>
<!-- CS Clinical Info Panel Starts================================== -->
                <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-body">
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="cs_table">
                        <tr> 
                            <td align="center" style="font-size:20px"><br>This is to certify that, <br><br>
                            <b style="font-size:20px"><?php echo $recordPr[2];?></b><br><br>
                            is a member of the <br><br> 
                            "<?php echo $recordPr[15];?>" <br><br>
                            from <?php echo $recordPr[3];?> to <?php echo $recordPr[14];?>. <br><br>
                            He/she is entitled to all the privileges of membership <br><br>
                            as set forth in the Articles of the Association.<br><br><br>    
                            <b style="font-size:16px"><span>Authorised Head</span> </b> <br>
                            <p style="font-size:12px">KOLHAPUR : <?php echo $recordPr[14];?> </p> 
                            </td>
                        </tr>
                    </table>
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