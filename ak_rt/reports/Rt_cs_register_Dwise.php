<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_rt_header.php';?>

<!--<script src="./assets/js/myjs/get_address.js"></script>-->

<title>Disease-wise RT CS Register</title>

</head>
<body>
        
    <script>
// JS script for display button========>       
        function dispRepo()
        {
            url ="";
            url += "Rt_cs_register_Dwise.php?at_post=" + document.getElementById("at_post").value;
            url += "&retreat_name=" + document.getElementById("retreat_name").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&ad_status=" + document.getElementById("ad_status").value;
            url += "&disease_name=" + document.getElementById("disease_name").value;
            location.replace(url);
            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Rt_cs_register_Dwise.php", "print/Rt_cs_register_Dwise_print.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }
        
// JS script for Aprint button=========>         
        function aprintRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Rt_cs_register_Dwise.php", "print/Rt_address_labels_print.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }

// JQ script for AJAX Call of Get Place ===========-> 			
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
                            $("#at_posts").html(data);				// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }
                );
                
                $('#at_post').change			// process to call on change in  dropdown
                ( 
                    function() 
                    {
                        var at_post = $('#at_post').val();	// read at_post from full_name dropdown
                        $('#at_post').val(at_post);
                        
                        //alert(at_post);
                    }
                );
            }
        ); 
// JQ script for AJAX Call Ends =========>
// JQ script for AJAX Call of disease_name ===========-> 			
        $(document).ready
        (   
            function () 
            {	
                  $.ajax
                (
                    {
                        url: '../../ak_com/database/ajax/Get_disease_name.php',		// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getDisease_name" },			   // what exactly required 

                        success: function (data) 
                        {
                            //alert("Success : " + data);
                            $("#disease_names").html(data);				// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }

                );

                $('#disease_name').change			// process to call on change in  dropdown
                ( 
                    function() 
                    {
                        var disease_name = $('#disease_name').val();	
                        $('#disease_name').val(disease_name);
                        
                        //alert(full_name);
                    }
                );
            }
        ); 
// JQ script for AJAX Call of disease_name Ends =========> 
// JQ script for AJAX Call of RT Name ===========-> 			
        $(document).ready
        (
            function () 
            {	
                $.ajax
                (
                    {
                        url: '../database/ajax/Get_retreat_name.php',	// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getRetreat_name" },			// what exactly required 

                        success: function (data) 
                        {
                            //alert("Success : " + data);
                            $("#retreat_names").html(data);					// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }

                );
                
                $('#retreat_name').change			// process to call on change in  dropdown
                ( 
                    function() 
                    {
                        var at_post = $('#retreat_name').val();	// read at_post from full_name dropdown
                        $('#retreat_name').val(at_post);
                        
                        //alert(at_post);
                    }
                );
            }
        ); 
// JQ script for AJAX Call Ends =========>
    </script>
   
        <form action="" method="POST" class="form-inline" >
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b> Disease-wise RT Case Sheet Register</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    RT Case Sheet Register
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>Disease:</label>
                            <div class="form-group">
                                <input list="disease_names" class="form-control" id= "disease_name" name="disease_name">
                                <datalist id="disease_names">
                                <option value="">
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Retreat</label>
                            <div class="form-group">
                                <input list="retreat_names" class="form-control" id= "retreat_name" name="retreat_name">
                                <datalist id="retreat_names">
                                <option value="">
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Place:</label>
                            <div class="form-group">
                                <input list="at_posts" class="form-control" id= "at_post" name="at_post">
                                <datalist id="at_posts">
                                <option value="">
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>From DOA:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="from_date" name="from_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>To DOA:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="to_date" name="to_date" required>
                            </div>
                        </div>
                       <div class="form-group col-sm-4">
                            <label>Status:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="ad_status" name="ad_status" required>
                                <option></option>
                                <option>Admitted</option>
                                <option>Completed</option>
                                <option>Discontinued</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="form-group col-sm-5 pull-right">
                            <label></label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary pull-center" onclick="dispRepo()"> Display</button>
                                <button type="button" class="btn btn-primary pull-center"  onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Register</button>
                                <button type="button" class="btn btn-primary pull-center"  onclick="aprintRepo()"> <span class="glyphicon glyphicon-print"></span> Address Labels </button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> Disease-wise RT Case Sheet Report</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <!--<th>#</th>-->
                                <th>ID</th>
                                <th>Diseases</th>
                                <th>DOA</th>
                                <th>DOC</th>
                                <th>R Name</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>Status</th>
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
                                       
                                        $query="SELECT c.rt_case_sheet_id, d.disease_name, c.doa, c.doc, c.retreat_name, p.photo, p.full_name, p.address, p.at_post, p.mobile_no, c.ad_status  FROM ak_p_registration p, ak_rt_case_sheet c, ak_rt_case_sheet_fd d WHERE p.person_id= c.person_id and c.rt_case_sheet_id= d.rt_case_sheet_id";

                                        /*and d.disease_name="Hypertension"*/

                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (c.doa between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["retreat_name"]))
                                            if( $_GET["retreat_name"]!=="")
                                            {
                                                $query = $query .   " and ( c.retreat_name ='".  $_GET["retreat_name"] . "')  "; 
                                            }
                                        if( isset($_GET["disease_name"]))
                                            if( $_GET["disease_name"]!=="")
                                            {
                                                $query = $query .   " and ( d.disease_name ='".  $_GET["disease_name"] . "')  "; 
                                            }
                                        if( isset($_GET["ad_status"]))
                                            if( $_GET["ad_status"]!=="")
                                            {
                                                $query = $query .   " and ( c.ad_status ='".  $_GET["ad_status"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                        /*$i =1;*/
                                        while($record = mysqli_fetch_array($response))
                                        {
                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                /*echo '<td align="left">' . $i . '</td>';*/
                                                echo '<td align="left">' . $record[0] . '</td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="left">' . $record[2] . '</td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left">
                                                <a href= "print/Rt_fitness_certificate_print.php?csid=' .$record[0] . '">' . $record[4] . '</a> </td>';
                                            
                                                /*echo '<td align="left">' . $record[4] . '</td>';*/
                                            
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[5] .'">  </td>';
                                            
                                                echo '<td align="left">
                                                <a href= "print/Rt_illness_certificate_print.php?csid=' .$record[0] . '">' . $record[6] . '</a> </td>';
                                                echo '<td  align="left">' . $record[7] . '</td>';
                                                
                                                echo '<td align="left">
                                                <a href= "print/Rt_participation_certificate_print.php?csid=' .$record[0] . '">' . $record[8] . '</a> </td>';
                                                
                                                echo '<td align="left">' . $record[9] . '</td>';
                                            echo '<td align="left">' . $record[10] . '</td>';
                                            echo "</tr>";
                                            /*$i = $i+1;*/
                                        }
                                    }
                                }
                                catch(Exception $ex)
                                {
                                    echo "<script language='javascript'>alert('Error in Reading data')</script>";
                                }
                            ?>
<!-- Php code for OP Case Sheet Table Ends =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../rt_case_sheet.php">Go to Menu</a></td>
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
