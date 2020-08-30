<html lang="en">
    <head>
        <title>OP Payment Report Print</title>
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
                <h5><b>OP Payment Report</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                           <tr style="font-size:13px"> 
                                
                                <th>#</th>
                                <th>Date</th>
                                <th>Photo</th>
                                <th>Full Name</th> 
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                
                                <th>Total Bill</th>
                                <th>Amount Paid</th>
                                <th>Balance</th>
                                <th>P Mode</th>
                                <th>P Status</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for OP Case Sheet Table Starts =============================== -->
                           <?php 
                                $retStr = "";
                                try
                                {
                                    {
                                       $query="SELECT y.op_payment_date, p.photo, p.full_name, p.at_post, p.mobile_no, c.op_case_sheet_id, y.op_case_sheet_id, y.payable_amount, y.amount_paid, y.balance_amount, y.payment_mode, y.payment_status, y.op_payment_id FROM ak_p_registration p, ak_op_case_sheet c, ak_op_payment y WHERE p.person_id= c.person_id  and c.op_case_sheet_id= y.op_case_sheet_id";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (y.op_payment_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        
                                        if( isset($_GET["payment_mode"]))
                                            if( $_GET["payment_mode"]!=="")
                                            {
                                                $query = $query .   " and ( y.payment_mode ='".  $_GET["payment_mode"] . "')  "; 
                                            }
                                        
                                        if( isset($_GET["full_name"]))
                                            if( $_GET["full_name"]!=="")
                                            {
                                                $query = $query .   " and ( p.full_name ='".  $_GET["full_name"] . "')  "; 
                                            }
                                        if( isset($_GET["payment_status"]))
                                            if( $_GET["payment_status"]!=="")
                                            {
                                                $query = $query .   " and ( payment_status ='".  $_GET["payment_status"] . "')  "; 
                                            }

                                       //echo $query;

                                        $response = mysqli_query($con, $query);

                                        $i =1;                                       
                                        $tobill_amt =0; 
                                        $paid_amt =0; 
                                        $bal_amt =0;
                                        while($record = mysqli_fetch_array($response))
                                        {
                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="center">' . $i . '</td>';
                                                echo '<td align="center">' . $record[0] . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../../ak_com/database/photos/'. $record[1] .'">  </td>';
                                                echo '<td align="left"><a href= "print/Op_receipt_print.php?pyid=' .$record[12] . '">' . $record[2] . '</a></td>';
                                                echo '<td align="center">' . $record[3] . '</td>';
                                                echo '<td align="center">' . $record[4] . '</td>';
                                                /*echo '<td align="center">' . $record[5] . '</td>';*/
                                                /*echo '<td align="center">' . $record[6] . '</td>';*/
                                                echo '<td align="right">' . $record[7] . '</td>';
                                            
                                                echo '<td align="right">' . $record[8] . '</td>';
                                                echo '<td align="right">' . $record[9] . '</td>';
                                                echo '<td align="center">' . $record[10] . '</td>';
                                                echo '<td align="center">' . $record[11] . '</td>';
                                               /* echo '<td align="center">' . $record[12] . '</td>';*/
                                            echo "</tr>";
                                            $i = $i+1;
                                            $tobill_amt = $tobill_amt + $record[7]; 
                                            $paid_amt =$paid_amt + $record[8]; 
                                            $bal_amt =$bal_amt + $record[9];
                                        }
                                            echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td colspan="6" style="font-weight: bold" align="right">Total</td>';
                                                /*echo '<td align="center"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="left"></td>';
                                                echo '<td align="center"></td>';
                                                echo '<td align="center"></td>';*/
                                                /*echo '<td align="center"></td>';*/
                                                /*echo '<td align="center"></td>';*/
                                                echo '<td style="font-weight: bold" align="right">' . $tobill_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $paid_amt . '</td>';
                                                echo '<td style="font-weight: bold" align="right">' . $bal_amt . '</td>';
                                                echo '<td align="center"></td>';
                                                echo '<td align="center"></td>';
                                               /* echo '<td align="center"></td>';*/
                                            echo "</tr>";
                                    }
                                }
                                catch(Exception $ex)
                                {
                                    echo "<script language='javascript'>alert('Error in Reading data')</script>";
                                }
                                mysqli_close ($con);
                            ?>
<!-- Php code for OP Case Sheet Table Ends =============================== -->
                        </tbody>
                    </table>
                    <!--<td><a href="../Op_payment_report.php">Back</a></td>-->
                    </div>
                    </div>
               <div class="container col-sm-0"></div>
            </form>
        </page>
    </body>
</html>
