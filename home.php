<?php
if(session_id() == '') 
    session_start();
?>
<?php include'./ak_com/assets/home_header.php'; ?>

<title>Home</title>
</head> 
<body>
<!-- Php code for Header Starts =============================== -->
        <?php
            //create connection
            include_once('./ak_com/database/Config.php');
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
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        
        <div class="panel-group">
            <div class="panel panel-primary">
            <div class="panel-body">
                <h5 align="center" ><b> Registration </b><span class="text-muted"><?php echo 'from '.date("d-m-Y",strtotime("-30 days")) .' to '. date("d-m-Y");?></span> </h5>
                
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>ID</th>
                                <th>Photo</th>
                                <th>DOR</th>
                                <th>Full Name</th> 
                              <!--  <th>Gender</th>-->
                              <!--  <th>Date of Birth</th>-->
                               <!-- <th>Marital Status</th>-->
                                <th>Occupation</th>
                                <!--<th>Address</th>-->
                                <th>At Post</th>
                                <!--<th>Nation</th>
                                <th>State</th>
                                <th>District</th>
                                <th>Tahsil</th>-->
                                <th>Mobile No.</th>
                                <th>Email Address</th>
                                <th>Reference</th>
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

                            $perpage = 5;
                            if(isset($_GET['page']) & !empty($_GET['page'])){
                                $curpage = $_GET['page'];
                            }else{
                                $curpage = 1;
                            }
                            $start = ($curpage * $perpage) - $perpage;

                            $PageSql = "SELECT dor, photo, person_id, dor, full_name, gender, dob, marital_status, occupation, address, at_post, nation_name, state_name, district_name, tahsil_name, mobile_no, whatsapp_no, email, reference FROM ak_p_registration";
                            /*$PageSql = $PageSql . " and  ( dor between '". $from_date . "' and '".  $to_date . "')";*/

                            //echo $PageSql;

                            $pageres = mysqli_query($con, $PageSql);
                            $totalres = mysqli_num_rows($pageres);

                            $endpage = ceil($totalres/$perpage);
                            $startpage = 1;
                            $nextpage = $curpage + 1;
                            $previouspage = $curpage - 1;

                            $ReadSql = "SELECT dor, photo, person_id, dor, full_name, gender, dob, marital_status, occupation, address, at_post, nation_name, state_name, district_name, tahsil_name, mobile_no, whatsapp_no, email, reference FROM ak_p_registration LIMIT $start, $perpage";
                            /*$ReadSql = $ReadSql . " and  ( dor between '". $from_date . "' and '".  $to_date . "')";*/

                            //echo $ReadSql;

                            $res = mysqli_query($con, $ReadSql);

                           //$i =1;
                            while($record = mysqli_fetch_array($res))
                            {

                                 echo '<tr class="odd gradeX" style="font-size:13px" >';
                                    //echo '<td scope="row" align="left">' . $i . '</td>';
                                    echo '<td align="left">' . $record[2] . '</td>';
                                    echo '<td align="left"><img width="30" height="40" class="img-rounded" src="./ak_com/database/photos/'. $record[1] .'">  </td>';
                                    

                                    $dor = date('d-m-Y', strtotime($record[3])); //date format
                                    echo '<td align="left">' . $dor . '</td>';

                                   echo '<td align="left">' . $record[4] . '</td>';
                                   /* echo '<td align="left">' . $record[5] . '</td>';
                                    echo '<td align="left">' . $record[6] . '</td>';*/
                                    /*echo '<td align="left">' . $record[7] . '</td>';*/
                                    echo '<td align="left">' . $record[8] . '</td>';
                                   //echo '<td style="font-size:12px" align="center">' . $record[9] . '</td>';
                                    echo '<td align="left">' . $record[10] . '</td>';
                                    /*echo '<td align="left">' . $record[11] . '</td>';
                                    echo '<td align="left">' . $record[12] . '</td>';
                                    echo '<td align="left">' . $record[13] . '</td>';
                                    echo '<td align="left">' . $record[14] . '</td>';*/
                                    echo '<td align="left">' . $record[15] . '</td>';
                                    /*echo '<td align="left">' . $record[16] . '</td>';*/
                                    echo '<td align="left">' . $record[17] . '</td>';
                                    echo '<td align="left">' . $record[18] . '</td>';

                                echo "</tr>";
                                //$i = $i+1;
                            }

                        }
                    }
                    catch(Exception $ex)
                    {
                        echo "<script language='javascript'>alert('Error in Reading data')</script>";
                    }
                ?>
<!-- Php code for Donationt Table ends =============================== -->

                        </tbody>
                    </table>
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
                 <!--<td><a href="../Rt_cs_register.php">Back</a></td> -->
                    
                </div>
            </div>
        </div>
    </div>
<!-- Document Header End ================================================== --> 
        </div>
        <?php include'./ak_com/assets/index_footer.php'; ?>
        <div class="container col-sm-0">
    </div>
</form>
</div>
</body>
</html>