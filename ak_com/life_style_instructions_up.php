<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'ak_com_header.php';?>
<script src="./assets/js/myjs/get_diseases.js"></script>
<script src="./assets/js/myjs/get_life_style_instructions_up.js"></script>
<title>Update Life Style Instructions</title>
</head>
<body>
 <form action="database/Life_style_instructions_up.php" method="post">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
           <h4><b>Update Life Style Instructions </b></h4>
<!-- Fetched All Records Pannel starts ================================== -->
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    All Life Style Instruction Records 
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Disease Category</th>
                                <th>Language</th>
                                <th>Life Style Instructions</th>
                            </tr>
                        </thead>
                        <tbody id="all_life_style_instruction_records">	
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- Fetched All Records Pannel Ends================================= -->	
<!-- Form Information ================================================== -->
        <div class="panel-group">
            <div class="panel panel-primary">

            <div class="panel-heading">
                Update Life Style Instructions
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-3">
                    <label>ID:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" 
                           id="life_style_instructions_id" name="life_style_instructions_id">
                    </div>
                </div>
                 <div class="form-group col-sm-9">
                    <label> &nbsp;</label>
                    <div class="form-group" >
                     <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                        <label>Disease Category:</label>
                        <div class="form-group">
                            <select class="form-control" 
                                    id="disease_category" name="disease_category">
                            </select>
                        </div>
                    </div>                    
                    <div class="form-group col-sm-2">
                        <label>Language:</label>
                        <div class="form-group">
                            <select class="form-control" 
                                    id="language" name="language">
                                <option>Marathi</option>
                                <option>Hindi</option>
                                <option>English</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <label>Life Style Instructions:</label>
                        <div class="form-group">
                            <textarea class="form-control" rows="15" cols="100" id="life_style_instructions" name="life_style_instructions" placeholder="Life Style Instructions"></textarea>
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
                        <a class="btn btn-info pull-right" href="life_style_instructions.php">Add LS Instructions</a>
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
              