<?php
	if(session_id() == '') 
		session_start();
?>
<?php include 'ak_com_header.php';?>
<script src="./assets/js/myjs/get_diseases.js"></script>
<script src="./assets/js/myjs/get_life_style_instructions_up.js"></script>
<title>Life Style Instructions</title>
</head>
<body>
<form action="database/Life_style_instructions.php" method="post">
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
           <h4><b>Life Style Instructions </b></h4>
<!-- Form Information ================================================== -->
            <div class="panel-group">
            <div class="panel panel-primary">

            <div class="panel-heading">
                Add Life Style Instructions
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
                     <!--<div class="form-group col-sm-5">
                        <label>Disease Name:</label>
                        <div class="form-group">
                            <select class="form-control" 
                                    id="disease_name" name="disease_name">
                            </select>
                        </div>
                    </div>-->
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

      <div class="panel-body">
        <div class="form-group col-sm-10">
            <div class="form-group" >
                <button type="submit" class="btn btn-primary">Submit</button>
             </div>
        </div>
        <div class="form-group col-sm-2">
            <div class="form-group" >
                <a class="btn btn-info pull-right" href="life_style_instructions_up.php">Edit LS Instructions</a>
             </div>
            </div>                
        </div>
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
</div>
        <?php include'../ak_com/assets/index_footer.php'; ?>
        <div class="container col-sm-0">
    </div>
</form>
</div>
</body>
</html>  
                    