<?php
	if(session_id() == '') 
		session_start();
	
	if($_SESSION['role']!=="Director" && $_SESSION['role']!=="Account Staff")
	{
        echo "<script language='javascript'>alert('You do not have rights to use this page')</script>";
        header("location:../index.php");
	}
		
?>
<?php include 'ak_ac_header.php';?>

<!--<script src="./js/myjs/get_building_name_up.js"> </script>-->

<title>Accounts</title>

</head>
<body>

<!-- Php code for Header Starts =============================== -->
        <?php
            //create connection
            include_once('database/Config.php');
            $data = new myConfig();

            $con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
            //confirm connection
            if ($con)
            {
                //echo "1";
                mysqli_set_charset( $con, 'utf8' );

                $qryOrg="SELECT  logo, org_slogan, main_name, address, residence_phone1, website FROM ak_organization_info WHERE org_id=4";

                //echo $qryOrg;

                $resOrg = mysqli_query($con, $qryOrg);
                $recordOrg = mysqli_fetch_array($resOrg); 
            }
        ?>
<!-- Php code for Header Ends =============================== -->
        <form action="" method="POST" class="form-inline" >
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<!-- Document Header Start ================================================== -->
                <table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" height="100" src="../ak_com/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
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
   <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h5 align="center" ><b> Donations </b><span class="text-muted"><?php echo 'from '.date("d-m-Y",strtotime("-30 days")) .' to '. date("d-m-Y");?></span> </h5>
                
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
<!-- Php code for Donationt Table Starts =============================== -->
                            <?php 
                                $retStr = "";
                                try
                                {
                                    {
                                        $to_date = date("Y-m-d");
                                        $from_date = date("Y-m-d",strtotime("-30 days"));
                                        
                                        //echo 'From '.date("d-m-Y",strtotime("-30 days")) .' to '. date("d-m-Y");
                                        //echo "<br>"."<br>";
                                        
                                        $query="SELECT p.photo, p.full_name, p.at_post, p.mobile_no, d.do_payment_date, d.donation_paid, d.donation_towards, d.payment_mode, d.pan_number, d.user_id, d.do_donation_id FROM ak_p_registration p, ak_do_donation d WHERE p.person_id= d.person_id ";
                                        $query = $query . " and  ( d.do_payment_date between '". $from_date . "' and '".  $to_date . "')";

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       $i =1;
                                       $donation_paid =0; 
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                               echo '<td align="center">' . $i . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../ak_com/database/photos/'. $record[0] .'">  </td>';
                                                echo '<td align="center">' . $record[1] . '</td>';
                                                echo '<td align="center">' . $record[2] . '</td>';
                                                echo '<td align="center">' . $record[3] . '</td>';
                                            
                                                $date = $record[4];
                                                $do_payment_date = date("d-m-Y", strtotime($date));
                                                echo '<td align="center">' . $do_payment_date . '</td>';
                                            
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
<!-- Php code for Donationt Table ends =============================== -->
                        </tbody>
                    </table>
                     <!--<td><a href="../Rt_cs_register.php">Back</a></td> -->
                    </div>
                </div>
            </div> 
        </div>
    </div>
<?php include'../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>