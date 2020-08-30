<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

    <script src="js/myjs/get_rt_retreat_name_up.js"></script>
    <title>Update-Retreat Name</title>

</head>
<body>

        <form action="database/Rt_retreat_name_up.php" method="post">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Update - Retreat Name</b></h4>
                    
<!-- Fetched All Magazine Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Update - Retreat Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Retreat Name</th>
                                </tr>
                            </thead>
                            <tbody id="all_rt_retreat_name_records">	
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched All Magazine Records Pannel Ends================================= -->		
<!-- Form Information ================================================== -->
                <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Update - Retreat Name
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-3">
                            <label>ID:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                   id="retreat_name_id" name="retreat_name_id">
                            </div>
                        </div>
                         <div class="form-group col-sm-9">
                            <label> &nbsp;</label>
                            <div class="form-group" >
                             <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                            </div>
                        </div>
                       <div class="form-group">
                            <label>Retreat Name:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="retreat_name" name="retreat_name"
                                       placeholder="Sampurna Swasthya Sadhana Shivir">
                            </div>
                        </div>
				    </div>
                </div>
            </div>
<!-- Form Information Pannel Ends================================= -->
               <div class="form-group col-sm-8">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Update</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="rt_retreat_name.php">Add Retreat Name</a>
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