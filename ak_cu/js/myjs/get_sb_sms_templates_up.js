$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_sb_sms_templates_up.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getSb_sms_tempalte_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_sb_sms_records").html(data);					// to set fetched data
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
            var sb_sms_id = $('#sb_sms_id').val();
            
            //alert(sb_sms_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_sb_sms_templates_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_sms_data", sb_sms_id:sb_sms_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data 
                        
                       // alert("Success : " + data); 
                        
                        $("#sb_sms_name").val(res[0]);
                        $("#sb_sms_template").val(res[1]);
                        
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }
            
            
            
           
           
        
