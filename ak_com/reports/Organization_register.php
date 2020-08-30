<?php
	if(session_id() == '') 
		session_start();
	
	if($_SESSION['role']!=="Director")
	{
        echo "<script language='javascript'>alert('You do not have rights to use this page')</script>";
        header("location:../../index.php");
	}
		
?>
<?php include 'Ak_com_header.php';?>

<!--<script src="./assets/js/myjs/get_address.js"></script>-->

<title>Organization Register</title>

</head>
<body>

        <form action="" method="POST" class="form-inline" >
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Organization Register</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    Organization Register
				    </div>
                    <div class="panel-body">
                   <!--<div class="well">
                    </div>-->
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> Organization Register</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>ID</th>
                                <th>Logo</th>
                                <th>Main Name</th> 
                                <th>Org Slogan</th>
                                <th>Other Title</th>
                                <!--<th>Address</th>-->
                                <th>At Post</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Web</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for Donation Register Starts =============================== -->
                            <?php 
                                include( "../database/Config.php");
                                $data = new myConfig();

                                $retStr = "";
                                try
                                {
                                    $con = mysqli_connect($data->host, $data->user, $data->password,$data->db);
                                    if (!$con)
                                        echo('Could not connect: ' . mysql_error());
                                    else
                                    {
                                        mysqli_set_charset( $con, 'utf8' );

                                        $query="SELECT logo, main_name, org_slogan, other_title, address, at_post, residence_phone1, email, website, org_id FROM ak_organization_info WHERE 1";


                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       //$i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                               //echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left">' . $record[9] . '</td>';
                                                echo '<td align="left"><img width="50" height="50" class="img-rounded" src="../../ak_com/database/logos/'. $record[0] .'">  </td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="left">' . $record[2] . '</td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                //echo '<td align="left">' . $record[4] . '</td>';
                                                echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                echo '<td align="left">' . $record[7] . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
                                                
                                            echo "</tr>";
                                            //$i = $i+1;
                                        }
                                        
                                    }
                                }
                                catch(Exception $ex)
                                {
                                    echo "<script language='javascript'>alert('Error in Reading data')</script>";
                                }
                                mysqli_close ($con);
                            ?>
<!-- Php code for Donation Register Ends =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../organization_info.php">Go to Menu</a></td>
                    </div>
                    </div>
                </div>
                </div>
            </div>
<?php include'../../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html> 
