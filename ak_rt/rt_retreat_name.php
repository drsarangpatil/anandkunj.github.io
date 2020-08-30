<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

    <script src="js/myjs/get_rt_retreat_name_up.js"></script>

 <title>Retreat Name</title>

</head>
<body>
    
      <form action="database/Rt_retreat_name.php" method="post">
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Add Retreat Name</b></h4>
<!-- Fetched All Retreat Name Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All Retreat Name Records 
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
<!-- Fetched All Retreat Name Pannel Ends================================= -->                   
    <!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Add Retreat Name
                    </div>
                    <div class="panel-body">
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
                            <button type="submit" class="btn btn-primary">Add</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="rt_retreat_name_up.php">Edit Retreat Name</a>
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
