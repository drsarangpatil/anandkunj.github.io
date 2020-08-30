<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'Ak_rt_header.php';?>

<!--<script src="./assets/js/myjs/get_address.js"></script>-->

<title>RT Room Allocation Chart</title>

</head>
<body>
 
    <script>
// JS script for display button========>       
        function dispRepo()
        {
            url ="";

            url += "Rt_room_allocation_chart.php?building_name=" + document.getElementById("building_name").value;
            url += "&room_number=" + document.getElementById("room_number").value;
            url += "&from_date=" + document.getElementById("from_date").value ;
            url += "&to_date=" + document.getElementById("to_date").value;
            url += "&room_status=" + document.getElementById("room_status").value;
            url += "&full_name=" + document.getElementById("full_name").value;
            location.replace(url);
            //alert("sadsad");
        }
// JS script for print button=========>         
        function printRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Rt_room_allocation_chart.php", "print/Rt_room_allocation_chart_print.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }
        
/*// JS script for Aprint button=========>         
        function aprintRepo()
        {
            url ="";
            url=document.URL;
            url=url.replace("Rt_cs_register.php", "print/Rt_address_labels_print.php");
            //alert (url)
            window.open(url);
            //alert("sadsad");
        }*/

// JQ script for AJAX Call of Get Place ===========-> 			
        $(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: '../database/ajax/Get_building_room.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getBuilding_names" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#building_names").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
		$('#building_name').change			// process to call on change in disease_category dropdown
        
		( 
			function() 
			{
                 
				var building_name = $('#building_name').val();
                $('#building_name').val(building_name);
                
               // alert(building_name);
                
				$.ajax
				(
					{
						url: '../database/ajax/Get_building_room.php',			// call page for data to be                                                          retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getAllRoom_numbers", building_name:building_name},	// what                                                                     exactly required 

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#room_numbers").html(data);					// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					 }
				  );
                }
            );
                
         /* $('#room_number').change			// process to call on change in disease_name dropdown
                ( 
                    function() 
                    {
                        var room_number = $('#room_number').val();		
                        var building_name = $('#building_name').val(); 
                       
                        $('#room_numbera').val(room_number)
			       }
		        );*/
	       }
    );
