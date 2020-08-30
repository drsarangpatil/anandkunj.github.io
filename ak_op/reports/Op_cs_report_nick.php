<?php
if(session_id() == '') 
    session_start();
?>
<?php include 'Ak_op_header.php';?>

<title>OP Case Sheet Report with Short Name</title>

</head>
<body>
       
    <script>
// JS script for display button   
        function dispRepo()
        {
            url ="";
            url += "Op_cs_report_nick.php?at_post=" + document.getElementById("at_post").value;
            url += "&gender=" + document.getElementById("gender").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
           /* url += "&disease_name=" + document.getElementById("disease_name").value;*/
            location.replace(url);

            //alert("sadsad");
        }
// JS script for print button         
        function printRepo()
        {
            url ="";

            url=document.URL;
            url=url.replace("Op_cs_report.php", "print/Op_cs_report_print.php");
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

                $.ajax
                (
                    {
                        url: '../../ak_com/database/ajax/Get_disease_name.php',		// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getDisease_name" },			   // what exactly required 

                        success: function (data) 
                        {
                            //alert("Success : " + data);
                            $("#disease_name").html(data);				// to set fetched data
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
                   <h4><b> OP Case Sheet Register with Disease Nick Name</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    OP Case Sheet Register
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                       <!-- <div class="form-group col-sm-5">
                                <label>Disease Name:</label>
                                <div class="form-group" >
                                    <select class="form-control" 
                                    id="disease_name" name="disease_name">
                                    <option></option>
                                    </select>
                                </div>
                        </div>-->
                        <div class="form-group col-sm-4">
                            <label>Gender:</label>
                            <div class="form-group" >
                                <select class="form-control" 
                                id="gender" name="gender">
                                <option></option>
                                <option>Male</option>
                                <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                                <label>Place:</label>
                                <div class="form-group" >
                                    <select class="form-control" 
                                    id="at_post" name="at_post">
                                    <option></option>
                                    </select>
                                </div>
                        </div>
                    </div>
                        <div class="media">
                        <div class="form-group col-sm-4">
                            <label>From Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="from_date" name="from_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>To Date:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="to_date" name="to_date" required>
                            </div>
                        </div>
                         <div class="form-group col-sm-2">
                            <label></label>
                            <div class="form-group" >
                                <button type="button"class="btn btn-primary" onclick="dispRepo()"> Display
								</button>
                            </div>
                        </div>
                        <!--<div class="form-group col-sm-2">
                            <label></label>
                            <div class="form-group" >
                                <button type="button"class="btn btn-primary" onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Print
								</button>
                            </div>
                        </div>-->
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> OP Case Sheet Register</b></h5><p style= "color:slateBlue"> For OP Case-Sheet Print Ctrl+Click Full Name </p>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>Photo</th>
                                <th>Full Name</th> 
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                
                                <th>CS-ID</th>
                                <th>CS-Date</th>
                                <th>Nature of Illness</th>
                                <th>Doctor</th>
                            </tr>
                        </thead>
                        <tbody>
 <!-- Php code for OP Case Sheet Table Starts =============================== -->  
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

                                        $query="SELECT p.photo, p.full_name, p.gender, p.dob, p.address, p.at_post, p.mobile_no,  c.op_case_sheet_id, c.case_paper_date, c.user_id FROM ak_p_registration p, ak_op_case_sheet c WHERE p.person_id= c.person_id ";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (c.case_paper_date between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["gender"]))
                                            if( $_GET["gender"]!=="")
                                            {
                                                $query = $query .   " and ( p.gender ='".  $_GET["gender"] . "')  "; 
                                            }
                                       /* if( isset($_GET["disease_name"]))
                                            if( $_GET["disease_name"]!=="")
                                            {
                                                $query = $query .   " and ( d.disease_name ='".  $_GET["disease_name"] . "')  "; 
                                            }*/

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                        $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[0] .'">  </td>';
                                                echo '<td align="left"><a href= "print/Op_case_sheet_print.php?csid=' .$record[7] . '">' . $record[1] . '</a></td>';
                                                echo '<td align="left">' . $record[2] . '</td>';
                                            
                                                $bday = new DateTime($record[3]); // Your date of birth
                                                $today = new Datetime(date('m.d.y'));
                                                $diff = $today->diff($bday);
                                                echo '<td align="left">' . $diff->y . '</td>';
                                            
                                            
                                                echo '<td style="font-size:12px" align="left">' . $record[4] . '</td>';
                                                echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                            
                                                echo '<td align="left">' . $record[7] . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
                                            
                                                $qryDis="SELECT disease_name, disease_nick FROM ak_op_case_sheet_fd WHERE op_case_sheet_id ='" . $record[7] ."' ";
                                            
                                                $resDis = mysqli_query($con, $qryDis);
                                                $dis="";
                                                while($recordDis = mysqli_fetch_array($resDis))
                                                {
                                                    $dis =  $dis.$recordDis[0] . ' (' . $recordDis[1]. ')' ."</br>";
                                                }
                                                /*$dis=substr( $dis,0,strlen($dis)-2);*/
                                                echo '<td align="left">' . $dis . '</td>';
                                            
                                            
                                                echo '<td align="left">' . $record[9] . '</td>';
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
<!-- Php code for OP Case Sheet Table Ends =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../op_case_sheet.php">Go to Menu</a></td>
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
