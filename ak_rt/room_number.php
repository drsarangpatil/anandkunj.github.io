<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

<script src="js/myjs/get_building_room_bed.js"></script>
<script src="js/myjs/get_room_number_up.js"></script>

<title>Room Number</title>

</head>
<body>

        <form action="database/Room_number.php" method="post">
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Add Room Number </b></h4>
<!-- Fetched All Subscription Type Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Room Number Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Building Name</th>
                                    <th>Room Number</th>
                                    <th>Room Status</th>
                                </tr>
                            </thead>
                            <tbody id="all_room_number_records">	
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched All Subscription Type Records Pannel Ends================================= -->
    <!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Add Room Number
                    </div>
                    <div class="panel-body">
                           <div class="form-group col-sm-4">
                                <label>Building Name:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                            id="building_name" name="building_name">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Room Number:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="room_number" name="room_number"
                                           placeholder="Room Number">
                                </div>
                            </div>
                             <div class="form-group col-sm-3">
                                <label>Room Status:</label>
                                <div class="form-group">
                                     <select class="form-control" 
                                        id="room_status" name="room_status" required>
                                    <option>Vacant</option>
                                    <!--<option>Occupied</option>
                                    <option>Not Ready</option>-->
                                </select>
                                </div>
                            </div>
						</div>
                        </div>
                   </div>
<!-- Form Information Pannel Ends================================= -->
          <div class="form-group col-sm-8">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Add</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="room_number_up.php">Edit Room Number/Status</a>
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
            
