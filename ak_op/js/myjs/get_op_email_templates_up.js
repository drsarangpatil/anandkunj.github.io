$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_op_email_templates_up.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getOp_email_tempalte_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_op_email_records").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
	   }
    );
		       

 function myshow()
        {
            var op_email_id = $('#op_email_id').val();
            
            //alert(op_email_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_op_email_templates_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_email_data", op_email_id:op_email_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data 
                        
                       // alert("Success : " + data); 
                        
                        $("#op_email_name").val(res[0]);
                        $("#op_email_subject").val(res[1]);
                        $("#op_email_template").val(res[2]);
                        
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }
            
            
            
           
           
        
