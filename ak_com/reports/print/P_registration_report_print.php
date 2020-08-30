<html lang="en">
    <head>
        <title>Print P_Registration</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../assets/css/bootstrap.3.4.1.min.css">
        <script src="../../assets/js/jquery.3.3.1.min.js"></script>
        <script src="../../assets/js/bootstrap.3.4.1.min.js"></script>
        
        <link rel="shortcut icon" type="image/png" href="../../assets/images/A_Logo_red_32x32.png">
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

                $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=1";

                //echo $qryOrg;

                $resOrg = mysqli_query($con, $qryOrg);
                $recordOrg = mysqli_fetch_array($resOrg); 
            }
        ?>
<!-- Php code for Header Ends =============================== -->
        <form action="" method="post" class="form-inline" >
            <div class="container col-sm-1">
            </div>
                <div class="container col-sm-10">
<!-- Document Header Start ================================================== -->
                <table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" class="img-circle"  width="100" height="100" src="../../database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
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
                    <h5 align="center"><b>Person Registration Register</b></h5>
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                            <th>#</th>
                            <!--<th>Category</th>-->
                            <th>Photo</th>
                            <!--<th>P ID</th>-->
                            <th>DOR</th>
                            <th>Full Name</th> 
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Marital Status</th>
                            <th>Occupation</th>
                            <th>Address</th>
                            <th>At Post</th>
                            <th>Nation</th>
                            <th>State</th>
                            <th>District</th>
                            <th>Tahsil</th>
                            <th>Mobile No.</th>
                            <th>Whatsapp No.</th>
                            <th>Email Address</th>
                            <th>Reference</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for Person Registration Table Starts =============================== -->
                        <?php 
                            $retStr = "";
                            try
                            {
                                {
                                    $query = "SELECT pin_code, photo, person_id, dor, full_name, gender, dob, marital_status, occupation, address, at_post, nation_name, state_name, district_name, tahsil_name, mobile_no, whatsapp_no, email, reference FROM ak_p_registration WHERE 1";


                                if( isset($_GET["from_date"]))
                                    if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                    {
                                    $query = $query .   " and  (dor between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                    }

                                if( isset($_GET["nation_name"]))
                                    if( $_GET["nation_name"]!=="")
                                    {
                                    $query = $query .   " and ( nation_name ='".  $_GET["nation_name"] . "')  "; 
                                    }
                                if( isset($_GET["state_name"]))
                                    if( $_GET["state_name"]!=="")
                                    {
                                    $query = $query .   " and ( state_name ='".  $_GET["state_name"] . "')  "; 
                                    }
                                if( isset($_GET["at_post"]))
                                    if( $_GET["at_post"]!=="")
                                    {
                                    $query = $query .   " and ( at_post ='".  $_GET["at_post"] . "')  "; 
                                    }
                                if( isset($_GET["reference"]))
                                    if( $_GET["reference"]!=="")
                                    {
                                    $query = $query .   " and ( reference ='".  $_GET["reference"] . "')  "; 
                                    }
                               /* if( isset($_GET["person_category"]))
                                    if( $_GET["person_category"]!=="")
                                    {
                                    $query = $query .   " and ( person_category ='".  $_GET["person_category"] . "')  "; 
                                    }*/
                                //echo $query;

                                $response = mysqli_query($con, $query); 
                                $i =1;
                                while($record = mysqli_fetch_array($response))
                                    {

                                    echo '<tr class="odd gradeX" style="font-size:13px">';
                                    echo '<td align="left">' . $i . '</td>';
                                   //echo '<td align="left">' . $record[0] . '</td>';
                                    echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../database/photos/'. $record[1] .'">  </td>';
                                    //echo '<td align="left">' . $record[2] . '</td>';
                                    echo '<td align="left">' . $record[3] . '</td>';
                                    echo '<td align="left">' . $record[4] . '</td>';
                                    echo '<td align="left">' . $record[5] . '</td>';
                                    
                                    $bday = new DateTime($record[6]); // Your date of birth
                                    $today = new Datetime(date('m.d.y'));
                                    $diff = $today->diff($bday);
                                    echo '<td align="left">' . $diff->y . '</td>';

                                    echo '<td align="left">' . $record[7] . '</td>';
                                    echo '<td align="left">' . $record[8] . '</td>';
                                    echo '<td style="font-size:12px" align="left">' . $record[9] . '</td>';
                                    echo '<td align="left">' . $record[10] . '</td>';
                                    echo '<td align="left">' . $record[11] . '</td>';
                                    echo '<td align="left">' . $record[12] . '</td>';
                                    echo '<td align="left">' . $record[13] . '</td>';
                                    echo '<td align="left">' . $record[14] . '</td>';
                                    echo '<td align="left">' . $record[15] . '</td>';
                                    echo '<td align="left">' . $record[16] . '</td>';
                                    echo '<td align="left">' . $record[17] . '</td>';
                                    echo '<td align="left">' . $record[18] . '</td>';
                                    echo "</tr>";
                                    $i = $i+1;

                                    }
                                }
                            }
                            catch(Exception $ex)
                            {
                                echo "<script language='javascript'>alert('Error in Reading data')</script>";
                            }
                        mysqli_close ($con);
                    ?>
<!-- Php code for Person Registration Table Ends =============================== --> 
                        </tbody>
                    </table>
                    <!--<td><a href="../P_registration_report.php">Back</a></td>-->
                </div>
                </div>
            <div class="container col-sm-1">
            </div>
        </form>
	</body>
</html>