// JQ script for AJAX Call Ends =========>
// JQ script for AJAX Call of full name ===========-> 			
        $(document).ready
        (   
            function () 
            {	
                $.ajax
                (
                    {
                        url: '../database/ajax/Get_rt_room_allocation_up.php',	// call page for data to be retrived
                        type: 'GET',								            // to get data in backgrouond
                        data: { process: "getFullnames", isPrescription:"1"}, // what exactly required 

                        success: function (data) 
                        {
                           //alert("Success : " + data);

                            $("#full_names").html(data);			// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }

                );

                $('#full_name').change			// process to call on change in  dropdown
                ( 
                    function() 
                    {
                        var full_name = $('#full_name').val();	
                        full_name=  full_name.split("-")[0];
                        $('#full_name').val(full_name);
                        
                        //alert(full_name);
                    }
                );
            }
        ); 
// JQ script for AJAX Call Ends =========>
    </script>
    
        <form action="" method="POST" class="form-inline" >
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b> RT Room Allocation Chart</b></h4>
<!-- Filters for Sorting Columns ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
				    RT Room Allocation Chart
				    </div>
                    <div class="panel-body">
                    <div class="well">
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>Name:</label>
                            <div class="form-group">
                                <input list="full_names" class="form-control" id= "full_name" name="full_name">
                                <datalist id="full_names">
                                <option value="">
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Building</label>
                            <div class="form-group">
                                <input list="building_names" class="form-control" id= "building_name" name="building_name">
                                <datalist id="building_names">
                                <option value="">
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Room:</label>
                            <div class="form-group">
                                <input list="room_numbers" class="form-control" id= "room_number" name="room_number">
                                <datalist id="room_numbers">
                                <option value="">
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="form-group col-sm-4">
                            <label>From DOC:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="from_date" name="from_date" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>To DOC:</label>
                            <div class="form-group" >
                                <input type="date" class="form-control"
                                id="to_date" name="to_date" required>
                            </div>
                        </div>
                       <div class="form-group col-sm-4">
                            <label>Status:</label>
                            <div class="form-group">
                                 <select class="form-control" 
                                    id="room_status" name="room_status" required>
                                <option></option>
                                <option>Occupied</option>
                                <option>Vacant</option>
                                <option>Repair</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="form-group col-sm-4 pull-right">
                            <label></label>
                            <div class="form-group" >
                                <button type="button" class="btn btn-primary pull-center" onclick="dispRepo()"> Display</button>
                                <button type="button" class="btn btn-primary pull-center"  onclick="printRepo()"> <span class="glyphicon glyphicon-print"></span> Chart</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Filters for Sorting Columns Ends ================================================== -->
                <h5><b> RT Room Allocation Chart</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example" style="font-size:14px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Building</th>
                                <th>Room</th>
                                <th>Status</th>
                                <th>P. Name</th>
                                <th>Photo</th>
                                <th>Bed</th>
                                <th>DOA</th>
                                <th>DOC</th>
                                <th>RT-DU</th>
                                <th>A1 Name</th>
                                <th>Bed</th>
                                <th>A2 Name</th>
                                <th>Bed</th> 
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for RT Case Sheet Table Starts =============================== -->
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

                                        $query = ("SELECT Distinct p.full_name, p.photo, r.rt_room_allocation_id, r.building_name, r.room_number, r.room_status, r.bed_number, r.doa, r.doc, r.retreat_duration, r.attendant_name1, r.bed_number1, r.attendant_name2, r.bed_number2, p.person_id FROM ak_p_registration p, ak_rt_room_allocation r, ak_rt_case_sheet c WHERE c.ad_status='Admitted'");
                                        $query = $query . " and p.person_id  = c.person_id";
                                        $query = $query . " and c.rt_case_sheet_id  = r.rt_case_sheet_id";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (c.doc between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["building_name"]))
                                            if( $_GET["building_name"]!=="")
                                            {
                                                $query = $query .   " and ( r.building_name ='".  $_GET["building_name"] . "')  "; 
                                            }
                                        if( isset($_GET["room_number"]))
                                            if( $_GET["room_number"]!=="")
                                            {
                                                $query = $query .   " and ( r.room_number ='".  $_GET["room_number"] . "')  "; 
                                            }
                                        if( isset($_GET["full_name"]))
                                            if( $_GET["full_name"]!=="")
                                            {
                                                $query = $query .   " and ( p.full_name ='".  $_GET["full_name"] . "')  "; 
                                            }
                                        if( isset($_GET["room_status"]))
                                            if( $_GET["room_status"]!=="")
                                            {
                                                $query = $query .   " and ( r.room_status ='".  $_GET["room_status"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="left">' . $i . '</td>';
                                                
                                                echo '<td align="left">' . $record[2] . '</td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                echo '<td align="left">' . $record[4] . '</td>';
                                                echo '<td align="left">' . $record[5] . '</td>';
                                                echo '<td align="left">' . $record[0] . '</td>';
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../ak_com/database/photos/'. $record[1] .'">  </td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                echo '<td  align="left">' . $record[7] . '</td>';
                                                echo '<td align="left">' . $record[8] . '</td>';
                                                echo '<td align="left">' . $record[9] . '</td>';
                                                echo '<td align="left">' . $record[10] . '</td>';
                                                echo '<td align="left">' . $record[11] . '</td>';
                                                echo '<td align="left">' . $record[12] . '</td>';
                                                echo '<td align="left">' . $record[13] . '</td>';
                                                /*echo '<td align="left">
                                                <a href= "print/Rt_discharge_sheet_print.php?csid=' .$record[0] . '">' . $record[10] . '</a> </td>';*/
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
<!-- Php code for RT Case Sheet Table Ends =============================== -->
                        </tbody>
                    </table>
                    <td><a href="../rt_room_allocation.php">Go to Menu</a></td>
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
