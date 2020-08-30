<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'ak_com_header.php';?>
<script src="./assets/js/myjs/get_medicine_names.js"></script>
<script src="./assets/js/myjs/get_medicine_names_up.js"></script>
<title>Medicine Names</title>
</head>
<body>
<form action="database/Medicine_names.php" method="post">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
           <h4><b>Medicine Names</b></h4>
<!-- Form Information ================================================== -->
        <div class="panel-group">
            <div class="panel panel-primary">

            <div class="panel-heading">
                Add Medicine Names 
            </div>
            <div class="panel-body">
                  <div class="form-group col-sm-4">
                        <label>Disease Category:</label>
                        <div class="form-group">
                            <select class="form-control" 
                                    id="disease_category" name="disease_category">
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <label>Add Medicine Name:</label>
                        <div class="form-group">
                            <textarea class="form-control" rows="15" cols="100" id="medicine_names" name="medicine_names" placeholder=" ➤ Tab Triphala....(1)   0.......0.......1 गोली, दिन में एक बार"></textarea>
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
                <a class="btn btn-info pull-right" href="medicine_names_up.php">Edit Medicine Names</a>
             </div>
            </div>                
        </div> 
<!-- Fetched All Records Pannel starts ================================== -->
    <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading">
                All Medicine Names Records 
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                    <thead>
                        <tr>
                            <th>MD ID</th>
                            <th>Disease Category</th>
                            <th>Medicine Names</th>
                        </tr>
                    </thead>
                    <tbody id="all_medicine_name_records">	
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Fetched All Records Pannel Ends================================= -->
</div>
        <?php include'../ak_com/assets/index_footer.php'; ?>
        <div class="container col-sm-0">
    </div>
</form>
</div>
</body>
</html> 
