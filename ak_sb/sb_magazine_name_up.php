<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_sb_header.php';?>

<title>Update-Magazine Name</title>

</head>
<body>

<script src="js/myjs/get_sb_magazine_name_up.js"></script>
 
        <form action="database/Sb_magazine_name_up.php" method="post">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Update-Magazine Name</b></h4>
                    
<!-- Fetched All Magazine Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Update-Magazine Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Magazine Name</th>
                                </tr>
                            </thead>
                            <tbody id="all_sb_magazine_records">	
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
                        Update-Magazine Name
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-3">
                            <label>ID:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                   id="sb_magazine_name_id" name="sb_magazine_name_id">
                            </div>
                        </div>
                         <div class="form-group col-sm-9">
                            <label> &nbsp;</label>
                            <div class="form-group" >
                             <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                            </div>
                        </div>
                       <div class="form-group">
                            <label>Magazine Name:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                       id="magazine_name" name="magazine_name"
                                       placeholder="Shivambu_Samachar/ UriNews/ Swasthya Sandesh" required>
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
                        <a class="btn btn-info pull-right" href="sb_magazine_name.php">New Magazine Name</a>
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