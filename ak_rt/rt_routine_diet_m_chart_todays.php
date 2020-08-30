<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'ak_rt_header.php';?>

<script src="js/myjs/get_diet_name.js"></script>

<title>Male Diet Chart</title>
<!--JS script for Printing-->
<script>
        function printRepo_a()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_routine_diet_m_chart_todays.php", "reports/Rt_daily_diet_chart.php");
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

        $query="SELECT DISTINCT p.full_name, p.photo, p.gender, c.rt_case_sheet_id, p.person_id FROM ak_p_registration p, ak_rt_case_sheet c WHERE c.ad_status='Admitted' and  p.person_id= c.person_id";
        $query=$query . " and p.gender='Male'";

        $return = mysqli_query($con, $query);

        $num=mysqli_num_rows($return);
?> 
    
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <form action="database/Rt_routine_diet_m_chart_todays.php" method="post" class="form-inline">
           <h4 align="left"><b> Male Diet Chart : <span><?php echo date("d-m-Y");?></span></b></h4>
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
                                <th>Morning Diet</th>
                                <th>Noon Diet</th>
                                <th>Afternoon Diet</th>
                                <th>Evening Diet</th>
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
                                    <td style="display:none;"> 
                                        <input type="text" 
                                                name="daily_date<?php echo $i; ?>" 
                                                value="<?php echo date("Y-m-d");?>"/>
                                    </td>
                                    <td style="display:none;">
                                        <input type="text" 
                                                name="schedule<?php echo $i; ?>" 
                                                value="Morning"/>
                                    </td>
                                    <td align="left">
                                        <input type="text" size="10" list="morning_diets" class="form-control" id= "morning_diet" name="morning_diet<?php echo $i; ?>">
                                        <datalist id="morning_diets" name="morning_diet<?php echo $i; ?>">
                                        <option value="">
                                    </datalist>
                                    </td>
                                    <td align="left">
                                        <input type="text" size="10" list="noon_diets" class="form-control" id= "noon_diet" name="noon_diet<?php echo $i; ?>">
                                        <datalist id="noon_diets" name="noon_diet<?php echo $i; ?>">
                                        <option value="">
                                    </datalist>
                                    </td>
                                    <td align="left">
                                        <input type="text" size="10" list="afternoon_diets" class="form-control" id= "afternoon_diet" name="afternoon_diet<?php echo $i; ?>">
                                        <datalist id="afternoon_diets" name="afternoon_diet<?php echo $i; ?>">
                                        <option value="">
                                    </datalist>
                                    </td>
                                    <td align="left">
                                        <input type="text" size="10" list="evening_diets" class="form-control" id= "evening_diet" name="evening_diet<?php echo $i; ?>">
                                        <datalist id="evening_diets" name="evening_diet<?php echo $i; ?>">
                                        <option value="">
                                    </datalist>
                                    </td>
                                    <td align="left">
                                        <input type="text" size="3" class="form-control" id= "instruc" name="instruc<?php echo $i; ?>">
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                                } // loops body ends
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched Address Records Pannel Ends ==================================== -->
        <div class="form-group col-sm-8">
            <div class="form-group" >
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-info" href="rt_daily_health_record_up.php">Update Diet Chart</a>
            </div>
            <div class="form-group" >
                <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Diet Chart</button>
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

