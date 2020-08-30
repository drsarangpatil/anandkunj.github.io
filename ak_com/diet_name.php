<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_com_header.php';?>

<title>Diet Name</title>

</head>
<body>
<form action="database/Diet_name.php" method="post">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
       <h4><b>Add Diet Menu</b></h4>
<!-- Form Information ================================================== -->
        <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Add Diet Name
            </div>
            <div class="panel-body">
                   <div class="form-group">
                        <label>Diet Name:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" 
                                   id="diet_name" name="diet_name"
                                   placeholder="Soya Coffee/ Moog Soup/ Raw Salad">
                        </div>
                    </div>
                </div>
            </div>
       </div>
<!-- Form Information Pannel Ends================================= -->
      <div class="panel-body">
        <div class="form-group col-sm-10">
            <div class="form-group" >
                <button type="submit" class="btn btn-primary">Submit</button>
             </div>
        </div>
        <div class="form-group col-sm-2">
            <div class="form-group" >
                <a class="btn btn-info pull-right" href="diet_name_up.php">Edit Diet Name</a>
             </div>
        </div>                
      </div>
        
 <!-- Table Pannel starts================================= -->     
<div class="panel-group">
    <div class="panel panel-primary">
        <div class="panel-body">
            <h4 align="left"><b> List of Diet Names </b> </h4>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover" 
                    id="dataTables-example">
                    <thead>
                        <tr style="font-size:13px">
                            <!--<th>#</th>-->
                            <th>Diet ID</th>
                            <th>Diet Name</th>
                            <!--<th>Action</th>-->
                        </tr>
                    </thead>
                    <tbody>
<!-- Php code for Donationt Table Starts =============================== -->
                    <?php 
                        
                    include_once('database/Config.php');
                    $data = new myConfig();
                    $con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
                    mysqli_set_charset( $con, 'utf8' );
                        
                    $retStr = "";
                    try
                    {
                        {
                            $perpage = 5;
                            if(isset($_GET['page']) & !empty($_GET['page'])){
                                $curpage = $_GET['page'];
                            }else{
                                $curpage = 1;
                            }
                            $start = ($curpage * $perpage) - $perpage;
                            
                            $Pagequery="SELECT * FROM ak_diet_name";
                            
                            //echo $Pagequery

                            $pageres = mysqli_query($con, $Pagequery);
                            $totalres = mysqli_num_rows($pageres);

                            $endpage = ceil($totalres/$perpage);
                            $startpage = 1;
                            $nextpage = $curpage + 1;
                            $previouspage = $curpage - 1;
                            
                            $Readquery="SELECT * FROM ak_diet_name LIMIT $start, $perpage";
                           
                            
                            $response = mysqli_query($con, $Readquery);

                           //$i =1;
                            while($record = mysqli_fetch_array($response))
                            {

                                 echo '<tr class="odd gradeX" style="font-size:13px" >';
                                    //echo '<td align="left">' . $i . '</td>';
                                    echo '<td align="left">' . $record[0] . '</td>';
                                    echo '<td align="left">' . $record[1] . '</td>';
                                
                                    /*echo '<td align="right">
                                    
                                    <a class="btn btn-info href= "print/Op_case_sheet_print.php?id=' .$record[0] . '"> Edit </a>
                                    
                                    <a class="btn btn-info href= "print/Op_case_sheet_print.php?id=' .$record[0] . '"> Delete </a> 
                                    
                                    </td>';*/
                                
                                
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

                    </tbody>
                </table>
                </div>
            </div>
        </div>
<!-- Php code for Table ends =============================== -->
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
<?php include'../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>                   
                    
