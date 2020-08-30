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

<title>Staff Register</title>

</head>
<body>
     
<script>
// JS script for display button========>       
        function dispRepo()
        {
            url ="";

            url += "Organization_register.php?at_post=" + document.getElementById("at_post").value;
            url += "&payment_mode=" + document.getElementById("payment_mode").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            
            url=document.URL;
            url=url.replace("Organization_register.php", "print/Organization_register_print.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }

// JQ script for AJAX Call ===========-> 			
        $(document).ready
        (
            function () 
            {	
                $.ajax
                (
                    {
                        url: '../../ak_com/database/ajax/Get_place.php',		// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getPlace" },			   // what exactly required 

                        success: function (data) 
                        {
                            //alert("Success : " + data);
                            $("#at_post").html(data);				// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }
                );
            }
        ); 
// JQ script for AJAX Call Ends =========> 
    </script>
    
        <form action="" method="POST" class="form-inline" >
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Staff Register</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    Staff Register
				    </div>
                    <div class="panel-body">
                   <!--<div class="well">
                    </div>-->
<!-- Filters for Sorting Columns Ends ============================================= -->
                <h5><b> Staff Register</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>Photo</th>
                                <th>Full Name</th> 
                                <th>Nick</th>
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>DOJ</th>
                                <th>Qualification</th>
                                <th>Dept</th>
                                <th>Designation</th>
                                <th>Role</th>
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

                                        
                                        $query="SELECT p.photo, p.full_name, d.staff_short_name, p.at_post, p.mobile_no, d.doj, d.qualifcation1, d.name_of_dept, d.designation, d.role FROM ak_p_registration p, ak_staff_other_info d WHERE p.person_id= d.person_id ";
                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {
                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                               echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left"><img width="40" height="50" class="img-rounded" src="../../ak_com/database/photos/'. $record[0] .'">  </td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="left">' . $record[2] . '</td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left">' . $record[4] . '</td>';
                                                echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                echo '<td align="left">' . $record[7] . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
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
<!-- Php code for Donation Register Ends =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../staff_other_info.php">Go to Menu</a></td>
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
