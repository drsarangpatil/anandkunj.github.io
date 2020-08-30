<?php
	if(session_id() == '') 
		session_start();
?>

<?php include 'ak_rt_header.php';?>

    <script src="js/myjs/get_rt_valuables_deposit_returned_ad.js"></script>

    <title>Add Valuables_Deposit Return</title>

</head>
<body>

<!-- JS script for Calculations====================== -->  
    <script>
function substraction()
{
    var deposit_amount = 0;
    var returned_amount = 0;
    var balance_amount = 0;
    
    deposit_amount = parseInt($("#deposit_amount").val());
    returned_amount = parseInt($("#returned_amount").val());
    
    balance_amount = deposit_amount - returned_amount; 

    //alert ( payable_amount + "----" );
    $("#balance_amount").val(balance_amount);

    var v_d_status;
    if (balance_amount == 0) {
        v_d_status = "Returned";
        v_items="0"
        $("#v_d_status").val(v_d_status);
        $("#v_items").val(v_items);
    } else {
        v_d_status = "Partial";
        $("#v_d_status").val(v_d_status);
    }
}
</script>
<!-- JS script for print button====================== -->
    <script>    
        function printRepo_a()
        {
            url ="";
            url=document.URL;
            url=url.replace("rt_valuables_deposit_returned_ad.php", "reports/Rt_deposit_returned_report.php");
            //alert (url)
            window.open(url);

            //alert("sadsad");
        }
    </script>

        <form action="database/Rt_valuables_deposit_returned_ad.php" method="post"  enctype="multipart/form-data">
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h4><b>Add Valuables-Deposit Return </b></h4>
<!-- Fetched Personal Information ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                      Personal Information  
                    </div>
                    <div class="panel-body">
                        <div class="well">
				            <div class="media">
				            <div class="media-body">
                                <div> 
                                    <a class="pull-left" href="#">
									<img id="photo" name="photo" class="img-rounded" width="137" height="171" src="../ak_com/assets/images/a25.jpg" alt="Image not uploded">
								    </a>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Participant Name :</label>
                                        <div class="form-group">
                                            <input list="full_names" class="form-control" id= "full_name" name="full_name">
                                            <datalist id="full_names">
                                            <option value="">
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Person ID:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" 
                                               id="person_id" name="person_id" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>User ID:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="user_id" name="user_id"<?php echo "value='". $_SESSION['user_id'] ."'";?> readonly>
                                    </div>
                                </div> 
                                <!--<div class="form-group col-sm-3">
                                    <label>Date of Birth:</label>-->
                                    <div class="form-group" >
                                        <input type="hidden"  class="form-control"
                                               id="dob" name="dob"
                                               readonly>
                                    </div>
                               <!-- </div>-->
                                <div class="form-group col-sm-2">
                                    <label>Age:</label>
                                        <div class="form-group">
                                        <input type="number" class="form-control"
                                           id="age" name="age" readonly>
                                      </div>
                               </div>
                                <div class="form-group col-sm-2">
                                    <label>Gender:</label>
                                      <div class="form-group">
                                        <input type="text" class="form-control" 
                                               id="gender" name="gender" readonly>
                                      </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Mobile No.:</label>
                                    <div class="form-group">
                                        <input type="number" class="form-control"
                                               id="mobile_no" name="mobile_no"
                                               placeholder="Mobile Number" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Case Paper ID:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" 
                                               id="rt_case_sheet_id" name="rt_case_sheet_id" readonly>
                                    </div>
                                </div> 
                                <div class="form-group col-sm-3">
                                    <label>Date of Admission:</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" 
                                               id="doa" name="doa" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Retreat Name:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" 
                                               id="retreat_name" name="retreat_name" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>RT Duration:</label>
                                    <div class="form-group">
                                        <input type="number" class="form-control"
                                               id="retreat_duration" name="retreat_duration"
                                               placeholder="10" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Date of Completion:</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" 
                                        id="doc" name="doc" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-8">
                                        <label>Final Diagnosis / Nature of Illness:</label>
                                        <textarea class="form-control" rows="1" id="final_diagnosis" name="final_diagnosis" readonly placeholder="Diseases to be treated / Objective of Treatment"></textarea>
                                </div>
                                 <div class="form-group col-sm-2">
                                    <label>Room No:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" 
                                        id="room_number" name="room_number" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>No Attendants:</label>
                                    <input type="text" class="form-control" 
                                    id="no_attendant" name="no_attendant" readonly>
                                </div>
                            </div>
				            </div>
						</div>
                  </div>
			</div>	</div>		
