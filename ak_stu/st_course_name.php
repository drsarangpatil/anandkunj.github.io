<?php
if(session_id() == '') 
    session_start();
?>

<?php include 'ak_st_header.php';?>

<title>Course Name</title>

</head>
<body>

<script src="js/myjs/get_st_course_name_up.js"></script>
    
        <form action="database/St_course_name.php" method="post">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <h4><b>Add Course Name</b></h4>
<!-- Fetched All Retreat Name Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All Course Name Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Course Name</th>
                                </tr>
                            </thead>
                            <tbody id="all_st_course_name_records">	
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
                        Add Course Name
                    </div>
                    <div class="panel-body">
                           <div class="form-group">
                                <label>Course Name:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                           id="course_name" name="course_name"
                                           placeholder="Divya Amaroli Yoga">
                                </div>
                            </div>
						</div>
                        </div>
                   </div>
<!-- Form Information Pannel Ends================================= -->
          <div class="panel-body">
                <div class="form-group col-sm-12" >
                    <div class="form-group" >
                        <button type="submit" 
                                class="btn btn-primary">Submit
                        </button>
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
