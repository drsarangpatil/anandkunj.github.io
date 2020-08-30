<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_mb_header.php';?>

<!--<script src="./js/myjs/get_building_name_up.js"> </script>-->

<title>Membership Type</title>

</head>
<body>
  
    <script src="js/myjs/get_association_membership.js"></script>
    <script src="js/myjs/get_mb_membership_type_up.js"></script>
    

        <form action="database/Mb_membership_type.php" method="post">
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Add Membership Type </b></h4>
    <!-- Fetched All Subscription Type Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All Membership Type Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Association Name</th>
                                    <th>Membership Type</th>
                                    <th>Membership Amount</th>
                                </tr>
                            </thead>
                            <tbody id="all_membership_type_records">	
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
                        Add Membership Type
                    </div>
                    <div class="panel-body">
                           <div class="form-group col-sm-6">
                                <label>Association Name:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                            id="association_name" name="association_name">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Membership Type:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="membership_type" name="membership_type"
                                           placeholder="Yearly/Tri-Yearly/Five-Yearly/Life">
                                </div>
                            </div>
                             <div class="form-group col-sm-3">
                                <label>Membership Amount:</label>
                                <div class="form-group">
                                     <div class="form-group">
                                    <input type="text" class="form-control" 
                                        id="membership_amount" name="membership_amount"
                                           placeholder="150.00/425.00/700.00/2,100.00">
                                    </div>
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
                        <a class="btn btn-info pull-right" href="mb_membership_type_up.php">Edit Membership Type</a>
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