<!-- Fetched Personal Information Pannel end ================================================== -->
<!-- Fetched RT Deposit Records Pannel starts ================================== -->
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            All RT Deposit Returned Records 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-        hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Return ID</th>
                                        <th>Deposit Amount</th>
                                        <th>Returned Amount</th>
                                        <th>Balance Amount</th>
                                        <th> Remaining Valuables</th>
                                        <th>Returned Date</th>
                                        <th>User ID</th>
                                    </tr>
                                </thead>
                                <tbody id="old_deposit_records_list">	
                                </tbody>
                            </table>
                            <div class="form-group col-sm-2">
                                <label>Return ID :</label>
                                <div class="form-group" >
                                    <input type="number" class="form-control"
                                       id="rt_v_d_returned_id" name="rt_v_d_returned_id">
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label> &nbsp;</label>
                                <div class="form-group" >
                                    <button id="btn" type="button" class="btn btn-primary" onclick="myshow()">Show</button>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Returned Date:</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" 
                                           id="rt_v_d_returned_date" name="rt_v_d_returned_date" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Schedule:</label>
                                <div class="form-group">
                                    <select class="form-control" 
                                        id="schedule" name="schedule" required>
                                        <option>Morning</option>
                                        <option>Afternoon</option>
                                        <option>Evening</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group col-sm-2">
                                <label>Received ID :</label>
                                <div class="form-group" >
                                    <input type="number" class="form-control"
                                       id="rt_v_d_received_id" name="rt_v_d_received_id" readonly>
                                </div>
                            </div>
                            
				            </div>
                        </div>
                    </div>
                </div>
<!-- Fetched RT Deposit Records Pannel Ends================================= -->
<!-- Attendant Information Start ================================================== -->
                    <div class="panel-group">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        Add Valuables-Deposit Return
                    </div>
                    <div class="panel-body">
                        <div class="media-body">
                                <div class="form-group col-sm-3">
                                    <label> Remaining Deposit Amount:</label>
                                      <div class="form-group">
                                        <input type="number" class="form-control" 
                                               id="deposit_amount" name="deposit_amount" value="0.00" onchange="substraction()" placeholder="Deposit Amount" readonly>
                                      </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Returned Amount:</label>
                                      <div class="form-group">
                                        <input type="number" class="form-control" 
                                               id="returned_amount" name="returned_amount" value="0.00" onchange="substraction()" placeholder="Returned Amount" required>
                                      </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Balance Deposit:</label>
                                      <div class="form-group">
                                        <input type="number" class="form-control" 
                                               id="balance_amount" name="balance_amount" value="0.00" placeholder="Balance Amount" readonly>
                                      </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Deposit Status:</label>
                                       <div class="form-group">
                                           <input type="text" class="form-control" align="right"
                                            id="v_d_status" name="v_d_status" onchange="substraction()" readonly>
                                        </div>
                                </div>
                             </div>
                             <div class="form-group col-sm-12">
                                <label>Remaining Valuable Items:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="v_items" name="v_items" 
                                           onchange="substraction()" placeholder="1-gold chain, 1- gold ring" required>
                                </div>
                            </div>
                            </div>
						  </div>
                     </div>
<!-- Attendant Information end ================================================== -->
                    <div class="form-group col-sm-9">
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="form-group" >
                            <button type="button" class="btn btn-info pull-right" onclick="printRepo_a()"> <span class="glyphicon glyphicon-print"></span> Deposit Returned Voucher</button>
                        </div>
                    </div>
                    <!--<div class="form-group col-sm-3">
                        <div class="form-group" >
                            <a class="btn btn-info pull-right" href="rt_valuables_deposit_returned_ad.php">Add Deposit Returned</a>
                         </div>
                    </div>-->
				</div>
<?php include'../ak_com/assets/index_footer.php'; ?>
<div class="container col-sm-0">
</div>
</form>
</div>
</body>
</html>
