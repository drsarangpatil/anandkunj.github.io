<html lang="en">
    <head>
        <title> OP Appointment Register</title>
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
            <div class="container col-sm-1">
            </div>
                <div class="container col-sm-10">
<!-- Document Header Start ================================================== -->
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
<!-- Document Header End ================================================== --> 
                <h5 align="center"><b> OP Appointment Register</b></h5><p align="center"><b>(Appointment With: <?php echo $_GET["ap_with"];?>; Ap Status: <?php echo $_GET["ap_status"];?>; At Post: <?php echo $_GET["at_post"];?>; AP Date: from <?php echo $_GET["from_date"];?>  to <?php echo $_GET["to_date"];?>)</b></p>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Session</th>
                                <th>Time</th>
                                <th>Name</th>
                                <th>Place</th>
                                <th>Mobile</th>
                                <th>Ap Type</th>
                                <th>Ap With</th>
                                <th>Ap Purpose</th>
                                <th>Ap Status</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for OP Appointment Register Table Starts =============================== -->
                            <?php 
                                $retStr = "";
                                try
                                {
                                    {
                                        $query="SELECT  op_ap_id, ap_date, ap_session, ap_time, full_name, at_post, mobile_no, ap_type, ap_with, ap_purpose, ap_status FROM ak_op_appointment WHERE 1";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  ( ap_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["ap_with"]))
                                            if( $_GET["ap_with"]!=="")
                                            {
                                                $query = $query .   " and ( ap_with ='".  $_GET["ap_with"] . "')  "; 
                                            }
                                        if( isset($_GET["ap_status"]))
                                            if( $_GET["ap_status"]!=="")
                                            {
                                                $query = $query .   " and ( ap_status ='".  $_GET["ap_status"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                               echo '<td align="center">' . $i . '</td>';
                                                echo '<td align="center">' . $record[0] . '</td>';
                                                echo '<td align="center">' . $record[1] . '</td>';
                                                echo '<td align="center">' . $record[2] . '</td>';
                                                echo '<td align="center">' . $record[3] . '</td>';
                                                echo '<td align="center">' . $record[4] . '</td>';
                                                echo '<td align="center">' . $record[5] . '</td>';
                                                echo '<td align="center">' . $record[6] . '</td>';
                                                echo '<td align="center">' . $record[7] . '</td>';
                                                echo '<td align="center">' . $record[8] . '</td>';
                                                echo '<td align="center">' . $record[9] . '</td>';
                                                echo '<td align="center">' . $record[10] . '</td>';
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
<!-- Php code for OP Appointment Register Table ends =============================== -->
                        </tbody>
                    </table>
                     <!--<td><a href="../Op_cs_register.php">Back</a></td>--> 
                    </div>
                    </div>
               <div class="container col-sm-0"></div>
            </form>
        </page>
    </body>
</html>
