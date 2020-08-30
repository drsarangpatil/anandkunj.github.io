<html lang="en">
    <head>
        <title> Print Donation Register</title>
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
                                <img id="logo" name="logo" class="img-circle"  width="100" height="100" src="../../../ak_set/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
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
                <h5><b> Donation Register</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>Photo</th>
                                <th>Full Name</th> 
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>Date</th>
                                <th>Donation Amt</th>
                                <th>Towards</th>
                                <th>Mode</th>
                                <th>PAN</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for OP Case Sheet Table Starts =============================== -->
                            <?php 
                                $retStr = "";
                                try
                                {
                                    {
                                         $query="SELECT p.photo, p.full_name, p.at_post, p.mobile_no, d.do_payment_date, d.donation_paid, d.donation_towards, d.payment_mode, d.pan_number, d.user_id, d.do_donation_id FROM ak_p_registration p, ak_do_donation d WHERE p.person_id= d.person_id ";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  ( d.do_payment_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["payment_mode"]))
                                            if( $_GET["payment_mode"]!=="")
                                            {
                                                $query = $query .   " and ( d.payment_mode ='".  $_GET["payment_mode"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       $i =1;
                                       $donation_paid =0; 
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                               echo '<td align="center">' . $i . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../../ak_com/database/photos/'. $record[0] .'">  </td>';
                                                echo '<td align="center">' . $record[1] . '</td>';
                                                echo '<td align="center">' . $record[2] . '</td>';
                                                echo '<td align="center">' . $record[3] . '</td>';
                                                echo '<td align="center">' . $record[4] . '</td>';
                                                echo '<td align="right">' . $record[5] . '</td>';
                                                echo '<td align="center">' . $record[6] . '</td>';
                                                echo '<td align="center">' . $record[7] . '</td>';
                                                echo '<td align="center">' . $record[8] . '</td>';
                                                echo '<td align="center">' . $record[9] . '</td>';
                                            echo "</tr>";
                                            $i = $i+1;
                                            $donation_paid = $donation_paid + $record[5]; 
                                        }
                                        
                                            echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td colspan="6" style="font-weight: bold" align="right">Total Donation</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $donation_paid . '</td>';
                                                echo '<td align="center"></td>';
                                                echo '<td align="center"></td>';
                                                echo '<td align="center"></td>';
                                                echo '<td align="center"></td>';
                                            echo "</tr>";
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
                     <!--<td><a href="../Rt_cs_register.php">Back</a></td> -->
                    </div>
                    </div>
               <div class="container col-sm-0"></div>
        </form>
    </page>
    </body>
</html>
