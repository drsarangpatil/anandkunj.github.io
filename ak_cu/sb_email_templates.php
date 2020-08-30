<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Email Templates </title>
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.3.3.7.min.css">
        <script src="js/jquery331.min.js"></script>
        <script src="js/myjs/get_sb_email_templates_up.js"></script>
    </head>
    <!-- body ================================================== -->
    <body>
        <form action="database/Sb_email_templates.php" method="post">
            <div class="container col-sm-2">
            </div>
                <div class="container col-sm-10">
                   <h4><b>Email Templates</b></h4>
<!-- Fetched All Room Allocation Records Pannel starts ================================== -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All Email Template Records 
                    </div>
                    <!--<div class="form-group col-sm-2">
                        <label> &nbsp;</label>
                        <div class="form-group" >
                         <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show </button>
                        </div>
                    </div>-->
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover"      id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email Name</th>
                                    <th>Email Subject</th>
                                    <th>Email Template</th>
                                </tr>
                            </thead>
                            <tbody id="all_email_records">	
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- Fetched All Daily Health Assessment Records Pannel Ends============ -->
<!-- Form Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        Add Email Templates
                    </div>
                    <div class="panel-body">
                            <div class="form-group col-sm-4">
                                <label>Name:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                        id="sb_email_name" name="sb_email_name" placeholder="Template Name" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-8">
                                <label>Subject:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" 
                                        id="sb_email_subject" name="sb_email_subject" placeholder="Email Subject" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>SMS Template:</label>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" id="sb_email_template" name="sb_email_template" placeholder="Formt of Email to be Sent"></textarea>
                                </div>
                            </div>
						</div>
                        </div>
                   </div>
<!-- Form Information End================================================== -->
                <div class="form-group col-sm-8">
                    <div class="form-group" >
                        <button type="submit" class="btn btn-primary">Add</button>
                     </div>
                </div>
                <div class="form-group col-sm-4">
                    <div class="form-group" >
                        <a class="btn btn-info pull-right" href="sb_email_templates_up.php">Edit Email Templates</a>
                     </div>
                </div>
            </div>
            <div class="container col-sm-2">
            </div>
        </form>
    </body>
</html>
