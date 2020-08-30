<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_sb_header.php';?>

<title>Subscription</title>

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

                $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=2";

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
                <h5 align="center" ><b> Subscriptions </b><span class="text-muted"><?php echo 'from '.date("d-m-Y",strtotime("-90 days")) .' to '. date("d-m-Y");?></span> </h5>
                
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Sub Status</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>Magazine</th>
                                <th>Sub Type</th>
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
                                        $from_date = date("Y-m-d",strtotime("-90 days"));
                                                                                
                                        $perpage = 10;
                                        if(isset($_GET['page']) & !empty($_GET['page'])){
                                            $curpage = $_GET['page'];
                                        }else{
                                            $curpage = 1;
                                        }
                                        $start = ($curpage * $perpage) - $perpage;

                                        $Pagequery="SELECT s.sb_subscription_id, s.dos, s.doc, s.sub_status, p.photo, p.full_name, p.address, p.at_post, p.mobile_no,  s.magazine_name, s.subscription_type FROM ak_p_registration p, ak_sb_subscription_form s WHERE p.person_id= s.person_id ";
                                        $Pagequery = $Pagequery . " and  ( s.dos between '". $from_date . "' and '".  $to_date . "')";

                                        //echo $Pagequery

                                        $pageres = mysqli_query($con, $Pagequery);
                                        $totalres = mysqli_num_rows($pageres);

                                        $endpage = ceil($totalres/$perpage);
                                        $startpage = 1;
                                        $nextpage= $curpage + 1;
                                        $previouspage = $curpage - 1;

                                        $Readquery="SELECT s.sb_subscription_id, s.dos, s.doc, s.sub_status, p.photo, p.full_name, p.address, p.at_post, p.mobile_no,  s.magazine_name, s.subscription_type FROM ak_p_registration p, ak_sb_subscription_form s WHERE p.person_id= s.person_id ";
                                        $Readquery = $Readquery . " and  ( s.dos between '". $from_date . "' and '".  $to_date . "') LIMIT $start, $perpage";
                                        
                                        //echo $Readquery;

                                        $response = mysqli_query($con, $Readquery);
                                        
                                       $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                //echo '<td align="center">' . $i . '</td>';
                                                echo '<td align="left">' . $record[0] . '</td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="left">' . $record[2] . '</td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../ak_com/database/photos/'. $record[4] .'">  </td>';
                                                echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                echo '<td align="left">' . $record[7] . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
                                                echo '<td align="left">' . $record[9] . '</td>';
                                                echo '<td align="left">' . $record[10] . '</td>';
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
<!-- Php code for Donationt Table ends =============================== -->
                        </tbody>
                    </table>
                     <!--<td><a href="../Rt_cs_register.php">Back</a></td> -->
                    </div>
                </div>
<!-- Pagination Code Start =============================== -->
                 <nav aria-label="Page navigation">
                    <ul class="pagination navbar-right">
                        <!--<li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>-->
                        <?php if($curpage != $startpage){ ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span>First</span> 
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($curpage >= 2){ ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
                        <?php } ?>
                        <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
                        <?php if($curpage != $endpage){ ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                        <li class="page-item">
                          <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span>Last</span>
                          </a>
                        </li>
                        <?php } ?>
                        <!--<li class="page-item">
                          <a class="page-link" href="#">Next</a>
                        </li>-->
                    </ul>
                </nav>
<!-- Pagination Code End=============================== -->
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