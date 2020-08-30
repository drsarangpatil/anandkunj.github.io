$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_sb_email_templates_up.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getSb_email_tempalte_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_sb_email_records").html(data);					// to set fetched data
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
            var sb_email_id = $('#sb_email_id').val();
            
            //alert(sb_email_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_sb_email_templates_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_email_data", sb_email_id:sb_email_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data 
                        
                       // alert("Success : " + data); 
                        
                        $("#sb_email_name").val(res[0]);
                        $("#sb_email_subject").val(res[1]);
                        $("#sb_email_template").val(res[2]);
                        
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }
            
            
            
           
           
        
