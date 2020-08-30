$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_rt_retreat_name_up.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getRetreat_name_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_rt_retreat_name_records").html(data);					// to set fetched data
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
            var retreat_name_id = $('#retreat_name_id').val();
            
            //alert(retreat_name_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_rt_retreat_name_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_retreat_name_data", retreat_name_id:retreat_name_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data 
                        
                       //alert("Success : " + data); 
                        
                        $("#retreat_name").val(res[0]);
                        $("#retreat_name_id").val(res[1]);
                        
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }
            
            
            
           
           
        
