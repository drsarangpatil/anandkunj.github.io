<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

<script src="js/myjs/get_room_number_up.js"></script>

<title>Update-Room Number</title>

</head>
<body>
        <form action="database/Room_number_up.php" method="post">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Update - Room Number </b></h4>
                    <br>
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
                        Update - Room Number
                    </div>
                    <div class="panel-body">
                            <div class="form-group col-sm-3">
                                <label>ID:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                       id="room_number_id" name="room_number_id">
                                </div>
                            </div>
                             <div class="form-group col-sm-9">
                                <label> &nbsp;</label>
                                <div class="form-group" >
                                 <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                                </div>
                            </div>
                           <div class="form-group col-sm-4">
                                <label>Building Name:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="building_name" name="building_name"
                                           readonly>
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
                                    <option>Occupied</option>
                                    <option>Reapir</option>
                                </select>
                                </div>
                            </div>
						</div>
                        </div>
                   </div>
<!-- Form Information Pannel Ends================================= -->
                        <div class="form-group col-sm-8">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Edit</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="room_number.php">Add Room Number</a>
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