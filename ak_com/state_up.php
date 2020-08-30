<?php
	if(session_id() == '') 
		session_start();
?>
<?php
	//create connection
	include_once('database/Config.php');
    $data = new myConfig();

	$con = mysqli_connect($data->host, $data->user,$data->password,$data->db);

		mysqli_set_charset( $con, 'utf8' );
        
        $perpage = 5;
        if(isset($_GET['page']) & !empty($_GET['page'])){
            $curpage = $_GET['page'];
        }else{
            $curpage = 1;
        }
        $start = ($curpage * $perpage) - $perpage;

        $Pagequery="SELECT * FROM ak_states";

        //echo $Pagequery

        $pageres = mysqli_query($con, $Pagequery);
        $totalres = mysqli_num_rows($pageres);

        $endpage = ceil($totalres/$perpage);
        $startpage = 1;
        $nextpage = $curpage + 1;
        $previouspage = $curpage - 1;

        $Readquery="SELECT * FROM ak_states LIMIT $start, $perpage";

        //echo $query;
        //run query 
        $return = mysqli_query($con, $Readquery);
        
        $num=mysqli_num_rows($return);		
?>
<?php include 'ak_com_home_header.php';?>

<title>Update State Names</title>
</head>
<body>


<form action="database/State_up.php" method="post">
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
           <h4><b>Update State Names</b></h4>

<!-- Fetched Address Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">

                    <div class="panel-heading">
                        All State Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="view_table">

                            <thead>
                                <tr>                                                           <th>State ID</th>
                                    <th>Nation</th>
                                    <th>State</th>
                                </tr>
                            </thead>
                        <?php
                            for($i=1;$i<=$num;$i++) // means this loop will run for <=$num times.
                            {   // loops body starts
                            $row=mysqli_fetch_array($return); 
                           ?> 

                            <tbody>
                                <tr>
                                    <td><?php echo $row['state_id']; ?>
                                        <input type="hidden" 
                                                name="state_id<?php echo $i; ?>" 
                                                value="<?php echo $row['state_id']; ?>"/>
                                    </td> <!--this is unique id hence non-editable and sending here as hidden-->
                                    <td> <input type="text"  
                                                name="nation_name<?php echo $i; ?>" 
                                                value="<?php echo $row['nation_name']; ?>"/> 
                                    </td>
                                    <td><input type="text" 
                                               name="state_name<?php echo $i; ?>" 
                                               value="<?php echo $row['state_name']; ?>"/>
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
<!-- Fetched Address Records Pannel Ends ====================================== -->
            <div class="form-group col-sm-8">
                <div class="form-group" >
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-info" href="state.php">Add State</a>
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

