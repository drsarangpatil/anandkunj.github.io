<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SMS Templates</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../ak_com/css/bootstrap.3.3.7.min.css">
        <script src="../ak_com/js/jquery331.min.js"></script>
        <script src="../ak_com/js/bootstrap.3.3.7.min.js"></script>
        
        <script src="js/myjs/get_sb_sms_templates_up.js"></script>
    </head>
    <!-- body ================================================== -->
    <body>
        <form action="database/Sb_sms_templates.php" method="post">
            <div class="container col-sm-2">
            </div>
                <div class="container col-sm-10">
                   <h4><b>SMS Templates </b></h4>
                   
<!-- Fetched All Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All SMS Template Records 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>SMS Name</th>
                                    <th>SMS Template</th>
                                </tr>
                            </thead>
                            <tbody id="all_sb_sms_records">	
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
                        Add SMS Templates
                    </div>
                    <div class="panel-body">
                             <div class="form-group col-sm-5">
                                <label>Name:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                        id="sb_sms_name" name="sb_sms_name" placeholder="Template Name" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>SMS Template:</label>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" id="sb_sms_template" name="sb_sms_template" placeholder="Formt of SMS to be Sent"></textarea>
                                </div>
                            </div>
						</div>
                        </div>
                   </div>
<!-- Form Information Ends ================================================== -->
                <div class="form-group col-sm-8">
                    <div class="form-group" >
                        <button type="submit" class="btn btn-primary">Add</button>
                     </div>
                </div>
                <div class="form-group col-sm-4">
                    <div class="form-group" >
                        <a class="btn btn-info pull-right" href="sb_sms_templates_up.php">Edit SMS Templates</a>
                     </div>
                </div>
            </div>
            <div class="container col-sm-2">
            </div>
        </form>
    </body>
</html>
