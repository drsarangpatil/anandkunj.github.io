<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'ak_rt_header.php';?>

<script src="js/myjs/get_treatment_details.js"></script>

<title>Routine Male Treatment Chart</title>
<!--JS script for Printing-->
<script>
        function printRepo_a()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_routine_treat_m_chart.php", "reports/Rt_treat_chart.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }

</script>
</head>
<body>
    
<?php
    //create connection
    include_once('database/Config.php');
    $data = new myConfig();

    $con = mysqli_connect($data->host, $data->user,$data->password,$data->db);

        mysqli_set_charset( $con, 'utf8' );
    
    mysqli_set_charset( $con, 'utf8' );
    
        $perpage = 50;
        if(isset($_GET['page']) & !empty($_GET['page'])){
            $curpage = $_GET['page'];
        }else{
            $curpage = 1;
        }
        $start = ($curpage * $perpage) - $perpage;

        $query="SELECT DISTINCT p.full_name, p.photo, p.gender, c.rt_case_sheet_id, p.person_id FROM ak_p_registration p, ak_rt_case_sheet c WHERE c.ad_status='Admitted' and  p.person_id= c.person_id";
        $query=$query . " and p.gender='Male'";
    
        //echo $Pagequery

        $pageres = mysqli_query($con, $query);
        $totalres = mysqli_num_rows($pageres);

        $endpage = ceil($totalres/$perpage);
        $startpage = 1;
        $nextpage = $curpage + 1;
        $previouspage = $curpage - 1;
    
        $query="SELECT DISTINCT p.full_name, p.photo, p.gender, c.rt_case_sheet_id, p.person_id FROM ak_p_registration p, ak_rt_case_sheet c WHERE c.ad_status='Admitted' and  p.person_id= c.person_id";
        $query=$query . " and p.gender='Male' LIMIT $start, $perpage";

        $return = mysqli_query($con, $query);

        $num=mysqli_num_rows($return);
?> 
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <form action="database/Rt_routine_treat_m_chart.php" method="post" class="form-inline">
           <!--<h4 align="left"><b> Routine Male Treatment Chart : <span><?php echo date("d-m-Y");?></span></b></h4>-->
            <h4 align="left"><b> Routine Male Treatment Chart</b></h4>
            
