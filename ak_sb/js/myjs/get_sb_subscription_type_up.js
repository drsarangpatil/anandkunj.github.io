$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_sb_subscription_type_up.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getSb_subscription_type_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_subscription_type_records").html(data);					// to set fetched data
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
            var sb_subscription_type_id = $('#sb_subscription_type_id').val();
            
            //alert(sb_subscription_type_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_sb_subscription_type_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_subscription_type_data", sb_subscription_type_id:sb_subscription_type_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data 
                        
                       //alert("Success : " + data); 
                        
                        $("#magazine_name").val(res[0]);
                        $("#subscription_type").val(res[1]);
                        $("#subscription_amount").val(res[2]);
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }
            
            
            
           
           
        
