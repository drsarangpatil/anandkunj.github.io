<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_sb_header.php';?>

<title>Update-Subscription Type</title>

</head>
<body>

<script src="js/myjs/get_magazine_subscription.js"></script>
<script src="js/myjs/get_sb_subscription_type_up.js"></script>
  
        <form action="database/Sb_subscription_type_up.php" method="post">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Update-Subscription Type </b></h4>
                    
    <!-- Fetched All Subscription Type Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Subscription Type Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Magazine Name</th>
                                    <th>Subscription Type</th>
                                    <th>Subscription Amount</th>
                                </tr>
                            </thead>
                            <tbody id="all_subscription_type_records">	
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
                        Update-Subscription Type
                    </div>
                    <div class="panel-body">
                            <div class="form-group col-sm-3">
                                <label>ID:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                       id="sb_subscription_type_id" name="sb_subscription_type_id">
                                </div>
                            </div>
                             <div class="form-group col-sm-9">
                                <label> &nbsp;</label>
                                <div class="form-group" >
                                 <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                                </div>
                            </div>
                           <div class="form-group col-sm-4">
                                <label>Magazine Name:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                            id="magazine_name" name="magazine_name" readonly>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Subscription Type:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="subscription_type" name="subscription_type"
                                           placeholder="Yearly/Tri-Yearly/Five-Yearly/Life" required>
                                </div>
                            </div>
                             <div class="form-group col-sm-4">
                                <label>Subscription Amount:</label>
                                <div class="form-group">
                                     <div class="form-group">
                                    <input type="text" class="form-control" 
                                        id="subscription_amount" name="subscription_amount"
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
                        <a class="btn btn-info pull-right" href="sb_subscription_type.php">New Subscription Type</a>
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