<!-- Fetched Address Records Pannel starts ======================================= -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <!--<div class="panel-heading">
                        Routine Male Treatment Chart 
                    </div>-->
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="view_table">
                            <thead>
                            <tr style="font-size:13px"> 
                               <th>#</th>
                                <th>Full Name</th>
                                <th>Photo</th>
                                <!--<th>Gender</th>-->
                                <th>Illness</th>
                                <th>Room</th>
                                <!--<th>Day</th>-->
                                <th>Date</th>
                                <th>Time</th>
                                <th width="20%">Treatment Name</th>
                                <th>Therapist</th>
                                
                                <th>Inst</th>
                                <!--<th>Dept</th>-->
                                <!--<th>Date</th>-->
                            </tr>
                        </thead>
                        <?php
                            for($i=1;$i<=$num;$i++) // means this loop will run for <=$num times.
                            {   // loops body starts
                            $row=mysqli_fetch_array($return); 
                           ?> 

                            <tbody>
                                <tr>
                                   <td align="left"><?php echo $i; ?></td>
                                   <td align="left"><?php echo $row['full_name']; ?></td>
                                   <td width="5%" align="center">
                                       <img width="30" height="40" class="img-rounded" src="../ak_com/database/photos/<?php echo $row['photo'];?>">
                                   </td>
                                    <?php
                                        $qryDis="SELECT disease_nick FROM ak_rt_case_sheet_fd WHERE rt_case_sheet_id ='" . $row['rt_case_sheet_id'] ."' ";

                                        $resDis = mysqli_query($con, $qryDis);
                                        $dis="";
                                        while($recordDis = mysqli_fetch_array($resDis))
                                        {
                                            $dis =  $dis.$recordDis[0] . "</br>";
                                        }
                                    ?>
                                    <td align="left"><?php echo $dis ; ?></td>
                                    
                                    <?php
                                        $qryRom="SELECT room_number FROM ak_rt_room_allocation WHERE rt_case_sheet_id ='" . $row['rt_case_sheet_id'] ."' ";
                                        $resRom = mysqli_query($con, $qryRom);
                                        $rom="";
                                        while($recordRom = mysqli_fetch_array($resRom))
                                        {
                                            $rom =  $rom.$recordRom[0] . "</br>";
                                        }
                                    ?>
                                    <td align="left"><?php echo $rom ; ?></td>
                                    <td style="display:none;">
                                        <input type="text" 
                                                name="rt_case_sheet_id<?php echo $i; ?>" 
                                                value="<?php echo $row['rt_case_sheet_id']; ?>"/>
                                        
                                    <td style="display:none;"> 
                                        <input type="text"  
                                                name="person_id<?php echo $i; ?>" 
                                                value="<?php echo $row['person_id']; ?>"/> 
                                    </td>
                                    <td style="display:none;"> 
                                        <input type="text"  
                                                name="user_id<?php echo $i; ?>" 
                                                value="<?php echo $_SESSION['user_id']; ?>"/> 
                                    </td>
                                    <td align="left">
                                        <input type="date" class="form-control" id= "daily_date" name="daily_date<?php echo $i; ?>">
                                    </td>
                                    <!--<td style="display:none;"> 
                                        <input type="text" 
                                                name="daily_date<?php echo $i; ?>" 
                                                value="<?php echo date("Y-m-d");?>"/>
                                    </td>-->
                                    <td style="display:none;">
                                        <input type="text" 
                                                name="schedule<?php echo $i; ?>" 
                                                value="Morning"/>
                                    </td>
                                    <td style="display:none;">
                                        <input type="text" name="therapy_dept<?php echo $i; ?>" value="MTS"/>
                                    </td>
                                    
                                    <td align="left">
                                        <select class="form-control" id="treatment_time" name="treatment_time<?php echo $i; ?>" required> <option value=""></option><option value="09:00 AM">09:00 AM</option><option value="09:30 AM">09:30 AM</option><option value="10:00 AM">10:00 AM</option><option value="10:30 AM">10:30 AM</option><option value="11:00 AM">11:00 AM</option><option value="11:30 AM">11:30 AM</option><option value="12:00 PM">12:00 PM</option><option value="12:30 PM">12:30 PM</option><option value="01:00 PM">01:00 PM</option>
                                        </select>
                                    </td>
                                    <td align="left">
                                        <select class="form-control" id="treatment_name" name="treatment_name<?php echo $i; ?>" required> <option value=""></option><option value="मालीश + स्टीम">मालीश + स्टीम</option><option value="मालीश + भूगर्भ">मालीश + भूगर्भ</option><option value="मालीश + मृतिका स्नान">मालीश + मृतिका स्नान</option>
                                        <option value="मालीश + प्लेन स्नान">मालीश + प्लेन स्नान</option>
                                        </select>
                                    </td>
                                    <td align="left">
                                        <input type="text" size="7" list="staff_short_names" class="form-control" id= "therapist_name" name="therapist_name<?php echo $i; ?>">
                                        <datalist id="staff_short_names" name="therapist_name<?php echo $i; ?>">
                                        <option value="">
                                        </datalist>
                                    </td>
                                    <td align="left">
                                        <input type="text" size="3" class="form-control" id= "treat_instructions" name="treat_instructions<?php echo $i; ?>">
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                                } // loops body ends
                            ?>
                        </table>
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
<!-- Fetched Address Records Pannel Ends ==================================== -->
        <div class="form-group col-sm-8">
            <div class="form-group" >
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-info" href="rt_daily_health_record_up.php">Update Morning Tx</a>
            </div>
            <div class="form-group" >
                <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Treatment Chart</button>
            </div>
        </div>
    
        <?php include'../ak_com/assets/index_footer.php'; ?>
        <div class="container col-sm-0">
    </div>
</form>
</div>
</div>
</body>
</html>

