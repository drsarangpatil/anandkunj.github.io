<html lang="en">
    <head>
        <title> Print All Magazine Payment Register</title>
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

                $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=2";

                //echo $qryOrg;

                $resOrg = mysqli_query($con, $qryOrg);
                $recordOrg = mysqli_fetch_array($resOrg); 
            }
        ?>
<!-- Php code for Header Ends =============================== -->
        <form action="" method="POST" class="form-inline" >
            <div class="container col-sm-0">
            </div>
                <div class="container col-sm-12">
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
                <h4 align="center"><b> All Magazine Payment Register</b></h4> <p align="center"><b>(Magazine Name: <?php echo $_GET["magazine_name"];?>; Subscription Type: <?php echo $_GET["subscription_type"];?>; Mode of Payment: <?php echo $_GET["payment_mode"];?>; Payment Date: from <?php echo $_GET["from_date"];?>  to <?php echo $_GET["to_date"];?>)</b></p> 
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                               <th>ID</th>
                                <th>Pay Date</th>
                                <th>Sub Type</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>At Post</th>
                                <th>Mobile</th>
                                <th>Sub Amount</th>
                                <th>Amount Paid</th>
                                <th>Mode</th>
                                <th>Pay Details</th>
                                <th>Magazine</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for OP Case Sheet Table Starts =============================== -->
                            <?php 
                                $retStr = "";
                                try
                                {
                                    {
                                        $query="SELECT Distinct p.full_name, r.sb_payment_id, r.sb_payment_date, s.subscription_type, p.photo,  p.at_post, p.mobile_no, s.subscription_amount, r.amount_paid, r.payment_mode, r.payment_details, s.magazine_name FROM ak_p_registration p, ak_sb_subscription_form s, ak_sb_payment r WHERE p.person_id= s.person_id";
                                        $query = $query . " and s.sb_subscription_id  = r.sb_subscription_id";
                                        //$query = $query . " and p.person_id  = s.person_id";
                                        

                                         if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (r.sb_payment_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["payment_mode"]))
                                            if( $_GET["payment_mode"]!=="")
                                            {
                                                $query = $query .   " and ( r.payment_mode ='".  $_GET["payment_mode"] . "')  "; 
                                            }
                                        if( isset($_GET["subscription_type"]))
                                            if( $_GET["subscription_type"]!=="")
                                            {
                                                $query = $query .   " and ( s.subscription_type ='".  $_GET["subscription_type"] . "')  "; 
                                            }
                                       //echo $query;

                                        $response = mysqli_query($con, $query);

                                        $totalSub_amt =0;
                                        $totalPay_amt =0;
                                        while($record = mysqli_fetch_array($response))
                                        {
                                         echo '<tr class="odd gradeX" style="font-size:13px" >';
                                            echo '<td align="center">' . $record[1] . '</td>';
                                            echo '<td align="left">' . $record[2] . '</td>';
                                            echo '<td align="left">' . $record[3] . '</td>';
                                            echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../../ak_com/database/photos/'. $record[4] .'">  </td>';
                                            echo '<td align="left">' . $record[0] . '</td>';
                                            echo '<td align="left">' . $record[5] . '</td>';
                                            echo '<td align="left">' . $record[6] . '</td>';
                                            echo '<td align="right">' . $record[7] . '</td>';
                                            echo  '<td align="right">' . $record[8] . '</td>';
                                            echo '<td align="left">' . $record[9] . '</td>';
                                            echo '<td align="left">' . $record[10] . '</td>';
                                            echo '<td align="left">' . $record[11] . '</td>';
                                        echo "</tr>";
                                        $totalSub_amt = $totalSub_amt + $record[7];
                                        $totalPay_amt = $totalPay_amt + $record[8];
                                        }
                                        echo '<tr class="odd gradeX" style="font-size:13px" >';
                                            echo '<td colspan="6" align="center"></td>';
                                            /*echo '<td align="left"></td>';
                                            echo '<td align="left"></td>';
                                            echo '<td align="left"></td>';
                                            echo '<td align="left"></td>';
                                            echo '<td align="left"></td>';*/
                                            echo '<td style="font-weight: bold" align="right">Total</td>';
                                            echo '<td style="font-weight: bold" align="right">' . $totalSub_amt . '</td>';
                                            echo '<td style="font-weight: bold" align="right">' . $totalPay_amt . '</td>';
                                            echo '<td align="left"></td>';
                                            echo '<td align="left"></td>';
                                            echo '<td align="left"></td>';
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
                     <!--<td><a href="../Op_cs_report.php">Back</a></td> -->
                    </div>
                    </div>
               <div class="container col-sm-0"></div>
            </form>
        </page>
    </body>
</html>
